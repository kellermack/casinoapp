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
    <style>
    table, th, td {
    border: 1px solid black;
}
</style>
    
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
        <input type="submit" name="casino"><br>
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
 
        <?php
        $conn = mysqli_connect("localhost", "root", "", "vegaspoker"); 
  
            if($conn === false){ 
                 die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
} 
        
        $sql = "SELECT * FROM tournaments WHERE cost < 500";
        
        
       
       
        if($res = mysqli_query($conn, $sql)){ 
            if(mysqli_num_rows($res) > 0){ 
                echo "<table><tr><th>id</th><th>grouping</th><th>casino</th><th>cost</th><th>game</th><th>schedule</th>
                <th>fee_percent</th><th>s_points</th><th>notes</th></tr>";
            echo "<tr>"; 
                
                 
            echo "</tr>"; 
        while($row = mysqli_fetch_array($res)){ 
            echo "<tr><td>". $row["id"]. "</td><td>". $row["grouping"]."</td><td>"
                    . $row["casino"]. "</td><td>". $row["cost"]. 
                        "</td><td>". $row["game"]. "</td><td>". $row["schedule"]."</td><td>".
        $row["fee_percent"]."</td><td>". $row["s_points"]."</td><td>". $row["notes"]."</tr>";
                
            echo "</tr>"; 
        } 
        echo "</table>"; 
        mysqli_free_result($res); 
    } else{ 
        echo "No Matching records are found."; 
    } 
        } else{ 
         echo "ERROR: Could not able to execute $sql. "  
                                . mysqli_error($conn); 
} 
  
mysqli_close($conn); 
?> 
          



    <!-- end of jason edits. we dont need all the forms on this page, they should be combined into one
    that way we can just send all the filters they select at the same time -->

   </form>      
    </body>
</html>         
         
