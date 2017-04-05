<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Users','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'UserName', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     $this->load->helper('url');
     redirect('home');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->Users->login($username, $password);

   if($result)
   {
     foreach($result as $row)
     {
       $sess_array = array(
         'UserID' => $row->UserID,
         'UserName' => $row->UserName
       );

       $this->session->set_userdata('logged_in', $sess_array);

       return true;
      //  echo $row->UserName;
      //  echo $row->Password;
      //  echo $row->UserID;
     }
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
   }
 }
}
?>
