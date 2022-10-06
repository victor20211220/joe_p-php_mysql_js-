<?php
include 'db_connection.php';

$conn = OpenCon();
if(isset($_POST['code'])){
    $code = $_POST['code'];
    $sqlid = $_POST['sqlid'];
    $value = $_POST['value'];

    if($code==1){
        $sql = "UPDATE games SET result = ".$value." WHERE ID = ".$sqlid.";";
        if ($conn->query($sql) === TRUE) {
            echo "record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else if($code==2){
        $sql = "UPDATE games SET towin = ".$value." WHERE ID = ".$sqlid.";";
        if ($conn->query($sql) === TRUE) {
            echo "record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else if($code==3){
        $sql = "UPDATE games SET notes = '".$value."' WHERE ID = ".$sqlid.";";
        if ($conn->query($sql) === TRUE) {
            echo "record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else if($code==4){
        $sql = "UPDATE games SET status = '".$value."' WHERE ID = ".$sqlid.";";
        if ($conn->query($sql) === TRUE) {
            echo "record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else if($code==5){
        $sql = "UPDATE games SET sportsbook = '".$value."' WHERE ID = ".$sqlid.";";
        if ($conn->query($sql) === TRUE) {
            echo "record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
CloseCon($conn);

?>