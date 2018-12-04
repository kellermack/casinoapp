<?php
    $servername ="127.0.0.1";
    $username = "root";
    $password = "";
    $dbName = "vegaspoker";
    
    $conn = new mysqli($servername, $username, $password, $dbName);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
} 

    $sql = "SELECT grouping, casino, FROM vegas_19";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
             echo "grouping: " . $row["grouping"]. " - Casino: " . $row["casino"]. " " . $row["game"]. "<br>";
    }
    } else {
        echo "0 results";
    }
    
    $conn->close();

       
    
  
    

?>
    







    
    
    
   

    
