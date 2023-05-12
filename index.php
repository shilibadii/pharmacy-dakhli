<?php
$title = "Home";
include 'connexion.php';
try {
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to count number of rows in products table
    $total_prods_query = "SELECT COUNT(*) AS total FROM products";
    $total_prods_stmt = $pdo->query($total_prods_query);
    $total_prods_result = $total_prods_stmt->fetch(PDO::FETCH_ASSOC);

    // Get total number of products
    $total_products = $total_prods_result['total'];

    // Query to count number of distinct brands in products table
    $total_brands_query = "SELECT COUNT(DISTINCT brand) AS num_brands FROM products";
    $total_brands_stmt = $pdo->query($total_brands_query);
    $total_brands_result = $total_brands_stmt->fetch(PDO::FETCH_ASSOC);

    // Get total number of brands
    $total_brand_num = $total_brands_result['num_brands'];

} catch (PDOException $e) {
    // Handle database connection or query errors
    echo "An error occurred: " . $e->getMessage();
}


ob_start();
?>
<?php include 'navbar.php'; ?>
<section class="tf-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="swiper-container slider-home ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="tf-slider-item">
                                    <div class="content-inner">
                                        <h1 class="heading mb0">WITH
                                            <span class="animationtext clip">
                                                <span class="cd-words-wrapper">
                                                    <span class="item-text is-visible">PHARMACY</span>
                                                    <span class="item-text is-hidden">PHARMACY</span>
                                                    <span class="item-text is-hidden">PHARMACY</span>
                                                </span>
                                            </span>
                                        </h1>
                                        <h1 class="heading"> EXPLORE MEDACIN COLLECTION </h1>
                                        <p class="sub-heading">We are the best way to buy medecins online
                                        </p>
                                        <div class="btn-slider ">
                                            
                                            <a href="medecins.php" class="tf-button style-2">CHECK NOW</a>
                                        </div>
                                    </div>

                                    <div style="width:700px" class="content-right ">
                                        <div class="content-slide">
                                            <?php
                                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            // Query the database for products
                                            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
                                            $stmt = $pdo->query($sql);
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            // Display the products
                                            


                                            if ($stmt->rowCount() > 0) {
                                                   
                                                    echo '<div class="swiper swiper-slider swiper-v mr25">';
                                                    echo '<div class="swiper-wrapper sl-h">';
                                                    foreach ($result as $row)  {
                                           
                                                    echo '<div class="swiper-slide">';
                                                    echo '<img src="' . $row['img'] . '" alt="Image" class="img-slider-1">';
                                                    echo '</div>';
                                                    }
                                                    echo '</div>';
                                                    echo '</div>';
                                                
                                                   
                                                    echo '<div class="swiper swiper-slider-2 swiper-v mr25">';
                                                    echo '<div class="swiper-wrapper sl-h">';
                                                    shuffle($result);
                                                    foreach ($result as $row)  {
     
                                                    echo '<div class="swiper-slide">';
                                                    echo '<img src="' . $row['img'] . '" alt="Image" class="img-slider-2">';
                                                    echo '</div>';
                                                    }
                                                    echo '</div>';
                                                    echo '</div>';
                                               
                                                   
                                                    echo '<div class="swiper swiper-slider-3 swiper-v">';
                                                    echo '<div class="swiper-wrapper sl-h">';
                                                    shuffle($result);
                                                    foreach ($result as $row)  {
                                     
                                                    echo '<div class="swiper-slide">';
                                                    echo '<img src="' . $row['img'] . '" alt="Image" class="img-slider-3">';
                                                    echo '</div>';
                                                    }
                                                    echo '</div>';
                                                    echo '</div>';
                                                
                                            } else {
                                                echo 'No products found.';
                                            }
                                           
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- item-->
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
</section>
<section class="logo-slider">
    <div class="logo-slider-wrap">
        <div class="logo-slider-inner">
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
        </div>
        <div class="logo-slider-inner style-2">
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
            <h3>PHARMACY</h3>
        </div>
    </div>
</section>

