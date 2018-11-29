<?php

    require('database.php');

    
?>









<!DOCTYPE html>

<html>

    
<head>
        <meta charset="UTF-8">
        <title>Las Vegas Summer Poker Tour</title>
        <link rel="stylesheet" type="text/css" href="newcss.css" />
</head> 

       
           
        
    
<body>
        
    
        <h1>2019 Las Vegas Poker Donkfest</h1>
    
    
    
    
        <h1>Sort by Casino Name</h1>
    
    <?php

        $sql = "SELECT * FROM vegas:";
        $result = mysqli_query($conn, $sql);
        
      ?>
        
        
        <form action="displayResults.php" method="post">
        
        <select name="casinoName">
		<option value="-All-">-All-</option>
		<option value="Aria">Aria</option>
		<option value="Binions">Binions</option>
		<option value="Nugget">Nugget</option>
		<option value="Orleans">Orleans</option>
		<option value="PH">PH</option>
		<option value="Rio">Rio</option>
		<option value="Venetian">Venetian</option>
		<option value="Wynn">Wynn</option>
        </select>  
        
       
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="search"><br>
        </div>   
        </form>
                    
    
                    
                    
    
                
        
        
        <br>
        <br>
        
        
        <h2>Sort by Date</h2>
        
        <br>
        
        
        
        <form action="displayResults.php" method="post">
        
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
                
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="search"><br>
        </div> 
        
       </form>
                
                
                
        <h4>Sort by Buy In</h4>
        
        <form action="displayResults.php" method="post">
        
        
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
        
    </form>
        
  </body>
</html>       
        
        
        
        
        
        
        
        
        
        
        
        
        
   
