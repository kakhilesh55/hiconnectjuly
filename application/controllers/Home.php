<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
	{
    	$data['main'] = 'home_view';
		$this->load->view('layout/main_view',$data);
	}

    public function dashboard()
    {
        $data['main'] = 'dashboard_admin';
        $this->load->view('layout/main_admin',$data);
    }

}

/*
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
        	if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
}
*/

?>
