<?php

class PrintTable {
    
    function createTableHeader($tableData){
        $tr = '';
        while($row = $tableData -> fetch_assoc()){
            $tr .= '<tr>';
            foreach($row as $key => $value){
                if($key == 'password')
                    continue;
                $tr .= '<th>'.$key.'</th>';
            }
            $tr .= '</tr>';
            break;
        }

        return $tr;
    }

    function createTableRow($tableData){
        $tr = '';
        while($row = $tableData -> fetch_assoc()){
            $tr .= '<tr>';
            foreach($row as $key => $value){
                if($key == 'password'){
                    continue;
                }
                $tr .= '<td>'.$value.'</td>';
            }
            $tr .= '</tr>';
        }
        return $tr;
    } 
}

?>