<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Education_Model');
    }

    public function index()
    {
      $data = array(); 
      $id= $_REQUEST['id'];
      $errorUploadType = $statusMsg = ''; 
      $user_id = $this->session->userdata('id');
      // Get files data from the database 
      $data['educations'] = $this->Education_Model->get_educations();
      $this->load->view('users/educationtab',$data);
     /* if($this->input->post('search')){ 
          $from_date = $this->input->post('from_date');
          $to_date = $this->input->post('to_date');
          $data['from_date'] = $from_date;
          $data['to_date'] = $to_date;
            // Get files data from the database 
         $data['educations'] = $this->Education_Model->get_educations($from_date,$to_date);
      }*/
  
    }
    public function view_educ($id)
    {
//$id=$_POST["user_id"];

        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
       $data['tab'] = 'tab2';
        // Get files data from the database 
        $data = $this->Education_Model->getedu($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['education_id'] = $row->education_id; 
              
                      $output['edu_type'] = $row->edu_type;  
                       $output['start_date'] = $row->start_date;  
             $output['end_date'] = $row->end_date;  
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }

 public function edit_education($id)
    {
//$id=$_POST["user_id"];

        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->edit_education($id);
        $data['tab'] = 'tab2';
        $data['education'] = $result;
        $this->load->view('users/educationtab',$data);
    }
    public function education_details($id = NULL)
	{
		$edit_id = $id;
        //$data['educations'] = $this->Education_Model->get_educations();
		$messge = array('message' => '','class' => '');
        $data['tab'] = 'tab2';
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('edu_type', 'Type', 'required');

			if($this->form_validation->run() === FALSE){
				$data['educations'] = $this->Education_Model->get_educations();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/profile';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Education_Model->add_education();

				//Set Message
				$messge = array('message' => 'Education Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('education/education_list');
			}
		}
		else
		{
		//$edit_id = $this->input->post('action');
			$data['title'] = 'Update Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('edu_type', 'Type', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['educations'] = $this->Education_Model->get_educations();
				$result = $this->Education_Model->edit_education($edit_id);
				$data['education'] = $result;
				//$data['main'] = 'users/educationtab';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				//$this->load->view('layout/main_view',$data);
                $this->load->view('users/educationtab',$data);


			}else{
				$this->Education_Model->update_education($edit_id);

				//Set Message
				$messge = array('message' => 'Education Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('education/education_list');
			}
		}
	}
	 public function update_edu()
{
    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'start_date' => $this->input->post('start_date'),
						  'end_date' => $this->input->post('end_date'),
					'edu_type' => $this->input->post('edu_type'),
                    'description' => $this->input->post('description'),
						  );
						  $id=$this->input->post('edu_id');
						  $this->db->where('education_id',$id);
			$res=  $this->db->update('education', $data);
            redirect('education/education_list');
    
}

  public function education_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['educations'] = $this->Education_Model->get_educations();
        
            $data['tab'] = 'tab2';
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['educations'] = $this->Education_Model->get_educations($from_date,$to_date);
        }
    
       
        $data['main'] = 'users/profile';
        $this->load->view('layout/main_view',$data);
    } 

   	 public function update_exp()
{
    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'company' => $this->input->post('company'),
						  'start_date' => $this->input->post('start_date'),
						  'end_date' => $this->input->post('end_date'),
					'position' => $this->input->post('position'),
						  );
						  $id=$this->input->post('exp_id');
						  $this->db->where('experience_id',$id);
			$res=  $this->db->update('experience', $data);
            redirect('experiences');
    
}
  	 public function update_ach()
{
    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'description' => $this->input->post('description'),
						  
						  );
						  $id=$this->input->post('ach');
						  $this->db->where('achievement_id',$id);
			$res=  $this->db->update('achievements', $data);
            redirect('achievements');
    
}


 public function  update_services()
 {

    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'service' => $this->input->post('service_names'),
						  'description' => $this->input->post('des'),
						  
						  );
						  $id=$this->input->post('service');
						  $this->db->where('service_id',$id);
			$res=  $this->db->update('services', $data);
            redirect('services');
    
}
   public function  update_testi()
 {

    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'designation' => $this->input->post('designation'),
						   'company' => $this->input->post('company'),
						    'message' => $this->input->post('message'),
						  
						  );
						  $id=$this->input->post('id');
						  $this->db->where('testimonial_id ',$id);
			$res=  $this->db->update('testimonials', $data);
            redirect('testimonials');
    
}
 public function  update_pdt()
 {

    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'product_name' => $this->input->post('product_name'),
						  'description' => $this->input->post('description'),
						   'price' => $this->input->post('price'),

						  );
						  $id=$this->input->post('product_id');
						  $this->db->where('product_id',$id);
			$res=  $this->db->update('products', $data);
            redirect('products/product_details');
    
}
  
public function view_test()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getedu($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['education_id'] = $row->education_id; 
              
                      $output['university'] = $row->university;  
                       $output['start_date'] = $row->start_date;  
             $output['end_date'] = $row->end_date;  
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }
    
    
    public function view_serv()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getserv($id);
        foreach($data as $row)  
           {  
                $output['service'] = $row->service; 
                $output['service_id'] = $row->service_id; 
              
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function view_ach()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getach($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['achievement_id'] = $row->achievement_id; 
              
                      
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }
public function view_exp()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getexp($id);
        foreach($data as $row)  
           {  
                $output['company'] = $row->company; 
                $output['experience_id'] = $row->experience_id; 
              
                      $output['position'] = $row->position;  
                       $output['start_date'] = $row->start_date;  
             $output['end_date'] = $row->end_date;  
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }
public function view_testi()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->gettesti($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['testimonial_id'] = $row->testimonial_id; 
              
                      $output['designation'] = $row->designation;  
                       $output['company'] = $row->company;  
             $output['message'] = $row->message;  
              
                
           }   
      echo json_encode($output);
    }
    public function view_products()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getpdt($id);
        foreach($data as $row)  
           {  
                $output['product_name'] = $row->product_name; 
                $output['product_id'] = $row->product_id; 
              
                      $output['price'] = $row->price;  
                       $output['currency'] = $row->currency;  
            $output['description'] = $row->description;
              
                
           }   
      echo json_encode($output);
    }
	public function delete_education($id)
    {
    	$this->Education_Model->delete_education($id);
    	$messge = array('message' => 'Education Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('education/education_list');
    }

}
?>