<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Enquiry_Model'); 
        $this->load->library('excel');
    }
      public function view_lead21()
    {
      $id=$_POST["user_id"];
        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Enquiry_Model->getleads1($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['id'] = $row->id; 
               $output['title'] = $row->title; 
                      $output['comment'] = $row->comment;  
                       $output['status'] = $row->status;  
             $output['date'] = $row->date;  
                 $output['id'] = $row->id;  
                
           }   
      echo json_encode($output);
      
      
     
      
      
      
      
      
      
      
      
      
      
    }
    public function view_lead1()
    {
      /* $id=$_POST["user_id"];
        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Enquiry_Model->getleads1($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['id'] = $row->id; 
              
                      $output['comment'] = $row->comment;  
                       $output['status'] = $row->status;  
             $output['date'] = $row->date;  
                 $output['id'] = $row->id;  
                
           }   
      echo json_encode($output);*/
      
      
      $name = $_POST['name_startsWith'];
     $user_id = $this->session->userdata('id');
	$query = $this->db->query("SELECT name,id FROM lead where user_id='$user_id' and name LIKE '".$name."%'");
	  $result = $query->result_array();
	$data = array();
	foreach($result as $row) {
		$name = $row['name'].'|'.$row['id'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
      
      
      
      
      
      
      
      
      
      
      
    }

    public function view_lead()
    {
       $id=$_POST["user_id"];
       //echo $id."hjhj";
        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Enquiry_Model->view_lead($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['id'] = $row->id; 
                $output['lastname'] = $row->lastname;  
                 $output['email'] = $row->email;  
                  $output['phone'] = $row->phone;
                   $output['name'] = $row->name;   
                   $output['job_title'] = $row->job_title;  
                    $output['company_name'] = $row->company_name;
                     $output['lead_owner'] = $row->lead_owner;  
                      $output['comments'] = $row->comments;  
                       $output['status'] = $row->status;  
             
                
           }   
      echo json_encode($output);
    }
    
        public function userListt(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->Enquiry_Model->getUserss($postData);

    echo json_encode($data);
  }
    
     public function ld(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['enquiries'] = $this->Enquiry_Model->getRows();
        
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['enquiries'] = $this->Enquiry_Model->getRows($from_date,$to_date);
          //  $data['enquiries1'] = $this->Enquiry_Model->getRows1($from_date,$to_date);

        }
    
       
        $data['main'] = 'enquiries';
		$this->load->view('layout/main_view',$data);
    } 
        public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
            $search = $this->input->post('sch');
        $data['enquiries'] = $this->Enquiry_Model->getRows($search);
                    $data['enquirie'] = $this->Enquiry_Model->getRows1();
                     $data['enquiries1'] = $this->Enquiry_Model->getRows2();
                     $data['enquiries2'] = $this->Enquiry_Model->getRows3();


        if($this->input->post('search')){ 
      
            $search = $this->input->post('sch');
        
              // Get files data from the database 
            $data['enquiries'] = $this->Enquiry_Model->getRows($search);
                        $data['enquirie'] = $this->Enquiry_Model->getRows1($from_date,$to_date);

        }
    
       
        $data['main'] = 'ld';
		$this->load->view('layout/main_view',$data);
    } 
      public function lead_list1(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['leads'] = $this->Enquiry_Model->getleads();
        
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['enquiries'] = $this->Enquiry_Model->getleads($from_date,$to_date);
        }
    
       
        $data['main'] = 'leads';
		$this->load->view('layout/main_view',$data);
    } 
      public function lead_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['leads'] = $this->Enquiry_Model->getleads();
         $data['leads1'] = $this->Enquiry_Model->getleadss();
          $data['lea'] = $this->Enquiry_Model->getleads11();
          $data['leads3'] = $this->Enquiry_Model->getleads2();
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
             $sch = $this->input->post('sch');
              // Get files data from the database 
            $data['leads'] = $this->Enquiry_Model->getleads($sch);
        }
    
       
        $data['main'] = 'act';
		$this->load->view('layout/main_view',$data);
    } 
    
    
    
     public function test(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['leads'] = $this->Enquiry_Model->getleads();
        
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['enquiries'] = $this->Enquiry_Model->getleads($from_date,$to_date);
        }
    
       
        $data['main'] = 'test';
		$this->load->view('layout/main_view',$data);
    }
    
    public function  userList()
    {
        $postData = $this->input->post();

        // Get data
        $data = $this->Enquiry_Model->getUsers($postData);
    
        echo json_encode($data);
    }
    
    
    
    
    
    public function update_enquiry()
{
    $data = array(); 
   if($this->input->post('status')==1)
   {
       $status_icon='<button class="btn btn-info mr-2"><i class="far fa-eye mr-1"></i> New</button>';
   }
   else if($this->input->post('status')==2)
   {
           $status_icon='<button class="btn btn-primary mr-2"><i class="far fa-eye mr-1"></i> Follow Up</button>';
   
   }
    else if($this->input->post('status')==3)
   {
           $status_icon='<button class="btn btn-success mr-2"><i class="far fa-eye mr-1"></i> Won</button>';
   
   }
    else if($this->input->post('status')==4)
   {
           $status_icon='<button class="btn btn-danger mr-2"><i class="far fa-eye mr-1"></i> Lost</button>';
   
   }
    $data = array('email' => $this->input->post('email'),
						  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'lastname' => $this->input->post('lname'),
						  'job_title' => $this->input->post('job'),
						  'company_name' => $this->input->post('cname'),
						  'lead_owner' =>$this->session->userdata('id'),
						  'phone' => $this->input->post('phone'),
						  'comments' => $this->input->post('comment'),
						  	  'status' => $this->input->post('status'),
                          'date' =>  date('Y-m-d'),
                          'status_button' =>  $status_icon,
						  );
						  $id=$this->input->post('cid');
						  $this->db->where('id',$id);
			$res=  $this->db->update('contact_form_info', $data);
            redirect('enquiries');
    
}
    
    
    
    
  public function update_lead()
{
    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'date' => $this->input->post('date'),
						  'comment' => $this->input->post('comment'),
					
						  );
						  $id=$this->input->post('userid');
						  $this->db->where('id',$id);
			$res=  $this->db->update('lead', $data);
            redirect('enquiries/lead_list');
    
}
    
    
      
    
    
    
    
    
    
    
    
    
    
    
    
