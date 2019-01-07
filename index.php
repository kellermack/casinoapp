<?php
    //setting default values at page load
    if (!isset($buyIn)) { $buyIn = ''; }
    if (!isset($prizePool)) { $prizePool = ''; }
    if (!isset($bigBlinds)) { $bigBlinds = ''; }
    if (!isset($averageBlinds)) { $averageBlinds = ''; }
    if (!isset($positionsPaid)) { $positionsPaid = ''; }
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Rebuy Calculator</title>
      
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
         