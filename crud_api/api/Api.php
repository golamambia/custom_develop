<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header("Content-Type: application/json");

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=webtemgl_crud_api", "webtemgl_testapi", "0Es+}j4}Jy}v");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM tbl_sample ORDER BY id desc";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		
		if($json_obj->first_name && $json_obj->last_name)
		{
		   
			$form_data = array(
				':first_name'		=>	$json_obj->first_name,
				':last_name'		=>$json_obj->last_name
			);
			$query = "
			INSERT INTO tbl_sample 
			(first_name, last_name) VALUES 
			(:first_name, :last_name)
			";
			
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
		   // return "b";
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function insert2()
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		$date=date('d-m-Y');
		if($json_obj->name && $json_obj->email)
		{
		   
			$form_data = array(
				':name'		 =>	$json_obj->name,
				':email' =>$json_obj->email,
				':phone'		 =>	$json_obj->phone,
				':address'		 =>	$json_obj->address,
				':password'		 =>	$json_obj->password,
				':entry_date' =>$date
			);
			$query = "
			INSERT INTO user 
			(name, email,phone,address,password,entry_date) VALUES 
			(:name, :email,:phone, :address, :password,:entry_date)
			";
			
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
		   // return "b";
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		$id=$json_obj->id;
	    //return $nn;
		$query = "SELECT * FROM tbl_sample WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['first_name'] = $row['first_name'];
				$data['last_name'] = $row['last_name'];
			}
			return $data;
		}
	}
	function login()
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		$email=$json_obj->email;
		$password=$json_obj->password;
	    //return $nn;
		 $query = "SELECT * FROM user WHERE email='".$email."' and password='".$password."'";
		$statement = $this->connect->prepare($query);
		 //$row_count = $statement->rowCount();
		//if($row_count>0){
		    
		
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
			    $data['email'] = $row['email'];
				$data['name'] = $row['name'];
				$data['phone'] = $row['phone'];
				$data['address'] = $row['address'];
				$data['entry_date'] = $row['entry_date'];
				$data['id'] = $row['id'];

			}
			return $data;
		}else{
		    return $data[] = array(
					'success'	=>	'0'
				);
		}
		//}
	}

	function update()
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		//$id=$json_obj->id;
		if(isset($json_obj->first_name))
		{
			$form_data = array(
				':first_name'		=>	$json_obj->first_name,
				':last_name'		=>$json_obj->last_name,
				':id'			=>	$json_obj->id
			);
			$query = "
			UPDATE tbl_sample 
			SET first_name = :first_name, last_name = :last_name 
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
	    $json_str = file_get_contents('php://input');
		$json_obj = json_decode($json_str);
		$id=$json_obj->id;
		$query = "DELETE FROM tbl_sample WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>