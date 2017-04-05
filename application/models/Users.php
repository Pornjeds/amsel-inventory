<?php
Class Users extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('UserID, UserName, Password');
   $this -> db -> from('Users');
   $this -> db -> where('UserName', $username);
   $this -> db -> where('Password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function loadAllPCUsers()
 {
  $this -> db -> select('UserID, FirstName, LastName, NickName, ProfileImage, RegisteredDate, Updated, UserName, Password, Email, UserTypeID, PCUserID, PCUserInStore.StoreID, Stores.StoreID, StoreName, Address, Province');
  $this -> db -> from('Users');
  //$this->db->join('comments', 'comments.id = blogs.id');
  $this -> db -> join('PCUserInStore', 'Users.UserID = PCUserInStore.PCUserID', 'left');
  $this -> db -> join('Stores', 'PCUserInStore.StoreID = Stores.StoreID', 'left');
  $this -> db -> where('UserTypeID = 1'); // PC User
  $this -> db -> limit(100);

   $query = $this -> db -> get();

   if($query -> num_rows() > 1)
   {
     return $query -> result();
   }
   else
   {
     return false;
   }
 }

 function loadSinglePCUser($userID)
 {
   $this -> db -> select('UserID, FirstName, LastName, NickName, ProfileImage, RegisteredDate, Updated, UserName, Password, Email, UserTypeID, PCUserID, PCUserInStore.StoreID, Stores.StoreID, StoreName, Address, Province');
   //$this -> db -> from('Users');
   $this -> db -> join('PCUserInStore', 'Users.UserID = PCUserInStore.PCUserID');
   $this -> db -> join('Stores', 'PCUserInStore.StoreID = Stores.StoreID');
   //$this -> db -> where('UserTypeID = 1'); // PC User
   $this -> db -> where('UserID = '. $userID);

   $sql = $this->db->get_compiled_select('Users');
   echo $sql;
   //$query = $this -> db -> get('Users');
   $query = $this -> db -> query($sql);
   $row = $query -> row(1);

   if(isset($row))
   {
     return $row;
   }
   else
   {
     return false;
   }
 }

 function saveNewPCUserIntoDB($data)
 {
   try{
     $this->db->insert('Users', $data);
     return true;
   }catch(Exception $ex){
     echo $ex->getMessage();
   }
 }
}
?>
