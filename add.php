<?php
$server ="localhost";
$username="root";
$password="";
$database="myclient";

$connection = new mysqli($server,$username,$password,$database);
if($connection->connect_error) {
  die("connection failed" . $connection->connect_error);
}

$names="";
$email="";
$username="";
$password="";
$errorMessage="";
$successMessage="";
if ($_SERVER['REQUEST_METHOD'] =='POST') {
  $names=$_POST["names"];
  $email=$_POST["email"];
  $username=$_POST["username"];
  $password=$_POST["password"];
  if (empty($names) || empty($email) || empty($username) || empty($password)) {
    $errorMessage = "All fields are required";
}
else{
  $sql="INSERT INTO client(names, email, username,password)" . "VALUES('$names','$email','$username','$password')";
  $result = $connection->query($sql);
}
if (!$result) {
$errorMessage="Invalid query" . $connection->error;
 
} else{
 echo "Client added correctly";
 header("location: /revision/view.php");
exit;
}
 
}

?>




