<?php
include 'db_connection.php';

error_reporting(0);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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

    <style type="text/css">
        body {
            background-color: #d3d6db;
            margin-top: 0px;
            font-weight: bold;
        }

        .buttons {
            margin-top: 5px;
            margin-right: 50px;
            margin-left: 20px;
            float: right;
            margin-top: initial;
        }

        .now {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .myForm {
            font-weight: bold;
            margin-left: 0px;
        }

        .tgx {
            font-weight: bold;
            border-collapse: collapse;
            border-spacing: 0;
            margin-left: 0px;
            color: #FFFFFF;
            margin-left: 0px;
            margin-right: 75px;
            margin-bottom: 30px;
        }

        .tgx td {
            font-weight: bold;
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 5px 2px;
            word-break: normal;
        }

        .tgx .fig {
            font-weight: bold;
            color: #000000;
            background-color: #FFFFFF;
            padding-left: 20px;
            padding-right: 12px;
        }

        .tgx th {
            font-weight: bold;
            border-color: red;
            border-style: solid;
            border-width: 2px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 5px 40px;
            word-break: normal;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            margin-left: 20px;
            color: #FFFFFF;
            margin-left: 20px;
            margin-right: 75px;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 0px;
            font-family: Arial, sans-serif;
            font-size: 12px;
            overflow: hidden;
            padding: 5px 5px;
            word-break: normal;
        }

        /
        /
        .tg .tg-val:hover {
            background-color: #fca903;
            color: black;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 0px;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-weight: normal;
            overflow: hidden;
            padding: 5px 2px;
            word-break: normal;
        }

        .tg .tg-time {
            text-align: left;
            vertical-align: top;
            font-weight: bold;
            padding-left: 10px;
            padding-right: 5px;
        }

        .tg .tg-title {
            text-align: center;
            vertical-align: top;
            font-weight: bold;
            padding-left: 5px;
            padding-right: 5px;
            width: 120px;
        }

        .tg .tg-0lax {
            text-align: center;
            vertical-align: top;
            font-weight: bold;
            padding-left: 5px;
            padding-right: 5px;
            width: 200px;
        }

        .tg .tg-bookmaker {
            text-align: center;
            vertical-align: top;
            font-weight: bold;
            width: 100px;
        }

        .tg .tg-val {
            text-align: center;
            vertical-align: center;
            width: 60px;
            color: #000000
        }

        ;


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

        input[type="number"] {
            width: 123px;
        }

        input[type="number"]:disabled {
            background: #FFFFFF;
        }

        .myForm input[type="checkbox" i] {
            margin-left: 10px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php

$now_time = strtotime(gmdate("d-m-Y H:i:s", time())) - (4 * 3600);
$now_day = strtotime(date("d-m-Y 00:00:00", $now_time));
$now_week = strtotime("Monday this week");
if ($now_day < $now_week) {
	$now_week = strtotime("Monday last week");
}
$now_month = strtotime(date("1-m-Y 00:00:00", $now_day));
$now_year = strtotime(date("1-1-Y 00:00:00", $now_day));

$month6_time = strtotime(gmdate("d-m-Y H:i:s", strtotime("-6 months"))) - (4 * 3600);
$now_6month = strtotime(date("d-m-Y 00:00:00", $month6_time));
// echo date("d-m-Y H:i:s",$month6_day)."<br>";
// echo date("d-m-Y H:i:s",$now_time)."<br>";
// echo date("d-m-Y H:i:s",$now_week)."<br>";
// echo date("d-m-Y H:i:s",$now_month)."<br>";

$conn = OpenCon();
?>
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
        <li><a href="./history.php">History</a></li>
        <li><a href="./bet.php">Bet Tracker</a></li>
    </ul>
</div>
<form class="myForm" name="myForm"><label> Group#1 : </label>
    <input type="radio" name="myRadios" value="1" onchange="showReport(this)" checked>All</input>
    <input type="radio" name="myRadios" value="2" onchange="showReport(this)">Live Only</input>
    <input type="radio" name="myRadios" value="3" onchange="showReport(this)">Non Live</input>
</form>
<form class="myForm" name="myForm2"><label> Group#2 : </label>
    <input type="radio" name="myRadios2" value="" onchange="showReport(this)" checked>All</input>
    <input type="radio" name="myRadios2" value="ML" onchange="showReport(this)">ML</input>
    <input type="radio" name="myRadios2" value="Spread" onchange="showReport(this)">Spread</input>
    <input type="radio" name="myRadios2" value="Total" onchange="showReport(this)">Total</input>
    <input type="radio" name="myRadios2" value="F" onchange="showReport(this)">Favorite</input>
    <input type="radio" name="myRadios2" value="D" onchange="showReport(this)">Dog</input>
</form>
<form class="myForm" name="myForm3"><label> Group#3 : </label>
	<?php

	$subcat_arr = array("SIDE", "1st Half", "2nd Half", "Qtrs", "Over", "Under", "NCAA", "CFL", "WNBA", "ATP", "WTA", "Futures", "Props", "Teaser", "Parlay");
	foreach ($subcat_arr as $subcat) {
		if ($subcat == "") {
			echo '<input type="checkbox" name="myRadios3"  value=""  onchange="showReport(this)" checked>Blank</input>';
		} else {
			echo '<input type="checkbox" name="myRadios3"  value=' . $subcat . '  onchange="showReport(this)" checked>' . $subcat . '</input>';
		}
	}
	?>
</form>
<?php

$sql = 'SELECT * FROM games ORDER BY Time DESC';
$result = $conn->query($sql);


?>
<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Profit/Loss Report</th>
        <th class="head">Daily $</th>
        <th class="head">ROI</th>
        <th class="head">Weekly $</th>
        <th class="head">ROI</th>
        <th class="head">Monthly $</th>
        <th class="head">ROI</th>
        <th class="head">6-Month $</th>
        <th class="head">ROI</th>
        <th class="head">Year to Date</th>
        <th class="head">ROI</th>
        <th class="head">All Time</th>
        <th class="head">ROI</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="fig">Tennis</td>
        <td class="fig" id="pldt"></td>
        <td class="fig" id="pldrt"></td>
        <td class="fig" id="plwt"></td>
        <td class="fig" id="plwrt"></td>
        <td class="fig" id="plmt"></td>
        <td class="fig" id="plmrt"></td>
        <td class="fig" id="pl6mt"></td>
        <td class="fig" id="pl6mrt"></td>
        <td class="fig" id="plyt"></td>
        <td class="fig" id="plyrt"></td>
        <td class="fig" id="plat"></td>
        <td class="fig" id="plart"></td>
    </tr>
    <tr>
        <td class="fig">Baseball</td>
        <td class="fig" id="pldb"></td>
        <td class="fig" id="pldrb"></td>
        <td class="fig" id="plwb"></td>
        <td class="fig" id="plwrb"></td>
        <td class="fig" id="plmb"></td>
        <td class="fig" id="plmrb"></td>
        <td class="fig" id="pl6mb"></td>
        <td class="fig" id="pl6mrb"></td>
        <td class="fig" id="plyb"></td>
        <td class="fig" id="plyrb"></td>
        <td class="fig" id="plab"></td>
        <td class="fig" id="plarb"></td>
    </tr>
    <tr>
        <td class="fig">Soccer</td>
        <td class="fig" id="plds"></td>
        <td class="fig" id="pldrs"></td>
        <td class="fig" id="plws"></td>
        <td class="fig" id="plwrs"></td>
        <td class="fig" id="plms"></td>
        <td class="fig" id="plmrs"></td>
        <td class="fig" id="pl6ms"></td>
        <td class="fig" id="pl6mrs"></td>
        <td class="fig" id="plys"></td>
        <td class="fig" id="plyrs"></td>
        <td class="fig" id="plas"></td>
        <td class="fig" id="plars"></td>
    </tr>
    <tr>
        <td class="fig">Basketball</td>
        <td class="fig" id="pldbb"></td>
        <td class="fig" id="pldrbb"></td>
        <td class="fig" id="plwbb"></td>
        <td class="fig" id="plwrbb"></td>
        <td class="fig" id="plmbb"></td>
        <td class="fig" id="plmrbb"></td>
        <td class="fig" id="pl6mbb"></td>
        <td class="fig" id="pl6mrbb"></td>
        <td class="fig" id="plybb"></td>
        <td class="fig" id="plyrbb"></td>
        <td class="fig" id="plabb"></td>
        <td class="fig" id="plarbb"></td>
    </tr>
    <tr>
        <td class="fig">Football</td>
        <td class="fig" id="pldf"></td>
        <td class="fig" id="pldrf"></td>
        <td class="fig" id="plwf"></td>
        <td class="fig" id="plwrf"></td>
        <td class="fig" id="plmf"></td>
        <td class="fig" id="plmrf"></td>
        <td class="fig" id="pl6mf"></td>
        <td class="fig" id="pl6mrf"></td>
        <td class="fig" id="plyf"></td>
        <td class="fig" id="plyrf"></td>
        <td class="fig" id="plaf"></td>
        <td class="fig" id="plarf"></td>
    </tr>
    <tr>
        <td class="fig">Fighting</td>
        <td class="fig" id="pldfi"></td>
        <td class="fig" id="pldrfi"></td>
        <td class="fig" id="plwfi"></td>
        <td class="fig" id="plwrfi"></td>
        <td class="fig" id="plmfi"></td>
        <td class="fig" id="plmrfi"></td>
        <td class="fig" id="pl6mfi"></td>
        <td class="fig" id="pl6mrfi"></td>
        <td class="fig" id="plyfi"></td>
        <td class="fig" id="plyrfi"></td>
        <td class="fig" id="plafi"></td>
        <td class="fig" id="plarfi"></td>
    </tr>
    <tr>
        <td class="fig">Hockey</td>
        <td class="fig" id="pldh"></td>
        <td class="fig" id="pldrh"></td>
        <td class="fig" id="plwh"></td>
        <td class="fig" id="plwrh"></td>
        <td class="fig" id="plmh"></td>
        <td class="fig" id="plmrh"></td>
        <td class="fig" id="pl6mh"></td>
        <td class="fig" id="pl6mrh"></td>
        <td class="fig" id="plyh"></td>
        <td class="fig" id="plyrh"></td>
        <td class="fig" id="plah"></td>
        <td class="fig" id="plarh"></td>
    </tr>
    <tr>
        <td class="fig">Golf</td>
        <td class="fig" id="pldg"></td>
        <td class="fig" id="pldrg"></td>
        <td class="fig" id="plwg"></td>
        <td class="fig" id="plwrg"></td>
        <td class="fig" id="plmg"></td>
        <td class="fig" id="plmrg"></td>
        <td class="fig" id="pl6mg"></td>
        <td class="fig" id="pl6mrg"></td>
        <td class="fig" id="plyg"></td>
        <td class="fig" id="plyrg"></td>
        <td class="fig" id="plag"></td>
        <td class="fig" id="plarg"></td>
    </tr>
    </tbody>
</table>


<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Profit/Loss Report</th>
        <th class="head">Daily $</th>
        <th class="head">ROI</th>
        <th class="head">Weekly $</th>
        <th class="head">ROI</th>
        <th class="head">Monthly $</th>
        <th class="head">ROI</th>
        <th class="head">6-Month $</th>
        <th class="head">ROI</th>
        <th class="head">Year to Date</th>
        <th class="head">ROI</th>
        <th class="head">All Time</th>
        <th class="head">ROI</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="fig">TOTAL</td>
        <td class="fig" id="pldx"></td>
        <td class="fig" id="pldrx"></td>
        <td class="fig" id="plwx"></td>
        <td class="fig" id="plwrx"></td>
        <td class="fig" id="plmx"></td>
        <td class="fig" id="plmrx"></td>
        <td class="fig" id="pl6mx"></td>
        <td class="fig" id="pl6mrx"></td>
        <td class="fig" id="plyx"></td>
        <td class="fig" id="plyrx"></td>
        <td class="fig" id="plax"></td>
        <td class="fig" id="plarx"></td>
    </tr>
    </tbody>
</table>

<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Win Rate Report</th>
        <th class="head">Daily</th>
        <th class="head">%</th>
        <th class="head">Weekly</th>
        <th class="head">%</th>
        <th class="head">Monthly</th>
        <th class="head">%</th>
        <th class="head">6-Month</th>
        <th class="head">%</th>
        <th class="head">Year to Date</th>
        <th class="head">%</th>
        <th class="head">All Time</th>
        <th class="head">%</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="fig">Tennis</td>
        <td class="fig" id="wrdt"></td>
        <td class="fig" id="wrdrt"></td>
        <td class="fig" id="wrwt"></td>
        <td class="fig" id="wrwrt"></td>
        <td class="fig" id="wrmt"></td>
        <td class="fig" id="wrmrt"></td>
        <td class="fig" id="wr6mt"></td>
        <td class="fig" id="wr6mrt"></td>
        <td class="fig" id="wryt"></td>
        <td class="fig" id="wryrt"></td>
        <td class="fig" id="wrat"></td>
        <td class="fig" id="wrart"></td>
    </tr>
    <tr>
        <td class="fig">Baseball</td>
        <td class="fig" id="wrdb"></td>
        <td class="fig" id="wrdrb"></td>
        <td class="fig" id="wrwb"></td>
        <td class="fig" id="wrwrb"></td>
        <td class="fig" id="wrmb"></td>
        <td class="fig" id="wrmrb"></td>
        <td class="fig" id="wr6mb"></td>
        <td class="fig" id="wr6mrb"></td>
        <td class="fig" id="wryb"></td>
        <td class="fig" id="wryrb"></td>
        <td class="fig" id="wrab"></td>
        <td class="fig" id="wrarb"></td>
    </tr>
    <tr>
        <td class="fig">Soccer</td>
        <td class="fig" id="wrds"></td>
        <td class="fig" id="wrdrs"></td>
        <td class="fig" id="wrws"></td>
        <td class="fig" id="wrwrs"></td>
        <td class="fig" id="wrms"></td>
        <td class="fig" id="wrmrs"></td>
        <td class="fig" id="wr6ms"></td>
        <td class="fig" id="wr6mrs"></td>
        <td class="fig" id="wrys"></td>
        <td class="fig" id="wryrs"></td>
        <td class="fig" id="wras"></td>
        <td class="fig" id="wrars"></td>
    </tr>
    <tr>
        <td class="fig">Basketball</td>
        <td class="fig" id="wrdbb"></td>
        <td class="fig" id="wrdrbb"></td>
        <td class="fig" id="wrwbb"></td>
        <td class="fig" id="wrwrbb"></td>
        <td class="fig" id="wrmbb"></td>
        <td class="fig" id="wrmrbb"></td>
        <td class="fig" id="wr6mbb"></td>
        <td class="fig" id="wr6mrbb"></td>
        <td class="fig" id="wrybb"></td>
        <td class="fig" id="wryrbb"></td>
        <td class="fig" id="wrabb"></td>
        <td class="fig" id="wrarbb"></td>
    </tr>
    <tr>
        <td class="fig">Football</td>
        <td class="fig" id="wrdf"></td>
        <td class="fig" id="wrdrf"></td>
        <td class="fig" id="wrwf"></td>
        <td class="fig" id="wrwrf"></td>
        <td class="fig" id="wrmf"></td>
        <td class="fig" id="wrmrf"></td>
        <td class="fig" id="wr6mf"></td>
        <td class="fig" id="wr6mrf"></td>
        <td class="fig" id="wryf"></td>
        <td class="fig" id="wryrf"></td>
        <td class="fig" id="wraf"></td>
        <td class="fig" id="wrarf"></td>
    </tr>
    <tr>
        <td class="fig">Fighting</td>
        <td class="fig" id="wrdfi"></td>
        <td class="fig" id="wrdrfi"></td>
        <td class="fig" id="wrwfi"></td>
        <td class="fig" id="wrwrfi"></td>
        <td class="fig" id="wrmfi"></td>
        <td class="fig" id="wrmrfi"></td>
        <td class="fig" id="wr6mfi"></td>
        <td class="fig" id="wr6mrfi"></td>
        <td class="fig" id="wryfi"></td>
        <td class="fig" id="wryrfi"></td>
        <td class="fig" id="wrafi"></td>
        <td class="fig" id="wrarfi"></td>
    </tr>
    <tr>
        <td class="fig">Hockey</td>
        <td class="fig" id="wrdh"></td>
        <td class="fig" id="wrdrh"></td>
        <td class="fig" id="wrwh"></td>
        <td class="fig" id="wrwrh"></td>
        <td class="fig" id="wrmh"></td>
        <td class="fig" id="wrmrh"></td>
        <td class="fig" id="wr6mh"></td>
        <td class="fig" id="wr6mrh"></td>
        <td class="fig" id="wryh"></td>
        <td class="fig" id="wryrh"></td>
        <td class="fig" id="wrah"></td>
        <td class="fig" id="wrarh"></td>
    </tr>
    <tr>
        <td class="fig">Golf</td>
        <td class="fig" id="wrdg"></td>
        <td class="fig" id="wrdrg"></td>
        <td class="fig" id="wrwg"></td>
        <td class="fig" id="wrwrg"></td>
        <td class="fig" id="wrmg"></td>
        <td class="fig" id="wrmrg"></td>
        <td class="fig" id="wr6mg"></td>
        <td class="fig" id="wr6mrg"></td>
        <td class="fig" id="wryg"></td>
        <td class="fig" id="wryrg"></td>
        <td class="fig" id="wrag"></td>
        <td class="fig" id="wrarg"></td>
    </tr>
    </tbody>
</table>

<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Profit/Loss Report</th>
        <th class="head">Daily $</th>
        <th class="head">ROI</th>
        <th class="head">Weekly $</th>
        <th class="head">ROI</th>
        <th class="head">Monthly $</th>
        <th class="head">ROI</th>
        <th class="head">6-Month $</th>
        <th class="head">ROI</th>
        <th class="head">Year to Date</th>
        <th class="head">ROI</th>
        <th class="head">All Time</th>
        <th class="head">ROI</th>
    </tr>
    </thead>
    <tbody>

	<?php

	$book_arr = array('FanDuel', 'DraftKings', 'BetOnline.ag', 'BetMGM', 'GTbets', 'Circa Sports', 'Barstool Sportsbook', 'BetRivers', 'Unibet', 'WynnBET', 'FOX Bet', 'William Hill (US)', 'Pinnacle', 'Bovada', 'Intertops');
	$nyaw_arr = array('pld', 'pldr', 'plw', 'plwr', 'plm', 'plmr', 'pl6m', 'pl6mr', 'ply', 'plyr', 'pla', 'plar');
	foreach ($book_arr as $subcat) {
		echo '<tr>';
		if ($subcat == '') {
			echo '<td class="fig" >Blank</td>';
		} else {
			echo '<td class="fig" >' . $subcat . '</td>';
		}
		foreach ($nyaw_arr as $nyaw) {
			echo '<td class="fig" id="' . $nyaw . '' . $subcat . '"></td>';
		}
		echo '</tr>';
	}
	?>
    </tbody>
</table>
<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Handle Report</th>
        <th class="head">Daily</th>
        <th class="head">Weekly</th>
        <th class="head">Monthly</th>
        <th class="head">6-Month</th>
        <th class="head">Year to Date</th>
        <th class="head">All Time</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="fig" id="rgt">Tennis</td>
        <td class="fig" id="rdt"></td>
        <td class="fig" id="rwt"></td>
        <td class="fig" id="rmt"></td>
        <td class="fig" id="r6mt"></td>
        <td class="fig" id="ryt"></td>
        <td class="fig" id="rat"></td>
    </tr>
    <tr>
        <td class="fig" id="rgb">Baseball</td>
        <td class="fig" id="rdb"></td>
        <td class="fig" id="rwb"></td>
        <td class="fig" id="rmb"></td>
        <td class="fig" id="r6mb"></td>
        <td class="fig" id="ryb"></td>
        <td class="fig" id="rab"></td>
    </tr>
    <tr>
        <td class="fig" id="rgs">Soccer</td>
        <td class="fig" id="rds"></td>
        <td class="fig" id="rws"></td>
        <td class="fig" id="rms"></td>
        <td class="fig" id="r6ms"></td>
        <td class="fig" id="rys"></td>
        <td class="fig" id="ras"></td>
    </tr>
    <tr>
        <td class="fig" id="rgbb">Basketball</td>
        <td class="fig" id="rdbb"></td>
        <td class="fig" id="rwbb"></td>
        <td class="fig" id="rmbb"></td>
        <td class="fig" id="r6mbb"></td>
        <td class="fig" id="rybb"></td>
        <td class="fig" id="rabb"></td>
    </tr>
    <tr>
        <td class="fig" id="rgf">Football</td>
        <td class="fig" id="rdf"></td>
        <td class="fig" id="rwf"></td>
        <td class="fig" id="rmf"></td>
        <td class="fig" id="r6mf"></td>
        <td class="fig" id="ryf"></td>
        <td class="fig" id="raf"></td>
    </tr>
    <tr>
        <td class="fig" id="rgfi">Fighting</td>
        <td class="fig" id="rdfi"></td>
        <td class="fig" id="rwfi"></td>
        <td class="fig" id="rmfi"></td>
        <td class="fig" id="r6mfi"></td>
        <td class="fig" id="ryfi"></td>
        <td class="fig" id="rafi"></td>
    </tr>
    <tr>
        <td class="fig" id="rgh">Hockey</td>
        <td class="fig" id="rdh"></td>
        <td class="fig" id="rwh"></td>
        <td class="fig" id="rmh"></td>
        <td class="fig" id="r6mh"></td>
        <td class="fig" id="ryh"></td>
        <td class="fig" id="rah"></td>
    </tr>
    <tr>
        <td class="fig" id="rgg">Golf</td>
        <td class="fig" id="rdg"></td>
        <td class="fig" id="rwg"></td>
        <td class="fig" id="rmg"></td>
        <td class="fig" id="r6mg"></td>
        <td class="fig" id="ryg"></td>
        <td class="fig" id="rag"></td>
    </tr>
    </tbody>
</table>

<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Handle Report</th>
        <th class="head">Daily</th>
        <th class="head">Weekly</th>
        <th class="head">Monthly</th>
        <th class="head">6-Month</th>
        <th class="head">Year to Date</th>
        <th class="head">All Time</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="fig" id="rgx">TOTAL</td>
        <td class="fig" id="rdx"></td>
        <td class="fig" id="rwx"></td>
        <td class="fig" id="rmx"></td>
        <td class="fig" id="r6mx"></td>
        <td class="fig" id="ryx"></td>
        <td class="fig" id="rax"></td>
    </tr>
    </tbody>
</table>

<table class="tgx" style="background-color:#242424;">
    <thead>
    <tr>
        <th class="head">Handle Report</th>
        <th class="head">Daily</th>
        <th class="head">Weekly</th>
        <th class="head">Monthly</th>
        <th class="head">6-Month</th>
        <th class="head">Year to Date</th>
        <th class="head">All Time</th>
    </tr>
    </thead>
    <tbody>
	<?php
	$book_arr = array('FanDuel', 'DraftKings', 'BetOnline.ag', 'BetMGM', 'GTbets', 'Circa Sports', 'Barstool Sportsbook', 'BetRivers', 'Unibet', 'WynnBET', 'FOX Bet', 'William Hill (US)', 'Pinnacle', 'Bovada', 'Intertops');
	$nyaw_arr = array('rd', 'rw', 'rm', 'r6m', 'ry', 'ra');
	foreach ($book_arr as $subcat) {
		echo '<tr>';
		if ($subcat == '') {
			echo '<td class="fig" >Blank</td>';
		} else {
			echo '<td class="fig" >' . $subcat . '</td>';
		}
		foreach ($nyaw_arr as $nyaw) {
			echo '<td class="fig" id="' . $nyaw . '' . $subcat . '"></td>';
		}
		echo '</tr>';
	}
	?>
    </tbody>
</table>

<table class="tg" style="background-color:#242424;display:none;">
    <tr>
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
        <th width=5% class="headers">Result</th>
        <th width=5% class="headers">W/L Amount</th>
        <th width=5% class="headers">Sportsbook</th>
        <th></th>
    </tr>
	<?php
	$count = 0;
	while ($row = $result->fetch_assoc()) {
		$count = $count + 1;
		$tempDate = $row['Time'];
		$sqlID = $row['ID'];
		// echo $tempDate;
		$date_timestamp = strtotime($row['Time_Game']);

		$date1 = DateTime::createFromFormat('Y-m-d H:i:s', $tempDate)->format("m-d-Y");
		$date2 = DateTime::createFromFormat('Y-m-d H:i:s', $tempDate)->format("H:i:s");
		// $newformat = $date->format("Y/m/d");

		if ($row['status'] == 1) {
			echo '<tr class="row-' . $count . '" style="background-color:#FFFFFF;" data-game=' . $row['Sport'] . ' category=' . $row['Category'] . ' bet-type=' . 'live' . ' data-time=' . $date_timestamp . ' sqlid=' . $sqlID . ' odds=' . $row['Odds2'] . ' odds1=' . $row['Odds1'] . ' cat=' . $row['Category'] . '>';
			echo '<td class="tg-val" style="background-color:#cc0000;color:#FFFFFF;">LIVE</td>';
		} else {
			echo '<tr class="row-' . $count . '" style="background-color:#FFFFFF;" data-game=' . $row['Sport'] . ' category=' . $row['Category'] . ' bet-type=' . 'normal' . ' data-time=' . $date_timestamp . ' sqlid=' . $sqlID . ' odds=' . $row['Odds2'] . ' odds1=' . $row['Odds1'] . ' cat=' . $row['Category'] . '>';
			echo '<td class="tg-val"></td>';
		}
		echo '<td class="tg-val">' . $date1 . '</td>';
		echo '<td class="tg-val">' . $date2 . '</td>';
		echo '<td class="tg-val">' . $sqlID . '</td>';
		echo '<td class="tg-val">' . $row['Sport'] . '</td>';
		echo '<td class="tg-val">' . $row['Category'] . '</td>';
		//####################################################### Sub-category option
		$subcat_arr = array("SIDE", "1st Half", "2nd Half", "Qtrs", "Over", "Under", "NCAA", "CFL", "WNBA", "ATP", "WTA", "Futures", "Props", "Teaser", "Parlay");
		echo '<td class="tg-val">' . '<select class="subcat-' . $count . '" onchange="detectChange3(this)" style="font-weight: bold;
    color: #000000;">';

		foreach ($subcat_arr as $subcat) {
			if ($row['notes'] == $subcat) {
				echo '<option value="' . $subcat . '" selected> ' . $subcat . '</option>';
			} else {
				echo '<option value="' . $subcat . '"> ' . $subcat . '</option>';
			}
		}
		echo '</select>' . '</td>';
		//#######################################################
		echo '<td class="tg-val">' . $row['Team'] . '</td>';
		if ($row['Odds1'] == $row['Odds2']) {
			echo '<td class="tg-val">' . $row['Odds2'] . '</td>';
		} else {
			echo '<td class="tg-val">' . $row['Odds1'] . '&nbsp;&nbsp;' . $row['Odds2'] . '</td>';
		}
		#fd
		echo '<td class="tg-val" id="fd-' . $count . '"></td>';
		###
		echo '<td class="tg-val">' . '<div class="input-icon">
    <input type="number" class="risk-' . $count . '" placeholder="0.00" disabled>
    <i>$</i>
    </div>' . '</td>';
//############################################################# To-Win option
		$towin_arr = array(5, 10, 20, 50, 100, 200, 300, 500, 1000);
		echo '<td class="tg-val">' . '<select class="towin-' . $count . '" onchange="detectChange2(this)" style="font-weight: bold;
    color: #000000;">';
		foreach ($towin_arr as $towin) {
			if ($row['towin'] == $towin) {
				echo '<option value="' . $towin . '" selected>$ ' . $towin . '</option>';
			} else {
				echo '<option value="' . $towin . '">$ ' . $towin . '</option>';
			}
		}
		echo '</select>' . '</td>';
//########################################################################
		$result_arr = array(0, 1, -1);
		echo '<td class="tg-val">' . '<select class="select-' . $count . '" onchange="detectChange(this)" style="font-weight: bold;
    color: #000000;">';
		// foreach ($result_arr as $resulto){
		//     echo $resulto;
		// }
		// try{
		$resultText = '';
		foreach ($result_arr as $resulto) {
			echo $resulto;
			$resultText = $resultText . '<option value="' . $resulto . '"';
			if ($row['result'] == $resulto) {
				$resultText = $resultText . ' selected>';
			} else {
				$resultText = $resultText . '>';
			}
			// echo $resultText;
			if ($resulto == 0) {
				$resultText = $resultText . 'Pending</option>';
			} else if ($resulto == 1) {
				$resultText = $resultText . 'Win</option>';
			} else if ($resulto == -1) {
				$resultText = $resultText . 'Lose</option>';
			}
		}
		echo $resultText;
		// }catch (Exception $e){
		//     echo $e->getMessage();
		// }
		echo '</select></td>';


		echo '<td class="tg-val">' . '<div class="input-icon">
    <input type="number" class="wl-' . $count . '" placeholder="0.00" disabled>
    <i>$</i>
    </div>' . '</td>';

		//############################################## Sportsbook
		$result_arr = array('', 'FanDuel', 'DraftKings', 'BetOnline.ag', 'BetMGM', 'GTbets', 'Circa Sports', 'Barstool Sportsbook', 'Unibet', 'BetRivers', 'WynnBET', 'FOX Bet', 'William Hill (US)', 'Pinnacle', 'Bovada', 'Intertops');
		echo '<td class="tg-val" >' . '<select class="book-' . $count . '" onchange="detectChange4(this)" style="font-weight: bold;
    color: #000000;">';
		// foreach ($result_arr as $resulto){
		//     echo $resulto;
		// }
		// try{
		$resultText = '';
		foreach ($result_arr as $resulto) {
			$resultText = $resultText . '<option value="' . $resulto . '"';
			if ($row['sportsbook'] == $resulto) {
				$resultText = $resultText . ' selected>' . $resulto . '</option>';
			} else {
				$resultText = $resultText . '>' . $resulto . '</option>';
			}
		}
		echo $resultText;
		// }catch (Exception $e){
		//     echo $e->getMessage();
		// }
		echo '</select></td>';

		echo '<td class="tg-val"><input type="button" class="del-' . $count . '" value="X" onclick="deleteData(this)"></td>';
		echo '</tr>';
	}
	CloseCon($conn);
echo '</table>
<div class="totalRows" style="display:none;" value=' . $count . '></div>
<div class="nowDay" style="display:none;" value=' . $now_day . '></div>
<div class="nowWeek" style="display:none;" value=' . $now_week . '></div>
<div class="nowMonth" style="display:none;" value=' . $now_month . '></div>
<div class="now6Month" style="display:none;" value=' . $now_6month . '></div>
<div class="nowYear" style="display:none;" value=' . $now_year . '></div>';
?>
<script type="text/javascript">
    function detectChange(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("select-", "");
        var target = "row-" + idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");
        if (selected == 0) {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#ffffff";
            document.getElementsByClassName("wl-" + idx)[0].value = Number(0).toFixed(2);
        } else if (selected == 1) {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#8cb6ff";
            var towin = Number(document.getElementsByClassName("towin-" + idx)[0].value);
            document.getElementsByClassName("wl-" + idx)[0].value = towin.toFixed(2);
        } else {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#f77474";
            var risk = Number(document.getElementsByClassName("risk-" + idx)[0].value);
            document.getElementsByClassName("wl-" + idx)[0].value = (-1 * risk).toFixed(2);
        }

        var sqlid = document.getElementsByClassName("row-" + idx)[0].getAttribute("sqlid");
        $.ajax({
            type: "POST",
            url: "database_edit.php",
            data: {code: 1, sqlid: sqlid, value: selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });

        calcFigure(1, "", "");
    }

    function detectChange2(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("towin-", "");
        var selected = a.options[a.selectedIndex].getAttribute("value");
        var odds = Number(document.getElementsByClassName("row-" + idx)[0].getAttribute("odds"));
        var towin = Number(selected);
        if (odds > 0) {
            Amount = (towin / ((odds) * (.01)));
            var CalcA = Amount.toFixed(2);
        } else if (odds < 0) {
            Amount = ((towin) * ((odds) * (-.01)));
            var CalcA = Amount.toFixed(2);
        }

        document.getElementsByClassName("risk-" + idx)[0].value = CalcA;
        var result = document.getElementsByClassName("select-" + idx)[0];
        var result_selected = result.options[result.selectedIndex].getAttribute("value");

        if (result_selected == 1) {
            document.getElementsByClassName("wl-" + idx)[0].value = towin.toFixed(2);
        } else if (result_selected == -1) {
            document.getElementsByClassName("wl-" + idx)[0].value = (-1 * CalcA).toFixed(2);
        }

        var sqlid = document.getElementsByClassName("row-" + idx)[0].getAttribute("sqlid");
        $.ajax({
            type: "POST",
            url: "database_edit.php",
            data: {code: 2, sqlid: sqlid, value: selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });

        calcFigure(1, "", "");
    }

    function loaded(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("select-", "");
        var target = "row-" + idx;
        var selected = a.options[a.selectedIndex].getAttribute("value");
        if (selected == 0) {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#ffffff";
            document.getElementsByClassName("wl-" + idx)[0].value = Number(0).toFixed(2);
        } else if (selected == 1) {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#8cb6ff";
            var towin = Number(document.getElementsByClassName("towin-" + idx)[0].value);
            document.getElementsByClassName("wl-" + idx)[0].value = towin.toFixed(2);
        } else {
            document.getElementsByClassName(target)[0].style.backgroundColor = "#f77474";
            var risk = Number(document.getElementsByClassName("risk-" + idx)[0].value);
            document.getElementsByClassName("wl-" + idx)[0].value = (-1 * risk).toFixed(2);
        }
    }

    function loaded2(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("towin-", "");
        var selected = a.options[a.selectedIndex].getAttribute("value");
        var odds = Number(document.getElementsByClassName("row-" + idx)[0].getAttribute("odds"));
        var towin = Number(selected);
        if (odds > 0) {
            Amount = (towin / ((odds) * (.01)));
            var CalcA = Amount.toFixed(2);
        } else if (odds < 0) {
            Amount = ((towin) * ((odds) * (-.01)));
            var CalcA = Amount.toFixed(2);
        }

        document.getElementsByClassName("risk-" + idx)[0].value = CalcA;
        var result = document.getElementsByClassName("select-" + idx)[0];
        var result_selected = result.options[result.selectedIndex].getAttribute("value");

        if (result_selected == 1) {
            document.getElementsByClassName("wl-" + idx)[0].value = towin.toFixed(2);
        } else if (result_selected == -1) {
            document.getElementsByClassName("wl-" + idx)[0].value = (-1 * CalcA).toFixed(2);
        }
        try {
            var cat = document.getElementsByClassName("row-" + idx)[0].getAttribute("cat");
            var odds1 = Number(document.getElementsByClassName("row-" + idx)[0].getAttribute("odds1"));
            if (cat == "ML") {
                if (odds < 0) {
                    document.getElementById("fd-" + idx).innerHTML = "F";
                } else {
                    document.getElementById("fd-" + idx).innerHTML = "D";
                }
            } else if (cat == "Spread") {
                if (odds1 < 0) {
                    document.getElementById("fd-" + idx).innerHTML = "F";
                } else {
                    document.getElementById("fd-" + idx).innerHTML = "D";
                }
            }
        } catch (err) {
            console.log(err);
        }
    }

    function writeNote(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("note-", "");
        var selected = a.value;
        var sqlid = document.getElementsByClassName("row-" + idx)[0].getAttribute("sqlid");
        $.ajax({
            type: "POST",
            url: "database_edit.php",
            data: {code: 3, sqlid: sqlid, value: selected},
            // success: function(res){
            //     alert("Bet added!");
            // }
        });
    }

    function deleteData(a) {
        var className = a.getAttribute("class");
        var idx = className.replace("del-", "");
        var sqlid = document.getElementsByClassName("row-" + idx)[0].getAttribute("sqlid");
        $.ajax({
            type: "POST",
            url: "database_delete.php",
            data: {code: "x", sqlid: sqlid},
        });
        location.reload();
    }

    function calcFigure2(code, code2, code3) {
        var games = ["FanDuel", "DraftKings", "BetOnline.ag", "BetMGM", "GTbets", "Circa Sports", "Barstool Sportsbook", "Unibet", "BetRivers", "WynnBET", "FOX Bet", "William Hill (US)", "Pinnacle", "Bovada", "Intertops"];
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        var day = document.getElementsByClassName("nowDay")[0].getAttribute("value");
        var week = document.getElementsByClassName("nowWeek")[0].getAttribute("value");
        var month = document.getElementsByClassName("nowMonth")[0].getAttribute("value");
        var month6 = document.getElementsByClassName("now6Month")[0].getAttribute("value");
        var year = document.getElementsByClassName("nowYear")[0].getAttribute("value");

        var totDay = 0;
        var totWeek = 0;
        var totMonth = 0;
        var totMonth6 = 0;
        var totYear = 0;
        var totAll = 0;
        var totRDay = 0;
        var totRWeek = 0;
        var totRMonth = 0;
        var totRMonth6 = 0;
        var totRYear = 0;
        var totRAll = 0;
        for (let i = 0; i < games.length; i++) {
            var sumDay = 0;
            var sumWeek = 0;
            var sumMonth = 0;
            var sumMonth6 = 0;
            var sumYear = 0;
            var sumAll = 0;
            var rDay = 0;
            var rWeek = 0;
            var rMonth = 0;
            var rMonth6 = 0;
            var rYear = 0;
            var rAll = 0;
            var gameType = games[i];
            var count = 0;
            for (let i = 1; i <= table; i++) {
                var data_time = document.getElementsByClassName("row-" + i)[0].getAttribute("data-time");
                var data_game = document.getElementsByClassName("row-" + i)[0].getAttribute("data-game");
                var bet_type = document.getElementsByClassName("row-" + i)[0].getAttribute("bet-type");
                var category = document.getElementsByClassName("row-" + i)[0].getAttribute("category");
                var subcat = document.getElementsByClassName("subcat-" + i)[0].value;
                var book = document.getElementsByClassName("book-" + i)[0].value;
                var fd = document.getElementById("fd-" + i).innerHTML;
                // alert(fd);

                if (code2 == "") {
                    code2x = category;
                } else {
                    code2x = code2;
                }
                var data_temp = document.getElementsByClassName("wl-" + i)[0].value;
                var data_temp2 = document.getElementsByClassName("risk-" + i)[0].value;

                if (code == 1) {
                    if (book == gameType && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        // break;
                    }
                } else if (code == 2) {
                    if (book == gameType && bet_type == "live" && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        // break;
                    }
                } else if (code == 3) {
                    if (book == gameType && bet_type == "normal" && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        // break;
                    }
                }
            }
            var roiDay = sumDay / rDay * 100;
            if (isNaN(roiDay)) {
                roiDay = 0;
            }
            var roiWeek = sumWeek / rWeek * 100;
            if (isNaN(roiWeek)) {
                roiWeek = 0;
            }
            var roiMonth = sumMonth / rMonth * 100;
            if (isNaN(roiMonth)) {
                roiMonth = 0;
            }
            var roiMonth6 = sumMonth6 / rMonth6 * 100;
            if (isNaN(roiMonth6)) {
                roiMonth6 = 0;
            }
            var roiYear = sumYear / rYear * 100;
            if (isNaN(roiYear)) {
                roiYear = 0;
            }
            var roiAll = sumAll / rAll * 100;
            if (isNaN(roiAll)) {
                roiAll = 0;
            }

            var redcolor = "#f77474";
            var bluecolor = "#8cb6ff";
            document.getElementById("pld" + games[i]).innerHTML = "$  " + sumDay.toFixed(2);
            if (sumDay < 0) {
                document.getElementById("pld" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pld" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plw" + games[i]).innerHTML = "$  " + sumWeek.toFixed(2);
            if (sumWeek < 0) {
                document.getElementById("plw" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plw" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plm" + games[i]).innerHTML = "$  " + sumMonth.toFixed(2);
            if (sumMonth < 0) {
                document.getElementById("plm" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plm" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pl6m" + games[i]).innerHTML = "$  " + sumMonth6.toFixed(2);
            if (sumMonth6 < 0) {
                document.getElementById("pl6m" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pl6m" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ply" + games[i]).innerHTML = "$  " + sumYear.toFixed(2);
            if (sumYear < 0) {
                document.getElementById("ply" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ply" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pla" + games[i]).innerHTML = "$  " + sumAll.toFixed(2);
            if (sumAll < 0) {
                document.getElementById("pla" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pla" + games[i]).style.backgroundColor = bluecolor;
            }

            document.getElementById("pldr" + games[i]).innerHTML = roiDay.toFixed(2) + " %";
            if (roiDay < 0) {
                document.getElementById("pldr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pldr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plwr" + games[i]).innerHTML = roiWeek.toFixed(2) + " %";
            if (roiWeek < 0) {
                document.getElementById("plwr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plwr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plmr" + games[i]).innerHTML = roiMonth.toFixed(2) + " %";
            if (roiMonth < 0) {
                document.getElementById("plmr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plmr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pl6mr" + games[i]).innerHTML = roiMonth6.toFixed(2) + " %";
            if (roiMonth6 < 0) {
                document.getElementById("pl6mr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pl6mr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plyr" + games[i]).innerHTML = roiYear.toFixed(2) + " %";
            if (roiYear < 0) {
                document.getElementById("plyr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plyr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plar" + games[i]).innerHTML = roiAll.toFixed(2) + " %";
            if (roiAll < 0) {
                document.getElementById("plar" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plar" + games[i]).style.backgroundColor = bluecolor;
            }

            redcolor = "#faa866";
            bluecolor = "#faa866";
            document.getElementById("rd" + games[i]).innerHTML = "$  " + rDay.toFixed(2);
            if (rDay < 0) {
                document.getElementById("rd" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rd" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("rw" + games[i]).innerHTML = "$  " + rWeek.toFixed(2);
            if (rWeek < 0) {
                document.getElementById("rw" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rw" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("rm" + games[i]).innerHTML = "$  " + rMonth.toFixed(2);
            if (rMonth < 0) {
                document.getElementById("rm" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rm" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("r6m" + games[i]).innerHTML = "$  " + rMonth6.toFixed(2);
            if (rMonth6 < 0) {
                document.getElementById("r6m" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("r6m" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ry" + games[i]).innerHTML = "$  " + rYear.toFixed(2);
            if (rYear < 0) {
                document.getElementById("ry" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ry" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ra" + games[i]).innerHTML = "$  " + rAll.toFixed(2);
            if (rAll < 0) {
                document.getElementById("ra" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ra" + games[i]).style.backgroundColor = bluecolor;
            }
        }
        var totRoiDay = totDay / totRDay * 100;
        if (isNaN(totRoiDay)) {
            totRoiDay = 0;
        }
        var totRoiWeek = totWeek / totRWeek * 100;
        if (isNaN(totRoiWeek)) {
            totRoiWeek = 0;
        }
        var totRoiMonth = totMonth / totRMonth * 100;
        if (isNaN(totRoiMonth)) {
            totRoiMonth = 0;
        }
        var totRoiMonth6 = totMonth6 / totRMonth6 * 100;
        if (isNaN(totRoiMonth6)) {
            totRoiMonth6 = 0;
        }
        var totRoiYear = totYear / totRYear * 100;
        if (isNaN(totRoiYear)) {
            totRoiYear = 0;
        }
        var totRoiAll = totAll / totRAll * 100;
        if (isNaN(totRoiAll)) {
            totRoiAll = 0;
        }

        var redcolor = "#f77474";
        var bluecolor = "#8cb6ff";
        document.getElementById("pld" + "x").innerHTML = "$  " + totDay.toFixed(2);
        if (totDay < 0) {
            document.getElementById("pld" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pld" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plw" + "x").innerHTML = "$  " + totWeek.toFixed(2);
        if (totWeek < 0) {
            document.getElementById("plw" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plw" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plm" + "x").innerHTML = "$  " + totMonth.toFixed(2);
        if (totMonth < 0) {
            document.getElementById("plm" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plm" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pl6m" + "x").innerHTML = "$  " + totMonth6.toFixed(2);
        if (totMonth6 < 0) {
            document.getElementById("pl6m" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pl6m" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ply" + "x").innerHTML = "$  " + totYear.toFixed(2);
        if (totYear < 0) {
            document.getElementById("ply" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ply" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pla" + "x").innerHTML = "$  " + totAll.toFixed(2);
        if (totAll < 0) {
            document.getElementById("pla" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pla" + "x").style.backgroundColor = bluecolor;
        }

        document.getElementById("pldr" + "x").innerHTML = totRoiDay.toFixed(2) + " %";
        if (totRoiDay < 0) {
            document.getElementById("pldr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pldr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plwr" + "x").innerHTML = totRoiWeek.toFixed(2) + " %";
        if (totRoiWeek < 0) {
            document.getElementById("plwr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plwr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plmr" + "x").innerHTML = totRoiMonth.toFixed(2) + " %";
        if (totRoiMonth < 0) {
            document.getElementById("plmr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plmr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pl6mr" + "x").innerHTML = totRoiMonth6.toFixed(2) + " %";
        if (totRoiMonth6 < 0) {
            document.getElementById("pl6mr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pl6mr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plyr" + "x").innerHTML = totRoiYear.toFixed(2) + " %";
        if (totRoiYear < 0) {
            document.getElementById("plyr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plyr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plar" + "x").innerHTML = totRoiAll.toFixed(2) + " %";
        if (totRoiAll < 0) {
            document.getElementById("plar" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plar" + "x").style.backgroundColor = bluecolor;
        }

        redcolor = "#faa866";
        bluecolor = "#faa866";
        document.getElementById("rd" + "x").innerHTML = "$  " + totRDay.toFixed(2);
        if (totRDay < 0) {
            document.getElementById("rd" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rd" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("rw" + "x").innerHTML = "$  " + totRWeek.toFixed(2);
        if (totRWeek < 0) {
            document.getElementById("rw" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rw" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("rm" + "x").innerHTML = "$  " + totRMonth.toFixed(2);
        if (totRMonth < 0) {
            document.getElementById("rm" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rm" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("r6m" + "x").innerHTML = "$  " + totRMonth6.toFixed(2);
        if (totRMonth6 < 0) {
            document.getElementById("r6m" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("r6m" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ry" + "x").innerHTML = "$  " + totRYear.toFixed(2);
        if (totRYear < 0) {
            document.getElementById("ry" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ry" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ra" + "x").innerHTML = "$  " + totRAll.toFixed(2);
        if (totRAll < 0) {
            document.getElementById("ra" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ra" + "x").style.backgroundColor = bluecolor;
        }
    }

    function calcFigure(code, code2, code3) {
        var games = ["t", "b", "s", "bb", "f", "fi", "h", "g"];
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        var day = document.getElementsByClassName("nowDay")[0].getAttribute("value");
        var week = document.getElementsByClassName("nowWeek")[0].getAttribute("value");
        var month = document.getElementsByClassName("nowMonth")[0].getAttribute("value");
        var month6 = document.getElementsByClassName("now6Month")[0].getAttribute("value");
        var year = document.getElementsByClassName("nowYear")[0].getAttribute("value");

        var totDay = 0;
        var totWeek = 0;
        var totMonth = 0;
        var totMonth6 = 0;
        var totYear = 0;
        var totAll = 0;
        var totRDay = 0;
        var totRWeek = 0;
        var totRMonth = 0;
        var totRMonth6 = 0;
        var totRYear = 0;
        var totRAll = 0;
        for (let i = 0; i < games.length; i++) {
            var sumDay = 0;
            var sumWeek = 0;
            var sumMonth = 0;
            var sumMonth6 = 0;
            var sumYear = 0;
            var sumAll = 0;
            var rDay = 0;
            var rWeek = 0;
            var rMonth = 0;
            var rMonth6 = 0;
            var rYear = 0;
            var rAll = 0;
            //winlose
            var wDay = 0;
            var wWeek = 0;
            var wMonth = 0;
            var wMonth6 = 0;
            var wYear = 0;
            var wAll = 0;
            var lDay = 0;
            var lWeek = 0;
            var lMonth = 0;
            var lMonth6 = 0;
            var lYear = 0;
            var lAll = 0;
            var gameType = "";
            if (games[i] == "s") {
                gameType = "Soccer";
            } else if (games[i] == "b") {
                gameType = "Baseball";
            } else if (games[i] == "t") {
                gameType = "Tennis";
            } else if (games[i] == "bb") {
                gameType = "Basketball";
            } else if (games[i] == "f") {
                gameType = "Football";
            } else if (games[i] == "fi") {
                gameType = "Fighting";
            } else if (games[i] == "h") {
                gameType = "Hockey";
            } else if (games[i] == "g") {
                gameType = "Golf";
            }
            var count = 0;
            for (let i = 1; i <= table; i++) {
                var data_time = document.getElementsByClassName("row-" + i)[0].getAttribute("data-time");
                var data_game = document.getElementsByClassName("row-" + i)[0].getAttribute("data-game");
                var bet_type = document.getElementsByClassName("row-" + i)[0].getAttribute("bet-type");
                var category = document.getElementsByClassName("row-" + i)[0].getAttribute("category");
                var subcat = document.getElementsByClassName("subcat-" + i)[0].value;
                var book = document.getElementsByClassName("book-" + i)[0].value;
                var fd = document.getElementById("fd-" + i).innerHTML;
                var value = document.getElementsByClassName("select-" + i)[0].value;

                if (code2 == "") {
                    code2x = category;
                } else {
                    code2x = code2;
                }
                var data_temp = document.getElementsByClassName("wl-" + i)[0].value;
                var data_temp2 = document.getElementsByClassName("risk-" + i)[0].value;

                if (code == 1) {
                    if (data_game == gameType && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                            if (value == 1) {
                                wWeek++;
                            } else if (value == -1) {
                                lWeek++;
                            }
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                            if (value == 1) {
                                wDay++;
                            } else if (value == -1) {
                                lDay++;
                            }
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                            if (value == 1) {
                                wMonth++;
                            } else if (value == -1) {
                                lMonth++;
                            }
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                            if (value == 1) {
                                wMonth6++;
                            } else if (value == -1) {
                                lMonth6++;
                            }
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                            if (value == 1) {
                                wYear++;
                            } else if (value == -1) {
                                lYear++;
                            }
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        if (value == 1) {
                            wAll++;
                        } else if (value == -1) {
                            lAll++;
                        }
                        // break;
                    }
                } else if (code == 2) {
                    if (data_game == gameType && bet_type == "live" && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                            if (value == 1) {
                                wWeek++;
                            } else if (value == -1) {
                                lWeek++;
                            }
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                            if (value == 1) {
                                wDay++;
                            } else if (value == -1) {
                                lDay++;
                            }
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                            if (value == 1) {
                                wMonth++;
                            } else if (value == -1) {
                                lMonth++;
                            }
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                            if (value == 1) {
                                wMonth6++;
                            } else if (value == -1) {
                                lMonth6++;
                            }
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                            if (value == 1) {
                                wYear++;
                            } else if (value == -1) {
                                lYear++;
                            }
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        if (value == 1) {
                            wAll++;
                        } else if (value == -1) {
                            lAll++;
                        }
                        // break;
                    }
                } else if (code == 3) {
                    if (data_game == gameType && bet_type == "normal" && (category == code2x || fd == code2x) && code3.includes(subcat)) {
                        if (data_time > week) {
                            sumWeek = sumWeek + Number(data_temp);
                            rWeek = rWeek + Number(data_temp2);
                            totWeek = totWeek + Number(data_temp);
                            totRWeek = totRWeek + Number(data_temp2);
                            if (value == 1) {
                                wWeek++;
                            } else if (value == -1) {
                                lWeek++;
                            }
                        }
                        if (data_time > day) {
                            sumDay = sumDay + Number(data_temp);
                            rDay = rDay + Number(data_temp2);
                            totDay = totDay + Number(data_temp);
                            totRDay = totRDay + Number(data_temp2);
                            if (value == 1) {
                                wDay++;
                            } else if (value == -1) {
                                lDay++;
                            }
                        }
                        if (data_time > month) {
                            sumMonth = sumMonth + Number(data_temp);
                            rMonth = rMonth + Number(data_temp2);
                            totMonth = totMonth + Number(data_temp);
                            totRMonth = totRMonth + Number(data_temp2);
                            if (value == 1) {
                                wMonth++;
                            } else if (value == -1) {
                                lMonth++;
                            }
                        }
                        if (data_time > month6) {
                            sumMonth6 = sumMonth6 + Number(data_temp);
                            rMonth6 = rMonth6 + Number(data_temp2);
                            totMonth6 = totMonth6 + Number(data_temp);
                            totRMonth6 = totRMonth6 + Number(data_temp2);
                            if (value == 1) {
                                wMonth6++;
                            } else if (value == -1) {
                                lMonth6++;
                            }
                        }
                        if (data_time > year) {
                            sumYear = sumYear + Number(data_temp);
                            rYear = rYear + Number(data_temp2);
                            totYear = totYear + Number(data_temp);
                            totRYear = totRYear + Number(data_temp2);
                            if (value == 1) {
                                wYear++;
                            } else if (value == -1) {
                                lYear++;
                            }
                        }
                        sumAll = sumAll + Number(data_temp);
                        rAll = rAll + Number(data_temp2);
                        totAll = totAll + Number(data_temp);
                        totRAll = totRAll + Number(data_temp2);
                        if (value == 1) {
                            wAll++;
                        } else if (value == -1) {
                            lAll++;
                        }
                        // break;
                    }
                }
            }
            var roiDay = sumDay / rDay * 100;
            if (isNaN(roiDay)) {
                roiDay = 0;
            }
            var roiWeek = sumWeek / rWeek * 100;
            if (isNaN(roiWeek)) {
                roiWeek = 0;
            }
            var roiMonth = sumMonth / rMonth * 100;
            if (isNaN(roiMonth)) {
                roiMonth = 0;
            }
            var roiMonth6 = sumMonth6 / rMonth6 * 100;
            if (isNaN(roiMonth6)) {
                roiMonth6 = 0;
            }
            var roiYear = sumYear / rYear * 100;
            if (isNaN(roiYear)) {
                roiYear = 0;
            }
            var roiAll = sumAll / rAll * 100;
            if (isNaN(roiAll)) {
                roiAll = 0;
            }

            var wlDay = wDay / (wDay + lDay) * 100;
            var wlWeek = wWeek / (wWeek + lWeek) * 100;
            var wlMonth = wMonth / (wMonth + lMonth) * 100;
            var wlMonth6 = wMonth6 / (wMonth6 + lMonth6) * 100;
            var wlYear = wYear / (wYear + lYear) * 100;
            var wlAll = wAll / (wAll + lAll) * 100;

            var redcolor = "#f77474";
            var bluecolor = "#8cb6ff";
            document.getElementById("pld" + games[i]).innerHTML = "$  " + sumDay.toFixed(2);
            if (sumDay < 0) {
                document.getElementById("pld" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pld" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plw" + games[i]).innerHTML = "$  " + sumWeek.toFixed(2);
            if (sumWeek < 0) {
                document.getElementById("plw" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plw" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plm" + games[i]).innerHTML = "$  " + sumMonth.toFixed(2);
            if (sumMonth < 0) {
                document.getElementById("plm" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plm" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pl6m" + games[i]).innerHTML = "$  " + sumMonth6.toFixed(2);
            if (sumMonth6 < 0) {
                document.getElementById("pl6m" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pl6m" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ply" + games[i]).innerHTML = "$  " + sumYear.toFixed(2);
            if (sumYear < 0) {
                document.getElementById("ply" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ply" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pla" + games[i]).innerHTML = "$  " + sumAll.toFixed(2);
            if (sumAll < 0) {
                document.getElementById("pla" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pla" + games[i]).style.backgroundColor = bluecolor;
            }

            document.getElementById("pldr" + games[i]).innerHTML = roiDay.toFixed(2) + " %";
            if (roiDay < 0) {
                document.getElementById("pldr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pldr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plwr" + games[i]).innerHTML = roiWeek.toFixed(2) + " %";
            if (roiWeek < 0) {
                document.getElementById("plwr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plwr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plmr" + games[i]).innerHTML = roiMonth.toFixed(2) + " %";
            if (roiMonth < 0) {
                document.getElementById("plmr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plmr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("pl6mr" + games[i]).innerHTML = roiMonth6.toFixed(2) + " %";
            if (roiMonth6 < 0) {
                document.getElementById("pl6mr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("pl6mr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plyr" + games[i]).innerHTML = roiYear.toFixed(2) + " %";
            if (roiYear < 0) {
                document.getElementById("plyr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plyr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("plar" + games[i]).innerHTML = roiAll.toFixed(2) + " %";
            if (roiAll < 0) {
                document.getElementById("plar" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("plar" + games[i]).style.backgroundColor = bluecolor;
            }

            document.getElementById("wrdr" + games[i]).innerHTML = wlDay.toFixed(2);
            document.getElementById("wrd" + games[i]).innerHTML = wDay + " - " + lDay;
            if (wlDay <= 50) {
                document.getElementById("wrdr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wrdr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("wrwr" + games[i]).innerHTML = wlWeek.toFixed(2);
            document.getElementById("wrw" + games[i]).innerHTML = wWeek + " - " + lWeek;
            if (wlWeek <= 50) {
                document.getElementById("wrwr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wrwr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("wrmr" + games[i]).innerHTML = wlMonth.toFixed(2);
            document.getElementById("wrm" + games[i]).innerHTML = wMonth + " - " + lMonth;
            if (wlMonth <= 50) {
                document.getElementById("wrmr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wrmr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("wr6mr" + games[i]).innerHTML = wlMonth6.toFixed(2);
            document.getElementById("wr6m" + games[i]).innerHTML = wMonth6 + " - " + lMonth6;
            if (wlMonth6 <= 50) {
                document.getElementById("wr6mr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wr6mr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("wryr" + games[i]).innerHTML = wlYear.toFixed(2);
            document.getElementById("wry" + games[i]).innerHTML = wYear + " - " + lYear;
            if (wlYear <= 50) {
                document.getElementById("wryr" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wryr" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("wrar" + games[i]).innerHTML = wlAll.toFixed(2);
            document.getElementById("wra" + games[i]).innerHTML = wAll + " - " + lAll;
            if (wlAll <= 50) {
                document.getElementById("wrar" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("wrar" + games[i]).style.backgroundColor = bluecolor;
            }

            redcolor = "#faa866";
            bluecolor = "#faa866";
            document.getElementById("rd" + games[i]).innerHTML = "$  " + rDay.toFixed(2);
            if (rDay < 0) {
                document.getElementById("rd" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rd" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("rw" + games[i]).innerHTML = "$  " + rWeek.toFixed(2);
            if (rWeek < 0) {
                document.getElementById("rw" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rw" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("rm" + games[i]).innerHTML = "$  " + rMonth.toFixed(2);
            if (rMonth < 0) {
                document.getElementById("rm" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("rm" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("r6m" + games[i]).innerHTML = "$  " + rMonth6.toFixed(2);
            if (rMonth6 < 0) {
                document.getElementById("r6m" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("r6m" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ry" + games[i]).innerHTML = "$  " + rYear.toFixed(2);
            if (rYear < 0) {
                document.getElementById("ry" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ry" + games[i]).style.backgroundColor = bluecolor;
            }
            document.getElementById("ra" + games[i]).innerHTML = "$  " + rAll.toFixed(2);
            if (rAll < 0) {
                document.getElementById("ra" + games[i]).style.backgroundColor = redcolor;
            } else {
                document.getElementById("ra" + games[i]).style.backgroundColor = bluecolor;
            }
        }
        var totRoiDay = totDay / totRDay * 100;
        if (isNaN(totRoiDay)) {
            totRoiDay = 0;
        }
        var totRoiWeek = totWeek / totRWeek * 100;
        if (isNaN(totRoiWeek)) {
            totRoiWeek = 0;
        }
        var totRoiMonth = totMonth / totRMonth * 100;
        if (isNaN(totRoiMonth)) {
            totRoiMonth = 0;
        }
        var totRoiMonth6 = totMonth6 / totRMonth6 * 100;
        if (isNaN(totRoiMonth6)) {
            totRoiMonth6 = 0;
        }
        var totRoiYear = totYear / totRYear * 100;
        if (isNaN(totRoiYear)) {
            totRoiYear = 0;
        }
        var totRoiAll = totAll / totRAll * 100;
        if (isNaN(totRoiAll)) {
            totRoiAll = 0;
        }

        var redcolor = "#f77474";
        var bluecolor = "#8cb6ff";
        document.getElementById("pld" + "x").innerHTML = "$  " + totDay.toFixed(2);
        if (totDay < 0) {
            document.getElementById("pld" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pld" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plw" + "x").innerHTML = "$  " + totWeek.toFixed(2);
        if (totWeek < 0) {
            document.getElementById("plw" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plw" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plm" + "x").innerHTML = "$  " + totMonth.toFixed(2);
        if (totMonth < 0) {
            document.getElementById("plm" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plm" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pl6m" + "x").innerHTML = "$  " + totMonth6.toFixed(2);
        if (totMonth6 < 0) {
            document.getElementById("pl6m" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pl6m" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ply" + "x").innerHTML = "$  " + totYear.toFixed(2);
        if (totYear < 0) {
            document.getElementById("ply" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ply" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pla" + "x").innerHTML = "$  " + totAll.toFixed(2);
        if (totAll < 0) {
            document.getElementById("pla" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pla" + "x").style.backgroundColor = bluecolor;
        }

        document.getElementById("pldr" + "x").innerHTML = totRoiDay.toFixed(2) + " %";
        if (totRoiDay < 0) {
            document.getElementById("pldr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pldr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plwr" + "x").innerHTML = totRoiWeek.toFixed(2) + " %";
        if (totRoiWeek < 0) {
            document.getElementById("plwr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plwr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plmr" + "x").innerHTML = totRoiMonth.toFixed(2) + " %";
        if (totRoiMonth < 0) {
            document.getElementById("plmr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plmr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("pl6mr" + "x").innerHTML = totRoiMonth6.toFixed(2) + " %";
        if (totRoiMonth6 < 0) {
            document.getElementById("pl6mr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("pl6mr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plyr" + "x").innerHTML = totRoiYear.toFixed(2) + " %";
        if (totRoiYear < 0) {
            document.getElementById("plyr" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plyr" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("plar" + "x").innerHTML = totRoiAll.toFixed(2) + " %";
        if (totRoiAll < 0) {
            document.getElementById("plar" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("plar" + "x").style.backgroundColor = bluecolor;
        }

        redcolor = "#faa866";
        bluecolor = "#faa866";
        document.getElementById("rd" + "x").innerHTML = "$  " + totRDay.toFixed(2);
        if (totRDay < 0) {
            document.getElementById("rd" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rd" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("rw" + "x").innerHTML = "$  " + totRWeek.toFixed(2);
        if (totRWeek < 0) {
            document.getElementById("rw" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rw" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("rm" + "x").innerHTML = "$  " + totRMonth.toFixed(2);
        if (totRMonth < 0) {
            document.getElementById("rm" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("rm" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("r6m" + "x").innerHTML = "$  " + totRMonth6.toFixed(2);
        if (totRMonth6 < 0) {
            document.getElementById("r6m" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("r6m" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ry" + "x").innerHTML = "$  " + totRYear.toFixed(2);
        if (totRYear < 0) {
            document.getElementById("ry" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ry" + "x").style.backgroundColor = bluecolor;
        }
        document.getElementById("ra" + "x").innerHTML = "$  " + totRAll.toFixed(2);
        if (totRAll < 0) {
            document.getElementById("ra" + "x").style.backgroundColor = redcolor;
        } else {
            document.getElementById("ra" + "x").style.backgroundColor = bluecolor;
        }
    }

    function winRateFigure(code, code2, code3) {
        var games = ["t", "b", "s", "bb", "f", "fi", "h", "g"];
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");

        for (let i = 0; i < games.length; i++) {
            var gameType = "";
            if (games[i] == "s") {
                gameType = "Soccer";
            } else if (games[i] == "b") {
                gameType = "Baseball";
            } else if (games[i] == "t") {
                gameType = "Tennis";
            } else if (games[i] == "bb") {
                gameType = "Basketball";
            } else if (games[i] == "f") {
                gameType = "Football";
            } else if (games[i] == "fi") {
                gameType = "Fighting";
            } else if (games[i] == "h") {
                gameType = "Hockey";
            } else if (games[i] == "g") {
                gameType = "Golf";
            }
            var countWin = 0;
            var countLoss = 0;
            var countTotal = 0;
            for (let i = 1; i <= table; i++) {
                var data_time = document.getElementsByClassName("row-" + i)[0].getAttribute("data-time");
                var data_game = document.getElementsByClassName("row-" + i)[0].getAttribute("data-game");
                var bet_type = document.getElementsByClassName("row-" + i)[0].getAttribute("bet-type");
                var category = document.getElementsByClassName("row-" + i)[0].getAttribute("category");
                var subcat = document.getElementsByClassName("subcat-" + i)[0].value;
                var book = document.getElementsByClassName("book-" + i)[0].value;
                var fd = document.getElementById("fd-" + i).innerHTML;
            }
        }


    }

    function showReport() {
        var a = "";
        var b = "";
        var c = [];
        var d = [];
        var radios = document.getElementsByName("myRadios");
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                a = radios[i].value;
                break;
            }
        }
        var radios = document.getElementsByName("myRadios2");
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                b = radios[i].value;
                break;
            }
        }
        var radios = document.getElementsByName("myRadios3");
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                c.push(radios[i].value);
            }
        }
        // alert(a);
        // alert(b);
        // alert(c);
        calcFigure(a, b, c);
        calcFigure2(a, b, c);
    }

    $(document).ready(function () {
        var table = document.getElementsByClassName("totalRows")[0].getAttribute("value");
        for (let i = 1; i <= table; i++) {
            // alert(i);
            loaded(document.getElementsByClassName("select-" + i)[0]);
            loaded2(document.getElementsByClassName("towin-" + i)[0]);
        }
        // calcFigure(1,"","");
        showReport();
        $('table.tgx').DataTable({
            paging: false,
            searching: false,
        });
    });
</script>
</body>
</html>
