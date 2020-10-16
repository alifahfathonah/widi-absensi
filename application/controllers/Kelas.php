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
    >    Section (6) : $ui_brand     		
        -> untuk menambahkan judul pada navbar brand
            * format penulisan 	
            	String 
            * contoh penulisan 	
            	'Laporan' 

	------------------------------------------------------------------------------------ */

class Kelas extends CI_Controller {

	public function index()
	{
		$data = array(
			'ui_css' => array(),
			'ui_jumbotron_enable' => true,
			'ui_title' => 'STIKI E-Learning',
			'ui_nav_item' => array(
				'Beranda|fas fa-home|' . site_url('kelas/index'),
				'Ebook|fas fa-book|' . site_url('ebook'),
				'Official Website|fas fa-globe-asia|https://www.stiki.ac.id/',
			),
			'ui_nav_active' => '',
		);

		// $data['logged_user'] = new stdClass();
  //       $data['logged_user']->nama = 'Badar Wildanie';
  //       $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';

        
		$this->load->view('kelas/index', $data);	
	}


}
	
/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
?>