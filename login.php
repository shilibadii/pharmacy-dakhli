<?php
session_start();
include 'connexion.php';
// If the user visits the login page and is already logged in, redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];



    try {

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $error = '';

        // Prepare a select statement
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username");

        // Bind parameter
        $stmt->bindParam(':username', $username);

        // Execute the prepared statement
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if username exists and verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, so start a new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user['id'];
            $_SESSION["username"] = $user['username'];

            // Redirect user to welcome page
            header("location: index.php");
            exit;
        } else {
            // Invalid username or password
            $error = "Invalid username or password.";
        }

    } catch (PDOException $e) {
        // Handle database connection or query errors
        $error = "Oops! Something went wrong. Please try again later.";
        echo "An error occurred: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
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
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                        // Query the database for products
                        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 10";
                        $stmt = $pdo->query($sql);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                        // Display the products
                        if ($stmt->rowCount() > 0) {
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
                        $pdo=null;
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