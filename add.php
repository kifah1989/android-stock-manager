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

$response = array();

$query = mysqli_query($con, "SELECT * FROM products_table WHERE ProductCode=$barcode");

if(mysqli_num_rows($query) > 0){
  $response['success'] = 'false';
  $response['message'] = "item already exists";

}else{

  $query = mysqli_query($con, "INSERT INTO `products_table`(`Product_Name`, `Supplier_Id`, `category_id`, `Quantity`, `Original_price`, `Selling_price`, `date`, `ProductCode`) VALUES ('$pname','$supplier','$category', '$quantity', '$originalPrice', '$sellingPrice', '$date', '$barcode')");
  if($query){
    $response['success'] = 'true';
    $response['message'] = 'Data Inserted Successfully';
  }else{
    $response['success'] = 'false';
    $response['message'] = 'Data Insertion Failed';
  }
}
echo json_encode($response);

?>
