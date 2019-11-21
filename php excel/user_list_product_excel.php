<?php
//session_start();
include('../configure.php');


error_reporting(0);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');

/** Include PHPExcel */
require_once ('../phpexcel/Classes/PHPExcel.php');

//require_once ('phpexcel/Classes/PHPExcel/IOFactory.php)';

 $objPHPExcel = new PHPExcel();
  //$query1 = "SELECT * FROM agents   ";


  $tmparray =array("Title","Product Type","Location","Price","Quantity","Description");
  
	

  //take new main array and set header array in it.
  $sheet =array($tmparray);
			
			 $bannersql=mysql_query("select * from `user_product_table`    ")or die(mysql_error());
			
						while($res1=mysql_fetch_array($bannersql))

						{
							
							
             $tmparray =array();
       
               

$serialnumber = $res1['title'];
    array_push($tmparray,$serialnumber);
	
	
							
						
		 $user_email = $res1['product_type'];
    array_push($tmparray,$user_email); 
	
	
	
    $user_mobile_no = $res1['location'];
    array_push($tmparray,$user_mobile_no); 
	
	$user_fname = $res1['price'];
    array_push($tmparray,$user_fname); 
	
	$balance = $res1['quantity'];
	    array_push($tmparray,$balance); 


 $distributor = $res1['description'];
    array_push($tmparray,$distributor); 
	
	
	
	
	
	  
    array_push($sheet,$tmparray);
  }
  
  function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

cellColor('A1', 'F28A8C');
cellColor('B1', 'b77b0d');
cellColor('C1', '0d22b7');
cellColor('D1', 'b70daa');
cellColor('E1', 'b7250d');
cellColor('F1', '0db739');



   
 //Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Productlist Report.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
  $worksheet = $objPHPExcel->getActiveSheet();
  foreach($sheet as $row => $columns) {
    foreach($columns as $column => $data) {
        $worksheet->setCellValueByColumnAndRow($column, $row + 1, $data);
		
		
		 
		    }
  }
  
  
  
  
  
  
  
  PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

  
  
  
  


  //make first row bold
  $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
  
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(35);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(13);

$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(14);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);









 
  
  $objPHPExcel->setActiveSheetIndex(0);
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
  
  
  
  ?>