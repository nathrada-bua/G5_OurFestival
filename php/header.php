<?php 
    session_start();
    $login = array_key_exists('username', $_SESSION) && $_SESSION['username'] != '';
?>

<header class="navbar">
        <div class="logo">
            <a href="../html/homepage.html">
                <img src="../resources/logo.png" alt="Logo" class="w-12 md:w-14">
            </a>
        </div>

        <div class="right-menu">
            <nav class="flex items-center gap-4">
                <a href="../html/homepage.html">Home</a>
                <a href="../html/Booth_directory.html">About Us</a>
            </nav>

            <?php if(!$login) { ?>
                <div class="flex gap-2">
                    <a href="../php/login.php" class="btn login flex items-center justify-center">log in</a>
                    <a href="../php/signup.php" class="btn signup flex items-center justify-center">sign up</a>
                </div>
            <?php } else { 
                echo $_SESSION['username']; ?>
                <div class="flex gap-2">
                    <a href="../php/logout.php" class="btn login flex items-center justify-center">log out</a>
                </div>
            <?php } ?>
        </div>
</header> 