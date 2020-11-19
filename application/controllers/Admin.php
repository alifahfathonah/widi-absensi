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



	public function index()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'STIKI E-Learning',
			'ui_sidebar_item' => $this->sidebar_item,
			'ui_sidebar_active' => 'Beranda',
			'ui_brand' => 'Beranda',
			'ui_nav_item' => array(),
			'ui_nav_active' => 'Tambah data',
			'ui_js' => array('chartjs/chart.min.js'),
		);

		$data['logged_user'] = $this->cek_login();
        $this->load->model('MahasiswaModel');
        $this->load->model('DosenModel');
        $this->load->model('KelasModel');
        $this->load->model('MataKuliahModel');
        $this->load->model('ProgramStudiModel');

		$data['jumlah_mahasiswa'] = $this->MahasiswaModel->show(-1, -1, 'count');
		$data['jumlah_dosen'] = $this->DosenModel->show(-1, -1, 'count');
		$data['jumlah_kelas'] = $this->KelasModel->show(-1, -1, 'count');
		$data['jumlah_mata_kuliah'] = $this->MataKuliahModel->show(-1, -1, 'count');
		$data['jumlah_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'count');

		$this->load->view('admin/beranda', $data);	
	}


	public function data($jenis_data = FALSE, $mode = FALSE, $submit = FALSE)
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
									'program_studi' => ucwords(strtolower($spreadsheet->program_studi)),
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
						// ------------------------------------------------------
						// * INSERT DATA MAHASISWA & R_AMBIL_KELAS
						// Setiap loop, Algoritma patuh dengan rule diatas
						// Catatan: Aturan tidak ada dalam array diabaikan, karena masih ada kemungkinan
						//   		data mahasiswa  
						// ------------------------------------------------------
						if ($mahasiswa != '') {
							$mahasiswa_id = -1;
							$data_finding = $this->MahasiswaModel->single('nim', $mahasiswa->nim, 'object');
							if ($data_finding == '') {
								$data_insert = array(
									'nim' => $mahasiswa->nim,
									'nama_lengkap' => $mahasiswa->nama_lengkap,
									'jenis_kelamin' => $mahasiswa->jenis_kelamin,
									'program_studi_id' => $program_studi_id
								);
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
				echo header('location:' . site_url('admin/data'));
			}
			else {
				$this->load->view('admin/data/input_excel', $data);	
			}
		}
		else if ($jenis_data == 'mahasiswa') {
			$this->load->model('MahasiswaModel');
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Data - Mahasiswa',
				'ui_nav_item' => array(
					'Kembali|fas fa-arrow-left|' . site_url('admin/data/'),
					'List|fas fa-list-alt|' . site_url('admin/data/mahasiswa/'),
					'Tambah Data|fas fa-plus|' . site_url('admin/data/mahasiswa/tambah')
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();
			if ($mode == FALSE || $mode == 'list') {
				$data['ui_nav_active'] = 'List';

				$this->load->view('admin/data/mahasiswa/list', $data);
			}
			else if ($mode == 'tambah') {
				$data['ui_nav_active'] = 'Tambah Data';

				if ($submit == FALSE) {
					$this->load->model('ProgramStudiModel');
					$this->db->order_by('program_studi', 'asc');
					$data['data_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'object');
					$this->load->view('admin/data/mahasiswa/tambah', $data);
				}
				else {
					$data_insert = array(
						'nim' => $this->input->post('nim'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'tempat_lahir' => $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'jenis_kelamin' => $this->input->post('jenis_kelamin'),
						'agama' => $this->input->post('agama'),
						'warga_negara' => $this->input->post('warga_negara'),
						'no_hp' => $this->input->post('no_hp'),
						'telepon' => $this->input->post('telepon'),
						'email' => $this->input->post('email'),
					);

					$query = $this->MahasiswaModel->insert($data_insert);
					if ($query) {
						header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=berhasil ditambahkan&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=Gagal ditambahkan&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'edit') {
				$data['ui_nav_active'] = 'Edit';

				if ($submit == FALSE) {
					$id = $this->input->get('id');
					$data['mahasiswa'] = $this->MahasiswaModel->single('nim', $id, 'object');

					$this->load->model('ProgramStudiModel');
					$this->db->order_by('program_studi', 'asc');
					$data['data_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'object');
					$this->load->view('admin/data/mahasiswa/edit', $data);
				}
				else {
					$nim = $this->input->post('nim');
					$data_update = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'tempat_lahir' => $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'jenis_kelamin' => $this->input->post('jenis_kelamin'),
						'agama' => $this->input->post('agama'),
						'warga_negara' => $this->input->post('warga_negara'),
						'no_hp' => $this->input->post('no_hp'),
						'telepon' => $this->input->post('telepon'),
						'email' => $this->input->post('email'),
					);

					$query = $this->MahasiswaModel->update($data_update, $nim);
					if ($query) {
						header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=berhasil diedit&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=Gagal diedit&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'delete') {
				$this->load->model('RAmbilKelasModel');
				$this->load->model('AbsensiModel');


				$id = $this->input->get('id');

				$this->db->where('mahasiswa_nim ', $id);
				$data_akm = $this->RAmbilKelasModel->show(-1, -1, 'object');
				foreach ($data_akm as $akm) {
					$this->db->where('mahasiswa_ambil_kelas_id', $akm->id);
					$data_absensi = $this->AbsensiModel->show(-1, -1, 'object');
					foreach ($data_absensi as $absensi) {
						$this->AbsensiModel->delete($absensi->id);
					}
					$this->RAmbilKelasModel->delete($akm->id);
				}

				$query = $this->MahasiswaModel->delete($id);
				if ($query) {
					header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=berhasil dihapus&type=success&icon=fas fa-check'));
				}
				else {
					header('location:' . site_url('admin/data/mahasiswa/list?notif=yes&message=Gagal dihapus&type=danger&icon=fas fa-times'));
				}
			}
		}
		else if ($jenis_data == 'dosen') {
			$this->load->model('DosenModel');
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Data - Dosen',
				'ui_nav_item' => array(
					'Kembali|fas fa-arrow-left|' . site_url('admin/data/'),
					'List|fas fa-list-alt|' . site_url('admin/data/dosen/'),
					'Tambah Data|fas fa-plus|' . site_url('admin/data/dosen/tambah')
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();
			if ($mode == FALSE || $mode == 'list') {
				$data['ui_nav_active'] = 'List';

				$this->load->view('admin/data/dosen/list', $data);
			}
			else if ($mode == 'tambah') {
				$data['ui_nav_active'] = 'Tambah Data';

				if ($submit == FALSE) {
					$this->load->model('ProgramStudiModel');
					$this->db->order_by('program_studi', 'asc');
					$data['data_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'object');
					$this->load->view('admin/data/dosen/tambah', $data);
				}
				else {
					$data_insert = array(
						'id' => $this->input->post('id'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nidn' => $this->input->post('nidn'),
						'nip' => $this->input->post('nip'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'gelar_depan' => $this->input->post('gelar_depan'),
						'gelar_belakang' => $this->input->post('gelar_belakang'),
						'tempat_lahir' => $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'agama' => $this->input->post('agama'),
						'no_ktp' => $this->input->post('no_ktp'),
						'no_telepon' => $this->input->post('no_telepon'),
						'no_hp' => $this->input->post('no_hp'),
						'email' => $this->input->post('email'),
					);

					$query = $this->DosenModel->insert($data_insert);
					if ($query) {
						header('location:' . site_url('admin/data/dosen/list?notif=yes&message=berhasil ditambahkan&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/dosen/list?notif=yes&message=Gagal ditambahkan&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'edit') {
				$data['ui_nav_active'] = 'Edit';

				if ($submit == FALSE) {
					$id = $this->input->get('id');
					$data['dosen'] = $this->DosenModel->single('id', $id, 'object');

					$this->load->view('admin/data/dosen/edit', $data);
				}
				else {
					$id = $this->input->post('id');
					$data_update = array(
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'nidn' => $this->input->post('nidn'),
						'nip' => $this->input->post('nip'),
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'gelar_depan' => $this->input->post('gelar_depan'),
						'gelar_belakang' => $this->input->post('gelar_belakang'),
						'tempat_lahir' => $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'agama' => $this->input->post('agama'),
						'no_ktp' => $this->input->post('no_ktp'),
						'no_telepon' => $this->input->post('no_telepon'),
						'no_hp' => $this->input->post('no_hp'),
						'email' => $this->input->post('email'),
					);

					$query = $this->DosenModel->update($data_update, $id);
					if ($query) {
						header('location:' . site_url('admin/data/dosen/list?notif=yes&message=berhasil diedit&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/dosen/list?notif=yes&message=Gagal diedit&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'delete') {
				$id = $this->input->get('id');
				$query = $this->DosenModel->delete($id);
				if ($query) {
					header('location:' . site_url('admin/data/dosen/list?notif=yes&message=berhasil dihapus&type=success&icon=fas fa-check'));
				}
				else {
					header('location:' . site_url('admin/data/dosen/list?notif=yes&message=Gagal dihapus&type=danger&icon=fas fa-times'));
				}
			}
		}
		else if ($jenis_data == 'mata_kuliah') {
			$this->load->model('MataKuliahModel');
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Data - Mata Kuliah',
				'ui_nav_item' => array(
					'Kembali|fas fa-arrow-left|' . site_url('admin/data/'),
					'List|fas fa-list-alt|' . site_url('admin/data/mata_kuliah/'),
					'Tambah Data|fas fa-plus|' . site_url('admin/data/mata_kuliah/tambah')
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();
			if ($mode == FALSE || $mode == 'list') {
				$data['ui_nav_active'] = 'List';

				$this->load->view('admin/data/mata_kuliah/list', $data);
			}
			else if ($mode == 'tambah') {
				$data['ui_nav_active'] = 'Tambah Data';

				if ($submit == FALSE) {
					$this->load->model('ProgramStudiModel');
					$this->db->order_by('program_studi', 'asc');
					$data['data_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'object');
					$this->load->view('admin/data/mata_kuliah/tambah', $data);
				}
				else {
					$data_insert = array(
						'id' => $this->input->post('id'),
						'mata_kuliah' => $this->input->post('mata_kuliah'),
						'program_studi_id' => $this->input->post('program_studi_id'),
						'rekomendasi_jumlah_sks' => $this->input->post('rekomendasi_jumlah_sks'),
					);

					$query = $this->MataKuliahModel->insert($data_insert);
					if ($query) {
						header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=berhasil ditambahkan&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=Gagal ditambahkan&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'edit') {
				$data['ui_nav_active'] = 'Edit';

				$this->load->model('ProgramStudiModel');
				$this->db->order_by('program_studi', 'asc');
				$data['data_prodi'] = $this->ProgramStudiModel->show(-1, -1, 'object');

				if ($submit == FALSE) {
					$id = $this->input->get('id');
					$data['mata_kuliah'] = $this->MataKuliahModel->single('id', $id, 'object');

					$this->load->view('admin/data/mata_kuliah/edit', $data);
				}
				else {
					$id = $this->input->post('id');
					$data_update = array(
						'mata_kuliah' => $this->input->post('mata_kuliah'),
						'program_studi_id' => $this->input->post('program_studi_id'),
						'rekomendasi_jumlah_sks' => $this->input->post('rekomendasi_jumlah_sks'),
					);

					$query = $this->MataKuliahModel->update($data_update, $id);
					if ($query) {
						header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=berhasil diedit&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=Gagal diedit&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'delete') {
				$id = $this->input->get('id');
				$query = $this->MataKuliahModel->delete($id);
				if ($query) {
					header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=berhasil dihapus&type=success&icon=fas fa-check'));
				}
				else {
					header('location:' . site_url('admin/data/mata_kuliah/list?notif=yes&message=Gagal dihapus&type=danger&icon=fas fa-times'));
				}
			}
		}
		else if ($jenis_data == 'program_studi') {
			$this->load->model('ProgramStudiModel');
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Data - Program Studi',
				'ui_nav_item' => array(
					'Kembali|fas fa-arrow-left|' . site_url('admin/data/'),
					'List|fas fa-list-alt|' . site_url('admin/data/program_studi/'),
					'Tambah Data|fas fa-plus|' . site_url('admin/data/program_studi/tambah')
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();
			if ($mode == FALSE || $mode == 'list') {
				$data['ui_nav_active'] = 'List';

				$this->load->view('admin/data/program_studi/list', $data);
			}
			else if ($mode == 'tambah') {
				$data['ui_nav_active'] = 'Tambah Data';

				if ($submit == FALSE) {
					$this->load->view('admin/data/program_studi/tambah', $data);
				}
				else {
					$data_insert = array(
						'id' => $this->input->post('id'),
						'program_studi' => $this->input->post('program_studi'),
						'gelar_akademik' => $this->input->post('gelar_akademik'),
						'sks_lulus' => $this->input->post('sks_lulus'),
						'status_prodi' => $this->input->post('status_prodi'),
						'tanggal_berdiri' => $this->input->post('tanggal_berdiri'),
					);

					$query = $this->ProgramStudiModel->insert($data_insert);
					if ($query) {
						header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=berhasil ditambahkan&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=Gagal ditambahkan&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'edit') {
				$data['ui_nav_active'] = 'Edit';
				if ($submit == FALSE) {
					$id = $this->input->get('id');
					$data['program_studi'] = $this->ProgramStudiModel->single('id', $id, 'object');

					$this->load->view('admin/data/program_studi/edit', $data);
				}
				else {
					$id = $this->input->post('id');
					$data_update = array(
						'program_studi' => $this->input->post('program_studi'),
						'gelar_akademik' => $this->input->post('gelar_akademik'),
						'sks_lulus' => $this->input->post('sks_lulus'),
						'status_prodi' => $this->input->post('status_prodi'),
						'tanggal_berdiri' => $this->input->post('tanggal_berdiri'),
					);

					$query = $this->ProgramStudiModel->update($data_update, $id);
					if ($query) {
						header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=berhasil diedit&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=Gagal diedit&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'delete') {
				$id = $this->input->get('id');
				$query = $this->ProgramStudiModel->delete($id);
				if ($query) {
					header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=berhasil dihapus&type=success&icon=fas fa-check'));
				}
				else {
					header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=Gagal dihapus&type=danger&icon=fas fa-times'));
				}
			}
		}
		else if ($jenis_data == 'kelas') {
			$this->load->model('KelasModel');
			$this->load->model('RAmbilKelasModel');
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'STIKI E-Learning',
				'ui_sidebar_item' => $this->sidebar_item,
				'ui_sidebar_active' => 'Data',
				'ui_brand' => 'Data - Kelas',
				'ui_nav_item' => array(
					'Kembali|fas fa-arrow-left|' . site_url('admin/data/'),
					'List|fas fa-list-alt|' . site_url('admin/data/kelas/'),
					'Tambah Data|fas fa-plus|' . site_url('admin/data/kelas/tambah')
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);
			$data['logged_user'] = $this->cek_login();
			if ($mode == FALSE || $mode == 'list') {
				$data['ui_nav_active'] = 'List';

				$this->load->view('admin/data/kelas/list', $data);
			}
			else if ($mode == 'tambah') {
				$data['ui_nav_active'] = 'Tambah Data';

				if ($submit == FALSE) {
					$this->load->model('DosenModel');
					$this->load->model('MataKuliahModel');
					$this->load->model('ProgramStudiModel');

					// Inisialisasi Data
					$data['dosen_options'] = array();
					$this->db->order_by('nama_lengkap', 'asc');
					$data_dosen = $this->DosenModel->show(-1, -1, 'OBJECT');
					foreach ($data_dosen as $dosen) {
						$data['dosen_options'][$dosen->id] = $dosen->gelar_depan . ' ' . $dosen->nama_lengkap . ' ' . $dosen->gelar_belakang;
					}

					$data['prodi_options'] = array();
					$this->db->order_by('program_studi', 'asc');
					$data_prodi = $this->ProgramStudiModel->show(-1, -1, 'OBJECT');
					foreach ($data_prodi as $prodi) {
						$data['prodi_options'][$prodi->id] = $prodi->program_studi;
					}

					$data['mata_kuliah_options'] = array();
					$this->db->order_by('mata_kuliah', 'asc');
					$data_mk = $this->MataKuliahModel->show(-1, -1, 'OBJECT');
					foreach ($data_mk as $mk) {
						$prodi = $this->ProgramStudiModel->single('id', $mk->program_studi_id, 'object');
						$data['mata_kuliah_options'][$mk->id] = $mk->mata_kuliah . ' | ' . (($prodi != '') ? $prodi->id : '');
					}
					$this->load->view('admin/data/kelas/tambah', $data);
				}
				else {
					$data_insert = array(
						'nama' => $this->input->post('nama'),
						'waktu' => $this->input->post('waktu'),
						'semester' => $this->input->post('semester'),
						'dosen_pengajar_id' => $this->input->post('dosen_pengajar_id'),
						'mata_kuliah_id' => $this->input->post('mata_kuliah_id'),
						'program_studi_id' => $this->input->post('program_studi_id'),
						'hari' => $this->input->post('hari'),
						'status_kelas' => $this->input->post('status_kelas'),
					);

					$query = $this->KelasModel->insert($data_insert);
					if ($query) {
						header('location:' . site_url('admin/data/kelas/list?notif=yes&message=berhasil ditambahkan&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/kelas/list?notif=yes&message=Gagal ditambahkan&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'edit') {
				$data['ui_nav_active'] = 'Edit';
				if ($submit == FALSE) {
					$id = $this->input->get('id');
					$data['kelas'] = $this->KelasModel->single('id', $id, 'object');

					$this->load->model('DosenModel');
					$this->load->model('MataKuliahModel');
					$this->load->model('ProgramStudiModel');

					// Inisialisasi Data
					$data['dosen_options'] = array();
					$this->db->order_by('nama_lengkap', 'asc');
					$data_dosen = $this->DosenModel->show(-1, -1, 'OBJECT');
					foreach ($data_dosen as $dosen) {
						$data['dosen_options'][$dosen->id] = $dosen->gelar_depan . ' ' . $dosen->nama_lengkap . ' ' . $dosen->gelar_belakang;
					}

					$data['prodi_options'] = array();
					$this->db->order_by('program_studi', 'asc');
					$data_prodi = $this->ProgramStudiModel->show(-1, -1, 'OBJECT');
					foreach ($data_prodi as $prodi) {
						$data['prodi_options'][$prodi->id] = $prodi->program_studi;
					}

					$data['mata_kuliah_options'] = array();
					$this->db->order_by('mata_kuliah', 'asc');
					$data_mk = $this->MataKuliahModel->show(-1, -1, 'OBJECT');
					foreach ($data_mk as $mk) {
						$prodi = $this->ProgramStudiModel->single('id', $mk->program_studi_id, 'object');
						$data['mata_kuliah_options'][$mk->id] = $mk->mata_kuliah . ' | ' . (($prodi != '') ? $prodi->id : '');
					}

					$this->load->view('admin/data/kelas/edit', $data);
				}
				else {
					$id = $this->input->post('id');
					$data_update = array(
						'nama' => $this->input->post('nama'),
						'waktu' => $this->input->post('waktu'),
						'semester' => $this->input->post('semester'),
						'dosen_pengajar_id' => $this->input->post('dosen_pengajar_id'),
						'mata_kuliah_id' => $this->input->post('mata_kuliah_id'),
						'program_studi_id' => $this->input->post('program_studi_id'),
						'hari' => $this->input->post('hari'),
						'status_kelas' => $this->input->post('status_kelas'),
					);

					$query = $this->KelasModel->update($data_update, $id);
					if ($query) {
						header('location:' . site_url('admin/data/kelas/list?notif=yes&message=berhasil diedit&type=success&icon=fas fa-check'));
					}
					else {
						header('location:' . site_url('admin/data/kelas/list?notif=yes&message=Gagal diedit&type=danger&icon=fas fa-times'));
					}
				}
			}
			else if ($mode == 'delete') {
				$id = $this->input->get('id');
				$query = $this->ProgramStudiModel->delete($id);
				if ($query) {
					header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=berhasil dihapus&type=success&icon=fas fa-check'));
				}
				else {
					header('location:' . site_url('admin/data/program_studi/list?notif=yes&message=Gagal dihapus&type=danger&icon=fas fa-times'));
				}
			}
			else if ($mode == 'detail') {
					
				$data['ui_nav_item'][0] = 'Kembali|fas fa-arrow-left|' . site_url('admin/data/kelas');
				$id = $this->input->get('id');

				$this->load->model('DosenModel');
				$this->load->model('ProgramStudiModel');
				$this->load->model('MataKuliahModel');
				$data['kelas'] = $this->KelasModel->single('id', $id, 'object');
				$data['dosen'] = $this->DosenModel->single('id', $data['kelas']->dosen_pengajar_id, 'object');
				$data['prodi'] = $this->ProgramStudiModel->single('id', $data['kelas']->program_studi_id, 'object');
				$data['mk'] = $this->MataKuliahModel->single('id', $data['kelas']->mata_kuliah_id, 'object');
				$this->load->view('admin/data/kelas/detail', $data);

			}
		}
	}


	public function ajax_read_mahasiswa($mode, $ui)
	{	
		$this->load->model('MahasiswaModel');
		$this->load->model('ProgramStudiModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);
			$data['data_filter'] = array(); 
			$this->db->start_cache();

			// Pencarian judul buku
			$nama_lengkap = $this->input->get('nama_lengkap');
			if ($nama_lengkap != '') {
				$data['data_filter']['nama_lengkap'] = $nama_lengkap;
				$this->db->like('nama_lengkap', $nama_lengkap, 'BOTH');
			}

			$nama_nim = $this->input->get('nama_nim');
			if ($nama_nim != '') {
				$data['data_filter']['nama lengkap/nim'] = $nama_nim;
				$this->db->like('nama_lengkap', $nama_nim, 'BOTH');
				$this->db->or_like('nim', $nama_nim, 'BOTH');
			}

			$jenis_kelamin = $this->input->get('jenis_kelamin');
			if ($jenis_kelamin != '') {
				$data['data_filter']['jenis kelamin'] = $jenis_kelamin;
				$this->db->where('jenis_kelamin', $jenis_kelamin);
			}
			$tahun_lahir = $this->input->get('tahun_lahir');
			if ($tahun_lahir != '') {
				$data['data_filter']['tahun_lahir'] = $tahun_lahir;
				$this->db->like('tanggal_lahir', $tahun_lahir, 'BOTH');
			}
			$program_studi_id = $this->input->get('program_studi_id');
			if ($program_studi_id != '') {
				$data['data_filter']['program_studi'] = $this->input->get('program_studi');
				$this->db->where('program_studi_id', $program_studi_id);
			}

			$this->db->order_by('nama_lengkap', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->MahasiswaModel->show($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->MahasiswaModel->show($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			if ($ui != 'excel') {
				$this->load->view('admin/data/mahasiswa/ajax_' . $ui, $data);
			}
			else {
				$this->load->view('admin/data/mahasiswa/excel_laporan_mahasiswa', $data, FALSE);
			}
		}
	}

	public function ajax_read_dosen($mode, $ui)
	{	
		$this->load->model('DosenModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);

			$this->db->start_cache();

			// Pencarian judul buku
			$nama_lengkap = $this->input->get('nama_lengkap');
			if ($nama_lengkap != '') {
				$this->db->like('nama_lengkap', $nama_lengkap, 'BOTH');
			}

			$this->db->order_by('nama_lengkap', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->DosenModel->show($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->DosenModel->show($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			if ($ui != 'excel') {
				$this->load->view('admin/data/dosen/ajax_' . $ui, $data);
			}
			else {
				$this->load->view('admin/data/dosen/excel_laporan_dosen', $data, FALSE);
			}
		}
	}

	public function ajax_read_mata_kuliah($mode, $ui)
	{	
		$this->load->model('MataKuliahModel');
		$this->load->model('ProgramStudiModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);

			$this->db->start_cache();

			$mata_kuliah = $this->input->get('mata_kuliah');
			if ($mata_kuliah != '') {
				$this->db->like('mata_kuliah', $mata_kuliah, 'BOTH');
			}

			$this->db->order_by('mata_kuliah', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->MataKuliahModel->show($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->MataKuliahModel->show($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			$this->load->view('admin/data/mata_kuliah/ajax_' . $ui, $data);
		}
	}

	public function ajax_read_program_studi($mode, $ui)
	{	
		$this->load->model('ProgramStudiModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);

			$this->db->start_cache();

			// Pencarian judul buku
			$program_studi = $this->input->get('program_studi');
			if ($program_studi != '') {
				$this->db->like('program_studi', $program_studi, 'BOTH');
			}

			$this->db->order_by('program_studi', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->ProgramStudiModel->show($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->ProgramStudiModel->show($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			$this->load->view('admin/data/program_studi/ajax_' . $ui, $data);
		}
	}
	public function ajax_read_kelas($mode, $ui)
	{	
		$this->load->model('KelasModel');
		$this->load->model('RAmbilKelasModel');
		$this->load->model('DosenModel');
		$this->load->model('MataKuliahModel');
		$this->load->model('ProgramStudiModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);
			$data['data_filter'] = array(); 

			$this->db->start_cache();

			// Pencarian judul buku
			$nama = $this->input->get('nama');
			if ($nama != '') {
				$data['data_filter']['nama'] = $nama;
				$this->db->like('nama', $nama, 'BOTH');
			}

			$dosen_id = $this->input->get('dosen_id');
			if ($dosen_id != '') {
				$data['data_filter']['dosen'] = $this->input->get('dosen');
				$this->db->where('dosen_id', $dosen_id);
			}

			$mata_kuliah_id = $this->input->get('mata_kuliah_id');
			if ($mata_kuliah_id != '') {
				$data['data_filter']['mata_kuliah'] = $this->input->get('mata_kuliah');
				$this->db->where('mata_kuliah_id', $mata_kuliah_id);
			}

			$program_studi_id = $this->input->get('program_studi_id');
			if ($program_studi_id != '') {
				$data['data_filter']['program_studi'] = $this->input->get('program_studi');
				$this->db->where('program_studi_id', $program_studi_id);
			}

			$this->db->order_by('nama', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->KelasModel->show($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->KelasModel->show($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			if ($ui != 'excel') {
				$this->load->view('admin/data/kelas/ajax_' . $ui, $data);
			}
			else {
				$this->load->view('admin/data/kelas/excel_laporan_kelas', $data, FALSE);
			}
		}
	}

	public function ajax_read_rambil_kelas($mode, $ui)
	{	
		$this->load->model('RAmbilKelasModel');

		if ($mode == 'list') {
			$data['limit'] = $this->input->get('limit');
			$data['page'] = $this->input->get('page');
			$data['offset'] = $data['limit'] * ($data['page'] - 1);

			$this->db->start_cache();

			$nama_lengkap = $this->input->get('nama_lengkap');
			if ($nama_lengkap != '') {
				$this->db->like('mahasiswa.nama_lengkap', $nama_lengkap, 'BOTH');
			}

			$kelas = $this->input->get('kelas');
			if ($kelas != '') {
				$this->db->where('r_ambil_kelas.kelas_id', $kelas);
			}

			$this->db->order_by('mahasiswa.nama_lengkap', 'asc');

			$this->db->stop_cache();
			$data['data_filtered'] = $this->RAmbilKelasModel->join_mahasiswa($data['limit'], $data['offset'], 'object');
			$data['data_filtered_count'] = $this->RAmbilKelasModel->join_mahasiswa($data['limit'], $data['offset'], 'count');
			$this->db->flush_cache();

			$this->load->view('admin/data/kelas/ajax_' . $ui, $data);
		}
	}

	public function ajax_write_rambil_kelas($mode)
	{
		$this->load->model('RAmbilKelasModel');
		if ($mode == 'insert') {
			$id = $this->input->post('id');
			$data_insert = array(
				'mahasiswa_nim' => $this->input->post('mahasiswa_nim'),
				'status_persetujuan' => $this->input->post('status_persetujuan'),
				'kelas_id' => $this->input->post('kelas_id'),
				'tanggal_ambil' => $this->input->post('tanggal_ambil'),
				'catatan' => $this->input->post('catatan'),
			);
			$this->db->where('kelas_id', $data_insert['kelas_id']);
			$data = $this->RAmbilKelasModel->single('mahasiswa_nim', $data_insert['mahasiswa_nim'], 'count');
			if ($data <= 0) {
				$query = $this->RAmbilKelasModel->insert($data_insert);
				if ($query) {
					echo json_encode(array('status' => 'success'));
				}
				else {
					echo json_encode(array('status' => 'error'));
				}
			}
			else {
				echo json_encode(array('status' => 'error_duplicate'));
			}
		}
		else if ($mode == 'delete') {
			$id = $this->input->post('id');
			$query = $this->RAmbilKelasModel->delete($id);
			if ($query) {
				echo json_encode(array('status' => 'success'));
			}
			else {
				echo json_encode(array('status' => 'error'));
			}
		}
	}



	public function statistik()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'STIKI E-Learning',
			'ui_sidebar_item' => $this->sidebar_item,
			'ui_sidebar_active' => 'Statistik',
			'ui_brand' => 'Statistik',
			'ui_nav_item' => array(),
			'ui_nav_active' => '',
			'ui_js' => array('chartjs/chart.min.js'),
		);

		$this->load->model('AbsensiModel');
		$data['logged_user'] = $this->cek_login();
        
		$this->load->view('admin/statistik/index', $data);	
	}


	public function laporan($entitas = FALSE, $submit = FALSE)
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'STIKI E-Learning',
			'ui_sidebar_item' => $this->sidebar_item,
			'ui_sidebar_active' => 'Laporan',
			'ui_brand' => 'Laporan',
			'ui_nav_item' => array(
				'Mahasiswa|fas fa-users|' . site_url('admin/laporan/mahasiswa'),
				'Dosen|fas fa-chalkboard-teacher|' . site_url('admin/laporan/dosen'),
				'Kelas|fas fa-chalkboard|' . site_url('admin/laporan/kelas')
			),
			'ui_nav_active' => '',
			'ui_js' => array('chartjs/chart.min.js'),
		);

		$this->load->model('AbsensiModel');
		$data['logged_user'] = $this->cek_login();
        
        if ($entitas == FALSE) {
        	echo 'ss';
			$this->load->view('admin/laporan/index', $data);	
        }
        else if ($entitas == 'mahasiswa') {
			$data['ui_nav_active'] = 'Mahasiswa';
        	$this->load->model('ProgramStudiModel');
        	$this->db->order_by('program_studi', 'asc');
        	$data_prodi = $this->ProgramStudiModel->show(-1, -1, 'OBJECT');
        	$data['prodi_options'] = array('---' => '---');
        	foreach ($data_prodi as $prodi) {
        		$data['prodi_options'][$prodi->id] = $prodi->program_studi;
        	}
        	$this->load->view('admin/laporan/mahasiswa/index', $data);
        }
        else if ($entitas == 'dosen') {
			$data['ui_nav_active'] = 'Dosen';
        	$this->load->view('admin/laporan/dosen/index', $data);
        }
        else if ($entitas == 'kelas') {
			$data['ui_nav_active'] = 'Kelas';
        	$this->load->model('DosenModel');
        	$this->load->model('MataKuliahModel');
        	$this->load->model('ProgramStudiModel');

        	$this->db->order_by('program_studi', 'asc');
        	$data_prodi = $this->ProgramStudiModel->show(-1, -1, 'OBJECT');
        	$data['prodi_options'] = array('---' => '---');
        	foreach ($data_prodi as $prodi) {
        		$data['prodi_options'][$prodi->id] = $prodi->program_studi;
        	}
        	$this->db->order_by('mata_kuliah', 'asc');
        	$data_mk = $this->MataKuliahModel->show(-1, -1, 'OBJECT');
        	$data['mk_options'] = array('---' => '---');
        	foreach ($data_mk as $mk) {
        		$data['mk_options'][$mk->id] = $mk->mata_kuliah;
        	}
        	$this->db->order_by('nama_lengkap', 'asc');
        	$data_dosen = $this->DosenModel->show(-1, -1, 'OBJECT');
        	$data['dosen_options'] = array('---' => '---');
        	foreach ($data_dosen as $dosen) {
        		$data['dosen_options'][$dosen->id] = (($dosen->gelar_depan != '') ? $dosen->gelar_depan . ' ': '') . $dosen->nama_lengkap . (($dosen->gelar_belakang != '') ? ', ' . $dosen->gelar_belakang: '');
        	}

        	$this->load->view('admin/laporan/kelas/index', $data);
        }
        else if ($entitas == 'absensi_excel') {
        	
        	$this->load->model('MataKuliahModel');
        	$this->load->model('ProgramStudiModel');
        	$this->load->model('DosenModel');
        	$this->load->model('KelasModel');
        	$this->load->model('RAmbilKelasModel');
        	$this->load->model('MahasiswaModel');
        	$this->load->model('AbsensiModel');


        	if ($submit == FALSE) {

        		$this->db->order_by('program_studi', 'asc');
        		$data_prodi = $this->ProgramStudiModel->show(-1, -1, 'object');
        		$data['prodi_options'] = array();
        		foreach ($data_prodi as $prodi) {
        			$data['prodi_options'][$prodi->id] = $prodi->program_studi;
        		}
	        	$this->load->view('admin/laporan/absensi_excel/index', $data);
        	}
        	else {
        		$data['program_studi_id'] = $this->input->post('program_studi_id');
        		$data['tanggal_awal'] = $this->input->post('tanggal_awal');
			    $data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
        		$this->load->view('admin/laporan/absensi_excel/excel_absensi', $data);
        	}
        }	
	}

}
	
/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
?>