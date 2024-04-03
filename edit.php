<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myclient";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$names = "";
$email = "";
$username = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: show the data of the client
    if (!isset($_GET["id"])) {
        header("location: /revision/index.php");
        exit;
    }
    $id = $_GET["id"];

    // Read the row of the selected client from the database
    $sql = "SELECT * FROM client WHERE id=$id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $names = $row["names"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
    } else {
        header("location: /revision/index.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST method: update the data of the client
    $id = $_POST["id"];
    $names = $_POST["names"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($id) || empty($email) || empty($username) || empty($password)) {
        $errorMessage = "All fields are required";
    } else {
        $sql = "UPDATE client SET names='$names', email='$email', username='$username', password='$password' WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
          header("location: /revision/view.php");
        } else {
            $errorMessage = "Error updating record: " . $connection->error;
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Myclient</title>
  <link rel="stylesheet" href="style.css	">
</head>
<body>
<center>
  <div>
  <h1>CLIENT FORM</h1>
  </div>
 <form  method="POST">
 <input type="hidden" name="id" value="<?php echo $id ?>">
<div>
<label for="">Names</label>
<div>
<input class="names" type="text" name="names" value ="<?php echo $names ?>" placeholder="Enter Names"> <br><br>
</div>
</div>
<div>
<label for="">Email</label>
<div>
<input class="names" type="text" name="email" value ="<?php echo $email ?>" placeholder="Enter Email"> <br><br>
</div>
</div>
<div>
<label for="">Username</label>
<div>
<input class="names" type="text" name="username" value ="<?php echo $username ?>" placeholder="Enter Username"> <br><br>
</div>
</div>
<div>
<label for="">Password</label>
<div>
<input class="names" type="text" name="password" value ="<?php echo $password ?>" placeholder="Enter Password"> <br><br>
</div>
</div>
<div>

<input class="submit" type="submit"  value ="Update"> 
<input class="submit"  type="reset"  value ="Cancel"> 


</div>
 </form>
 </center> 
</body>
</html>