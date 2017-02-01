<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 12/01/17
 * Time: 16:21
 */
class db
{
    private $servername="localhost";
    private $username="root";
    private $pwd="784512";
    private $dbname="large1";
    private $conn;



    public function __construct($servername=0,$username=0,$pwd=0,$dbname=0)
    {
        if ($servername!=0){
            $this->servername=$servername;
            $this->username=$username;
            $this->pwd=$pwd;
            $this->dbname=$dbname;
        }
    }
    private function connect(){
        $this->conn= new mysqli($this->servername,$this->username,$this->pwd,$this->dbname);
        if ($this->conn->connect_error){return false;}

    }
    private function closecon(){
        mysqli_close($this->conn);
    }
    public function select($sql){
        $this->connect();
        $res= mysqli_query($this->conn,$sql);
        $this->closecon();
        return $res;
    }
    public function insUpDel($sql){
            $this->connect();
            $res= mysqli_query($this->conn,$sql);
            $this->closecon();
            return $res;
    }

}