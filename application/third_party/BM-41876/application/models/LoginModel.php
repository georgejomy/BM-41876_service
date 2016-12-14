<?php
class LoginModel extends CI_Model {
	public function addUser($data){
		
		    //   $em[]=$data['email'];
			

			$query=$this->db->select('*')
					->from('user_data')
					->where($data)
					->get(); 
			$count=$query->num_rows();
			if($count==1)
			{
			
			$msg=array("Msg"=>'Success',"ResponseCode"=>'200');

		    }

		    else{
		    	             $query=$this->db->select('*')->from('user_data')
			                 ->where($em)->get();
			                 $count=$query->num_rows();
			                 if($count==1)
			                   {
                   $msg=array("Msg"=>'Password incorrect',"ResponseCode"=>'500');
		                        }
		
		                  else {
			
			             $msg=array("Msg"=>'Invalid emailid',"ResponseCode"=>'404');

		                       }
	            }
	            return $msg;
}
}
?>