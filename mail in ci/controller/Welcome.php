<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("welcome_model");
        $this->load->library("PhpMailerLib");
        $this->load->helper('cookie');
        $this->load->config('email');
        $this->load->library('email');
		
		
    }


    public function index() {
        $this->load->model("Foot_link");
        
        $data = array();		
        $st_manager['user_session'] = $this->welcome_model->getAdminStatus();
        $this->session->set_userdata('st_manager', $st_manager['user_session']);
		$data['pages'] = $this->welcome_model->getAllPage(); 
		
		$searchData = array();
		if(!empty($_POST['search'])){				
			$search_key = trim($this->input->post('search', true));	
			$searchData['search'] = $search_key;
			$searchData['services'] = $this->welcome_model->getAllService($search_key);			
			$searchData['categories'] = $this->welcome_model->searchAllCategories($search_key);			        
			$searchData['courses'] = $this->welcome_model->serchAllCourses($search_key);        
			$searchData['subjects'] = $this->welcome_model->searchAllSubjects($search_key);	
			//print_r($searchData);die;
			$data['link']=$this->Foot_link->getMedia_footer1();
			$this->load->view('layout/header_new',$data);        
			$this->load->view('home_new', $searchData);  
		}
		else{ 
			//$data['services'] = $this->welcome_model->getAllService(); 
			$this->load->model("review_model");	
			$data['service_id'] ='SRV001';       
			$data['services'] = $this->welcome_model->getAllService();        
			$data['categories'] = $this->welcome_model->getAllCategories($data['service_id']);        
			$data['courses'] = $this->welcome_model->getAllCourses($data['service_id']);        
			$data['subjects'] = $this->welcome_model->getAllSubjects($data['service_id']);	
			$data['reviews'] = $this->review_model->getAllreview();	
			$data['link']=$this->Foot_link->getMedia_footer1();
			$this->load->view('layout/header_new',$data);        
			$this->load->view('home_new', $data);  
		}
		
		$data['link']=$this->Foot_link->getMedia_footer1();
		//echo $data['link']->facebook;
        $this->load->view('layout/footer_new',$data);
    }

    public function assignTask() {
        $assign = array();        
        $assign['visitor_email'] = $this->input->post('visitor_email', TRUE);
        $assign['assign_task'] = $this->input->post('assign_task', TRUE);
        $traget_file=$assign['assign_task_file'] = './assets/images/'.$_FILES['assign_task_file']['name'];
        move_uploaded_file($_FILES['assign_task_file']['tmp_name'], $traget_file);        
        
        $mail = $this->phpmailerlib->load();
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = E_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = E_USER;                 // SMTP username
            $mail->Password = E_PASS;                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = E_PORT;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom($assign['visitor_email'], 'CourseWork Solution');
            $mail->addAddress(E_USER);     // Add a recipient
            $mail->addAttachment($traget_file, $_FILES['assign_task_file']['name']);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Assign Task';
            $mail->Body = 'Hello ' . $assign['visitor_email'] . '</b>' . $assign['assign_task'] . '</b>';
            $mail->AltBody = $assign['assign_task'];
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
	
	public function getcategory() {
		$this->load->model("subject_model");
        $data = array();
        $data['category_id'] = base64_decode($this->uri->segment(3));
        $data['categories'] = $this->welcome_model->getCategoriesById($data['category_id']);        
		$data['courses'] = $this->welcome_model->getCoursesByCategoryId($data['category_id']);        
		$data['subjects'] = $this->welcome_model->getSubjectsByCategoryId($data['category_id']);	
        $this->load->view('layout/header_new');              
		$this->load->view('category', $data);
		$this->load->model("Foot_link");
		$data['link']=$this->Foot_link->getMedia_footer1();
		$this->load->view('layout/footer_new',$data);
    } 
	
	 public function getsubject() { 
		$this->load->model("subject_model");
        $data = array();
        $data['subject_id'] = base64_decode($this->uri->segment(3));
        $data['subjects'] = $this->welcome_model->getSubjects($data['subject_id']);		
       // $data['course']=$this->subject_model->getCourse($data['subject_id']);
        $this->load->view('layout/header_new');
        $this->load->view('subject/subject',$data);
        $this->load->model("Foot_link");
		$data['link']=$this->Foot_link->getMedia_footer1();
        $this->load->view('layout/footer_new',$data);
    }
	
	public function getcourse() { 
		$this->load->model("subject_model");
        $data = array();
        $data['courses_id'] = base64_decode($this->uri->segment(3));
       // $data['subjects'] = $this->subject_model->getAllSubjects($data['courses_id']);
        $data['course']=$this->welcome_model->getCourse($data['courses_id']);
        $data['subjects']=$this->welcome_model->getSubjectByCourseId($data['courses_id']);		
        $this->load->view('layout/header_new');
        $this->load->view('subject/subject',$data);
        $this->load->model("Foot_link");
		$data['link']=$this->Foot_link->getMedia_footer1();
        $this->load->view('layout/footer_new',$data);
    }
    
    
    function add_attachment(){
       $this->load->model("Subject_model");
       $name=$this->input->post('name');
       $email=$this->input->post('email');
       $phone=$this->input->post('phone');
       $dead_line=$this->input->post('dead_line');
       //$dead_line=
       //echo $dead_line;
       //$var = '20/04/2012';
       //$date = str_replace('/', '-', $var);
       //echo date('Y-m-d', strtotime($date));
       //exit();
        if(isset($_FILES['assignment_file'])){
      $errors= array();
      $file_name = $_FILES['assignment_file']['name'];
      $file_size =$_FILES['assignment_file']['size'];
      $file_tmp =$_FILES['assignment_file']['tmp_name'];
      $file_type=$_FILES['assignment_file']['type'];
      //$file_ext=strtolower(end(explode('.',$_FILES['assignment_file']['name'])));
      
     
      
      
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $this->Subject_model->assignTask1($name,$email,$phone,$dead_line,$file_name);
         move_uploaded_file($file_tmp,"attachment/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   
   redirect('Welcome');
   
    }
    
    function add_attachment1(){
       $this->load->model("Subject_model");
       //echo $this->uri->segment(2); exit();
       $id=$this->Subject_model->get_last_assignment_id()->sr_no;
       $visitor_id          ="VST00".$id;
       $visitor_name        =$this->input->post('name');
       $visitor_phone       =$this->input->post('phone');
       $visitor_email       =$this->input->post('email');
      
       $subject             =$this->input->post('subject');
       $course_code         =$this->input->post('course_code');
       $assignment_type     =$this->input->post('assignment_type');
       $country             =$this->input->post('country');
       $dead_line           =$this->input->post('dead_line');
       
       //$dead_line=
       //echo $dead_line;
       //$var = '20/04/2012';
       //$date = str_replace('/', '-', $var);
       //echo date('Y-m-d', strtotime($date));
       //exit();
        if(isset($_FILES['assignment_file'])){
      $errors= array();
      $file_name = $_FILES['assignment_file']['name'];
      $file_size =$_FILES['assignment_file']['size'];
      $file_tmp =$_FILES['assignment_file']['tmp_name'];
      $file_type=$_FILES['assignment_file']['type'];
      //$file_ext=strtolower(end(explode('.',$_FILES['assignment_file']['name'])));
      
     
       $message = "
  <p>Name : ".$visitor_name."</p>
  <p>Email : ".$visitor_email."</p>
  <p>Phone : ".$visitor_phone."</p>
  <p>Subject : ".$subject."</p>
  <p>Course code : ".$course_code."</p>
  <p>Assignment type : ".$assignment_type."</p>
  <p>Country : ".$country."</p>
  <p>Date : ".date('d-m-Y',strtotime($dead_line))."</p>
  ";
      
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $this->Subject_model->assignTask2($visitor_id,$visitor_name,$visitor_phone,$visitor_email,$file_name,$subject,$course_code,$assignment_type,$country,$dead_line);
         move_uploaded_file($file_tmp,"attachment/".$file_name);
         
         //$this->email->to('wtm.golam@gmail.com');
         $this->email->to('info@courseworksolutions.com');
        $this->email->from('sendmail@courseworksolutions.com','Course Work Solutions');
        $this->email->subject($subject);
        $this->email->message($message);
         $this->email->attach($file_tmp,$file_name);
    $this->email->send();
         echo "Success";
         
      }else{
         print_r($errors);
      }
   }
  
   
   
        
   
   
   $this->session->set_flashdata('msg','<i class="fa fa-check"></i>Send Successfully');
   redirect($_SERVER['HTTP_REFERER']);
   
    }
	
	

    

}
