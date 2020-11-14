<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/* -------------------------------------------------------------------------------------
	SYSTEM TEMPLATING Material Dashboard by Creative tim, Arranged by : Badar Wildanie
		* tambahkan variabel-variabel berikut untuk melengkapi fitur pada template material dashboard
	------------------------------------------------------------------------------------
	Section (1) : $ui_css        	-> untuk penulisan CSS tambahan 
	            * format penulisan  -> Berupa array 1 dimensi tanpa key
	            * contoh penulisan  -> ['custom/css/default.css', 'custom/css/wizard.css'] 

	Section (2) : $ui_title  		-> untuk Judul pada pojok kiri atas
		        * format penulisan  -> string biasa 
		        * contoh penulisan  -> "Awokawkwk App" 

	Section (3) : $ui_sidebar_item 	-> untuk menambahkan daftar link sidebar kiri
	            * format penulisan 	-> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
	                                       Lebih baik Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
	            * contoh penulisan 	-> ['Menu 1|fas fa-home|' . site_url('data/user'), 'Menu 1|fas fa-home|' . site_url('data/user')]

	Section (4) : $ui_sidebar_active-> Menentukan link sidebar mana yang aktif 
	            * format penulisan	-> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
	            * contoh penulisan	-> 'Menu 1' 

	Section (5) : $ui_brand     		-> untuk menambahkan judul pada navbar brand
	            * format penulisan 	-> String 
	            * contoh penulisan 	-> 'Laporan' 

	Section (6) : $ui_nav_item    	-> untuk menambahkan daftar link navbar atas
	            * format penulisan  -> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
	                                   * Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
	                                   formatnya SAMA SEPERTI ui_sidebar_item
	            * contoh penulisan  -> ['Nav Menu 1|fas fa-home|' . site_url('data/user'), 'Nav Menu 2|fas fa-home|' . site_url('data/user')]

	Section (7) : $ui_nav_active	-> Menentukan link navbar atas mana yang aktif 
	            * format penulisan  -> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
	            * contoh penulisan  -> 'Nav Menu 1'

	Section (8) : $ui_js        	-> untuk sambungan file JS tambahan 
	            * format penulisan  -> Berupa array 1 dimensi tanpa key
	            * contoh penulisan  -> ['custom/js/default.js', 'custom/js/wizard.js'] 
 ------------------------------------------------------------------------------------- */


class Admin extends CI_Controller {
	public $sidebar_item;

	public function __construct()
	{
		parent::__construct();
		$this->sidebar_item = array(
			'Beranda|fas fa-tachometer-alt|' . site_url('admin/'),
			'Data|fas fa-chalkboard-teacher|' . site_url('admin/data'),
			'Statistik|fas fa-chart-line|' . site_url('admin/statistik'),
			'Laporan|fas fa-clipboard-list|' . site_url('admin/laporan'),
		);
	}

	public function cek_login()
	{
		$logged_username = get_cookie('logged_username');
		$logged_role = get_cookie('logged_role');
		// die;
		if ($logged_role == 'administrator') {
			$this->load->model('AdminModel');
			$user_db = $this->AdminModel->single('username', $logged_username, 'object');
		}
		else {
			delete_cookie('logged_username');
			delete_cookie('logged_role');
            header('location:' .site_url('auth/login?notif=yes&type=danger&msg=Sepertinya anda belum Login'));
            die;
        }

        if ($user_db != '') {
            // user ditemukan
            return $user_db;
        }
        else {
            // user tidak ditemukan
            delete_cookie('logged_username');
            delete_cookie('logged_role');
            header('location:' .site_url('auth/login?notif=yes&type=danger&msg=Sepertinya anda belum login'));
        }
	}

