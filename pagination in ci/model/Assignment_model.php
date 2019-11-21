<?php

class Assignment_model extends CI_Model {

    function __construct() {
        parent::__construct();				
		//$this->load->database();
    }
	public function createAssignmentId(){		  
	  $query = $this->db->select('as_id')->from('assignment_master')->order_by('id','DESC')->limit(1)->get();
	  $row = $query->result();
				 
	  if(!empty($row[0]->as_id)):
		  $as_id = substr($row[0]->as_id,3);
		  $as_id = $as_id+1;
	  else:
		  $as_id = 1;			  
	  endif;
				
	  return 'COS00'.$as_id;
	}
	
    public function getAllCategories($service_id) {
        return $this->db->select('*')->from('category_master')->join('service_types','service_types.service_id = category_master.service_id')->where('service_types.service_id',$service_id)->get()->result();
    }

    public function getAllCourses($service_id) {
        return $this->db->select('cos.*')->from('course_master cos')->join('category_master cat' ,'cos.category_id = cat.category_id')->where('cat.service_id',$service_id)->get()->result();
    }

    public function getAllSubjects($service_id) {
        return $this->db->select('sub.*')->from('subject_master sub')->join('course_master cos','sub.course_id = cos.course_id')->join('category_master cat' ,'cos.category_id = cat.category_id')->where('cat.service_id',$service_id)->get()->result();
    }


    public function getAllService() {
        return $this->db->select('*')->from('service_types')->get()->result();
    }

    function total_solved_question(){
     return $this->db->query("select * from solution_master ")->num_rows();
   }
   function total_subject(){
     return $this->db->query("select * from subject_question ")->num_rows();
   }
   
   function total_solved_question_day(){
       $day=date('Y-m-d',strtotime("-1 days"));
     return $this->db->query("select * from solution_master WHERE `created` LIKE '%$day%' ")->num_rows();
   }


    public function getAdminStatus() {
        $row = $this->db->select('user_session')->from('user_master')->get()->result();
        return $row[0]->user_session;
    }
	public function getAllServiceCategories() {
        return $this->db->select('*')->from('category_master')->join('service_types','service_types.service_id = category_master.service_id')->get()->result();
    }
	
	public function addAssignment($assign_task) {
        return $this->db->insert('assignment_master', $assign_task);
    }		/***********************************************/	
	public function getQustion() {       
	return $this->db->select('*')->from('subject_question')->get()->result();	
	/*if ($id === FALSE)		
	{				
	$query = $this->db->get('subject_question');		
		return $query->result_array();		}	
		$query = $this->db->get_where('subject_question', array('id' => $id));	
		return $query->row_array();*/    
		}			/***********************************************/
		
		
		
			public function getqa($id = FALSE){
	            if ($id === FALSE)
                {
                        $query = $this->db->get('subject_question');
                        return $query->result_array();
                }
                $query = $this->db->get_where('subject_question', array('id' => $id));
                return $query->row_array();
			}
			
			
///pagination

    public function record_count() {
        return $this->db->count_all("solution_master");
    }
    
    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("Country");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }



////pagination
			
			public function record_pag_count($id,$search_text) {
			    if ($id!='')
                {
        $this->db->where('question_id', $id);
                    $query = $this->db->get('solution_master');
                 return $query->num_rows();
                }else if ($search_text!='')
                {
                    
                    $this->db->where("question_title LIKE '%$search_text%'");
                    $query = $this->db->get('solution_master');
                        return $query->num_rows();
                }else{
                     
			     $query = $this->db->get('solution_master');
                        return $query->num_rows();
                }
   }

			
			public function assignmentPage($limit, $start,$id,$search_text){
			    if ($id!='')
                {
                     $this->db->limit($limit, $start);
                    $this->db->where('question_id', $id);
                    $query = $this->db->get('solution_master');
                        return $query->result_array();
                        //$query->result_array();
                        //echo $this->db->last_query();exit();
                }else if ($search_text!='')
                {
                     $this->db->limit($limit, $start);
                    $this->db->where("question_title LIKE '%$search_text%'");
                    $query = $this->db->get('solution_master');
                        return $query->result_array();
                }else{
                     $this->db->limit($limit, $start);
			     $query = $this->db->get('solution_master');
                        return $query->result_array();
                }
	            
			}
			
			
			
			
				public function assignmentPage_recentview(){
	           
                 $this->db->order_by('rand()');
    $this->db->limit(5);
    $query = $this->db->get('solution_master');
     return $query->result_array();
			}
			
			
				public function assignmentPage_recentsearch(){
	           
                 $this->db->order_by("sr_no","desc");
    $this->db->limit(5);
    $query = $this->db->get('solution_master');
     return $query->result_array();
			}
			
			
			public function getassignmentPage($id = FALSE)
			{
                if ($id === FALSE)
                {
                        $query = $this->db->get('solution_master');
                        return $query->result_array();
                }
                //$query = $this->db->get_where('solution_master', array('sr_no' => $id));
                $where = array('sr_no' => $id);
    $join = array('subject_question', 'subject_question.id=solution_master.question_id');
    $query = $this->db->join($join[0], $join[1])->get_where('solution_master', $where);
                return $query->row_array();
			}
			
			
			
			
			
			
			

}

?>