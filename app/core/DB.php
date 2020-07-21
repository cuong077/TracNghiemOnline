<?php

class DB{

  public $con;
  protected $servername = "139.180.214.242:3306";
  protected $username = "demo";
  protected $password = "@@123456789";
  protected $dbname = "tracnghiemonline";

  function __construct(){
    $this->con = mysqli_connect($this->servername, $this->username, $this->password);
    mysqli_select_db($this->con, $this->dbname);
    mysqli_query($this->con, "SET NAMES 'utf8'");
    // echo $this->con->connect_error;
  }
}

?>
