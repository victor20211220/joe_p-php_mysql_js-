<?php
include 'db_connection.php';

error_reporting(0);
$html_text = '<html><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
    body{background-color:#d3d6db;margin-top:0px;font-weight: bold;}
    .now {margin-top:20px;margin-bottom:20px;}
    .buttons{margin-right:75px;margin-left:20px;float:right;}

    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        // padding: 16px 16px;
        padding : 8px 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        font-weight: bold;
      }
      .button1 {
        background-color: white; 
        color: black; 
        border: 2px solid #4CAF50;
      }
      
      .button1:hover {
        background-color: #4CAF50;
        color: white;
      }

      .button2{
        margin-top:6px;
        margin-left:5px;
        background-color: white; /* Green */
        color: black; 
        border: 2px solid;
        padding : 4px 4px;
        text-align: center;
        float:right;
        display:content ;
        font-size: 12px;
        transition-duration: 0.4s;
        cursor: pointer;
        font-weight: bold;
        width: 60px;
      }
    
    .tgx {font-weight: bold;border-collapse:collapse;border-spacing:0;color:#FFFFFF;margin-left:0px;margin-right:75px;margin-bottom:30px;}
    .tgx td{font-weight: bold;border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
    overflow:hidden;padding:5px 2px;word-break:normal;}
    .tgx .fig{font-weight: bold;color:#000000;background-color:#fff080;padding-left:10px;}
    .tgx th{font-weight: bold;border-color:red;border-style:solid;border-width:2px;font-family:Arial, sans-serif;font-size:12px;
    font-weight:normal;overflow:hidden;padding:5px 2px;word-break:normal;}

    .tg  {font-weight: bold;border-collapse:collapse;border-spacing:0;color:#FFFFFF;margin-left:0px;margin-right:75px;margin-bottom:20px;}
    .tg td{font-weight: bold;border-color:black;border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:12px;
    overflow:hidden;padding:5px 2px;word-break:normal;}
    .tg th{font-weight: bold;text-align:center;border-color:red;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:5px 2px;word-break:normal;}
    .tg .tg-time{text-align:left;vertical-align:top;font-weight: bold;padding-left:10px;padding-right:5px;}
    .tg .tg-title{text-align:center;vertical-align:top;font-weight: bold;padding-left:5px;padding-right:5px;width:120px;}
    .tg .tg-0lax{text-align:center;vertical-align:top;font-weight: bold;padding-left:5px;padding-right:5px;width:200px;}
    .tg .tg-bookmaker{text-align:center;vertical-align:top;font-weight: bold;width:100px;}
    .tg .tg-val{text-align:center;vertical-align:center;width:60px;color:#000000};
    
</style>
<style>
.input-icon {
    position: relative;
  }
  
  .input-icon > i {
    position: absolute;
    display: block;
    transform: translate(0, -50%);
    top: 50%;
    pointer-events: none;
    width: 25px;
    text-align: center;
      font-style: normal;
  }
  
  .input-icon > input {
    padding-left: 25px;
      padding-right: 0;
  }
  input[type="number"]{
    font-weight: bold;
    color: #000000;
    width: 123px;
    } 
    input[type="number"]:disabled {
        background: #FFFFFF;
      }

  .modal-table td{
    font-weight:bold;
    padding: 5px 5px;
  }
  input{
    font-weight: bold;
  }
  select{
    font-weight: bold;
  }
  option{
    font-weight: bold;
  }
  input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  padding: 10px;
}
  
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
';
echo $html_text;

$now_time = strtotime(gmdate("d-m-Y H:i:s", time()))-(4*3600);
$now_day = strtotime(date("d-m-Y 00:00:00", $now_time));
$yester_day = strtotime(date("d-m-Y 00:00:00", $now_time-(24*3600)));
$now_week = strtotime("Monday this week");
if($now_day<$now_week){
    $now_week = strtotime("Monday last week");
}
$now_month = strtotime(date("1-m-Y 00:00:00", $now_day));
$now_year = strtotime(date("1-1-Y 00:00:00", $now_day));
// echo date("d-m-Y H:i:s",$now_time)."<br>";
// echo date("d-m-Y H:i:s",$now_day)."<br>";
// echo date("d-m-Y H:i:s",$yester_day)."<br>";
// echo date("d-m-Y H:i:s",$now_week)."<br>";
// echo date("d-m-Y H:i:s",$now_month)."<br>";

echo '
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Bet Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="modal-table">
        <tr>
        <td>Live :</td>
        <td><input type="checkbox" class="liveCheckbox" id="live1" name="live1" value="1"></input></td>
        </tr>
        <tr>
        <td>Sportsbook :</td>
        ';
        $result_arr = array('FanDuel','DraftKings','BetOnline.ag','BetMGM','GTbets','Circa Sports','Barstool Sportsbook','Unibet','BetRivers','WynnBET','FOX Bet','William Hill (US)','Pinnacle','Bovada','Intertops');
        echo '<td>'.'<select class="book-entry" style="font-weight: bold;
        color: #000000;">';
        foreach ($result_arr as $book_arr){
            if($book_arr==""){
                echo '<option value="'.$book_arr.'" selected>'.$book_arr.'</option>';
            }else{
                echo '<option value="'.$book_arr.'">'.$book_arr.'</option>';
            }
        }
        echo '</select>'.'</td>';
        echo'<tr>
        <td>Sport : </td>
        <td><select id="sport" name="sport">
            <option values="Baseball">Baseball</option>
            <option values="Basketball">Basketball</option>
            <option values="Football">Football</option>
            <option values="Fighting">Fighting</option>
            <option values="Golf">Golf</option>
            <option values="Hockey">Hockey</option>
            <option values="Soccer">Soccer</option>
            <option values="Tennis">Tennis</option>
        </select></td>
        </tr>
        <tr>
        <td>Category : </td>
        <td><select id="category" name="category">
            <option values="ML">ML</option>
            <option values="Spread">Spread</option>
            <option values="Total">Total</option>
        </select></td>
        </tr>
        <tr>
        <td>Team Name :  </td>
        <td><input type="text" id="team-name"></input></td>
        </tr>
        <tr>
        <td>Spread : </td>
        <td><input type="text" id="odds1"></input></td>
        </tr>
        <tr>
        <td>Juice: </td>
        <td><input type="number" id="odds2"></input></td>
        </tr>
        <td>To Win: </td>
        ';
        $towin_arr = array(5,10,20,50,100,200,300,500,1000);
        echo '<td>'.'<select class="towin-entry" style="font-weight: bold;
        color: #000000;">';
        foreach ($towin_arr as $towin){
            if($towin==20){
                echo '<option value="'.$towin.'" selected>$ '.$towin.'</option>';
            }else{
                echo '<option value="'.$towin.'">$ '.$towin.'</option>';
            }
        }
        echo '</select>'.'</td>';
        echo '</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addEntry()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>';

echo '<div class="buttons"><button class="button button1" data-toggle="modal" data-target="#exampleModalCenter">Add Entry</button>


<a id="my-dropdown" href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">MENU</a>
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
    <li><a href="./history.php" >History</a></li>
</ul>

<br>
<button class="button button2" onclick="nextPage()">Next</button> 
<button class="button button2" onclick="previousPage()">Previous</button> 
</div>';

echo '<script>
      function doButton(){
        window.open("./report.php");
      }
      function doButton1(){
        window.open("./history.php");
      }
      function doButton2(){
        window.open("./bov.php");
      }
      function doButton3(){
        window.open("./oddsapi.php");
      }
      function doButton4(){
        window.open("./oddsapiscreen.php");
      }
      function addEntry(){
        var today= new Date()
        today = today.toLocaleString("en-US", {
            hour12: false,
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
            timeZone: "US/Eastern"
          })
        //08/03/2022, 14:32:52
        var gameInfo = today;

        var sport = document.getElementById("sport").value;
        var category = document.getElementById("category").value;
        var teamName = document.getElementById("team-name").value;
        var odds1 = document.getElementById("odds1").value;
        var odds2 = document.getElementById("odds2").value;
        var towin = document.getElementsByClassName("towin-entry")[0].value;
        var book = document.getElementsByClassName("book-entry")[0].value;
        try{
            var status = document.querySelector(".liveCheckbox:checked").value;
        }catch{
            var status = 0;
        }

        $.ajax({
            type:"POST",
            url:"database_insert_modal.php",
            data:{a:gameInfo,b:sport,c:category,d:teamName,e:odds1,f:odds2,g:towin,h:status,i:book},
            success: function(res){
                reloadPage();
                alert("Bet added!");
            }
        });

        // reloadPage();

      }

      
</script>';
$conn = OpenCon();
$sql = 'SELECT * FROM games ORDER BY Time DESC';
$result = $conn -> query($sql);

echo '<table class="tgx" style="background-color:#242424;">';
echo '<tr>
<th class="head">Daily Figure</th>
<th class="head">Pending Bets</th>
<th class="head">Yesterday Figure</th>
<th class="head">Weekly Figure</th>
<th class="head">Monthly Figure</th>
<th class="head">Year Figure</th>
<th class="head">Lifetime Figure</th></tr>
<tr>
<td class="fig" id="df">1</td>
<td class="fig" id="pb"></td>
<td class="fig" id="ysf"></td>
<td class="fig" id="wf"></td>
<td class="fig" id="mf"></td>
<td class="fig" id="yf"></td>
<td class="fig" id="lf"></td>';

echo '<table class="tg" style="background-color:#242424;">';
echo '<tr>
<th width=3% class="headers">Status</th>
<th width=10% class="headers">Date</th>
<th width=5% class="headers">Time of Bet</th>
<th width=5% class="headers">ID #</th>
<th width=5% class="headers">Sport</th>
<th width=5% class="headers">Category</th>
<th width=10% class="headers">Sub-Category</th>
<th width=20% class="headers">Team</th>
<th width=5% class="headers">Odds</th>
<th width=5% class="headers">F/D</th>
<th width=5% class="headers">Risk</th>
<th width=5% class="headers">To Win</th>
<th width=5% class="headers">W/L Amount</th>
<th width=5% class="headers">Result</th>
<th width=5% class="headers">Sportsbook</th>
<th></th></tr>';
$count = 0;
while($row = $result->fetch_assoc()) {
    $count = $count+1;
    $tempDate = $row['Time'];
    $sqlID = $row['ID'];
    // echo $tempDate;
    $date_timestamp = strtotime($row['Time_Game']);

    $date1=DateTime::createFromFormat('Y-m-d H:i:s', $tempDate)->format("m-d-Y");
    $date2=DateTime::createFromFormat('Y-m-d H:i:s', $tempDate)->format("H:i:s");
    // $newformat = $date->format("Y/m/d");
    
    if($row['status'] == 1){
        echo '<tr class="row-'.$count.'" style="background-color:#fff080;" bet-type='.'live'.' data-time='.$date_timestamp.' sqlid='.$sqlID.' odds='.$row['Odds2'].' odds1='.$row['Odds1'].' cat='.$row['Category'].'>';
        echo '<td class="tg-live-'.$count.'" style="background-color:#cc0000;color:#FFFFFF;text-align:center" value="1" onclick="toggleLive(this)">LIVE</td>';}
    else{
        echo '<tr class="row-'.$count.'" style="background-color:#fff080;" bet-type='.'normal'.' data-time='.$date_timestamp.' sqlid='.$sqlID.' odds='.$row['Odds2'].' odds1='.$row['Odds1'].' cat='.$row['Category'].'>';
        echo '<td class="tg-live-'.$count.'" value="0" onclick="toggleLive(this)"></td>';
    }
    echo '<td class="tg-val">'.$date1.'</td>';
    echo '<td class="tg-val">'.$date2.'</td>';
    echo '<td class="tg-val">'.$sqlID.'</td>';
    echo '<td class="tg-val">'.$row['Sport'].'</td>';
    echo '<td class="tg-val">'.$row['Category'].'</td>';
    //####################################################### Sub-category option
    $subcat_arr = array("SIDE","1st Half","2nd Half","Qtrs","Over","Under","NCAA","CFL","WNBA","ATP","WTA","Futures","Props","Teaser","Parlay");
    echo '<td class="tg-val">'.'<select class="subcat-'.$count.'" onchange="detectChange3(this)" style="font-weight: bold;
    color: #000000;">';
    
    foreach ($subcat_arr as $subcat){
        if($row['notes']==$subcat){
            echo '<option value="'.$subcat.'" selected> '.$subcat.'</option>';
        }else{
            echo '<option value="'.$subcat.'"> '.$subcat.'</option>';
        }
    }
    echo '</select>'.'</td>';
    //#######################################################
    echo '<td class="tg-val">'.$row['Team'].'</td>';
    if($row['Odds1']==$row['Odds2']){
        echo '<td class="tg-val">'.$row['Odds2'].'</td>';
    }else{
        echo '<td class="tg-val">'.$row['Odds1'].'&nbsp;&nbsp;'.$row['Odds2'].'</td>';
    }
    ### FD
    echo '<td class="tg-val" id="fd-'.$count.'"></td>';
    ### Risk
    echo '<td class="tg-val">'.'<div class="input-icon">
    <input type="number" class="risk-'.$count.'" placeholder="0.00" disabled>
    <i>$</i>
    </div>'.'</td>';
//############################################################# To-Win option
    $towin_arr = array(5,10,20,50,100,200,300,500,1000);
    echo '<td class="tg-val">'.'<select class="towin-'.$count.'" onchange="detectChange2(this)" style="font-weight: bold;
    color: #000000;">';
    foreach ($towin_arr as $towin){
        if($row['towin']==$towin){
            echo '<option value="'.$towin.'" selected>$ '.$towin.'</option>';
        }else{
            echo '<option value="'.$towin.'">$ '.$towin.'</option>';
        }
    }
    echo '</select>'.'</td>';
//########################################################################
    
    echo '<td class="tg-val">'.'<div class="input-icon">
    <input type="number" class="wl-'.$count.'" placeholder="0.00" disabled>
    <i>$</i>
    </div>'.'</td>';
//################################################# Status
    $result_arr = array(0,1,-1);
    echo '<td class="tg-val" >'.'<select class="select-'.$count.'" onchange="detectChange(this)" style="font-weight: bold;
    color: #000000;">';
    // foreach ($result_arr as $resulto){
    //     echo $resulto;
    // }
    // try{
        $resultText = '';
        foreach ($result_arr as $resulto){
            $resultText = $resultText.'<option value="'.$resulto.'"';
            if($row['result']==$resulto){
                $resultText = $resultText.' selected>';
            }else{
                $resultText = $resultText.'>';
            }
            // echo $resultText;
            if($resulto==0){
                $resultText = $resultText.'Pending</option>';
            }else if($resulto==1){
                $resultText = $resultText.'Win</option>';
            }else if($resulto==-1){
                $resultText = $resultText.'Lose</option>';
            }
        }
        echo $resultText;
    // }catch (Exception $e){
    //     echo $e->getMessage();
    // }
    echo '</select></td>';

//############################################## Sportsbook
    $result_arr = array('','FanDuel','DraftKings','BetOnline.ag','BetMGM','GTbets','Circa Sports','Barstool Sportsbook','Unibet','BetRivers','WynnBET','FOX Bet','William Hill (US)','Pinnacle','Bovada','Intertops');
    echo '<td class="tg-val" >'.'<select class="book-'.$count.'" onchange="detectChange4(this)" style="font-weight: bold;
    color: #000000;">';
    // foreach ($result_arr as $resulto){
    //     echo $resulto;
    // }
    // try{
        $resultText = '';
        foreach ($result_arr as $resulto){
            $resultText = $resultText.'<option value="'.$resulto.'"';
            if($row['sportsbook']==$resulto){
                $resultText = $resultText.' selected>'.$resulto.'</option>';
            }else{
                $resultText = $resultText.'>'.$resulto.'</option>';
            }
        }
        echo $resultText;
    // }catch (Exception $e){
    //     echo $e->getMessage();
    // }
    echo '</select></td>';

    
    echo '<td class="tg-val"><input type="button" class="del-'.$count.'" value="X" onclick="deleteData(this)"></td>';
    echo '</tr>';
  }
CloseCon($conn);
echo '</table>';
echo '<div class="totalRows" style="display:none;" value='.$count.'></div>';
echo '<div class="nowDay" style="display:none;" value='.$now_day.'></div>';
echo '<div class="yesterDay" style="display:none;" value='.$yester_day.'></div>';
echo '<div class="nowWeek" style="display:none;" value='.$now_week.'></div>';
echo '<div class="nowMonth" style="display:none;" value='.$now_month.'></div>';
echo '<div class="nowYear" style="display:none;" value='.$now_year.'></div>';
$html_text = '<script>
    let curPage = 1;
    let pageSize = 50;
    function previousPage() {
        if(curPage > 1) curPage--;
        renderTable();
    }
    function nextPage() {
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        if((curPage * pageSize) < table) curPage++;
        renderTable();
    }
    function renderTable(){
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        for(let i=1;i<=table;i++){
            document.getElementsByClassName("row-"+i)[0].style.visibility="collapse";
        }
        if(curPage==1){
            for(let i=1;i<50;i++){
                document.getElementsByClassName("row-"+i)[0].style.visibility="visible";
            }
        
        }else{
            for(let i=(curPage-1)*pageSize;i<=(curPage)*pageSize;i++){
                try{
                    document.getElementsByClassName("row-"+i)[0].style.visibility="visible";}
                catch{continue;}
            }
        }
    }
    function reloadPage(){
        setTimeout(function(){location.reload()}, 1000);
    }

    function toggleLive(a){
        var className = a.getAttribute("class");
        var curVal = document.getElementsByClassName(className)[0].getAttribute("value");

        var idx = className.replace("tg-live-","");
        var target = "row-"+idx;
        var targetVal = 0;
        if(curVal==0){
            document.getElementsByClassName(className)[0].innerHTML= "LIVE";
            document.getElementsByClassName(className)[0].style="background-color:#cc0000;color:#FFFFFF;text-align:center;";
            document.getElementsByClassName(className)[0].setAttribute("value","1");
            targetVal = 1;
        }else{
            document.getElementsByClassName(className)[0].innerHTML= "";
            document.getElementsByClassName(className)[0].style="";
            document.getElementsByClassName(className)[0].setAttribute("value","0");
            targetVal = 0;
        }

        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:4,sqlid:sqlid,value:targetVal},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });
    }
    function detectChange(a)
    {
        var className = a.getAttribute("class");
        var idx = className.replace("select-","");
        var target = "row-"+idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");
        if(selected==0){
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("wl-"+idx)[0].value = Number(0).toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#fff080";
        }else if(selected==1){
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#8cb6ff";
            var towin = Number(document.getElementsByClassName("towin-"+idx)[0].value);
            document.getElementsByClassName("wl-"+idx)[0].value = towin.toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#8cb6ff";
        }else{
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#f77474";
            var risk = Number(document.getElementsByClassName("risk-"+idx)[0].value);
            document.getElementsByClassName("wl-"+idx)[0].value = (-1*risk).toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#f77474";
        }

        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:1,sqlid:sqlid,value:selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });

        calcFigure();
    }

    function detectChange2(a)
    {
        var className = a.getAttribute("class");
        var idx = className.replace("towin-","");
        var selected = a.options[a.selectedIndex].getAttribute("value");
        var odds = Number(document.getElementsByClassName("row-"+idx)[0].getAttribute("odds"));
        var towin = Number(selected);
        if (odds > 0) { Amount = (towin / ((odds) * (.01))); var CalcA = Amount.toFixed(2); }
        else if (odds < 0) { Amount = ((towin) * ((odds) * (-.01))); var CalcA = Amount.toFixed(2); }
        
        document.getElementsByClassName("risk-"+idx)[0].value = CalcA;
        var result = document.getElementsByClassName("select-"+idx)[0];
        var result_selected = result.options[result.selectedIndex].getAttribute("value");
        
        if(result_selected == 1){
            document.getElementsByClassName("wl-"+idx)[0].value = towin.toFixed(2);
        }else if(result_selected == -1){
            document.getElementsByClassName("wl-"+idx)[0].value = (-1*CalcA).toFixed(2);
        }

        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:2,sqlid:sqlid,value:selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });
        
        calcFigure();
    }
    
    function loaded(a){
        var className = a.getAttribute("class");
        var idx = className.replace("select-","");
        var target = "row-"+idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");
        if(selected==0){
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("wl-"+idx)[0].value = Number(0).toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#fff080";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#fff080";
        }else if(selected==1){
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#8cb6ff";
            var towin = Number(document.getElementsByClassName("towin-"+idx)[0].value);
            document.getElementsByClassName("wl-"+idx)[0].value = towin.toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#8cb6ff";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#8cb6ff";
        }else{
            document.getElementsByClassName(target)[0].style.backgroundColor  = "#f77474";
            var risk = Number(document.getElementsByClassName("risk-"+idx)[0].value);
            document.getElementsByClassName("wl-"+idx)[0].value = (-1*risk).toFixed(2);
            document.getElementsByClassName("subcat-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("risk-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("towin-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("select-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("book-"+idx)[0].style.backgroundColor  = "#f77474";
            document.getElementsByClassName("wl-"+idx)[0].style.backgroundColor  = "#f77474";
        }
    }
    function loaded2(a){
        var className = a.getAttribute("class");
        var idx = className.replace("towin-","");
        var selected = a.options[a.selectedIndex].getAttribute("value");
        var odds = Number(document.getElementsByClassName("row-"+idx)[0].getAttribute("odds"));
        var towin = Number(selected);
        if (odds > 0) { Amount = (towin / ((odds) * (.01))); var CalcA = Amount.toFixed(2); }
        else if (odds < 0) { Amount = ((towin) * ((odds) * (-.01))); var CalcA = Amount.toFixed(2); }
        
        document.getElementsByClassName("risk-"+idx)[0].value = CalcA;
        var result = document.getElementsByClassName("select-"+idx)[0];
        var result_selected = result.options[result.selectedIndex].getAttribute("value");
        
        if(result_selected == 1){
            document.getElementsByClassName("wl-"+idx)[0].value = towin.toFixed(2);
        }else if(result_selected == -1){
            document.getElementsByClassName("wl-"+idx)[0].value = (-1*CalcA).toFixed(2);
        }
        try{
            var cat = document.getElementsByClassName("row-"+idx)[0].getAttribute("cat");
            var odds1 = Number(document.getElementsByClassName("row-"+idx)[0].getAttribute("odds1"));
            if(cat=="ML"){
                if(odds<0){
                    document.getElementById("fd-"+idx).innerHTML = "F";
                }else{
                    document.getElementById("fd-"+idx).innerHTML= "D";
                }
            }else if(cat=="Spread"){
                if(odds1<0){
                    document.getElementById("fd-"+idx).innerHTML = "F";
                }else{
                    document.getElementById("fd-"+idx).innerHTML = "D";
                }
            }
        }
        catch(err){
            console.log(err);
        }
    }
    
    function detectChange3(a){
        var className = a.getAttribute("class");
        var idx = className.replace("subcat-","");
        var target = "row-"+idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");

        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:3,sqlid:sqlid,value:selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });
    }
    function detectChange4(a){
        var className = a.getAttribute("class");
        var idx = className.replace("book-","");
        var target = "row-"+idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");

        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_edit.php",
            data:{code:5,sqlid:sqlid,value:selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });
    }

    function deleteData(a){
        var className = a.getAttribute("class");
        var idx = className.replace("del-","");
        var sqlid = document.getElementsByClassName("row-"+idx)[0].getAttribute("sqlid");
        $.ajax({
            type:"POST",
            url:"database_delete.php",
            data:{code:"x",sqlid:sqlid},
        });
        reloadPage();
    }

    function calcFigure(){
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        var day = document.getElementsByClassName("nowDay")[0].getAttribute("value");
        var yesterday = document.getElementsByClassName("yesterDay")[0].getAttribute("value");
        var week = document.getElementsByClassName("nowWeek")[0].getAttribute("value");
        var month = document.getElementsByClassName("nowMonth")[0].getAttribute("value");
        var year = document.getElementsByClassName("nowYear")[0].getAttribute("value");
        var sumDay = 0;
        var sumPending = 0;
        var sumYesterday = 0;
        var sumWeek = 0;
        var sumMonth = 0;
        var sumYear = 0;
        var sumAll = 0;
        for (let i=1;i<=table;i++){
            var data_time = document.getElementsByClassName("row-"+i)[0].getAttribute("data-time");
            var data_temp = document.getElementsByClassName("wl-"+i)[0].value;
            if(Number(data_temp)==0){
                var data_temp2 = document.getElementsByClassName("risk-"+i)[0].value;
                sumPending = sumPending + Number(data_temp2);
            }
            if(data_time > week){
                sumWeek = sumWeek + Number(data_temp);
            }
            if(data_time >= yesterday && data_time < day){
                sumYesterday = sumYesterday + Number(data_temp);
            }
            if(data_time > day){
                sumDay = sumDay + Number(data_temp);
            }
            if(data_time > month){
                sumMonth = sumMonth + Number(data_temp);
            }
            if(data_time > year){
                sumYear = sumYear + Number(data_temp);
            }
            sumAll = sumAll + Number(data_temp);
            // break;
        }
        var redcolor="#f77474";
        var bluecolor="#8cb6ff";
        document.getElementById("df").innerHTML = "$  "+sumDay.toFixed(2);
        if(sumDay<0){document.getElementById("df").style.backgroundColor=redcolor;}else{document.getElementById("df").style.backgroundColor=bluecolor;}
        document.getElementById("pb").innerHTML = "$  "+sumPending.toFixed(2);
        // if(sumPending<0){document.getElementById("pb").style.backgroundColor=redcolor;}else{document.getElementById("pb").style.backgroundColor=bluecolor;}
        document.getElementById("ysf").innerHTML = "$  "+sumYesterday.toFixed(2);
        if(sumYesterday<0){document.getElementById("ysf").style.backgroundColor=redcolor;}else{document.getElementById("ysf").style.backgroundColor=bluecolor;}
        document.getElementById("wf").innerHTML = "$  "+sumWeek.toFixed(2);
        if(sumWeek<0){document.getElementById("wf").style.backgroundColor=redcolor;}else{document.getElementById("wf").style.backgroundColor=bluecolor;}
        document.getElementById("mf").innerHTML = "$  "+sumMonth.toFixed(2);
        if(sumMonth<0){document.getElementById("mf").style.backgroundColor=redcolor;}else{document.getElementById("mf").style.backgroundColor=bluecolor;}
        document.getElementById("yf").innerHTML = "$  "+sumYear.toFixed(2);
        if(sumYear<0){document.getElementById("yf").style.backgroundColor=redcolor;}else{document.getElementById("yf").style.backgroundColor=bluecolor;}
        document.getElementById("lf").innerHTML = "$  "+sumAll.toFixed(2);
        if(sumAll<0){document.getElementById("lf").style.backgroundColor=redcolor;}else{document.getElementById("lf").style.backgroundColor=bluecolor;}
    }

    $(document).ready(function() {
        
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        for (let i=1;i<=table;i++){
            // alert(i);
            loaded(document.getElementsByClassName("select-"+i)[0]);
            loaded2(document.getElementsByClassName("towin-"+i)[0]);
        }
        calcFigure();
        renderTable();
    });
</script>';
echo $html_text;
$html_text = '</body></html>';
echo $html_text;
?>