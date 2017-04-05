<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyNewUser extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Users','',TRUE);
   $this->load->helper(array('form', 'url'));
 }

 function index()
 {

   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('firstname', 'FirstName', 'trim|required');
   $this->form_validation->set_rules('lastname', 'LastName', 'trim|required');
   $this->form_validation->set_rules('nickname', 'NickName', 'trim|required');
   //$this->form_validation->set_rules('profile-image', 'ProfileImage', 'trim|required');
   $this->form_validation->set_rules('username', 'UserName', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');
   $this->form_validation->set_rules('email', 'Email', 'trim|required');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $title = 'New PC | Amsel Inventory System';
     $page = '/pc/new_pc_view';

     $data['page'] = $page;
     $data['title'] = $title;

     $this->load->view('/pc/pc_view', $data);
   }
   else
   {

      //Upload Config
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 2000;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
      $config['file_ext_tolower']     = true;
      $config['overwrite']            = false;
      $config['encrypt_name']         = true;

      //Upload file into an image path
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload('profile-image'))
      {
        //Upload failed
        $error = array('error' => $this->upload->display_errors());
        echo $error['error'];
      }
      else
      {
        //Upload succeeded
        $filename = $this->upload->data('file_name');

        //Save data into database
        $data = array(
          'FirstName' => $this->input->post('firstname'),
          'LastName' => $this->input->post('lastname'),
          'NickName' => $this->input->post('nickname'),
          'ProfileImage' => $filename,
          'RegisteredDate' => date("Y-m-d H:i:s"),
          'Updated' => date("Y-m-d H:i:s"),
          'UserName' => $this->input->post('username'),
          'Password' => md5($this->input->post('password')),
          'Email' => $this->input->post('email'),
          'UserTypeID' => 1
        );

        if($this->Users->saveNewPCUserIntoDB($data))
        {
          //Save success

          //Redirect to complete page
          $title = 'Completed New User | Amsel Inventory System';
          $page = '/pc/completed_view';


          $data['page'] = $page;
          $data['title'] = $title;
          $data['firstname'] = $data['FirstName'];
          $data['email'] = $data['Email'];

          $this->load->view('/pc/pc_view', $data);
        }else{
          //Error

        }
      }
    }
 }

 function SaveToDB($data)
 {
   //Save New user data into database

   //Return true/false
 }

 //Insert into Database

 // function check_database($password)
 // {
 //   //Field validation succeeded.  Validate against database
 //   $username = $this->input->post('username');
 //
 //   //query the database
 //   $result = $this->Users->login($username, $password);
 //
 //   if($result)
 //   {
 //     foreach($result as $row)
 //     {
 //       $sess_array = array(
 //         'UserID' => $row->UserID,
 //         'UserName' => $row->UserName
 //       );
 //
 //       $this->session->set_userdata('logged_in', $sess_array);
 //
 //       return true;
 //      //  echo $row->UserName;
 //      //  echo $row->Password;
 //      //  echo $row->UserID;
 //     }
 //   }
 //   else
 //   {
 //     $this->form_validation->set_message('check_database', 'Invalid username or password');
 //   }
 // }
}
?>
