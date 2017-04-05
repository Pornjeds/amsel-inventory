<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaction extends CI_Controller {

  public $_VIEW = '/shared/shared_view';

 function __construct()
 {
   parent::__construct();
   $this->load->model('Users','',TRUE);
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $this->load->helper(array('form'));
     $title = 'Transaction | Amsel Inventory System';
     $page = '/transaction/new_transaction_view';
     //$users = $this->Users->loadAllPCUsers();

     $data['page'] = $page;
     $data['title'] = $title;

     $this->load->view($this->_VIEW, $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
  }

  function VerifyTransaction(){

  }

}

?>
