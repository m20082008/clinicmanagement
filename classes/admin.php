<?php
session_start();
require('config.php');
class Admin extends Dbconfig {
    private $adminTable = 'admins';
    private $dbConnect = false;
    public function __construct(){
        parent::__construct();
        if(!$this->dbConnect){
            $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
    public function adminLogin(){
        $errorMessage = '';
        if(!empty($_POST["login"]) && $_POST["username"]!=''&& $_POST["password"]!='') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sqlQuery = "SELECT * FROM ".$this->adminTable." 
				WHERE username='".$username."' AND password='".md5($password)."' AND is_active = 1";
            $resultSet = mysqli_query($this->dbConnect, $sqlQuery) or die("error".mysql_error());
            $isValidLogin = mysqli_num_rows($resultSet);
            if($isValidLogin){
                $userDetails = mysqli_fetch_assoc($resultSet);
                $_SESSION["adminUserid"] = $userDetails['id'];
                $_SESSION["admin"] = $userDetails['username'];
                header("location: dashboard.php");
            } else {
                $errorMessage = "رمز یا نام کاربری اشتباه است!";
            }
        } else if(!empty($_POST["login"])){
            $errorMessage = "نام کاربری و رمز را وارد کنید.";
        }
        return $errorMessage;
    }
    public function adminLoginStatus (){
        if(empty($_SESSION["adminUserid"])) {
            header("Location: index.php");
        }
    }

}
?>