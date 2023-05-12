<?php
include 'connexion.php';
$title = "Medecins";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$total_brands = $pdo->query("SELECT DISTINCT brand AS brand_name FROM products");
$tags_string = $pdo->query("SELECT tags FROM products");

$tags_array = array();

while ($row = $tags_string->fetch(PDO::FETCH_ASSOC)) {
    $tags = explode(',', $row['tags']);
    foreach ($tags as $tag) {
        $tag = trim($tag);
        if (!in_array($tag, $tags_array)) {
            $tags_array[] = $tag;
        }
    }
}



ob_start();
?>
<?php include 'navbar.php'; ?>
<!-- title page -->
<section class="tf-page-title">
    <div class="tf-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title-heading">EXPLORE COLECTIONS</h2>
                <ul class="breadcrumbs">
                    <li><a href="index.php">HOME</a></li>
                    <li>COLLECTIONS</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="tf-collection-inner">
    <div class="tf-container">
        <div class="row ">
            <div class="col-lg-3 col-md-4">
                <div class="sidebar sidebar-collection">
                    <div class="widget widget-clothing widget-accordion">
                        <h6 class="widget-title active">Brands</h6>
                        <div class="widget-content">
                            <form action="#" class="form-checkbox">
                                <?php
                                foreach ($total_brands as $brand) {
                                    echo '<label class="checkbox-item">
                                                 
                                                <span class="custom-checkbox">
                                                    <input name="filter[]" data-filter="brands" value="' . $brand['brand_name'] . '" type="checkbox" >
                                                    <span class="btn-checkbox"></span>
                                                </span>
                                                <span>' . $brand['brand_name'] . '</span>                                              
                                            </label>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="widget widget-eyes widget-accordion">
                        <h6 class="widget-title active">Tags</h6>
                        <div class="widget-content">
                            <form action="#" class="form-checkbox">
                                <?php
                                foreach ($tags_array as $tag) {
                                    echo '<label class="checkbox-item">
                                                 
                                                <span class="custom-checkbox">
                                                    <input name="filter[]" data-filter="tags" value="' . $tag . '" type="checkbox" >
                                                    <span class="btn-checkbox"></span>
                                                </span>
                                                <span>' . $tag . '</span>                                              
                                            </label>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8 ">
                <div class="top-option">
                    <h2 class="heading">All Items</h2>

                    <div class="widget widget-search">
                        <form action="#">
                            <input type="text" placeholder="Search NFT" required="">
                            <a class="btn-search"><i class="icon-fl-search-filled"></i></a>
                        </form>
                    </div>

                </div>

                <div id="products" class="row">
                    <?php
                    // Connect to the database
                  
                       
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Query the database for products
                        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
                        $stmt = $pdo->query($sql);

                        // Display the products
                        if ($stmt->rowCount() > 0) {
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                <div class="tf-product">
                     <div class="image">
                         <img src="' . $row['img'] . '" alt="Image">
                     </div>
                     <h6 class="name"><a href="item-detail.php?id=' . $row['id'] . '">' . $row['name'] . '</a>
                     <span class="float-right">' . $row['price'] . '</span>
                     </h6>
                </div>
            </div>';
                            }
                        } else {
                            echo 'No products found.';
                        }
                   

                    // Close the database connection
                    $pdo = null;
                    ?>


                </div>

            </div>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
include 'base.php';
?>