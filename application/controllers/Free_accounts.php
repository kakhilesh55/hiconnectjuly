<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_accounts extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('Package_Model');
    }

  	public function index()
  	{

		
  		$data['users'] = $this->User_Model->get_free_accounts();

		$data['added_by'] = $this->User_Model->get_free_accounts();
		if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
			  $data['users'] = $this->User_Model->get_free_accounts($from_date,$to_date);

		$data['added_by'] = $this->User_Model->get_free_accounts($from_date,$to_date);
           
        }
		$data['title'] = 'User List';

    	$data['main'] = 'admin/free_accounts';
    	$this->load->view('layout/main_admin',$data);
  	}
	public function update_act()
	{
		$id=$this->input->post('eid');
		$data = array('status' => $this->input->post('type'),'reason' =>$this->input->post('reason'));
			$this->db->where('user_id', $id);
			$res = $this->db->update('users', $data);
			$data['title'] = 'User List';

			$data['users'] = $this->User_Model->get_free_accounts();

			$data['added_by'] = $this->User_Model->get_free_accounts();
    	$data['main'] = 'admin/free_accounts';
    	$this->load->view('layout/main_admin',$data);
	}
	  public function generatexls($from_date='',$to_date='') {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $from_date = ($from_date!='')?$from_date:$this->input->post('from_date');
        $to_date = ($to_date!='')?$to_date:$this->input->post('to_date');

        $listInfo = $this->User_Model->get_free_accounts($from_date,$to_date);
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