<?php
class User extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
  $this->load->model('User_Model');
  $this->load->library('session');
  $this->load->helper('form');
  $this->load->library('form_validation');
	}


	
    
    //registration code

  public function register(){

    $data =$userData = array();

    //If registration request is submitted
    if ($this->input->post('signupSubmit')) {
      

      $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[12]');
      $this->form_validation->set_rules('pass', 'pass', 'trim|required|min_length[8]');
      $this->form_validation->set_rules('passconf', 'pass Confirmation', 'trim|required|matches[pass]');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
     

     if ($this->form_validation->run()==true) {

      $n=$this->input->post('name');
     $e=$this->input->post('email');
     $p=$this->input->post('pass');

    $que=$this->db->query("select * from user where email='".$e."'");
    $row = $que->num_rows();
    if($row)
    {
    $data['error']="<h3 style='color:red'>This user already exists</h3>";
    }
    else
    {
    $que=$this->db->query("insert into user values('','$n','$e','$p')");
    
    $data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
    }     

     }
 }

 $this->load->view('user_registration',$data);

}


public function login(){

 $data['title'] = 'codeigniter session';
  $this->load->view('user_login',$data);
}



function login_validation()
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('pass','pass','required');

    if ($this->form_validation->run()==true) 
    {
      //true
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        //model
        $this->load->model('User_Model');
        if ($this->User_Model->userlogin($email,$pass)) 
        {
          $session_data = array(
            'email' =>$email
          );
          $this->session->set_userdata($session_data);
          redirect('User/home');
        }
        else
        {
          $this->session->set_flashdata('error','Invalid Email ID and Password');
          redirect('User/login');
        }
    }
    else
    {
      //false
      $this->login();
    }

}




// Check for user login process


 /*public function login(){

 if ($this->input->post('login')) {
   
      $this->form_validation->set_rules('email','email','required');
      $this->form_validation->set_rules('pass','pass','required');

      if ($this->form_validation->run()==true) {

        //true
        
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

       $userData=$this->User_Model->userlogin($email,$pass);
       print_r($userData);

      }else{
         
         //false
        $this->load->view('user_login');


      }
 }

 $this->load->view('user_login');
}

*/



  /*$this->load->library('form_validation');
  $this->form_validation->set_rules('email','email','required');
  $this->form_validation->set_rules('pass','pass','required');

   if ($this->form_validation->run()) 
  {
    //true
    //$email = $this->input->post('email');
    //$pass = $this->input->post('pass');
     redirect('User/home');
   }else{

    $this->login();
   }
 }*/

/*function login_validation(){


  $this->load->library('form_validation');
  $this->form_validation->set_rules('email','email','required');
  $this->form_validation->set_rules('pass','pass','required');

  if ($this->form_validation->run() == TRUE) 
  {
    //true
    $email = $this->input->post('email');
    $pass = $this->input->post('pass');
    
     //$this->User_Model->userlogin($email,$pass);
    
    if($this->User_Model->userlogin($email,$pass)
    {


        $this->session->set_userdata($name,'');      
        redirect('User/home');
  }else{

    $this->session->set_flashdata('error','Invalid Username and Password');

    redirect('User/login');
  }

}
  else{

    //false
    $this->login();
  }
}
*/








       

     //Login code
	/*public function login()
	{
		
		if($this->input->post('login'))
		{
			$e=$this->input->post('email');
			$p=$this->input->post('pass');
	
			$que=$this->db->query("select * from user where email='".$e."' and password='$p'");
			$row = $que->num_rows();
			if($row)
			{
			redirect('User/home');
			}
			else
			{
		$data['error']="<h3 style='color:red'>Invalid login details</h3>";
			}	
		}
		$this->load->view('user_login',@$data);		
	}

  */

//Home Page code
 function home(){

  if ($this->session->userdata('email') !='') {
    echo '<h2>Welcome -'.$this->session->userdata('email').'</h2>';
    echo '<label><a href="'.base_url().'User/logout">Logout</a></label>';
    $this->load->view('dashboard');

  }else{

    $this->load->view('user_login');
  }
}



//finished


public function logout(){

       $this->session->unset_userdata('User');
       $data['error']="<h3 style='color:blue'>successfully Logout</h3>";
       $this->load->view('user_login',$data);
  
}



