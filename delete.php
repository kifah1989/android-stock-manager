<?php
include 'connection.php';

$id = $_POST['barcode'];

$query = mysqli_query($con, "DELETE FROM products_table WHERE ProductCode = '$id' ");

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Deleted Successfully';
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Deletion Failed';
}

echo json_encode($response);
?>
