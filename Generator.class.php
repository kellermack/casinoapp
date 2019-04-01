<?php



Class CasinoTable {
    public $data = "";
      public function setNewTable($newdata) 
    {   $this->data = $newdata;
    
    
      $table = '<table>';
        $table .= '<tr><th>[id, grouping, casino, game, schedule, cost, fee_percent, s_points, notes]</th></tr>';
            foreach ($data as $row) {
                $table .= '<tr><td>' . $row['casino'] . '</td><td>' .  [id,grouping,casino,game, 
                    schedule,cost,fee_percent,s_points, notes] . '</td></tr>';
            }                
                $table .= '</table>';
              return $table;  
         
    }
    
    public function getNewTable() {
        return $this->data;
             
    }
}         
$pokerTable = new CasinoTable(); echo $pokerTable-> getNewTable();
    

  
    
   
    
    
        
        
        
        
        
        
        
        
    
    
    
    
    
    

           