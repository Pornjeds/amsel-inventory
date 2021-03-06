<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller {

  public $_PRODUCT_VIEW = '/products/products_view';

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $title = 'Products List | Amsel Inventory System';
     $page = '/products/list_products_view';

     $data['page'] = $page;
     $data['title'] = $title;
    //  $data['users'] = $users;
     $this->load->view($this->_PRODUCT_VIEW, $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function new_product()
 {

 }

 function edit_product()
 {

 }

 function view_product()
 {
   if($this->session->userdata('logged_in'))
   {
     $productID = $this->input->get('productID', TRUE);
     if(!is_null($productID))
     {
         $title = 'View Product | Amsel Inventory System';
         $page = '/products/product_view';

         $data['page'] = $page;
         $data['title'] = $title;
         $this->load->view($this->_PRODUCT_VIEW, $data);
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
