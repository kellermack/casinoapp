<?php

// load DB
require('Database.class.php');
$database = new Database();

// get casino names
$casinoNames = $database->getCasinoNames();

// selected casino name if they submitted the form
$selectedCasino = '';
if (isset($_POST['casinoName'])) {
    $selectedCasino = $_POST['casinoName'];
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Las Vegas Summer Poker Tour</title>
    <link rel="stylesheet" type="text/css" href="newcss.css"/>
</head>

<body>

<h1>2019 Las Vegas Poker Donkfest</h1>

<h1>Sort by Casino Name</h1>

<form action="index.php" method="post">

    <!-- it's good to have labels for your form elements -->
    <label for="casinoName">Choose your casino</label>
    <br>
    <select id="casinoName" name="casinoName">
        <!-- set the default "all" option to 0 so if they pick all it comes through as just "0" and is easier to work with -->
        <option value="0">-All-</option>
        <?php
        // loop through the casino names
        foreach ($casinoNames as $casinoName) {
            // here we will add selected to the <option> html tag if this is our selected casino
            // this way the dropdown doesn't reset every time we submit the form
            $selected = '';
            if ($selectedCasino == $casinoName) {
                $selected = 'selected';
            }
            echo "<option value=\"$casinoName\" $selected>$casinoName</option>";
        }
        ?>
    </select>

    <div id="buttons">
        <input type="submit" name="search"><br>
    </div>

    <div>
        <?php
        // an example showing we know what was selected
        // we can do an if here because $selectedCasino will be null if nothing was submitted
        // or 0 if they picked -ALL-
        // null and 0 are both evaluated as false in an if, so this only runs if they picked an actual casino
        if ($selectedCasino) {
            echo "You chose $selectedCasino!";
        }
        ?>
    </div>
</form>
<!-- end of jason edits. we don't need all the forms on this page, they should be combined into one
    that way we can just send all the filters they select at the same time -->

        <br>
        <br>
        
        
        <h2>Sort by Date</h2>
        
        <br>
        
        
        
        <form action="index.php" method="post">
        
        <select name="Month">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5" selected>5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
        </select> / 
		
        <select name="Day">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14" selected>14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
        </select> / 
      
    

          
        
        
        <select name="Year">
                <option value="2018" selected>2018</option>
		<option value="2019">2019</option>
        </select>
                <br>
		to

                <br>



	<select name="Month">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7" selected>7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
        </select> /

	<select name="Day">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29" selected>29</option>
		<option value="30">30</option>
		<option value="31">31</option>
        </select> / 

        <select name="Year">
		<option value="2018" selected>2018</option>
		<option value="2019">2019</option>
        </select>  

        <div id="button">
            <label>&nbsp;</label>
            <input type="submit" name="search"><br>
        </div> 

       

        </form>

        <h4>Sort by Buy In</h4>

        <form action="index.php" method="post">


        <div id="data">
            <label>Minimum Buy In:</label>
            <input type="number" name="Min">

            <br>

        </div>
        <br>
        <div id="data">
            <label>Maximum Buy In:</label>
            <input type="number" name="Max">

            <br>

        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="search"><br>
        </div> 
        
        
        
        
  
        
    </body>
</html>         
         