<section class="tf-section tf-about">
    <div class="tf-container">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="icon">
                    <svg width="208" height="208" viewBox="0 0 208 208" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_2337_5328)">
                            <path
                                d="M88.0594 196L88.0594 142.485L50.2119 180.333L27.6674 157.788L65.5149 119.941L12 119.941L12 88.0594L65.5149 88.0594L27.6674 50.2119L50.2119 27.6673L88.0594 65.5148L88.0594 12L119.941 12L119.941 65.5149L157.788 27.6673L180.333 50.2119L142.485 88.0594L196 88.0594L196 119.941L142.485 119.941L180.333 157.788L157.788 180.333L119.941 142.485L119.941 196L88.0594 196Z"
                                fill="url(#paint0_linear_2337_5328)" />
                        </g>
                        <defs>
                            <filter id="filter0_f_2337_5328" x="0" y="0" width="208" height="208"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                <feGaussianBlur stdDeviation="6" result="effect1_foregroundBlur_2337_5328" />
                            </filter>
                            <linearGradient id="paint0_linear_2337_5328" x1="196" y1="104" x2="12" y2="104"
                                gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="var(--primary-color35)" />
                                <stop offset="1" stop-color="var(--primary-color35)" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="icon-2">
                    <svg width="302" height="302" viewBox="0 0 302 302" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_2337_5282)">
                            <path
                                d="M234.678 38.4808L198.329 110.138L274.714 85.1672L289.589 130.668L213.203 155.638L284.86 191.988L263.205 234.677L191.548 198.328L216.518 274.713L171.018 289.588L146.047 213.202L109.698 284.859L67.0084 263.204L103.358 191.547L26.9721 216.517L12.0979 171.017L88.4837 146.046L16.8268 109.697L38.4818 67.0074L110.139 103.357L85.1682 26.9711L130.669 12.0969L155.639 88.4827L191.989 16.8258L234.678 38.4808Z"
                                fill="url(#paint0_linear_2337_5282)" />
                        </g>
                        <defs>
                            <filter id="filter0_f_2337_5282" x="0.0976562" y="0.0966797" width="301.49" height="301.491"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                <feGaussianBlur stdDeviation="6" result="effect1_foregroundBlur_2337_5282" />
                            </filter>
                            <linearGradient id="paint0_linear_2337_5282" x1="27.6543" y1="88.352" x2="274.032"
                                y2="213.333" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="var(--primary-color35)" />
                                <stop offset="1" stop-color="var(--primary-color35)" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <div class="tf-heading wow fadeInUp">
                    <h2 class="heading">ABOUT US</h2>
                    <p class="sub-heading">Welcome to our Pharmacy, your trusted neighborhood pharmacy serving the community for over 20 years. We are dedicated to providing high-quality healthcare services and personalized care to our valued customers</p>
                </div>

                <div class="counter-wrap wow fadeInUp" data-wow-delay="0.2s">
                    <div class="tf-counter ">
                        <h6>Total Medecins</h6>
                        <div class="content">
                            <span class="counter-number" data-to="<?php echo $total_products ?>" data-speed="2000"><?php echo $total_products ?></span>+
                        </div>
                    </div>
                    <div class="tf-counter wow fadeInUp" data-wow-delay="0.3s">
                        <h6>Total Brands</h6>
                        <div class="content">
                            <span class="counter-number" data-to="<?php echo $total_brand_num ?>" data-speed="2000"><?php echo $total_brand_num ?></span>+
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php
                        

                        // Query the database for products
                        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
                        $stmt = $pdo->query($sql);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
<section class=" tf-collection ">
    <div class="tf-container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="swiper-container collection-1 visible">
                    <div class="swiper-wrapper ">
                    
                    <?php
                        // Display the products
                        


                        if ($stmt->rowCount() > 0) {
                           
                            foreach ($result as $row) {
          
                           echo '<div class="swiper-slide">
                            <div class="slider-item">
                                <div  class="tf-product ">
                                    <div  class="image">
                                        <img  src="'.$row['img'].'" alt="Image">
                                    </div>
                                    <h6 class="name"><a href="item-detail.php?id='.$row['id'].'">'.$row['name'].'</a></h6>
                                </div>
                            </div><!-- item-->
                        </div>';
                        shuffle($result);
                    };
                        } else {
                            echo 'No products found.';
                        }
                       
                        ?>
                  
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="tf-container-2">
        <div class="row">

            <div class="col-md-12">
                <div class="swiper-container collection-2 visible">
                    <div class="swiper-wrapper ">
                    <?php
                        // Display the products
                        


                       
                            foreach ($result as $row) {
            
                           echo '<div  class="swiper-slide">
                            <div  class="slider-item">
                                <div  class="tf-product ">
                                    <div  class="image">
                                        <img  src="'.$row['img'].'" alt="Image">
                                    </div>
                                    <h6 class="name"><a href="item-detail.php?id='.$row['id'].'">'.$row['name'].'</a></h6>
                                </div>
                            </div><!-- item-->
                        </div>';
                  
                    };
                      
                        
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
// Close the database connection
$pdo=null;
$content = ob_get_clean();
include 'base.php';
?>