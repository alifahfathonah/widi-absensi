<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    /* -------------------------------------------------------------------------------------
	SYSTEM TEMPLATING Material Dashboard by Creative tim, Integrated by : Badar Wildanie
		* tambahkan variabel-variabel berikut untuk melengkapi fitur pada template material dashboard
	------------------------------------------------------------------------------------
	>	Section (1) : ui_css        
	    -> untuk penulisan CSS tambahan 
	        * format penulisan  
                Berupa array 1 dimensi tanpa key
            * contoh penulisan  
                    ['custom/css/default.css', 'custom/css/wizard.css'] 
	>	Section (2) : ui_jumbotron_enable 
        -> Untuk mengaktifkan jumbotron, karena kelas dan atribut khusus diperlukan agar jumbotron bekerja semestinya
            * format penulisan 
                terserah 
            * contoh penulisan 
                true 
    >   Section (3) : ui_title
        -> untuk Judul pada navigasi atas
            * format penulisan 
                string biasa 
            * contoh penulisan 
                "Awokawkwk App"
    >   Section (4) : ui_nav_item 
        -> untuk menambahkan daftar link nav kiri
            * format penulisan 
                Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
                Lebih baik Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
            * contoh penulisan 
                ['Menu 1|fas fa-home|' . site_url('data/user'), 'Menu 1|fas fa-home|' . site_url('data/user')]
    >   Section (5) : ui_nav_active
        -> Menentukan link nav mana yang aktif 
            * format penulisan
                Berupa String biasa berisi nama link yang sesuai dengan $ui_nav_item
            * contoh penulisan
                'Menu 1'         
    >    Section (6) : ui_brand     		
        -> untuk menambahkan judul pada navbar brand
            * format penulisan 	
            	String 
            * contoh penulisan 	
            	'Laporan' 

	------------------------------------------------------------------------------------ */

class Auth extends CI_Controller {

	public function login()
	{

		// $data['logged_user'] = new stdClass();
  //       $data['logged_user']->nama = 'Badar Wildanie';
  //       $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';

        $data = array(
            'ui_title' => 'STIKI E-Learning',
            'ui_brand' => 'Login'
        );
		$this->load->view('now-ui/login', $data);	
	}


    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_sebagai = $this->input->post('login_sebagai');

        $redirect_url = '';
        if ($login_sebagai == 'mahasiswa') {
            $this->load->model('MahasiswaModel');
            $user_db = $this->MahasiswaModel->single('username', $username, 'object');
            $redirect_url = site_url('mahasiswa/index');
        }
        else if ($login_sebagai == 'dosen') {
            $this->load->model('DosenModel');
            $user_db = $this->DosenModel->single('username', $username, 'object');
            $redirect_url = site_url('dosen/index');
        }
        else if ($login_sebagai == 'administrator') {
            $this->load->model('AdminModel');
            $user_db = $this->AdminModel->single('username', $username, 'object');
            $redirect_url = site_url('admin/data');
        }
        else {
            header('location:' .site_url('auth/login?notif=yes&type=danger&msg=Input tidak valid'));
            die;
        }

        if ($user_db != '') {
            // user ditemukan
            if ($user_db->password == $password) {
                // password cocok
                set_cookie('logged_username', $user_db->username, 3600 * 24);
                set_cookie('logged_role', $login_sebagai, 3600 * 24);
                redirect($redirect_url, 'refresh');
            }
            else {
                // Password tidak cocok
                header('location:' .site_url('auth/login?notif=yes&type=danger&msg=Password tidak cocok'));
            }
        }
        else {
            // user tidak ditemukan
            header('location:' .site_url('auth/login?notif=yes&type=danger&msg=User tidak ditemukan'));
        }
    }

    public function logout()
    {
        delete_cookie('logged_username');
        delete_cookie('logged_role');
        header('location:' . site_url('auth/login'));
    }


}
	
/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
?>