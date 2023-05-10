<?php
$title = "Item Details";
ob_start();

// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'pharmacy';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$product_id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (mysqli_num_rows($result)>0) {

  // Close the database connection
  mysqli_close($conn);
} else {
  // If the query failed,
  // Redirect user to 404 not found page
  header("location: 404.php");
}


include 'navbar.php'; ?>
<!-- title page -->
<section class="tf-page-title">    
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title-heading">ITEM DETAIL</h2>
                            <ul class="breadcrumbs">
                                <li><a href="index.php">HOME</a></li>
                                <li>ITEM DETAIL</li>
                            </ul> 
                        </div>
                    </div>
                </div>                    
            </section>
            <?php 
            $product = mysqli_fetch_assoc($result);
           
            echo '<section class=" tf-item-detail ">
                <div class="tf-container">
                   <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="tf-item-detail-image">
                                <img src="'.$product['img'].'" alt="Image">
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="tf-item-detail-inner">
                                <h2 class="title">'.$product['name'].'</h2>
                                <p class="des">'.$product['description'].'
                                </p>
                                <div class="infor-item-wrap">
                                    <div class="infor-item-box">
                                        <div class="category">Brand</div>
                                        <h4 class="name">'.$product['brand'].'</h4>
                                    </div>
                                    <div class="infor-item-box">
                                        <div class="category">Status</div>
                                        <h4 class="name">'.$product['status'].'</h4>
                                    </div>
                                
                                    
                               
                                    
                                </div>
                                <ul class="filter-content">';
                                  foreach(explode(",",($product['tags'])) as $tag)  {
                                   echo '<li><a href="#">'.$tag.'<i class="fal fa-times"></i></a></li>';
                                  }
                                
                                 
                                echo '</ul>
                                <div class="price">
                                    <span class="heading">PRICE:</span>
                                    <span>'.$product['price'].'</span>
                                </div>
                               
                            </div>
                        </div>
                   </div>
                </div>
            </section>';
            
            ?>

<?php
$content = ob_get_clean();
include 'base.php';
?>