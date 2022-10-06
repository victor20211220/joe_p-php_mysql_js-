<?php
include 'db_connection.php';

error_reporting(0);
echo '<html><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
body{background-color:#000000;font-weight: bold;font-size:17px;}
div{margin-top:0px;padding:0px0px;}
.buttons{margin-top:5px;margin-right:20px;margin-left:0px;left;margin-top:0px;}
.button {
    
    border: none;
    color: white;
    padding: 4px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 1px 1px;
  }
  .button1 {border-radius: 16px;background-color: #8cb6ff;}  
  .button2 {border-radius: 16px;background-color: #f77474;}  
</style></head><body>';
$conn = OpenCon();
$sql = 'SELECT * FROM games ORDER BY Time DESC';
$result = $conn -> query($sql);

echo '<div class="buttons"><a id="my-dropdown" href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">MENU</a>
<ul class="dropdown-menu">
    <li><a href="./bovada.php" >BOV</a></li>
    <li><a href="./oddsapiscreen.php?sport=default" >Odds Screen</a></li>
    <li><a href="./oddsapiscreen.php?sport=football" >Football Odds</a></li>
    <li><a href="./oddsapiscreen.php?sport=basketball" >Basketball Odds</a></li>
    <li><a href="./oddsapiscreen.php?sport=baseball" >Baseball Odds</a></li>
    <li><a href="./oddsapiscreen.php?sport=hockey" >Hockey Odds</a></li>
    <li><a href="./oddsapiscreen.php?sport=soccer" >Soccer Odds</a></li>
    <li><a href="./oddsapiscreen.php?sport=fighting" >UFC Odds</a></li>
    <li><a href="./report.php" >Reports</a></li>
    <li><a href="./bet.php" >Bet Tracker</a></li>
</ul>
</div>';
$count = 0;
while($row = $result->fetch_assoc()) {
    
    if($row['result']==0){
        echo '<div style="color:#fff080">';
        echo $row['Team'].'&nbsp;';
        if($row['Odds1']==$row['Odds2']){
            echo $row['Odds2'].'&nbsp;';
        }else{
            echo $row['Odds1'].'&nbsp;&nbsp;'.$row['Odds2'].'&nbsp;';
        }
        echo 'Pending';

        echo '&nbsp;&nbsp;
        <div style="display:inline">
            <button class="button button1" value="'.$row['ID'].',1" onclick="doSomething(this)">Win!</button>
            <button class="button button2" value="'.$row['ID'].',-1"  onclick="doSomething(this)">Lose</button>
        </div>';
    }else if($row['result']==1){
        echo '<div style="color:#8cb6ff">';
        echo $row['Team'].'&nbsp;';
        if($row['Odds1']==$row['Odds2']){
            echo $row['Odds2'].'&nbsp;';
        }else{
            echo $row['Odds1'].'&nbsp;&nbsp;'.$row['Odds2'].'&nbsp;';
        }
        echo 'Win';
    }else{
        echo '<div style="color:#f77474">';
        echo $row['Team'].'&nbsp;';
        if($row['Odds1']==$row['Odds2']){
            echo $row['Odds2'].'&nbsp;';
        }else{
            echo $row['Odds1'].'&nbsp;&nbsp;'.$row['Odds2'].'&nbsp;';
        }
        echo 'Lose';
    }
    echo '</div>';
}

echo '<script>
    function doSomething(a){
        const myArray = a.value.split(",");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:1,sqlid:myArray[0],value:myArray[1]},
        });
        reloadPage();
    }

    function reloadPage(){
        setTimeout(function(){location.reload()}, 500);
    }
</script>';
$html_text = '</body></html>';  
echo $html_text;
?>