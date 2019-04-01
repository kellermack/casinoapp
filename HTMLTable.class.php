<?php


class CasinoTable {
    public $data = [];
    public function __construct($data = [])  {
        $this->data = (array) $data;
        
    }
    
    public function getTable() {
        $html = '';
        
        if (true === empty($this->data)) {
            return $html;
        }
        
        $fields = ['id', 'grouping','casino','game','schedule','cost','fee_percent','s_points','notes'];
        $html .= '<table>';
        $html .= '<tr>';
        
        foreach ($fields as $field) {
            
            $html .= '<th style= "border:1px solid #bbb;padding:4px;">' . $field .
                    '</th>';
        }
        
            $html .= '</tr>';
            
            foreach ($this->data as $key=> $value) {
                $html .= '<tr>';
                
                
                if(is_array($value)){
                foreach ($this->data[$key] as $value) {
                    $html .= '<td style="border:1px solid #ccc:padding:4px:">' .
                            filter_var($value, FILTER_SANITIZE_STRING) . '<td>';
                }
                }
                    $html .= '</table>';
                    return $html;
        }
    }
}
    


$pokerTable = new CasinoTable([1, 'mygroup', 'mycasino1', 'agame1', 'aschedule', '25',
    '30', '2000', 'note']);

echo $pokerTable->getTable();
        
