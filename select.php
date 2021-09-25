<?php
include 'connection.php';


$query = mysqli_query($con, "SELECT * FROM products_table");
$data = array();
$qry_array = array();
$i = 0;
$total = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query)) {
  $data['Barcode'] = $row['ProductCode'];
  $data['Pname'] = $row['Product_Name'];
  $data['Supplier'] = $row['Supplier_Id'];
  $data['Category'] = $row['category_id'];
  $data['Quantity'] = $row['Quantity'];
  $data['OriginalPrice'] = $row['Original_price'];
  $data['SellingPrice'] = $row['Selling_price'];
  $data['Date'] = $row['date'];

  
  $qry_array[$i] = $data;
  $i++;
}

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Loaded Successfully';
  $response['total'] = $total;
  $response['data'] = $qry_array;
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Loading Failed';
}

echo json_encode($response);
?>
