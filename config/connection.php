<?php
error_reporting(0);
@session_start();
date_default_timezone_set("Asia/Kolkata");
require_once("config.php");

class Connection 
{ 
 // public $host     = "siquesvib.db.10691417.hostedresource.com";
 // public $username = "siquesvib"; 
 // public $password = "Siq#!123V"; 
 // public $database = "siquesvib"; 
 // public $conId    = 0;  
 // public $queryId  = 0;  
 // public $record   = array();  
 // public $row;          
 // public $errNo    = 0; 
 // public $error    = "";
 public $host     = "localhost";
 public $username = "root"; 
 public $password = ""; 
 public $database = "siques"; 
 public $conId    = 0;  
 public $queryId  = 0;  
 public $record   = array();  
 public $row;          
 public $errNo    = 0; 
 public $error    = "";  
    
 //call connection method upon constructing 
 public function __construct(){
  $this->createConnection(); 
 }
 
 //connection to the database
 public function createConnection() 
    { 
        if( 0 == $this->conId ) 
            $this->conId=mysql_connect( $this->host, $this->username, $this->password ); 
        if( !$this->conId ) 
   $this->stopExec( "Trying to connect.... Result: failed" ); 
        if( !mysql_query( sprintf( "use %s", $this->database ), $this->conId ) )   //need to check
            $this->stopExec( "cannot use database ".$this->database ); 
 } 

 //execute query string 
 public function query($queryString) 
    { 
  $this->queryId = mysql_query( $queryString, $this->conId ); 
        $this->row = 0; 
        $this->errNo = mysql_errno(); 
        $this->error = mysql_error(); 
        if(!$this->queryId ) 
   $this->stopExec( "Invalid SQL String: ".$queryString ); 
  return $this->queryId; // return the resource id of query. You can either then call fetchRecord method. 
    } 
 
 public function fetchRecord($type = 1)
 { 
  //1 --> for array
  //2 --> for object
  if($type == 1){
   $record = mysql_fetch_array($this->queryId); //return array
  }else{
   $record = mysql_fetch_object($this->queryId); //return object
  }
  
  return $record;
 }
 //stop the execution of query when there's an error
 public function stopExec( $msg ) 
 { 
  printf( "Database error: %s <br>n", $msg ); 
  printf( "MySQL Error: %s (%s)<br>n", $this->errNo, $this->error ); 
 } 
 
 //get the number of row
 public function numRows() 
 { 
  return mysql_num_rows( $this->queryId ); 
 }          
}
define("Site_Url","http://vibescomm.in/wip_projects/development/siqes/"); 
define("From_Site","SIQES");
define("From_Name","SIQES Team");
define("Contact"," +91 120 4782000, +91 120 4782030");
define("From_Email","info@siqes.in");
define("Admin_EmailId","niraj.kumar@vibescom.in");
?>