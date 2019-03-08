<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generator
 *
 * @author kelle
 */
class Generator {
    
    public function getTable($data){
            
            
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
    }           else{ 
                 echo "No Matching records are found."; 
    } 
        }       else{ 
                 echo "ERROR: Could not able to execute $sql. "  
                                . mysqli_error($conn); 
} 
            mysqli_close($conn); 
}
