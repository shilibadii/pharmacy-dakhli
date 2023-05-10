<?php


    session_start();


// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
$msg = "";
$type = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['oldpassword']) && isset($_POST['password']) && isset($_POST['password2'])) {

    // Connect to the database
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'pharmacy';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $current_password = $_POST['oldpassword'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['password2'];
    
    $user_id = ($_SESSION['id']);

    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($current_password, $row['password'])) {
        // Current password matches, check if new password and confirm password match
        if ($new_password == $confirm_password) {
            // Update password in database
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET password='$new_password_hash' WHERE id='$user_id'";
            mysqli_query($conn, $update_sql);


            $type = "success";
            $msg = "Password Changed successfully";

        } else {
            // New password and confirm password do not match
            $msg = "New password and confirm password do not match.";
            $type = "error";

        }
    } else {
        // Current password does not match
        $msg = "Current password is incorrect.";
        $type = "error";

    }
}
?>
<?php
$title = "Change Password";
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
                <div class="sign-in-form">
                    <h2>Change Password</h2>

                    <?php
                    if (isset($msg)) {
                        echo '<div class="flat-alert msg-' . $type . '">' . $msg . '<a class="close" href="#"><i class="fa fa-close"></i></a></div>';
                    }
                    ?>
                    <form method="POST" action="change_password.php" id="contactform">
                        <fieldset><input id="name" name="oldpassword" tabindex="1" aria-required="true" required=""
                                type="password" placeholder="Current Password"></fieldset>
                        <fieldset> <input id="showpassword" name="password" tabindex="2" aria-required="true"
                                type="password" placeholder="New Password" required=""></fieldset>
                        <fieldset> <input id="showpassword" name="password2" tabindex="2" aria-required="true"
                                type="password" placeholder="Confirm Password" required=""></fieldset>
                        <button class="tf-button submit" type="submit">Change</button>
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