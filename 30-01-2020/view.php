<?php

require_once 'connection.php';

//print table header
function printRowKey($tableData){
$tr = '';
    while($row = $tableData -> fetch_assoc()){
        $tr .= '<tr>';
        foreach($row as $key => $value){
            if($key == 'password')
                continue;
            $tr .= '<th>'.$key.'</th>';
        }
        $tr .= '<th> Action </th>';
        $tr .= '</tr>';
        break;
    }

    return $tr;
}

//print table Row value
function printRowValue($tableData){
$tr = '';
    while($row = $tableData -> fetch_assoc()){
        $tr .= '<tr>';
        foreach($row as $key => $value){
            $pos = strpos($value, 'jpg', 0);
            if($key == 'password' || $key == 'certificateFile')
                continue;
            if($pos){
                $tr .= '<td><img src="'.$value.'"></td>';    
                continue;
            }
            $tr .= '<td>'.$value.'</td>';
        }
        $tr .= "<td><a href='edit_html.php?editId=".$row['custId']."'>Edit</a> | <a href='delete.php?delId=".$row['custId']."'>Delete</a></td>";
        $tr .= '</tr>';
    }

    return $tr;
}

?>