public function add_enquiry()
{
    $data = array(); 
   if($this->input->post('status')==1)
   {
       $status_icon='<div class="badge badge-info">New</div>';
   }
   else if($this->input->post('status')==2)
   {
           $status_icon='<div class="badge badge-warning">In Won</div>';
   
   }
    else if($this->input->post('status')==3)
   {
           $status_icon='<div class="badge badge-success hi-radius">Follow Up</div>';
   
   }
    $this->db->where('email',$this->input->post('email'));
    $query = $this->db->get('users');
    if ($query->num_rows() > 0){
       $type=1;
    }
    else{
      $type=0;
    }
    $data = array('email' => $this->input->post('email'),
						  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'lastname' => $this->input->post('lname'),
						  'job_title' => $this->input->post('job'),
						  'company_name' => $this->input->post('cname'),
						  'lead_owner' =>$this->session->userdata('id'),
						  'phone	' => $this->input->post('phone'),
						  'comments' => $this->input->post('comment'),
						  	  'status' => $this->input->post('status'),
						  	  'type'=>$type,
                          'date' =>  date('Y-m-d'),
                          'status_button' =>  $status_icon,
						  );
			$res=  $this->db->insert('contact_form_info', $data);
            redirect('enquiries');
    
}
public function add_lead()
{
    $data = array(); 
    $data1 = array(); 
   $id=$this->input->post('eid');

$type=$this->input->post('type');
  
    $data = array('name' => $this->input->post('name'),
						  'user_id' => $this->session->userdata('id'),
						  'customer_id' => $this->input->post('eid'),
						  'type	' => $this->input->post('type'),
						  'comment' => $this->input->post('comment'),
                          'date' =>  $this->input->post('date'),
                          'status' => $this->input->post('status'),
                          'priority' => $this->input->post('pr'),
                          'title' => $this->input->post('title'),
						  );
			$res=  $this->db->insert('lead', $data);

$a1='<button class="btn btn-primary mr-2"><i class="far fa-eye mr-1"></i> Call</button>';
$a2='<button class="btn btn-success mr-2"><i class="far fa-eye mr-1"></i> meeting</button>';
$a3='<button class="btn btn-warning mr-2"><i class="far fa-eye mr-1"></i> Email</button>';
$a4='<button class="btn btn-danger mr-2"><i class="far fa-eye mr-1"></i> Chat</button>';
            if($type==2)
            {
                $data1 = array('name' => $this->input->post('name'),
        
                'status' => $this->input->post('type'),
                'status_button'=>$a1,

                );
   
            }
            else if($type==3)
            {
                $data1 = array('name' => $this->input->post('name'),
        
                'status' => $this->input->post('type'),
                'status_button'=>$a2,

                );
            
            }
            else if($type==4)
            {
                $data1 = array('name' => $this->input->post('name'),
        
                'status' => $this->input->post('type'),
                'status_button'=>$a3,

                );
            }
            else if($type==5)
            {
                $data1 = array('name' => $this->input->post('name'),
        
                'status' => $this->input->post('type'),
                'status_button'=>$a4,

                );
            }






          
            $this->db->where('id', $id);
			$res = $this->db->update('contact_form_info', $data1);
            redirect('enquiries/lead_list');
    
}



 public function generatexls() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
       // $from_date = ($from_date!='')?$from_date:$this->input->post('from_date');
       // $to_date = ($to_date!='')?$to_date:$this->input->post('to_date');

        $listInfo =  $this->Enquiry_Model->getRows($from_date='',$to_date='');
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'From Date:'.$from_date);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', 'To Date:'.$to_date);

        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A4:F4');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4', 'Enquiry Report');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $styleArray = array('font' => array('bold' => true));
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A4')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle("A4:F4")->getFont()->setSize(16);

        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Phone');
        $objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Message');
        $objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Date'); 

        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A7')->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B7')->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C7')->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D7')->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E7')->applyFromArray($styleArray);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F7')->applyFromArray($styleArray);

        //ALIGN HEADING TO THE CENTER       
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //FOR SETTING WIDTH OF EACH COLUMN
        $objPHPExcel->getDefaultStyle()
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
         
        // set Row
        $rowCount = 8;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['comments']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list['date']);
            $rowCount++;
        }
        $filename = "Enquiry_report". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
    }




















}
?>