<?php
session_start();
// If the user visits the login page and is already logged in, redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'pharmacy';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $error = '';
    // Validate credentials

    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        // Redirect user to welcome page
                        header("location: index.php");
                    } else {
                        // Password is not valid, display a generic error message
                        $error = "Invalid username or password.";
                    }
                }
            } else {
                // Username doesn't exist, display a generic error message
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Close connection
    mysqli_close($conn);


}
?>
<?php
$title = "Login";
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
                    <h2>SIGN IN</h2>
                    <p>Welcome back! Please enter your details</p>
                    <?php
                    if (isset($error)) {
                        echo '<div class="flat-alert msg-error">' . $error . '<a class="close" href="#"><i class="fa fa-close"></i></a></div>';
                    }
                    ?>
                    <form method="post" action="login.php" id="contactform">
                        <fieldset><input id="name" name="username" tabindex="1" aria-required="true" required=""
                                type="text" placeholder="Username or Email"></fieldset>
                        <fieldset> <input id="showpassword" name="password" tabindex="2" aria-required="true"
                                type="password" placeholder="Password" required=""></fieldset>
                        <div class="forgot-pass-wrap">
                            <label>
                                <input type="checkbox">
                                <span class="btn-checkbox"></span>
                                Remember me
                            </label>
                
                        </div>
                        <button class="tf-button submit" type="submit">SIGN IN</button>
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