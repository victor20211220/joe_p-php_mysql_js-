<?php
include 'db_connection.php';

$conn = OpenCon();
if(isset($_POST['a'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $now_time = gmdate("Y-m-d H:i:s", time() - (3600*4));
    $sql = "INSERT INTO games (Time, Time_Game, Sport, Category, Team, Odds1, Odds2,sportsbook) VALUES ("."'$now_time','$a','$b','$c','$d','$e','$f','$g'".")";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

}
CloseCon($conn);

?>