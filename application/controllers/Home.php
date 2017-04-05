<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

  public $title = 'Amsel Inventory System';

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['UserName'];
     $data['title'] = $this->title;
     $this->load->view('home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }

}

?>
