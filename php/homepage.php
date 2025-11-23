<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Our Festival</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/userinfo.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!--<header>
<img src="../resources/logo.png" class="festicon">
<a href="">Home &nbsp;</a>    
<a href="">about me&nbsp;</a>  
<a href="../registration/login.html"><button class="btn-login">log in</button></a>
<a href="../registration/signup.html"><button class="btn-signup">Sign up</button></a>
</header>-->

<?php 
 include("./header.php");
?>
    <br>
    <section>

        <main>
            <img src="../resources/node-21.png" class="originpic">
            <div class="origin"></div>

            <div class="originheading">Origin shop</div>
            <article>
                This Fair was born from the idea of ​​creating an online space that brings together vendors
                of savory food, desserts, and beverages in one place, allowing fairgoers to easily find the stalls they
                want and experience the fair atmosphere even in digital form.
            </article>
            <a href="../html/Booth_directory.html"><button class="btn-learnmore">Learn more</button></a>

            </div>


        </main>

        <figure>
            <div class="pic">
                <div class="pichead">Pictures</h2>
                    <div class="pictext"> Go ahead to our shop fair </div>
                    <img src="../resources/view-fair.png" class="picshow">
                    <img src="../resources/banana-grill.png" class="picshow">
                    <img src="../resources/pasta-chicken.png" class="picshow">
                    <img src="../resources/sushi.png" class="picshow">



                </div>
        </figure>
        <hr>


        <aside class="member">
            <div class="member">
                <div class="memberhead"> member</div>

                <ol type="1">
                    <li>Thiarakun Chanrungrueang 6809540153 (UX/UI)</li>
                    <li> Nathrada Buasuwan 6809617118 (JavaScript Development (Registration Page))</li>
                    <li> Thammawat Surinwong 6809617175 (Booth Directory Page)</li>
                </ol>

                <ol type="1" start="4">
                    <li>Pithayakorn Sirisunthornkamon 6809617258 (Booth Page)</li>
                    <li>Phetrada Promma 6809617266 (Booth Page)</li>
                    <li>Manawat Boonkrong 6809617316 (Html Development (Homepage))</li>
                </ol>

                <ol type="1" start="6">
                    <li>Apichaya Thangbhandit 6809617498 (Booth Page)</li>
                    <li>Thanapoom Tanatninat 6809681437 (UX/UI)</li>
                    <li>Naphatsanan Watthanajirapan 6809681445 (JavaScript Development (Leave Your Feedback Page))</li>
                </ol>
            </div>

        </aside>


    </section>

    <nav class="category"><a href="../html/Booth_directory.html">
            <div class="categoryhead"><img src="../resources/logo-category-43.svg" class="itemheadimg">
                <div class="categorytext">&nbsp;หมวดหมู่สินค้า</div>
            </div>
        </a>

        <div class="category-item">
            <div class="item" id="item1"><a href="../html/Booth_directory.html#foodhead" class="item"><img
                        src="../resources/food-66.svg" class="itemimg"><br>Foods</a></div><br>
            <div class="item" id="item2"><a href="../html/Booth_directory.html#dessertshead" class="item"><img
                        src="../resources/cake-60.svg" class="itemimg"><br>Desserts</a></div><br>
            <div class="item" id="item3"><a href="../html/Booth_directory.html#beverageshead" class="item"><img
                        src="../resources/beverage-63.svg" class="itemimg"><br>Beverages</a></div><br>

            <!--
<a href="Registration_Page.html">Registration</a></li><br>
    
    <a href="Leave_Your_Feedback_Page.html">Leave Your Feedback</a></li>
    -->
    </nav>
    <div class="feedback">
        <div class="flex gap-2">
            <a href="../html/feedback.html" class="btn feedbacks flex items-center justify-center" id="feedd"><img
                    src="../resources/feedback.png" class="feedbackicon"> feedback</a>
        </div><br>


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