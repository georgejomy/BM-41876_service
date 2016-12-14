
<?php
class LoginModel extends CI_Model {

	    public function addUser($data){
            $query=$this->db->select('*')->from('user_data')->where($data)
           					  ->get();  
           	$cont=$query->num_rows();
           	if($cont==1)
           	{
           		$query=$this->db->select('*')->from('user_data')->where($data)
           					  ->get();  
           	    
           		foreach($query->result_array() as $row){
				$msg=array("f_name"=>$row['f_name'],"s_name"=>$row['s_name'],"email"=>$row['email'],"pro_img"=>$row['pro_img'],"ResponseCode"=>'200');
			}
           	}  
			else
			{
				$em=$data['email'];
				$query=$this->db->select('*')->from('user_data')->where('email',$em)
				->get();



				if($query->num_rows()==1)
				{
					$query=$this->db->select('*')->from('user_data')->where('email',$em)
           					  ->get();  
           	
					foreach ($query->result_array() as $row){
				    $msg=array("f_name"=>$row['f_name'],"s_name"=>$row['s_name'],"email"=>$row['email'],"pro_img"=>$row['pro_img'],"ResponseCode"=>'500');
				}
				}
				else
				{
					
           	              
					
				    $msg=array("ResponseCode"=>'404');
				}
			}
return json_encode($msg);


         	
	          
}
}
?>