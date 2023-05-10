<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
$message="";
$type="";
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=pharmacy', 'root', '');
  
    // Get the form data
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $status = $_POST['status'];
    $price = $_POST['price'];
  
    // Upload the image file
    $target_dir = "uploads/";

    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        
     
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Check if the image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($image["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
    }
  
    // Check if the file already exists
    if (file_exists($target_file)) {
        $target_file = $target_dir.$image["name"] . '_' . uniqid() . '.' . $imageFileType;
      
    }
  
    // Check file size
    if ($image["size"] > 500000) {
      $uploadOk = 0;
      $message="Error file size is too large";
      $type="error";
    }
  
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
      $message="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $type="error";
    }
  
    // If everything is ok, try to upload file
            if ($uploadOk == 1) {
              if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Insert the product into the database
                $stmt = $pdo->prepare('INSERT INTO products (name, brand, price, status, img) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$name, $brand, $price, $status, $target_file]);
          
                // Redirect to the product list page
                $message="Medecin added successfully";
                $type="success";

              }
            }
      }else{
          $message="Please provide an image";
          $type="error";
      }
  }
?>
<?php
$title = "Add Medecin";
ob_start();
?>
<?php include 'navbar.php'; ?>

<section class="bg-sign-in">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="content-left vertical-carousel">
                    <div class="content-slide">
                        <?php
                        // Connect to the database
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'pharmacy';
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                        // Query the database for products
                        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query($conn, $sql);

                        // Display the products
                        


                        if (mysqli_num_rows($result) > 0) {
                            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            echo '<div class="swiper-container swiper mySwiper swiper-h">
                                                    <div class="swiper-wrapper">
                                                      <div class="swiper-slide">
                                                        <div class="swiper mySwiper1 swiper-v">
                                                          <div class="swiper-wrapper sl-h" >';
                            foreach ($result as $row) {
                                
                                echo '<div class="swiper-slide" data-swiper-autoplay="1000">
                                                    <div class="tf-product">
                                                        <div class="image">
                                                            <img src="' . $row['img'] . '" alt="Image">
                                                        </div>
                                                        <h6 class="name"><a href="item-detail.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h6>
                                                   </div>
                                                </div>';

                            }
                            echo '</div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>';
                            shuffle($result);

                            echo '<div class="swiper-container swiper mySwiper swiper-h">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide" >
                                            <div class="swiper mySwiper1 swiper-v">
                                              <div class="swiper-wrapper sl-h" >';
                            foreach ($result as $row) {
                                
                                echo '<div class="swiper-slide" data-swiper-autoplay="3000">
                                            <div class="tf-product">
                                                <div class="image">
                                                    <img src="' . $row['img'] . '" alt="Image">
                                                </div>
                                                <h6 class="name"><a href="item-detail.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h6>
                                           </div>
                                        </div>';

                            }
                            echo '</div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>';
                            shuffle($result);
                            echo '<div class="swiper-container swiper mySwiper swiper-h">
                                    <div class="swiper-wrapper">
                                      <div class="swiper-slide">
                                        <div class="swiper mySwiper1 swiper-v">
                                          <div class="swiper-wrapper sl-h" >';
                            foreach ($result as $row) {
                                
                                echo '<div class="swiper-slide" data-swiper-autoplay="5000">
                                        <div class="tf-product">
                                            <div class="image">
                                                <img src="' . $row['img'] . '" alt="Image">
                                            </div>
                                            <h6 class="name"><a href="item-detail.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h6>
                                       </div>
                                    </div>';

                            }
                            echo '</div>
                                        </div>
                                      </div>
                                    </div>
                                </div>';

                        } else {
                            echo 'No products found.';
                        }
                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                        </div>
                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sign-in-form style2">
                                <h2>ADD MEDECIN</h2>
                                <p>Welcome back! Please enter the medecin details</p>
                                <?php 
if (isset($message)) {
    echo '<div class="flat-alert msg-'.$type.'">' . $message . '<a class="close" href="#"><i class="fa fa-close"></i></a></div>';
}
?>
                                <form method="post" action="add_medecin.php" enctype="multipart/form-data" id="contactform">
                                    <fieldset><input id="name" name="name" tabindex="1" aria-required="true" required="" type="text" placeholder="Product name"></fieldset>
                                    <fieldset> <input  name="brand" tabindex="2" aria-required="true"  type="text" placeholder="Brand" required=""></fieldset>
                                    <fieldset> <input  name="price" tabindex="2" aria-required="true"  type="text" placeholder="Price" required=""></fieldset>
                                    <fieldset> <input  name="status" tabindex="2" aria-required="true"  type="text" placeholder="Status" required=""></fieldset>
                    
                                    <fieldset style="background-color: #20262b;padding:0 25px"> <input style="width:100%"  name="image" tabindex="2" aria-required="true"  type="file" placeholder="Status" required=""></fieldset>
                                    <button class="tf-button submit" type="submit">ADD</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
$content = ob_get_clean();
include 'base.php';
?>