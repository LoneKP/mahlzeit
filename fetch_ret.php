
<?php
  
     header('Content-type: application/json; charset=UTF-8');
   
     require_once 'DBconfig.php';
 
  
     

     $data = array();
$stmt = $DBcon->query('SELECT * FROM ret WHERE udsolgt_ret=0');
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $key => $value) {
    $data[$key] = $value;
    $result = json_encode($data);
}
echo $result; 