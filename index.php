


<!DOCTYPE html>

<html>

    
<head>
        <meta charset="UTF-8">
        <title>Las Vegas Summer Poker Tour</title>
        <link rel="stylesheet" type="text/css" href="newcss.css" />
</head> 

       
           
        
    
<body>
     
  

    
    <link rel="stylesheet" type="text/css" href="newcss.css" />
    
        <h1>2019 Las Vegas Poker Donkfest</h1>
    
    
    
    
        <h1>Sort by Casino Name</h1>
    
    <?php
        
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbName = 'vegaspoker';
    
        $conn = mysqli_connect($server, $username, $password, $dbName);
    
        $result = $conn->query($sql);
    
    
    
    
    
        $sql = "SELECT DISTINCT casino, FROM tournaments";
        
        $database = new Database();
        $casinoNames = $database->getCasinoNames();
            foreach($casinoNames as $casinoName){
            echo "<option value=\"$casinoName\">$casinoName</option>"; 
    }
    ?>    
        <form method="post" action="displayResults.php">
        
        <select name="casino[]">
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
            <input type="submit" name="casino">
                
        </div>   
                
        </form>  
                
       
            
            
            
            
            
            
        
       
       
        
                    
    
                    
                    
    
                
        
        
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
      
    </head>
<body>
    <main>
            <h1>Rebuy Calculator</h1>
            <?php if (!empty($errorMessage)) { ?>
                <p class="error"><?php echo htmlspecialchars($errorMessage); ?></p>
            <?php } ?>
            
                <form action="displayCalculation.php" method="post">
            
            <div id="data">
                <label>Buy In:</label>
                <input type="text" name="buyIn"
                    value="<?php echo htmlspecialchars($buyIn); ?>">
                <br>
                
                <label>Prize Pool:</label>
                <input type="text" name="prizePool"
                    value="<?php echo htmlspecialchars($prizePool); ?>">
                <br>
                
                <label>Positions Paid:</label>
                <input type="text" name="positionsPaid"
                    value="<?php echo htmlspecialchars($positionsPaid); ?>">
                <br>
                
                <label>Big Blinds:</label>
                <input type="text" name="bigBlinds"
                    value="<?php echo htmlspecialchars($bigBlinds); ?>">                    
                <br>
                
                <label>Average Blinds:</label>
                <input type="text" name="averageBlinds"
                    value="<?php echo htmlspecialchars($averageBlinds); ?>">
            </div>    
                
            <div id="buttons"> 
                <label>&nbsp;</label>
                <input type="submit" value="calculate EV"><br>
            </div>
            
        
         </form>  
        
    </main>
        
</body>
</html>         
         
