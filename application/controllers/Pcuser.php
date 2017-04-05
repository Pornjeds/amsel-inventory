<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pcuser extends CI_Controller {

  public $_PC_VIEW = '/pc/pc_view';

 function __construct()
 {
   parent::__construct();
   $this->load->model('Users','',TRUE);
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $title = 'PC List | Amsel Inventory System';
     $page = '/pc/list_pc_view';
     $users = $this->Users->loadAllPCUsers();

     $data['page'] = $page;
     $data['title'] = $title;
     $data['users'] = $users;
     $this->load->view($this->_PC_VIEW, $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
  }

 function newPCUser()
 {
  if($this->session->userdata('logged_in'))
  {
    $this->load->helper(array('form'));

    $title = 'New PC | Amsel Inventory System';
    $page = '/pc/new_pc_view';

    $data['page'] = $page;
    $data['title'] = $title;

    $this->load->view($this->_PC_VIEW, $data);
  }
  else
  {
    //If no session, redirect to login page
    redirect('login', 'refresh');
  }
 }

 function completed()
 {
   if($this->session->userdata('logged_in'))
   {
     $title = 'Completed | Amsel Inventory System';
     $page = 'pc/completed_view';

     $data['page'] = $page;
     $data['title'] = $title;

     $this->load->view($this->_PC_VIEW, $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function viewPCUser(){
   if($this->session->userdata('logged_in'))
   {
     $userID = $this->input->get('userID', TRUE);
     if(!is_null($userID))
     {
      //  $user = $this->Users->loadSinglePCUser($userID);
       //
      //  if(!$user){
         $title = 'View PC User | Amsel Inventory System';
         $page = '/pc/profile_view';

         $data['page'] = $page;
         $data['title'] = $title;
         //$data['user'] = $user;
         $this->load->view($this->_PC_VIEW, $data);
      //  }
      //  else{
      //    echo 'error';
      //  }
     }else{
       //Error something went wrong
     }
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function editPCUser()
 {
   if($this->session->userdata('logged_in'))
   {
     //Check if current user is Administrator
     $this->load->helper(array('form'));

     $userID = $this->input->get('userID', TRUE);
     if(!is_null($userID))
     {
      //  $user = $this->Users->loadSinglePCUser($userID);
         $title = 'Edit PC User | Amsel Inventory System';
         $page = '/pc/edit_pc_view';

         $data['page'] = $page;
         $data['title'] = $title;
         $this->load->view($this->_PC_VIEW, $data);
     }else{
       //Error something went wrong
     }
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

}

?>
