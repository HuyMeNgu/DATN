<?php
require_once('connectdb.php');
 

function query($sql){
    global $conn;
    $result = $conn -> query($sql);
    return $result;
}

// function insert($table,$data){
//     $key=array_keys($data);
//     $value=array_values($data);
//     $feilds =  implode("`,`",$key);
//     $valuetb=  "'" .implode("','",$value)."'";

//    // $sql= 'INSERT INTO `'. $table . "`(`'.$feilds.'`)' . 'VALUES('. $valuetb . ')';
//    $sql="INSERT INTO ` ".$table."`(`".$feilds."`) VALUES (" .$valuetb.")";

//     $result =query($sql);
//     return $result;
// }
//toi uu ham insert 
 function insert($table, $data)
{
    $keys = array_keys($data);
    $fields = implode("`,`", $keys);
    $values = "'" . implode("','", array_values($data)) . "'";

    $sql = "INSERT INTO `" . $table . "` (`" . $fields . "`) VALUES (" . $values . ")";
    // echo ($sql);
    // die();
    return query($sql);
}
//toi uu ham update
function update($table,$data,$condition=''){
$set='';
foreach($data as $key=>$value){
    $set .= "$key = '$value',";
}
$set=rtrim($set,',');
$sql="UPDATE $table SET $set";

if(!empty($condition)){
    $sql.=" WHERE $condition";
}
return query($sql);
}
//toi uu ham xoa
function delete($table,$condition=''){
    $sql="DELETE FROM $table";
    if(!empty($condition)){
        $sql.="WHERE $condition";
    }
    return query($sql);
}
//ham lay gia tri nhieu dong
function getRaw($sql){
    $result=query($sql);
    $rows=[];
    if($result && $result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $rows[]=$row;
        }
    }
    return $rows;
}
//ham lay gia tri 1 dong
function oneRaw($sql){
    $result=query($sql);
    $row=null;
    if($result&&$result->num_rows>0){
        $row=$result->fetch_assoc();
    }
    return $row;
}
//ham dem so dong
function countRows($sql){
    $result=query($sql);
    $numRows=0;
     if($result){
        $numRows=$result->num_rows;
     }
     return $numRows;
    }
?>