	public function data($jenis_data = FALSE, $mode = FALSE, $submit = FALSE, $id = FALSE)
	{
		

		if ($jenis_data == FALSE) {
			// --------------------------------------
			// * Halaman Awal
			// --------------------------------------
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Pusat Data',
				'ui_nav_item' => array(),
				'ui_nav_active' => 'Tambah data',
				'ui_js' => array(),
			);

			$data['logged_user'] = $this->cek_login();

			$this->load->view('admin/data/index', $data);	
		}
		else if ($jenis_data == 'input_excel') {


			// --------------------------------------
			// * Halaman Input data excel
			// --------------------------------------
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Input data Excel',
				'ui_nav_item' => array(),
				'ui_nav_active' => 'Tambah data',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();



			if ($submit == 'submit') {
				$this->load->model('ProgramStudiModel');
				$this->load->model('MataKuliahModel');
				$this->load->model('DosenModel');
				$this->load->model('KelasModel');
				$this->load->model('MahasiswaModel');
				$this->load->model('RAmbilKelasModel');

				// echo "You submitting an excel file";				
				if (isset($_FILES['file_absensi']['name'])) {
					$inputFileName = $_FILES['file_absensi']['tmp_name'];
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
					$spreadsheetNames = $spreadsheet->getSheetNames();

					$data_spreadsheet = array();
					for ($activeSpreadsheet=0; $activeSpreadsheet < count($spreadsheetNames); $activeSpreadsheet++) { 
						$worksheet = $spreadsheet->getSheet($activeSpreadsheet);
						$cell_a1 = $worksheet->getCell('A1');

						// mata_kuliah | Letak: Nama spreadsheet + A2
						$data_spreadsheet[$activeSpreadsheet]['mata_kuliah'] = $spreadsheetNames[$activeSpreadsheet];
						// kelas | Letak: Nama spreadsheet + A2
						$data_spreadsheet[$activeSpreadsheet]['kelas'] = $spreadsheetNames[$activeSpreadsheet] . ' ' . $worksheet->getCell('A2')->getValue();

						// nama dosen | Letak: C5 
						$data_spreadsheet[$activeSpreadsheet]['dosen'] = $worksheet->getCell('C5')->getValue();

						// program studi | Letak: A3 
						$data_spreadsheet[$activeSpreadsheet]['program_studi'] = $worksheet->getCell('A3')->getValue();



						// Mahasiswa | Letak: looping dari [BCD]8 sampai row tertinggi  Spreadsheet 1 ONLY
						$highest_row = 	$worksheet->getHighestRow();
						$data_spreadsheet[$activeSpreadsheet]['mahasiswa'] = array();
							for ($i=8; $i <= $highest_row; $i++) { 
								if ($worksheet->getCellByColumnAndRow(3, $i)->getValue() == '') {
									break;
								}
								$data_spreadsheet[$activeSpreadsheet]['mahasiswa'][] = array(
									'nim' => $worksheet->getCellByColumnAndRow(3, $i)->getValue(), 
									'nama_lengkap' => ucwords(strtolower($worksheet->getCellByColumnAndRow(2, $i)->getValue())), 
									'jenis_kelamin' => $worksheet->getCellByColumnAndRow(4, $i)->getValue()
								);
							}

					}
				}

				$data['submitted'] = true;
				$data['data_spreadsheet'] = $data_spreadsheet;
				$this->load->view('admin/data/input_excel', $data);	
			}
			else if ($submit == 'submit_system') {
				$data_spreadsheet_json = $this->input->post('data_spreadsheet');
				$data_spreadsheet = json_decode($data_spreadsheet_json);


				$this->load->model('ProgramStudiModel');
				$this->load->model('MataKuliahModel');
				$this->load->model('DosenModel');
				$this->load->model('KelasModel');
				$this->load->model('MahasiswaModel');
				$this->load->model('RAmbilKelasModel');

				$data_program_studi = array();
				$data_mata_kuliah = array();
				$data_dosen = array();
				$data_mahasiswa = array();
				$data_kelas = array();

				$program_studi_id = -1;
				$mata_kuliah_id = -1;
				$dosen_id = -1;
				$kelas_id = -1;
				
				foreach ($data_spreadsheet as $spreadsheet) {


					// Aturan Pengkondisian input data
					// * Tidak kosong
					// * Tidak ada dalam array
					// * Tidak ada dalam database

					// ------------------------------------------------------
					// * INSERT DATA PROGRAM STUDI   
					// Algoritma patuh dengan rule diatas
					// ------------------------------------------------------
					if ($spreadsheet->program_studi != '') {
						if (!in_array($spreadsheet->program_studi, $data_program_studi)) {
							$data_finding = $this->ProgramStudiModel->single('program_studi', $spreadsheet->program_studi, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'program_studi' => $spreadsheet->program_studi,
								);
								$data_program_studi[] = $data_insert;
								$query = $this->ProgramStudiModel->insert($data_insert);
								if ($query) {
									$program_studi_id = $this->db->insert_id();
								}
							}
							else {
								// Jika sudah ada di DB, tinggal masukkan insert idnya aja
								$program_studi_id = $data_finding->id;
							}
						}
					}
					else {
						$program_studi_id = -1;
					}
					echo "ProgramStudiID:" . $program_studi_id . '<br/>';

					// ------------------------------------------------------
					// * INSERT DATA MATA KULIAH  
					// Algoritma patuh dengan rule diatas
					// ------------------------------------------------------
					if ($spreadsheet->mata_kuliah != '') {
						if (!in_array($spreadsheet->mata_kuliah, $data_mata_kuliah)) {
							$data_finding = $this->MataKuliahModel->single('mata_kuliah', $spreadsheet->mata_kuliah, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'mata_kuliah' => $spreadsheet->mata_kuliah,
									'program_studi_id' => $program_studi_id,
								);
								$data_mata_kuliah[] = $data_insert;
								$query = $this->MataKuliahModel->insert($data_insert);
								if ($query) {
									$mata_kuliah_id = $this->db->insert_id();
								}
							}
							else {
								// Jika sudah ada di DB, tinggal masukkan insert idnya aja
								$mata_kuliah_id = $data_finding->id;
							}
						}
					}
					else {
						$mata_kuliah_id = -1;
					}
					echo "MataKuliahID:" . $mata_kuliah_id . '<br/>';


					// ------------------------------------------------------
					// * INSERT DATA DOSEN 
					// Algoritma patuh dengan rule diatas
					// ------------------------------------------------------
					if ($spreadsheet->dosen != '') {
						if (!in_array($spreadsheet->dosen, $data_dosen)) {
							$data_finding = $this->DosenModel->single('nama_lengkap', $spreadsheet->dosen, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'nama_lengkap' => ucwords(strtolower($spreadsheet->dosen)),
								);
								$data_dosen[] = $data_insert;
								$query = $this->DosenModel->insert($data_insert);
								if ($query) {
									$dosen_id = $this->db->insert_id();
								}
							}
							else {
								// Jika sudah ada di DB, tinggal masukkan insert idnya aja
								$dosen_id = $data_finding->id;
							}
						}
					}
					else {
						$dosen_id = -1;
					}
					echo "DosenID:" . $dosen_id . '<br/>';

