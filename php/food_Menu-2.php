<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aroi Thai</title>
    <link rel="stylesheet" href="../css/food_Menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <?php 
        include("./header.php");
    ?>
    <br>

    <h1>Aroi Thai</h1>
    <div class="menu">
        <div class="food">
            <img src="../resources/food2-pad-ka-prao.jpg" alt="Pad ka prao" />
            <p class="name">Pad ka prao</p>
            <p class="price">60 ฿</p>
        </div>
        <div class="food">
            <img src="../resources/food2-pad-thai.jpg" alt="Pad thai" />
            <p class="name">Pad thai</p>
            <p class="price">60 ฿</p>
        </div>
        <div class="food">
            <img src="../resources/food2-somtam.jpg" alt="Somtam" />
            <p class="name">Somtam</p>
            <p class="price">50 ฿</p>
        </div>
        <div class="food">
            <img src="../resources/food2-yum-woon-sen.jpg" alt="Yum woon sen" />
            <p class="name">Yum woon sen</p>
            <p class="price">60 ฿</p>
        </div>
    </div>

    <div class="pager-wrapper">
        <div class="pager-center">
            <span class="pager-page">2/2</span>
        </div>
        <button class="pager-next"><a href="./food_Menu-1.php">BACK</a></button>
    </div>
    <div class="pager-line"></div>

    <div class="foot-container">
        <div class="foot-about">
            <h3>About</h3>
            <p>
                Experience the bold and vibrant flavors of Thailand!<br>
                From spicy stir-fried basil pork to refreshing glass noodle salad,<br>
                every dish is made fresh and full of authentic Thai taste.
            </p>
        </div>
                <div class="footer-contact">
            <h3>Reach out</h3>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Tiktok</a></li>
            </ul>
        </div>
        <div class="feedback">
            <a href="./feedback_page.php"><button class="btn-feedback"><img src="../resources/feedback.png"
                        class="feedbackicon">feedback</button></a>
        </div>
    </div>
    
    <footer>
        <p>© 2025 Eatfinity Fair</p>
        <div class="social flex gap-4">
            <i class="fas fa-envelope"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-tiktok"></i>
        </div>
    </footer>

</body>

</html>