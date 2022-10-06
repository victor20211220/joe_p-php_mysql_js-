<?php
include 'db_connection.php';

error_reporting(-1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        body {
            background-color: #000000;
            font-weight: bold;
            font-size: 17px;
        }

        div {
            margin-top: 0px;
            padding: 0px;
        }

        .buttons {
            margin-top: 5px;
            margin-right: 20px;
            margin-left: 0px;
            left;
            margin-top: 0px;
        }

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

        .button1 {
            border-radius: 16px;
            background-color: #8cb6ff;
        }

        .button2 {
            border-radius: 16px;
            background-color: #f77474;
        }
        .tgx {font-weight: bold;border-collapse:collapse;border-spacing:0;color:#FFFFFF;margin-left:0px;margin-right:75px;margin-bottom:30px;}
    .tgx td{font-weight: bold;border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
    overflow:hidden;padding:5px 2px;word-break:normal;}
    .tgx .fig{font-weight: bold;color:#000000;background-color:#fff080;padding-left:10px;}
    .tgx th{font-weight: bold;border-color:red;border-style:solid;border-width:2px;font-family:Arial, sans-serif;font-size:12px;
    font-weight:normal;overflow:hidden;padding:5px 2px;word-break:normal;}
    </style>
</head>
<body>
<?php
$now_time = strtotime(gmdate("d-m-Y H:i:s", time()))-(4*3600);
$now_day = strtotime(date("d-m-Y 00:00:00", $now_time));
$yester_day = strtotime(date("d-m-Y 00:00:00", $now_time-(24*3600)));
$now_week = strtotime("Monday this week");
$last_week = strtotime("Last Monday");
if($now_day<$now_week){
    $now_week = strtotime("Monday last week");
}

?>
<br/>
<table class="tgx">
<tr>
<th class="head">Daily Figure</th>
<th class="head">Pending Bets</th>
<th class="head">Yesterday Figure</th>
<th class="head">Weekly Figure</th>
<th class="head">Last Week Figure</th>
<tr>
<td class="fig" id="df">1</td>
<td class="fig" id="pb"></td>
<td class="fig" id="ysf"></td>
<td class="fig" id="wf"></td>
<td class="fig" id="lwf"></td>
</tr>
</table>
<div class="buttons"><a id="my-dropdown" href="#" class="btn btn-primary dropdown-toggle"
                        data-toggle="dropdown">MENU</a>
    <ul class="dropdown-menu">
        <li><a href="./bovada.php">BOV</a></li>
        <li><a href="./oddsapiscreen.php?sport=default">Odds Screen</a></li>
        <li><a href="./oddsapiscreen.php?sport=football">Football Odds</a></li>
        <li><a href="./oddsapiscreen.php?sport=basketball">Basketball Odds</a></li>
        <li><a href="./oddsapiscreen.php?sport=baseball">Baseball Odds</a></li>
        <li><a href="./oddsapiscreen.php?sport=hockey">Hockey Odds</a></li>
        <li><a href="./oddsapiscreen.php?sport=soccer">Soccer Odds</a></li>
        <li><a href="./oddsapiscreen.php?sport=fighting">UFC Odds</a></li>
        <li><a href="./report.php">Reports</a></li>
        <li><a href="./bet.php">Bet Tracker</a></li>
    </ul>
</div>
<?php
$conn = OpenCon();
$sql = 'SELECT * FROM games ORDER BY Time DESC';
$result = $conn->query($sql);
$count = 0;
while ($row = $result->fetch_assoc()) {

	if ($row['result'] == 0) {
		echo '<div style="color:#fff080">';
		echo $row['Team'] . '&nbsp;';
		if ($row['Odds1'] == $row['Odds2']) {
			echo $row['Odds2'] . '&nbsp;';
		} else {
			echo $row['Odds1'] . '&nbsp;&nbsp;' . $row['Odds2'] . '&nbsp;';
		}
		echo 'Pending';

		echo '&nbsp;&nbsp;
        <div style="display:inline">
            <button class="button button1" value="' . $row['ID'] . ',1" onclick="doSomething(this)">Win!</button>
            <button class="button button2" value="' . $row['ID'] . ',-1"  onclick="doSomething(this)">Lose</button>
        </div>';
	} else if ($row['result'] == 1) {
		echo '<div style="color:#8cb6ff">';
		echo $row['Team'] . '&nbsp;';
		if ($row['Odds1'] == $row['Odds2']) {
			echo $row['Odds2'] . '&nbsp;';
		} else {
			echo $row['Odds1'] . '&nbsp;&nbsp;' . $row['Odds2'] . '&nbsp;';
		}
		echo 'Win';
	} else {
		echo '<div style="color:#f77474">';
		echo $row['Team'] . '&nbsp;';
		if ($row['Odds1'] == $row['Odds2']) {
			echo $row['Odds2'] . '&nbsp;';
		} else {
			echo $row['Odds1'] . '&nbsp;&nbsp;' . $row['Odds2'] . '&nbsp;';
		}
		echo 'Lose';
	}
	echo '</div>';

    echo '<table style="display: none;">';
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
    echo '</table>';
}


    echo '<div class="totalRows" style="display:none;" value='.$count.'></div>';
    echo '<div class="nowDay" style="display:none;" value='.$now_day.'></div>';
    echo '<div class="yesterDay" style="display:none;" value='.$yester_day.'></div>';
    echo '<div class="nowWeek" style="display:none;" value='.$now_week.'></div>';
    echo '<div class="lastWeek" style="display:none;" value='.$last_week.'></div>';
?>
<script>
    function doSomething(a) {
        const myArray = a.value.split(",");
        $.ajax({
            type: "POST",
            url: "database_edit.php",
            data: {code: 1, sqlid: myArray[0], value: myArray[1]},
        });
        reloadPage();
    }

    function reloadPage() {
        setTimeout(function () {
            location.reload()
        }, 500);
    }

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
        var lastWeek = document.getElementsByClassName("lastWeek")[0].getAttribute("value");
        var sumDay = 0;
        var sumPending = 0;
        var sumYesterday = 0;
        var sumWeek = 0;
        var sumLastWeek = 0;
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
            if(data_time > lastWeek && data_time <= week){ // if datetime is between last Monday and This Monday
                sumLastWeek += Number(data_temp);
            }
            if(data_time >= yesterday && data_time < day){
                sumYesterday = sumYesterday + Number(data_temp);
            }
            if(data_time > day){
                sumDay = sumDay + Number(data_temp);
            }
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
        document.getElementById("lwf").innerHTML = "$  "+sumLastWeek.toFixed(2);
        if(sumLastWeek<0){document.getElementById("lwf").style.backgroundColor=redcolor;}else{document.getElementById("lwf").style.backgroundColor=bluecolor;}
    }

    $(document).ready(function() {
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        for (let i=1;i<=table;i++){
            // alert(i);
            loaded(document.getElementsByClassName("select-"+i)[0]);
            loaded2(document.getElementsByClassName("towin-"+i)[0]);
        }
        calcFigure();
    });
</script>
</body>
</html>
