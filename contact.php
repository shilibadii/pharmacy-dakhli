<?php
$title = "Contact";
ob_start();
?>
<?php include 'navbar.php'; ?>
 <section class="tf-page-title">    
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title-heading">CONTACT US</h2>
                            <ul class="breadcrumbs">
                                <li><a href="index.php">HOME</a></li>
                                <li>CONTACT US</li>
                            </ul> 
                        </div>
                    </div>
                </div>                    
            </section>

            <section class="tf-contact ">

                <div class="tf-container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="tf-infor-wrap">
                                <div class="tf-infor">
                                    <div class="icon">
                                        <img src="assets/images/svg/loaction.svg" alt="Image">
                                    </div>
                                    <h3 class="title">Location</h3>
                                    <p class="sub-title">2163 Phillips Gap Rd West Jefferson</p>
                                </div>
                                <div class="tf-infor">
                                    <div class="icon">
                                        <img src="assets/images/svg/email.svg" alt="Image">
                                    </div>
                                    <h3 class="title">Email</h3>
                                    <p class="sub-title">Info.avitex@gmail.com</p>
                                </div>
                                <div class="tf-infor">
                                    <div class="icon">
                                        <img src="assets/images/svg/phone.svg" alt="Image">
                                    </div>
                                    <h3 class="title">Phone</h3>
                                    <p class="sub-title">+1 666 8888</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center"> 
                        <div class="col-xl-6 col-lg-8 col-md-9">
                            <div class="tf-heading">
                                <h2 class="heading">Get In Touch</h2>
                                <p class="sub-heading">Browse through the most freuently asked questions</p>
                            </div>
                            <form action="contact/contact-process.php" method="post" id="commentform"  class="comment-form">
                                <div class="form-inner">
                                    <fieldset class="name">
                                        <input type="text" id="name" placeholder="Name" class="tb-my-input" name="name" tabindex="2" aria-required="true" required="">
                                    </fieldset>    
                                    <fieldset class="email">
                                        <input type="email" id="email" placeholder="Enter your email" class="tb-my-input" name="email" tabindex="2" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="phone">
                                        <input type="tel" id="phone" placeholder="Phone Number" class="tb-my-input" name="phone" tabindex="2" aria-required="true" required="">
                                    </fieldset>
                                    
                                    <fieldset class="message">
                                        <textarea id="message" name="message" rows="4" placeholder="Message" tabindex="4" aria-required="true" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="btn-submit"><button class="tf-button style-2" type="submit">SEND MESSANGER</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


<?php
$content = ob_get_clean();
include 'base.php';
?>