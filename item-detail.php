<?php
$title = "Item Details";
ob_start();

include 'connexion.php';
try {
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $product_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo=null;
    

} catch (PDOException $e) {
    // Handle database connection or query errors
    echo "An error occurred: " . $e->getMessage();
}

// Check if the query was successful
if ($stmt->rowCount() > 0) {

  $pdo=null;
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
                                </div>';
                                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                                  echo  '<div class="group-btn">
                                <a href="delete.php?id='.$product['id'].'" class="tf-button opensea"> DELETE</a>
                             
                                </div>';
                                }
                            echo '</div>
                        </div>
                   </div>
                </div>
            </section>';
            
            ?>

<?php
$content = ob_get_clean();
include 'base.php';
?>