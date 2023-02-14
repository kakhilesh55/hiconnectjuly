<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrimages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('Qr_Model');
    }
	
	public function index()
	{
		$user_id = $this->session->userdata('id');
		$result = $this->Qr_Model->get_qr_by_user($user_id);
        $data['qr_details'] = $result;
	
		if(empty($result))
		{
			$data['img_url']="";
			if($this->input->post('action') && $this->input->post('action') == "generate_qrcode")
			{
				$this->load->library('ciqrcode');
				$qr_image=rand().'.png';
				$params['data'] = $this->input->post('qr_text');
				$params['level'] = 'H';
				$params['size'] = 8;
				$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
				if($this->ciqrcode->generate($params))
				{
					$data['img_url']=$qr_image;	
				}
				$dat['user_id'] = $user_id;
				$dat['qr_image'] = $qr_image;
				$dat['qr_text'] = $this->input->post('qr_text');
				$res = $this->Qr_Model->add_qr($dat);
			}
		}
		$data['main'] = 'qrcode';
        $this->load->view('layout/main_view',$data);
	}
	public function qr_generater()
	{
		$num= $this->input->post('qr');
		for($i=1;$i<=$num;$i++)
		{
		$this->load->library('ciqrcode');
		$va=rand();
		$qr_image=rand().'.png';
		$params['data'] = $va;
		$params['level'] = 'H';
		$params['size'] = 8;
		$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
		if($this->ciqrcode->generate($params))
		{
			$data['img_url']=$qr_image;	
		}
		//$dat['user_id'] = $user_id;
		$dat['qr_image'] = $qr_image;
		$dat['qr_text'] = $va;
		$da=date('Y-m-d');
		$dat['created_date']=$da;
		$res = $this->Qr_Model->add_qr($dat);
		$this->load->view('layout/header');

$this->load->view('layout/sidebar_admin');

$this->load->view('admin/manage_qr');

$this->load->view('layout/footer');

	}
	

}
	public function update_status($id,$data){
			$this->db->where('package_id', $id);
			$res = $this->db->update('manage_package', $data);
		}
function file_download($user)
    {
        $url_para = $this->uri->segment('3');
     $data['status']=1;
        	$this->db->where('qr_image', $user);
			$res = $this->db->update('qr_images', $data);
        $this->load->helper('download');
        $data = file_get_contents(site_url().'/uploads/qr_image/'.$url_para);
        echo (site_url().'/uploads/qr_image/'.$url_para);
        $name = 'myphoto.png';

       // force_download($data, $data);
        
}


public function qr($id = NULL)
{

	$edit_id = $id;
	$a="create";
	if ($a == 'create') 
	{
		$data['products'] = $this->Qr_Model->get_qr();
		//$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
		$data['main'] = 'admin/manage_qr';
		$this->load->view('layout/main_admin',$data);
		$data['title'] = 'Add Product';



	
	}
	
}























}
