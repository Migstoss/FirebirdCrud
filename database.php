<?php
class Database{
  private $conn;
  private $host = 'www.ctdsas.com/gds_db:/var/www/html/innpulsasmi/bd/11111.fdb';
  private $username = "SYSDBA";
  private $pass = "C7d5452014";

  function __construct()
  {
    $this->connectbd();
  }

  public function connectbd(){
    $this->conn = ibase_connect($this->host, $this->username, $this->pass);
    if (!$this->conn){
      die("Error al conectar ". ibase_errmsg() . ibase_errcode());
    }
  }

  public function create($nombre, $apellido){
    $query = "INSERT INTO TABLAPRUEBA1(NOMBRE, APELLIDO) VALUES('$nombre', '$apellido')";
    $res = ibase_query($this->conn, $query);
    if ($res){
      return true;
    }else{
      return false;
    }
  }
  
  public function read(){
    $query = "SELECT * FROM TABLAPRUEBA1";
    $res = ibase_query($this->conn, $query);
    return $res;
  }
  
  public function search($id){
    $query = "SELECT * FROM TABLAPRUEBA1 WHERE ID = $id";
    $res = ibase_query($this->conn, $query);
    return $res;
  }
}