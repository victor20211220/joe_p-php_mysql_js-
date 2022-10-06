<?php
include 'db_connection.php';

$conn = OpenCon();
if(isset($_POST['code'])){
    $code = $_POST['code'];
    $sqlid = $_POST['sqlid'];

    $sql = "DELETE from games WHERE ID = ".$sqlid.";";
    if ($conn->query($sql) === TRUE) {
        echo "record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
CloseCon($conn);

?>