public function upload(){

  if ($this->session->userdata('email')!='') {
    
        $this->form_validation->set_rules('name','name','required|min_length[4]|max_length[10]');
        $this->form_validation->set_rules('number','number','required|numeric|max_length[15]');
        $this->form_validation->set_rules('address','address','required|min_length[4]|max_length[50]');
           


          if ($this->form_validation->run($this) == FALSE) {
            //$data['error']= "<h3 style='color:blue'>Please Enter the Details.</h3>";
            $this->load->view('dashboard');
            
        }else{

            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                    
                }else{
                    $picture = '';
                }

            
            }
            $name = $this->input->post('name');
            $mobile = $this->input->post('number');
            $address = $this->input->post('address');
                
                //print_r($picture);
                //print_r($mobile);
                //print_r($address);
                //print_r($picture);

            $userData = $this->User_Model->userdata($name,$mobile,$address,$picture);
            //$data['error']="<h3 style='color:blue'>Your Data successfully</h3>"; 
            $data['error']= "<h3 style='color:blue'>Your Data successfully Stored.</h3>";

            $this->load->view('dashboard',$data);
           

        }

  }
  else
  {

    $this->load->view('user_login');

  }
}





//Insert page code..
    /*public function upload(){
         

         $this->form_validation->set_rules('name','name','required|min_length[4]|max_length[10]');
         $this->form_validation->set_rules('number','number','required|numeric|max_length[15]');
        $this->form_validation->set_rules('address','address','required|min_length[4]|max_length[50]');
           


          if ($this->form_validation->run($this) == FALSE) {
            //$data['error']= "<h3 style='color:blue'>Please Enter the Details.</h3>";
            $this->load->view('dashboard');
            
        }else{

            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                    
                }else{
                    $picture = '';
                }

            
            }
            $name = $this->input->post('name');
            $mobile = $this->input->post('number');
            $address = $this->input->post('address');
                
                //print_r($picture);
                //print_r($mobile);
                //print_r($address);
                //print_r($picture);

            $userData = $this->User_Model->userdata($name,$mobile,$address,$picture);
            //$data['error']="<h3 style='color:blue'>Your Data successfully</h3>"; 
            $data['error']= "<h3 style='color:blue'>Your Data successfully Stored.</h3>";

            $this->load->view('dashboard',$data);
           

        }

  }
  */
//finished

  //display user data

 /* public function display(){
   $id = $this->input->get('id');
   $result['data'] = $this->User_Model->disprecord();
    $this->load->view('user_data',$result);

  }*/

  public function display(){

     if ($this->session->userdata('email')!='') {
        
        $id = $this->input->get('id');
        $result['data'] = $this->User_Model->disprecord();
        $this->load->view('user_data',$result);

     }
     else
     {
        $this->load->view('user_login');

     }


  }


    //User View list page
    public function dispdata(){

    if ($this->session->userdata('email')!='') {
        
    $result['data'] = $this->User_Model->disprecord();
    $this->load->view('user_view',$result);

    }
     else
     {
        $this->load->view('user_login');

     }
}


//Delete Operation code...
    public function deletedata(){

      if ($this->session->userdata('email')!='') {

        $id = $this->input->get('id');  
        $this->User_Model->deleterecord($id);
       redirect("User/dispdata");

        }
     else
     {
        $this->load->view('user_login');

     }

    }

//View data by id..
    public function viewdata(){

      if ($this->session->userdata('email')!='') {

        $id = $this->input->get('id');
        $result['data'] = $this->User_Model->disprecordById($id);
        $this->load->view('user_data',$result);

        }
     else
     {
        $this->load->view('user_login');

     }
    
  }


