<?php
    //getting the final result 
    $buyIn = filter_input(INPUT_POST, 'buyIn',
            FILTER_VALIDATE_FLOAT);
    $prizePool = filter_input(INPUT_POST, 'prizePool',
            FILTER_VALIDATE_FLOAT);
    $bigBlinds = filter_input(INPUT_POST, 'bigBlinds',
            FILTER_VALIDATE_FLOAT);
    $averageBlinds = filter_input(INPUT_POST, 'averageBlinds',
            FILTER_VALIDATE_FLOAT);
    $positionsPaid = filter_input(INPUT_POST, 'positionsPaid',
            FILTER_VALIDATE_FLOAT);
    
    //validate this baby
    if ($buyIn === FALSE ) {
        $errorMessage = 'Buy In must be a valid number.';
    }  else if ( $buyIn <= 0 ) {
        $errorMessage = 'Buy In must be greater than zero.';
    }  else if ( $prizePool === FALSE ) {
        $errorMessage = 'Prize Pool must be a valid number.';
    }  else if ( $prizePool <= 0 ) {
        $errorMessage = 'Prize Pool must be greater than zero.';
    }  else if ($bigBlinds === FALSE ) {
        $errorMessage = 'Big Blind must be a valid number.';
    }  else if ( $bigBlinds <= 0 ) {
        $errorMessage = 'Big Blind must be greater than zero.';
    }  else if ($averageBlinds === FALSE ) {
        $errorMessage = 'Average Blinds must be a valid number.';
    }  else if ( $averageBlinds <= 0 ) {
        $errorMessage = 'Average Blind must be greater than zero.';
    }  else if ($positionsPaid === FALSE ) {
        $errorMessage = 'Positions Paid must be a valid number.';
    }  else if ( $positionsPaid <= 0 ) {
        $errorMessage = 'Buy In must be greater than zero.';
    
    } else {
        $errorMessage = '';
    }
    
    // if you get an error go to index page
    if ($errorMessage != '') {
        include('displayCalculation.php');
        exit();
    }
    
    //lets calculate this baby
    $calculateEv = ($prizePool * $bigBlinds) / ($positionsPaid * $averageBlinds * $buyIn)  
        
        
?>






















<!DOCTYPE html>
<html>
    <head>
        <title>Tournament Rebuy Calculator</title>
    </head>
    <body>
        <main>
            <h1>Tournament Rebuy Calculator</h1>
            <label>Rebuy Results:</label>
            <span><?php echo $calculateEv; ?></span>
            
            <p>If the number goes below one you are getting -EV</p>
        </main>
    </body>
</html>


