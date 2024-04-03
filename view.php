<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My client</title>
</head>
<body>
 <center>
<h2>LIST OF TABLE CLIENT IN DATABASE</h2>
<Table border="1">
  <thead>
    <tr>
    <th>ID</th>
          <th>Names</th>
          <th>Email</th>
          <th>Username</th>
          <th>Pasword</th>
          <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $server ="localhost";
    $username="root";
    $password="";
    $database="myclient";
    
    $connection = new mysqli($server,$username,$password,$database);
    if($connection->connect_error) {
      die("connection failed" . $connection->connect_error);
    }
     
    $sql = "SELECT * FROM client";
    $result = $connection->query($sql);
    if (!$result) {
      die("invalid query:" . $connection->error);
    }
    while ($row = $result->fetch_assoc()) {
      echo "
        <tr>
          <td>{$row['id']}</td>
          <td>{$row['names']}</td> 
          <td>{$row['email']}</td>
          <td>{$row['username']}</td>
          <td>{$row['password']}</td>
          <td>
          <a  href='/revision/index.php'>Add</a>
            <a  href='/revision/edit.php?id={$row['id']}'>Edit</a>
            <a  href='/revision/delete.php?id={$row['id']}'>Delete</a>
          </td>
        </tr>
      ";
    }
    ?>
  </tbody>
</Table>



 </center> 
</body>
</html>