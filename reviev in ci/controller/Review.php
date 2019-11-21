<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("review_model");
        $this->load->library("PhpMailerLib");
        $this->load->helper('cookie');
    }

    public function index() {
        $this->load->model("User_model");
        $username=$this->session->userdata('username');
        //echo $username;
        $username=$this->User_model->get_student_data($username)->st_id;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $data = array();     
		$searchData = '';
		$entry_date=date('Y-m-d');
		$user_id=$username;
		$_POST['entry_date']=$entry_date;
		$_POST['user_id']=$user_id;
		$data = $this->input->post();
		
		if(isset($data) && !empty($data)) {
			
			$reviews = array();	
						
			foreach ($data as $key => $values):				
				$reviews[$key] = $this->input->post($key, true);					
			endforeach;
			
			if ($this->review_model->addReview($reviews)):
				echo json_encode(array(
					'result'=>'success',
					'message'=>'<div class="alert alert-success"><strong>Thank you!</strong> Your message has been successfully sent. We will contact you very soon!</div>'
					));	die;
			else:
				echo json_encode(array(
					'result'=>'failed',
					'message'=>'<div class="alert alert-danger">
					 <strong>Oh snap!</strong>Course not added !!!</div>'
					));	die;
				
			endif;		
		}
		
    }
    
    
    
   public function page() {
       //error_reporting(0);
  
       $data['num_ev5']= $this->db
       ->where('ratting',5)
       ->count_all_results('review_master');
       
       $data['num_ev4']= $this->db
       ->where('ratting',4)
       ->count_all_results('review_master');
       
       $data['num_ev3']= $this->db
       ->where('ratting',3)
       ->count_all_results('review_master');
       
       $data['num_ev2']= $this->db
       ->where('ratting',2)
       ->count_all_results('review_master');
       
       $data['num_ev1']= $this->db
       ->where('ratting',1)
       ->count_all_results('review_master');
       $data['wd']='3.03';
      $this->db->select('AVG(ratting) as average');
    //$this->db->where('company_reviews_company_id', $id);
    $this->db->from('review_master');
     $query = $this->db->get();
        $result = $query->row_array();
           $data['avg_review']= $result["average"];
       
       $this->load->model('Assignment_model');
       $rating = base64_decode($this->input->get('rating', TRUE));

       $this->load->model("Review_model");
       $this->load->model("Foot_link");
        $data['link']=$this->Foot_link->getMedia_footer1();
        $data['rating']=$rating;
       $data['assiquestion']=$this->Assignment_model->getqa();
        $data['order']=$this->Review_model->getAll_review($rating);
        $this->load->view('layout/header_new',$data);
        $this->load->view('review');
        
		
        $this->load->view('layout/footer_new',$data);
       
   }
    
    
    
    
    
}
