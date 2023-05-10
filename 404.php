
<?php
$title = "400 Not found";
ob_start();
?>

<section class="comming-soon error-page">
                <img src="assets/images/background/bg-comming-soon.png" alt="Image" class="bg-comming-soon">
                <div class="comming-soon-inner">
                    <div class="image">
                        <svg width="147" height="171" viewBox="0 0 147 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M91.9805 96.0882V85.1367H113.883V96.0882C113.883 102.659 109.777 107.04 102.932 107.04C94.7183 107.04 91.9805 101.564 91.9805 96.0882Z" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M102.932 93.3503V85.1367" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M111.146 3V34.4854H144.001" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M33.1172 85.1367H115.253" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M3 3V153L11.2136 168L31.7476 146.182L53.6505 168L75.5534 146.182L94.7184 168L113.883 146.182L133.049 168L144 153V31.6364L116.621 3H3Z" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M38.5918 41.3301L59.1258 60.4951M59.1258 41.3301L38.5918 61.8641" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            <path d="M87.873 41.3301L108.407 60.4951M108.407 41.3301L87.873 61.8641" stroke="white" stroke-width="5" stroke-linejoin="round"/>
                            </svg>
                            
                    </div>
                    <h2 class="title">404 Error</h2>
                    <p class="sub">Sorry, Page not found</p>

                    <div class="group-btn">
                        <a href="index.php" class="tf-button">BACK TO HOME</a>
                    </div>
                </div>
            </section>


            <?php
$content = ob_get_clean();
include 'base.php';
?>