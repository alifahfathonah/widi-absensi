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
			'ui_js' => array('chartjs/chart.min.js'),
		);

		$data['logged_user'] = $this->cek_login();
        $this->load->model('KelasModel');
        $this->load->model('RAmbilKelasModel');
        $this->load->model('AbsensiModel');


        $this->db->where('dosen_pengajar_id', $data['logged_user']->id);
        $data['data_kelas'] = $this->KelasModel->show(-1, -1, 'object');
        foreach ($data['data_kelas'] as $kelas) {
	        $this->db->or_where('kelas_id', $kelas->id);
        }

        $this->db->distinct();
        $this->db->select('mahasiswa_nim');

        $data['jumlah_murid'] = $this->RAmbilKelasModel->show(-1, -1, 'count');
        $data['jumlah_kelas'] = count($data['data_kelas']);

        $this->db->distinct();
        $this->db->where('dosen_pengajar_id', $data['logged_user']->id);
        $data['jumlah_mk'] = $this->KelasModel->show(-1, -1, 'count');

        $this->db->where('tanggal', date('Y-m-d'));
        $this->db->where('absen', 'h');
        $data['jumlah_hadir'] = $this->AbsensiModel->show(-1, -1, 'count');

        $this->db->where('tanggal', date('Y-m-d'));
        $this->db->where('absen', 'i');
        $data['jumlah_ijin'] = $this->AbsensiModel->show(-1, -1, 'count');

        $this->db->where('tanggal', date('Y-m-d'));
        $this->db->where('absen', 's');
        $data['jumlah_sakit'] = $this->AbsensiModel->show(-1, -1, 'count');

        $this->db->where('tanggal', date('Y-m-d'));
        $this->db->where('absen', 'a');
        $data['jumlah_alpha'] = $this->AbsensiModel->show(-1, -1, 'count');
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

		$this->load->model('KelasModel');
		$this->load->model('ProgramStudiModel');
		$this->load->model('MahasiswaModel');
		$this->load->model('RAmbilKelasModel');

		$this->db->where('dosen_pengajar_id', $data['logged_user']->id);
		$data['data_kelas'] = $this->KelasModel->show(-1, -1, 'OBJECT');
        
		$this->load->view('dosen/kelas/kelas', $data);	
	}


	public function ajax_read_kelas_mahasiswa($mode)
	{
		$this->load->model('RAmbilKelasModel');
		$this->load->model('AbsensiModel');

		$this->db->start_cache();
		$this->db->stop_cache();

		$this->db->order_by('nama_lengkap', 'asc');
		$this->db->where('kelas_id', $this->input->get('kelas'));

		$data['tanggal'] = $this->input->get('tanggal');  // Untuk query where absensi
		$data['data_filtered'] = $this->RAmbilKelasModel->join_mahasiswa(-1, -1, 'object');
		$data['data_filtered_count'] = $this->RAmbilKelasModel->join_mahasiswa(-1, -1, 'count');
		$this->db->flush_cache();

		$this->load->view('dosen/kelas/ajax_daftar_mahasiswa', $data);
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
			'ui_js' => array('jsCookie/js/js.cookie.js'),
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


	public function ajax_set_absensi($mode = 'standard')
	{
		if ($mode == 'standard') {
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
		else if ($mode == 'update_keterangan') {
			$this->load->model('AbsensiModel');
			$id = $this->input->post('id');
			$data_update = array(
				'keterangan' => $this->input->post('keterangan')
			);

			$query = $this->AbsensiModel->update($data_update, $id);
			if ($query) {
				echo json_encode(array('status' => 'success'));
			}
		}
	}

	public function ajax_read_kelas($mode)
	{
		$this->load->model('KelasModel');
		$this->load->model('ProgramStudiModel');
		if ($mode == 'single') {
			$id = $this->input->get('id');
			$data['kelas'] = $this->KelasModel->single('id', $id, 'array');
			if ($data['kelas'] != '') {
				$data['status'] = 'success';
				$program_studi = $this->ProgramStudiModel->single('id', $data['kelas']['program_studi_id'], 'object');
				if ($program_studi != '') {
					$data['kelas']['program_studi'] = $program_studi->program_studi;
				}
			}

			echo json_encode($data);
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
        
		$this->load->view('dosen/statistik/index', $data);	
	}
}
/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
?>