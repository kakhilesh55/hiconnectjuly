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

    public function view_lead($id)
    {
       
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data['lead'] = $this->Enquiry_Model->view_lead($id);
        $data['main'] = 'admin/view_lead';
		$this->load->view('layout/main_view',$data); 
     
    }
     public function index(){ 
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
        }
    
       
        $data['main'] = 'enquiries';
		$this->load->view('layout/main_view',$data);
    } 
    public function  userList()
    {
        $postData = $this->input->post();

        // Get data
        $data = $this->Enquiry_Model->getUsers($postData);
    
        echo json_encode($data);
    }
public function add_enquiry()
{
    $data = array(); 
   
    $data = array('email' => $this->input->post('email'),
						  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'phone	' => $this->input->post('phone'),
						  'comments' => $this->input->post('comment'),
                          'date' =>  date('Y-m-d'),
                         
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
                          'date' =>  date('Y-m-d'),
                          'status' => $this->input->post('status'),
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
            redirect('enquiries');
    
}



 public function generatexls($from_date='',$to_date='') {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $from_date = ($from_date!='')?$from_date:$this->input->post('from_date');
        $to_date = ($to_date!='')?$to_date:$this->input->post('to_date');

        $listInfo =  $this->Enquiry_Model->getRows($from_date,$to_date);
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