//Code for update data by id
    public function editdata(){

      if ($this->session->userdata('email')!='') {

        $id = $this->input->get('id');
        //print_r($id);

       $result['data']=$this->User_Model->disprecordById($id);
       $this->load->view('user_update',$result);

       }
     else
     {
        $this->load->view('user_login');

     }

   }

   //update code...

   public function updatedata(){

    if ($this->session->userdata('email')!='') {

       if ($this->input->post('update')) {


           
           $id = $this->input->post('id');
           $name = $this->input->post('name');
           $mobile = $this->input->post('number');
           $address = $this->input->post('address');

           
          
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                }else{
                    $picture = '';
                }
            
            }else{
                $picture = '';
            }
                    print_r($id);
                    print_r($name);
                    print_r($mobile);
                    print_r($address);
                    print_r($picture);

                   $userData = $this->User_Model->updaterecords($name,$mobile,$address,$picture,$id);
                   //echo "Updated successfully data";
                   redirect('User/display',$userData);

                   //$this->load->view('user_update',$data);
                   

       }


   }
     else
     {
        $this->load->view('user_login');

     }
}

}

          /*if($this->input->post('update')){

        $this->form_validation->set_rules('name','name','required|min_length[4]|max_length[10]');
         $this->form_validation->set_rules('number','number','required|numeric|max_length[15]');
         $this->form_validation->set_rules('address','address','required|min_length[4]|max_length[50]');
           


          if ($this->form_validation->run($this) == FALSE) {
            $data['error']= "<h3 style='color:blue'>Please Enter the Details.</h3>";
            //$this->load->view('user_update');
            
        }else{

            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                    
                }

            
            }
            //$id=$this->input->post('id');
            $name = $this->input->post('name');
            $mobile = $this->input->post('number');
            $address = $this->input->post('address');
            //$image = $picture;
            $image = $this->input->post('picture');
                
               // print_r($id);
               // print_r($name);
                //print_r($mobile);
                //print_r($address);
                //print_r($image);


                /*$data = array('name'=>$name,
                        'mobile'=>$mobile,
                          'address'=>$address,
                           'picture'=>$image);*/

                //$this->User_Model->editrecord($data,$id);

               //$data=$this->User_Model->editrecord($name,$mobile,$address,$image,$id);
               //print_r($data);

               
                //echo "<h3 style='color:blue'>Your Data successfully Updated.</h3>";

                 
          /*      
            }
        }
  
    }
}*/
               

           //$userData = $this->User_Model->userdata($name,$mobile,$address,$picture);
            //$data['error']="<h3 style='color:blue'>Your Data successfully</h3>"; 
            //$data['error']= "<h3 style='color:blue'>Your Data successfully Stored.</h3>";

            //$this->load->view('dashboard',$data);

            //$this->User_Model->updatedetails($name,$mobile,$address,$picture,$id)
            //$data['error']="<h3 style='color:blue'>Your Data successfully Updated.</h3>";
            //$this->load->view('dashboard',$data);


      





   

       
           /*
                $name =$this->input->post('name');
                $mobile =$this->input->post('mobile');
                $address =$this->input->post('address');
                //$picture =$this->input->post('picture');

                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload',$config);

                if(!$this->upload->do_upload('picture')){
                    $error = array('error'=>$this->upload->display_errors());
                }else{
                   
                   $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                }
                print_r($picture);

            }*/
        


        /*public function updatedata(){



        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['file_name'] = $_FILES['profile_pic']['name'];
        //$config['max_size'] = 2000;
        //$config['max_width'] = 1500;
        //$config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_pic')) 
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('user_update', $error);
        } 
        else 
        {
            $data = array('image_metadata' => $this->upload->data());
            //$picture = $data['file_name'];


            echo "image updated successfully";
            $this->load->view('user_view');

                   //$this->User_Model->editrecord($name,$mobile,$address,$picture,$id);

                  //echo "<h3 style='color:blue'>Your Data successfully Updated.</h3>";

            
        }

       
    }*/
            
        
    


