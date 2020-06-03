<?php
include 'connection.php';

$barcode = $_POST['barcode'];
$pname = $_POST['pname'];
$supplier = $_POST['supplier'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$originalPrice = $_POST['originalPrice'];
$sellingPrice = $_POST['sellingPrice'];
$date = $_POST['date'];

$query = mysqli_query($con, "UPDATE products_table SET Product_Name = '$pname', Supplier_Id = '$supplier', category_id = '$category', Quantity = '$quantity', Original_price = '$originalPrice', Selling_price = '$sellingPrice', date = '$date' WHERE ProductCode = '$barcode' ");

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Updated Successfully';
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Updation Failed';
}

echo json_encode($response);
?>
