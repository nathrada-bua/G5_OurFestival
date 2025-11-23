<?php 
    session_start();
    $login = array_key_exists('username', $_SESSION) && $_SESSION['username'] != '';
?>

<header class="navbar">
        <div class="logo">
            <a href="./homepage.php">
                <img src="../resources/logo.png" alt="Logo" class="w-12 md:w-14">
            </a>
            
        </div>
        <div class="user-info">
                <?php 
                if ($login) { 
                    echo "Hello, " . $_SESSION['username'];
                }
                ?>
        </div>
           
        <div class="right-menu">
            <nav class="flex items-center gap-4">
                <a href="./homepage.php">Home</a>
                <a href="./Booth_directory.php">About Us</a>
            </nav>
            
            <?php if(!$login) { ?>
                <div class="flex gap-2">
                    <a href="./login.php" class="btn login flex items-center justify-center">log in</a>
                    <a href="./signup.php" class="btn signup flex items-center justify-center">sign up</a>
                </div>
            <?php } else { ?>
                <div class="flex gap-2">
                    <a href="./logout.php" class="btn login flex items-center justify-center">log out</a>
                </div>
            <?php } ?>
        </div>
</header> 