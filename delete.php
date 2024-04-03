<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myclient";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare and execute SQL statement to delete data
    $sql = "DELETE FROM client WHERE id = $id";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    $connection->close();
}

header("location: /revision/view.php");
exit;
?>