/*
    public function updatedata(){



    //if ($this->input->post('edit')) {

                $id =$this->input->post('id');
                print_r($id); 
                $name =$this->input->post('name');
                $mobile =$this->input->post('mobile');
                $address =$this->input->post('address');
                //$picture =$this->input->post('picture');
                //print_r($picture);

                //if(!empty($_FILES['picture']['name'])){

                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //$config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                //$this->upload->initialize($config);

                if(!$this->upload->do_upload('picture')){
                    $error = array('error'=>$this->upload->display_errors());
                }else{
                   
                   $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    print_r($picture);
                }
               // print_r($image);
                
        

                $this->User_Model->editrecord($name,$mobile,$address,$picture,$id);

                  echo "<h3 style='color:blue'>Your Data successfully Updated.</h3>";
              
          }
          
          
              
       
        
    
}


  /* public function editdata(){

         $id = $this->input->get('id');
         $result['data']=$this->User_Model->disprecordById($id);
         $this->load->view('user_update',$result);

        $name=$this->input->post("name");
        print_r($name);
        $mobile=$this->input->post("mobile");
        print_r($mobile);
        $address=$this->input->post("address");
        print_r($address);
        $picture=$this->input->post('picture');
         print_r($picture);



     
}
     public function updatedata(){
        $id = $this->input->post('id');
        print_r($id);

        $name=$this->input->post("name");
        print_r($name);
        $mobile=$this->input->post("mobile");
        print_r($mobile);
        $address=$this->input->post("address");
        print_r($address);
        $picture=$this->input->post('picture');
        print_r($picture);

      

                if($_FILES[file]['name']!=""){

                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload',$config);

                if(!$this->upload->do_upload('file')){
                    $error = array('error'=>$this->upload->display_errors());
                }else{

                    $uploadData =$this->upload->data();
                    $picture = $uploadData['file_name'];
                }
            }else{
                $picture=$this->input->post('old');

            $data = array('name'=>$name,
                        'mobile'=>$mobile,
                          'address'=>$address,
                           'file'=>$picture);
            print_r($name);

            $this->User_Model->editrecord($data,$id);

               //$this->User_Model->editrecord($name,$mobile,$address,$picture,$id);

               
                echo "<h3 style='color:blue'>Your Data successfully Updated.</h3>";

            }
        }*/
        /*if ($this->input->post('edit')) {


            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];

                    print_r($picture);
                }else{
                    $picture = '';
                }
            }






        $name=$this->input->post("name");
        print_r($name);
        $mobile=$this->input->post("mobile");
        print_r($mobile);
        $address=$this->input->post("address");
        print_r($address);
        //$picture = $this->input->post('picture');
        //print_r($picture);

        

       
            
        }

    }*/








	
	/*function d2ashboard()
	{
     $this->form_validation->set_rules('name','name','required');
     $this->form_validation->set_rules('age','age','required');

     if ($this->form_validation->run() ==False) {
         $this->load->view('dashboard');
     }else{

        $this->load->view('user_data');
     }



  }  
}    */

/*		
		   
            

               if($this->input->post('userSubmit'))
        {

             if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }


            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('age','age','required');
            $this->form_validation->set_rules('gender','gender','required');
            $this->form_validation->set_rules('religion','religion','required');
            $this->form_validation->set_rules('symptoms','symptoms','required');
            $this->form_validation->set_rules('symptoms1','symptoms1','required');
            $this->form_validation->set_rules('symptoms2','symptoms2','required');
            $this->form_validation->set_rules('symptoms3','symptoms3','required');

             
             if($this->form_validation->run()==False){

                $this->load->view('dashboard');

            }else{
                $name = $this->input->post('name');
                $age = $this->input->post('age');
                $gender =$this->input->post('gender');
                $religion =$this->input->post('religion');
                $symptoms =$this->input->post('symptoms');
                $symptoms1 =$this->input->post('symptoms1');
                $symptoms2 =$this->input->post('symptoms2');
                $symptoms3 =$this->input->post('symptoms3');



                //Prepare array of user data
            $userData = array(
                'name'=>$name,
                'age' =>$age,
                'gender'=>$gender,
                'religion' =>$religion,
                'symptoms' =>$symptoms,
                'symptoms1' =>$symptoms1,
                'symptoms2'=>$symptoms2,
                'symptoms3'=>$symptoms3,
                'picture' => $picture

            );

            //Pass user data to model
            $insertUserData = $this->User_Model->insert($userData);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }

        }
       
    }
     $this->load->view('dashboard');
}*/




     
	/*if($this->input->post('userSubmit'))
		{


        //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = './image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }

            
            //Prepare array of user data
            $userData = array(
                'name' => $this->input->post('name'),
                'age' => $this->input->post('age'),
                'gender' =>$this->input->post('gender'),
                'religion' =>$this->input->post('religion'),
                'symptoms' =>$this->input->post('symptoms'),
                'symptoms1' =>$this->input->post('symptoms1'),
                'symptoms2' =>$this->input->post('symptoms2'),
                'symptoms3' =>$this->input->post('symptoms3'),
                'picture' => $picture
            );
        
            
            //Pass user data to model
            $insertUserData = $this->User_Model->insert($userData);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
                
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
        $this->load->view('home');
    }
}*/





    
	

