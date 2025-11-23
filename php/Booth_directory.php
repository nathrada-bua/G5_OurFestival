<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booth directory</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/Booth_directory.css" />
</head>

<body>
    <?php 
        include("./header.php");
    ?>
    <br>

    <section class="menu-section">
        <h2 id="foodhead">Foods</h2>
        <div class="menu-item">
            <div class="info">
                <h3>Buono Bites</h3>
                <p>Experience the warm taste of Italy with rich sauces,<br>
                    melted cheese, and freshly baked goodness.<br>
                    Every bite is full of comfort and authentic Italian flavor!</p>
                <a href="./food_Menu-1.php"><button>Menu</button></a>
            </div>
            <img src="../resources/Food_Menu-1 Owner.jpg" alt="Food_Menu-1 Owner">
        </div>

        <div class="menu-item">
            <div class="info">
                <h3>Aroi Thai</h3>
                <p>Experience the bold and vibrant flavors of Thailand!<br>
                    From spicy stir-fried basil pork to refreshing glass noodle salad,<br>
                    every dish is made fresh and full of authentic Thai taste.</p>
                <a href="./food_Menu-2.php"><button>Menu</button></a>
            </div>
            <img src="../resources/Food_Menu-2 Owner.jpg" alt="Food_Menu-2 Owner">
        </div>
    </section>

    <section class="menu-section alt">
        <h2 id="dessertshead">Desserts</h2>

        <div class="menu-item reverse">
            <img src="../resources/Dessert_1 Owner.jpg" alt="Dessert_1 Owner">
            <div class="info">
                <h3>Flourish bakery</h3>
                <p>Experience a delightful fusion of global treats and artisanal bakery excellence.<br>
                    Indulge in the fudgy richness of our classic Brownies and our Cheesecakes.<br>
                    We uniquely pair these comforting sweets with the fragrant, crisp Melon Pan and the addictive,
                    savory simplicity of Shio Pan.<br>
                    A distinctive menu where every craving finds its exquisite match.</p>
                <a href="./Dessert_1.php"><button>Menu</button></a>
            </div>
        </div>

        <div class="menu-item reverse">
            <img src="../resources/Dessert_2 Owner.jpg" alt="Dessert_2 Owner">
            <div class="info">
                <h3>Horm Kati</h3>
                <p>Experience the true heritage of Thai sweets, crafted with recipes perfected across generations.<br>
                    Our desserts deliver a rich, comforting sweetness through incredibly soft and tender textures,
                    offering a refined, beautiful treat.</p>
                <a href="./Dessert_2.php"><button>Menu</button></a>
            </div>
        </div>
    </section>

    <section class="menu-section">
        <h2 id="beverageshead">Beverages</h2>

        <div class="menu-item">
            <div class="info">
                <h3>Yen Yen bamboo</h3>
                <p>was born from a love of Thai herbal traditions and the
                    refreshing simplicity of nature. Inspired by the cooling phrase “yen
                    yen” and the rustic charm of bamboo, the stall was designed for
                    festivals and outdoor gatherings. It offers four signature drinks—Pandan
                    Cooler, Lemongrass Breeze, Longan Sweet Tea, and Fresh Coconut
                    Water—each crafted to soothe and hydrate under the tropical sun. Using
                    local ingredients and timeless recipes, Yen Yen Bamboo blends tradition
                    with modern flair, inviting everyone to pause, sip, and enjoy the gentle
                    breeze of Thai refreshment.</p>
                <a href="./Beverages_1.php"><button>Menu</button></a>
            </div>
            <img src="../resources/Beverages_1 Owner.jpg" alt="Beverages-1 Owner">
        </div>

        <div class="menu-item">
            <div class="info">
                <h3>Baan Brew</h3>
                <p>was founded with a simple idea: to bring the warmth of Thai
                    flavors into every cup. “Baan” means home in Thai, and the stall
                    reflects a cozy, welcoming vibe inspired by traditional Thai
                    hospitality. Specializing in milk-based drinks, Baan Brew offers
                    comforting classics like Thai Milk Tea, Pink Milk, Iced Cocoa, and
                    Caramel Fresh Milk. Each drink is crafted with care, using quality
                    ingredients and familiar flavors that evoke childhood memories and local
                    charm. Whether at a festival or street fair, Baan Brew invites everyone
                    to sip, smile, and feel at home—one cup at a time.</p>
                <a href="./Beverages_2.php"><button>Menu</button></a>
            </div>
            <img src="../resources/Beverages_2 Owner.jpg" alt="Beverages-2 Owner">
        </div>
    </section>

    <footer class="footer">
    <div class="footer-left">
        <a href="./feedback_page.php" class="feedback-btn">
            <img src="../resources/feedback.png" class="feedbackicon">
            Feedback
        </a>
    </div>

    <p class="footer-center">© 2025 Eatfinity Fair</p>

    <div class="footer-right social">
        <i class="fas fa-envelope"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
        <i class="fab fa-tiktok"></i>
    </div>
</footer>
</body>

</html>