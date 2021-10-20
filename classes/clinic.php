<?php
require_once('config.php');

class Clinic extends Dbconfig
{
    private $table = 'clinics';
    private $dbConnect = false;

    public function __construct()
    {
        parent::__construct();
        if (!$this->dbConnect) {
            $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
            if ($conn->connect_error) {
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }
    public function listClinics()
    {
        $sqlQuery = "SELECT s.id, s.name, s.address, s.is_active ,s.phone,s.is_full_time,s.created_at,s.updated_at
			FROM " . $this->table . " as s ";
        if (!empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY s.id DESC ';
        }
        if ($_POST["length"] != -1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $numRows = mysqli_num_rows($result);
        $clinicData = array();
        while ($clinic = mysqli_fetch_assoc($result)) {
            $clinicRows = array();
            $clinicRows[] = $clinic['id'];
            $clinicRows[] = $clinic['name'];
            $clinicRows[] = $clinic['address'];
            if ($clinic['is_active'] == 1) {
                $clinicRows[] = "فعال";
            } else {
                $clinicRows[] = "غیر فعال";
            }
            $clinicRows[] = $clinic['phone'];
            $clinicRows[] = $clinic['is_full_time'];
            $clinicRows[] = $clinic['created_at'];
            $clinicRows[] = $clinic['updated_at'];
            $clinicRows[] = '<button type="button" name="update" id="' . $clinic["id"] . '" class="btn btn-warning btn-xs update">ویرایش</button>';
            $clinicRows[] = '<button type="button" name="delete" id="' . $clinic["id"] . '" class="btn btn-danger btn-xs delete" >حذف</button>';
            if($clinic['is_active']==1){
                $clinicRows[] = '<button type="button" name="activestatus" id="' . $clinic["id"] . '" class="btn btn-danger btn-xs activestatus" >غیر فعال کن</button>';
            }else{
                $clinicRows[] = '<button type="button" name="activestatus" id="' . $clinic["id"] . '" class="btn btn-success btn-xs activestatus" >فعال کن</button>';
            }
            $clinicData[] = $clinicRows;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $numRows,
            "recordsFiltered" => $numRows,
            "data" => $clinicData
        );
        echo json_encode($output);
    }

    public function addclinic()
    {
        if ($_POST["username"] != "" && $_POST["password"] != "") {
            $insertQuery = "INSERT INTO " . $this->table . "(username,password,email) 
				VALUES ('" . $_POST["username"] . "',md5('" . $_POST["password"] . "'),'" . $_POST["email"] . "') ";
            $userSaved = mysqli_query($this->dbConnect, $insertQuery);
        }
    }

    public function getclinicDetails()
    {
        $sqlQuery = "SELECT s.id, s.username, s.email, s.is_active 
			FROM " . $this->table . " as s ";
        $sqlQuery .= "WHERE s.id = '" . $_POST["clinicid"] . "' ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo json_encode($row);
    }

    public function updateclinic()
    {
        if ($_POST['clinicid']) {
            $updateQuery = "UPDATE " . $this->table . " 
			SET username = '" . $_POST["username"] . "', email = '" . $_POST["email"] . "', password = md5('" . $_POST["password"] . "')
			WHERE id ='" . $_POST["clinicid"] . "'";
            echo $updateQuery;
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }

    public function deleteclinic()
    {
        if ($_POST["clinicid"]) {
            $sqlUpdate = "
				DELETE FROM " . $this->table . "
				WHERE id = '" . $_POST["clinicid"] . "'";
            mysqli_query($this->dbConnect, $sqlUpdate);
        }
    }

    public function statusUpdate()
    {
        if ($_POST['clinicid']) {
            $updateQuery = "UPDATE " . $this->table . " 
			SET is_active= IF(is_active=1, 0, 1) WHERE id = '".$_POST["clinicid"]."'";
            echo $updateQuery;
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }




}
?>