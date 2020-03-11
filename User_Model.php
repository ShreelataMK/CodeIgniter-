<?php 
   class User_Model extends CI_Model 
   { 
      public function __construct()
	  { 
         parent::__construct(); 

       // $this->tableName = 'user';
       // $this->primaryKey = 'id';
      } 

      //Data insertion query for login and register
      //public function insert($userData = array()){
        //if(!array_key_exists("created",$data)){
          //  $data['created'] = date("Y-m-d H:i:s");
        //}
        //if(!array_key_exists("modified",$data)){
          //  $data['modified'] = date("Y-m-d H:i:s");
        //}
        //$insert = $this->db->insert($this->tableName,$userData);
        //if($insert){
           // return $this->db->insert_id();
        //}else{
           // return false;    
        //}
    //}


      function userlogin($email,$pass){
        
        $que=$this->db->query("select * from user where email='".$email."' and password='".$pass."'");

          if ($que->num_rows() > 0) {
            
            return $que->result();
          }
          else{

            return false;
          }

      }


    //Data insertion query...
    public function userdata($name,$mobile,$address,$picture){



      $query="insert into student values('','$name','$mobile','$address','$picture')";
      $this->db->query($query);

      
    }

    //Data view query...
    public function disprecord(){

      $query = $this->db->query("select * from student");
      return $query->result();
    }

    //Data deletion query....
    public function deleterecord($id){

      $this->db->query("delete from student where id ='".$id."'");
    }

    //Data view by id...
    public function disprecordById($id){

      $query = $this->db->query("select * from student where id ='".$id."'");
      return $query->result();
    }

    //Update data query...
    function updaterecords($name,$mobile,$address,$picture,$id)
  {
  $query=$this->db->query("update student SET name='$name',mobile='$mobile',address='$address',picture='$picture' where id='".$id."'");
  }

  }

    /*public function insert($data = array()){
        
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }*/


    /*public function editrecord($name,$mobile,$address,$picture,$id){
     
     $query =$this->db->query("update student SET name='$name',mobile='$mobile',address='$address',picture='$picture' where id='".$id."'");
    }*/


    /*public function editrecord($data,$id){
        
        $this->db->where('id',$id);
        $this->db->update('student',$data);
    }
*/

   /*public function editrecord($id,$userData){

     $this->db->where('id', $userData['id']);
    $this->db->set($userData);
    return $this->db->update('student');*/

      /*$data=array('name'=>$name,
        'mobile'=>$mobile,userData
        'address'=>$address,
        'picture'=>$picture);*/

      //$sql_query=$this->db->where('id',$id)->update('student',$userData);
      //if ($sql_query) {
        //$this->session->set_flashdata('success','Record update successfully');
        //redirect('disprecordById');
      

    
  
   
