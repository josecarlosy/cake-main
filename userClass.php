<?php

require_once("dbconfig.php");
class USER extends dbconfig {
 
   public static $data;
 
   function __construct() {
     parent::__construct();
   }
 
 // Create new user/signup
   public static function addNewUser($userData) {
     try {
       $check = self::checkUserExist($userData['username']);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "INSERT INTO table_by_clients (username, email, password) ";
       $query .= "VALUES ('".$userData['username']."', '".$userData['email']."', '".md5($userData['password'])."')";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error to create new user.");
       }       
       $data = array('status'=>'success', 'msg'=>"You have been registered successfully login now.", 'result'=>'');
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
  // Check if user already exist
   public static function checkUserExist($username) {
     try {
       $query = "SELECT username FROM  table_by_clients WHERE username = '".$username."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count>0) {
          throw new exception("Username already exist.");
       }       
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }
 
// Check if username/password is incorrect
   public static function checkUser($username, $password) {
     try {
       $query = "SELECT username FROM table_by_clients WHERE username = '".$username."' and password = '".md5($password)."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count == 0) {
          throw new exception("Username/Password is incorrect.");
       }        
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }
 
  // login function
   public static function login($username, $password) {
     try {
        $check = self::checkUser($username, $password);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "SELECT id FROM table_by_clients WHERE username = '".$username."' AND password = '".md5($password)."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $resultSet = mysqli_fetch_assoc($result);         
       $data = array('status'=>'success','loggedin'=>'true', 'msg'=>"User detail fetched successfully.", 'username'=>"$username", 'result'=>$resultSet);
      }
     } catch (Exception $e) {
       $data = array('status'=>'error','loggedin'=>'false', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
  // Get user information by userid
  public static function getUserById($id) {
     try {
       $query = "SELECT * FROM table_by_clients WHERE id=".$id;
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query");
       }
       $resultSet = mysqli_fetch_assoc($result); 
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"User detail fetched successfully", 'result'=>$resultSet);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
}