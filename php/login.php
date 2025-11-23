<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in Page</title>
    <link rel="stylesheet" href="../css/registration.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="../js/login.js" defer></script>
  </head>
  <body>
    
<?php
include ("./header.php");

$users_file = '../data/users.json';
$result_html = '';

if (file_exists($users_file)) {
  $records = json_decode(file_get_contents($users_file), true) ?? [];
} else {
  $records = [];
}

$result = 'login';
$error = [];
$username = '';
$password = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if ($username == '')
  {
    $error['username'] = 'Username is required';
  }

  if ($password == '')
  {
    $error['password'] = 'Password is required';
  }

  if (count($error) == 0) {
    $found = false;
    foreach($records as $record) {

      if($username == $record['username'] && $password == $record['password']){
        $found = true;
        break;
      }
    }

    if($found) {
      $_SESSION['username'] = $username;
      session_write_close();

      header('Location: ../html/homepage.html');
      exit();
    }
    else 
    {
       $error['login'] = 'Invalid username or password';
    }
  }
} 

if($result == 'login') 
{
?>
    <form class="container" method="POST" action="login.php">
      <img id="icon" src="../resources/Project_Mascot_Default.png" alt="mascot" width="100px">
      <div class="registration-container-bg">
        <p id="title">Log in</p>
        <div class="section1">
          <p class="subtitle">Username</p>
          <input type="text" class="input-text" id="username" name="username" value="<?php echo $username; ?>"/>
          <?php 
            if(array_key_exists('username', $error)) { 
          ?>
          <p class="text-error">

          <?php 
            echo $error['username'];
          ?>

          </p>

          <?php
          }
          ?>

          <p class="subtitle">Password</p>
          <input type="password" class="input-text" id="password" name="password" value="<?php echo $password; ?>" />
          <?php 
            if(array_key_exists('password', $error)) { 
          ?>
          <p class="text-error">

          <?php 
            echo $error['password'];
          ?>

          </p>

          <?php
          }
          ?>

          <br />
          <div class="remember-container">
            <input type="checkbox" id="checkbox" />
            <p id="remember-info">Remember me</p>
          </div>

          <?php 
            if(array_key_exists('login', $error)) { 
          ?>
          <p class="text-error text-center">

          <?php 
            echo $error['login'];
          ?>

          </p>

          <?php
          }
          ?>
        </div>
        <div class="section2">
          <button type="submit" id="loginBtn">Log in</button>
          <p id="forgot-info">Forgot Username/Password ?</p>
        </div>

      </div>
    </form>
<?php } else { ?>
    <h1>Hello World</h1>
<?php } ?>
</body>
</html>