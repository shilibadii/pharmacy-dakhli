<?php
include 'connexion.php';
// Get the selected filters from the POST request
$brands = $_POST['brands'];
$brands = json_decode($brands);
$tags = $_POST['tags'];
$tags = json_decode($tags);
if (!empty($tags) ||!empty($brands)) {
// Construct the SQL query with the selected filters as conditions
$sql = 'SELECT * FROM products WHERE ';
foreach ($brands as $brand) {
  $sql .= 'brand = "' . $brand . '" OR ';
}
$sql = rtrim($sql, ' OR ');
if (!empty($tags) && !empty($brands)){
    $sql .='AND (' ;
}

foreach ($tags as $tag) {
    
    $sql .= '  tags LIKE "%' . $tag . '%" AND';

  }
$sql = rtrim($sql, ' AND ');
if(!empty($tags) && !empty($brands)){
    $sql .=')' ;

}
// Execute the query and fetch the filtered products
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
$sql = 'SELECT * FROM products ';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Return the filtered products as JSON data
header('Content-Type: application/json');
echo json_encode($products);
?>