<?php
include 'db_connection.php';

$conn = OpenCon();
if(isset($_POST['a'])){
    $a = $_POST['a'];
    $a = DateTime::createFromFormat('m/d/Y, H:i:s', $a)->format("Y-m-d H:i:s");
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    $i = $_POST['i'];

    if($c=="ML"){
      $e = $f;
    }
    $sql = "INSERT INTO games (Time, Time_Game, Sport, Category, Team, Odds1, Odds2,towin,status,sportsbook) VALUES ("."'$a','$a','$b','$c','$d','$e','$f','$g','$h','$i'".")";
    // echo $x;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

}
CloseCon($conn);

?>