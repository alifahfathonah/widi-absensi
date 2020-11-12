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


class Dosen extends CI_Controller {

	public $sidebar_item;

	public function __construct()
	{
		parent::__construct();

		// -------------------------------------
		// Default Navbar untuk e-learning
		// -------------------------------------
		// $this->sidebar_item = array(
		// 	'Beranda|fas fa-tachometer-alt|' . site_url('dosen/'),
		// 	'Kelas Anda|fas fa-chalkboard-teacher|' . site_url('dosen/kelas'),
		// 	'Absensi|fas fa-tasks|' . site_url('dosen/absensi'),
		// 	'Penilaian|fas fa-signature|' . site_url('dosen/penilaian'),
		// 	'E-Book|fas fa-book|' . site_url('dosen/ebook'),
		// );
		$this->sidebar_item = array(
			'Beranda|fas fa-tachometer-alt|' . site_url('dosen/'),
			'Kelas Anda|fas fa-chalkboard-teacher|' . site_url('dosen/kelas'),
			'Absensi|fas fa-tasks|' . site_url('dosen/absensi'),
			'Statistik|fas fa-chart-line|' . site_url('dosen/statistik'),
		);
	}

	public function cek_login()
	{
		$logged_username = get_cookie('logged_username');
		$logged_role = get_cookie('logged_role');
		// die;
		if ($logged_role == 'dosen') {
			$this->load->model('DosenModel');
			$user_db = $this->DosenModel->single('username', $logged_username, 'object');
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
			'ui_js' => array(),
		);

		$data['logged_user'] = $this->cek_login();
        
		$this->load->view('dosen/beranda', $data);	
	}




	public function kelas()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'STIKI E-Learning',
			'ui_sidebar_item' => $this->sidebar_item,
			'ui_sidebar_active' => 'Kelas Anda',
			'ui_brand' => 'Kelas Anda',
			'ui_nav_item' => array(),
			'ui_nav_active' => 'Tambah data',
			'ui_js' => array(),
		);

		$data['logged_user'] = $this->cek_login();
        
		$this->load->view('dosen/kelas', $data);	
	}


	public function absensi()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'STIKI E-Learning',
			'ui_sidebar_item' => $this->sidebar_item,
			'ui_sidebar_active' => 'Absensi',
			'ui_brand' => 'Absensi',
			'ui_nav_item' => array(),
			'ui_nav_active' => 'Tambah data',
			'ui_js' => array(),
		);

		$data['logged_user'] = $this->cek_login();
        
        $this->load->model('KelasModel');
        $this->load->model('ProgramStudiModel');

        $this->db->where('dosen_pengajar_id', $data['logged_user']->id);
        $data['data_kelas'] = $this->KelasModel->show(-1, 0, 'object');
		$this->load->view('dosen/absensi/absensi', $data);	
	}

	public function ajax_daftar_absensi()
	{
		$this->load->model('RAmbilKelasModel');
		$this->load->model('AbsensiModel');
		$data['limit'] = $this->input->get('limit');
		$data['page'] = $this->input->get('page');
		$data['offset'] = $data['limit'] * ($data['page'] - 1);

		$this->db->start_cache();
		$this->db->stop_cache();

		$this->db->order_by('nama_lengkap', 'asc');
		$this->db->where('kelas_id', $this->input->get('kelas'));

		$data['tanggal'] = $this->input->get('tanggal');  // Untuk query where absensi
		$data['data_filtered'] = $this->RAmbilKelasModel->join_mahasiswa($data['limit'], $data['offset'], 'object');
		$data['data_filtered_count'] = $this->RAmbilKelasModel->join_mahasiswa($data['limit'], $data['offset'], 'count');
		$this->db->flush_cache();

		$this->load->view('dosen/absensi/ajax_tr_daftar_absensi', $data);

	}


	public function ajax_set_absensi()
	{
		$mahasiswa_ambil_kelas_id = $this->input->post('mahasiswa_ambil_kelas_id');
		$tanggal = $this->input->post('tanggal');
		$absen = $this->input->post('absen');
		$kelas_id = $this->input->post('kelas_id');
		$dosen_id = $this->input->post('dosen_id');

		// Cek apakah sudah ada data absensi
		$this->load->model('AbsensiModel');
		$this->load->model('RAmbilKelasModel');
		$this->db->where('tanggal', $tanggal);
		$absensi = $this->AbsensiModel->single('mahasiswa_ambil_kelas_id', $mahasiswa_ambil_kelas_id, 'object');

		if ($absensi != '') {
			// Sudah ada data (maka dilakukan update)
			$this->AbsensiModel->update(array('absen' => $absen), $absensi->id);
		}
		else {
			$data_insert = array(
				'kelas_id' => $kelas_id,
				'dosen_id' => $dosen_id,
				'mahasiswa_ambil_kelas_id' => $mahasiswa_ambil_kelas_id,
				'absen' => $absen,
				'keterangan' => '',
				'tanggal' => $tanggal,
				'waktu' => date('H:i:s')
			);
			$this->AbsensiModel->insert($data_insert);
		}

		echo json_encode(array('status' => 'ok'));
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
				'ui_title' => 'STIKI E-Learning',
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
				'ui_title' => 'STIKI E-Learning',
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
	
/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
?>