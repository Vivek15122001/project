<?php

include('ser.php'); 

$searchTerm = $_GET['productname'];
$sql = "SELECT productname FROM product WHERE productname LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {
   $data['value'] = $row['productname'];
   array_push($tutorialData, $data);
} 
}
 echo json_encode($tutorialData);
?>