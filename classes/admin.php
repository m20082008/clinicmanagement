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
    public function listAdmins(){
        $sqlQuery = "SELECT s.id, s.username, s.password, s.email, s.is_active 
			FROM ".$this->adminTable." as s ";
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY s.id DESC ';
        }
        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $numRows = mysqli_num_rows($result);
        $adminData = array();
        while( $admin = mysqli_fetch_assoc($result) ) {
            $adminRows = array();
            $adminRows[] = $admin['id'];
            $adminRows[] = $admin['username'];
            $adminRows[] = $admin['password'];
            $adminRows[] = $admin['email'];
            if($admin['is_active']==1){
                $adminRows[]="فعال";
            }else{
                $adminRows[]="غیر فعال";
            }
            $adminRows[] = '<button type="button" name="update" id="'.$admin["id"].'" class="btn btn-warning btn-xs update">ویرایش</button>';
            $adminRows[] = '<button type="button" name="delete" id="'.$admin["id"].'" class="btn btn-danger btn-xs delete" >حذف</button>';
            $adminRows[] = '<button type="button" name="activestatus" id="'.$admin["id"].'" class="btn btn-danger btn-xs active" >غیر فعال</button>';
            $adminData[] = $adminRows;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"  	=>  $numRows,
            "recordsFiltered" 	=> 	$numRows,
            "data"    			=> 	$adminData
        );
        echo json_encode($output);
    }



}
?>