					// ------------------------------------------------------
					// * INSERT DATA KELAS
					// Algoritma patuh dengan rule diatas
					// ------------------------------------------------------
					if ($spreadsheet->kelas != '') {
						if (!in_array($spreadsheet->kelas, $data_kelas)) {
							$data_finding = $this->KelasModel->single('nama', $spreadsheet->kelas, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'nama' => $spreadsheet->kelas,
									'program_studi_id' => $program_studi_id,
									'dosen_pengajar_id' => $dosen_id,
									'mata_kuliah_id' => $mata_kuliah_id,
									'status_kelas' => 'aktif',
								);
								$data_kelas[] = $data_insert;
								$query = $this->KelasModel->insert($data_insert);
								if ($query) {
									$kelas_id = $this->db->insert_id();
								}
							}
							else {
								// Jika sudah ada di DB, tinggal masukkan insert idnya aja
								$kelas_id = $data_finding->id;
							}
						}
					}
					else {
						$kelas_id = -1;
					}
					echo "KelasID:" . $kelas_id . '<br/>';

					
					foreach ($spreadsheet->mahasiswa as $mahasiswa) {
						if ($mahasiswa != '') {
							// ------------------------------------------------------
							// * INSERT DATA MAHASISWA & R_AMBIL_KELAS
							// Setiap loop, Algoritma patuh dengan rule diatas
							// Catatan: Aturan tidak ada dalam array diabaikan, karena masih ada kemungkinan
							//   		data mahasiswa  
							// ------------------------------------------------------
							$mahasiswa_id = -1;
							$data_finding = $this->MahasiswaModel->single('nim', $mahasiswa->nim, 'object');
							if ($data_finding == '') {
								$data_insert = (array) $mahasiswa;
								$data_mahasiswa[] = $data_insert;
								$query = $this->MahasiswaModel->insert($data_insert);
								if ($query) {
									$mahasiswa_id = $data_insert['nim'];
								}
							}
							else {
								$mahasiswa_id = $data_finding->nim;
							}

							$this->db->where('kelas_id', $kelas_id);
							$data_finding = $this->RAmbilKelasModel->single('mahasiswa_nim', $mahasiswa->nim, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'mahasiswa_nim' => $mahasiswa_id,
									'kelas_id' => $kelas_id,
									'status_persetujuan' => 'diterima',
									'catatan' => 'Entry ini menggunakan fitur input data excel translation'
								);
								$this->RAmbilKelasModel->insert($data_insert);
							}
						}
					}


					echo "----------------------------------------------<br/>";
				}
				die;

				print_r($data_program_studi);
				print_r($data_kelas);
				print_r($data_dosen);
				print_r($data_mahasiswa);
			}
			else {
				$this->load->view('admin/data/input_excel', $data);	
			}
		}
	}



	public function ajax_daftar_siswa()
	{
		$this->load->model('SiswaModel');

		$data['limit'] = $this->input->get('limit');
		$data['page'] = $this->input->get('page');
		$data['offset'] = $data['limit'] * ($data['page'] - 1);

		$this->db->start_cache();

		// Pencarian judul buku
		$nama = $this->input->get('nama');
		if ($nama != '') {
			$this->db->like('nama', $nama, 'BOTH');
		}

		$this->db->stop_cache();

		$data['data_filtered'] = $this->SiswaModel->show($data['limit'], $data['offset'], 'object');
		$data['data_filtered_count'] = $this->SiswaModel->show($data['limit'], $data['offset'], 'count');
		$this->db->flush_cache();

		$this->load->view('siswa/ajax-list', $data);


	}



	public function tambah($submit = FALSE)
	{
		$this->load->model('SiswaModel');

		// Jika parameter submit terisi, maka itu lagi ngesubmit data dari form tambah data
		// Jika enggak ya berarti lagi menampilkan halaman tambah data
		if ($submit != FALSE) {
			$data_tambah = array(
				'nama' => $this->input->post('nama'),
				'nis' => $this->input->post('nis'),
				'alamat' => $this->input->post('alamat'),
			);


			$query = $this->SiswaModel->insert($data_tambah);
			if ($query) {
				header('location:' . site_url('siswa') . '?notif=oyi&message=Data Berhasil ditambah&type=success&icon=fas fa-check-circle');
			}
			else {
				header('location:' . site_url('siswa') . '?notif=oyi&message=Data gagal ditambah&type=danger&icon=fas fa-exclamation-triangle');
			}
		}
		else {
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'PerpusApp',
				'ui_sidebar_item' => array(
					'Beranda|fas fa-home|' . site_url('beranda'),
					'Buku Induk|fas fa-database|' . site_url('bukuinduk'),
					'Data Siswa|fas fa-users|' . site_url('siswa'),
					'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
					'Laporan|fas fa-clipboard-list|' . site_url('laporan')
				),
				'ui_sidebar_active' => 'Data Siswa',
				'ui_brand' => 'Data Buku Induk',
				'ui_nav_item' => array(
					'Tambah data|fas fa-plus-circle|' . site_url('siswa/tambah'),
				),
				'ui_nav_active' => 'Tambah data',
				'ui_js' => array(),
			);

			// Userdata login
			$data['logged_user'] = new stdClass();
	        $data['logged_user']->nama = 'Badar Wildanie';
	        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';


			$this->load->view('siswa/tambah', $data);	
		}
	}

	public function edit($nis, $submit = FALSE)
	{
        $this->load->model('SiswaModel');

		// Jika parameter submit terisi, maka itu lagi ngesubmit data dari form edit
		// Jika enggak ya berarti lagi menampilkan halaman edit
		if ($submit != FALSE) {
			$data_edit = array(
				'nama' => $this->input->post('nama'),
				'nis' => $this->input->post('nis'),
				'alamat' => $this->input->post('alamat'),
			);



			$query = $this->SiswaModel->update($data_edit, $nis);
			if ($query) {
				header('location:' . site_url('siswa') . '?notif=oyi&message=Data Berhasil diedit&type=success&icon=fas fa-check-circle');
			}
			else {
				header('location:' . site_url('siswa') . '?notif=oyi&message=Data gagal diedit&type=danger&icon=fas fa-exclamation-triangle');
			}
		}
		else {
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'PerpusApp',
				'ui_sidebar_item' => array(
					'Beranda|fas fa-home|' . site_url('beranda'),
					'Buku Induk|fas fa-database|' . site_url('bukuinduk'),
					'Data Siswa|fas fa-users|' . site_url('siswa'),
					'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
					'Laporan|fas fa-clipboard-list|' . site_url('laporan')
				),
				'ui_sidebar_active' => 'Data Siswa',
				'ui_brand' => 'Data Buku Induk',
				'ui_nav_item' => array(
					'Tambah data|fas fa-plus-circle|' . site_url('siswa/tambah'),
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);

			// Userdata login
			$data['logged_user'] = new stdClass();
	        $data['logged_user']->nama = 'Badar Wildanie';
	        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';

	        // Data buku yang di edit
	        $data['data_edit'] = $this->SiswaModel->single('nis', $nis, 'object');

			$this->load->view('siswa/edit', $data);	
		}
	}

	public function delete($id)
	{
		$this->load->model('SiswaModel');
		$query = $this->SiswaModel->delete($id);
		if ($query) {
			header('location:' . site_url('siswa') . '?notif=oyi&message=Data Berhasil dihapus&type=success&icon=fas fa-check-circle');
		}
		else {
			header('location:' . site_url('siswa') . '?notif=oyi&message=Data gagal dihapus&type=danger&icon=fas fa-exclamation-triangle');
		}

	}

}
	
/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
?>