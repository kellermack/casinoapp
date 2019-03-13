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
<?php


 
class CasinoTable {
    public $data = array(); 
    public function getTable($data = ''){
        
        if (is_array($data)){
             
             
          $table = '<table>';
            $table .= '<tr><th>[id, grouping, casino, game, schedule, cost, fee_percent, s_points, notes]</th></tr>';
                foreach ($data as $row) {
                    $table .= '<tr><td>' . $row['casino'] . '</td><td>' .  [id,grouping,casino,game, 
                        schedule,cost,fee_percent,s_points, notes] . '</td></tr>';
                }                
                    $table .= '</table>';
                  return $table;  
         
             
         }   
            
     }       
}

 $pokerTable = new CasinoTable(); 
            echo $pokerTable-> getTable(); 
            
         
            
           
