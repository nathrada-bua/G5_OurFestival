<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up Page</title>
    <link rel="stylesheet" href="../css/registration.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="../js/signup.js" defer></script>
  </head>
  <body>
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
            <div class="flex gap-2">
                <a href="./login.php" class="btn login flex items-center justify-center">log in</a>
                <a href="./signup.php" class="btn signup flex items-center justify-center">sign up</a>
            </div>
        </div>
    </header>

<?php
$users_file = '../data/users.json';
$result_html = '';

if (file_exists($users_file)) {
  $records = json_decode(file_get_contents($users_file), true) ?? [];
} else {
  $records = [];
}

$result = 'signup';
$error = [];
$username = '';
$email    = '';
$password = '';
$confirm  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');
  $confirm  = trim($_POST['confirm-password'] ?? '');

  if ($username == '')
  {
    $error['username'] = 'Username is required';
  }

  if ($email == '')
  {
    $error['email'] = 'Email is required';
  }
  else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error['email'] = "Invalid email format";
    }
  }

  if ($password == '')
  {
    $error['password'] = 'Password is required';
  }

  if ($confirm == '')
  {
    $error['confirm'] = 'Confirm password is required';
  }

  if ($confirm != $password)
  {
    $error['confirm'] = 'Confirm password is not the same as password';
  }

  if (count($error) == 0) {
    foreach($records as $record) {
      if($record['username'] == $username){
        $error['username'] = 'Username already exist';
      }

      if($record['email'] == $email){
        $error['email'] = 'Email already exist';
      }
    }
    if (count($error) == 0) {
      $records[] = ['username' => $username, 'email' => $email, 'password' => $password];

      file_put_contents($users_file, json_encode($records, JSON_PRETTY_PRINT));
      $result = 'userslist';
    }
  }
} 

if ($result == 'signup')
{
?>
    <form class="container" method="POST" action="signup.php">
      <img id="icon" src="../resources/Project_Mascot_Default.png" alt="mascot" width="100px">
      <div class="registration-container-bg">
        <p id="title">Sign up</p>

        <div class="section1">
          <p class="subtitle">Username</p>
          <input type="text" class="input-text" id="username" name="username" value="<?php echo $username; ?>" />
          
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
          

          <p class="subtitle">Email</p>
          <input type="text" class="input-text" id="email" name="email" value="<?php echo $email; ?>"/>
          <?php 
            if(array_key_exists('email', $error)) { 
          ?>
          <p class="text-error">

          <?php 
            echo $error['email'];
          ?>

          </p>

          <?php
          }
          ?>

          <p class="subtitle">Password</p>
          <input type="password" class="input-text" id="password" name="password" value="<?php echo $password; ?>"/>
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

          <p class="subtitle">Confirm Password</p>
          <input
            type="password"
            class="input-text"
            id="confirm-password"
            name="confirm-password"
            value="<?php echo $confirm; ?>"
          />
          <?php 
            if(array_key_exists('confirm', $error)) { 
          ?>
          <p class="text-error">

          <?php 
            echo $error['confirm'];
          ?>

          </p>

          <?php
          }
          ?>
        </div>

        <div class="section2">
          <input type="submit" id="loginBtn" value="Sign up"/>
          <p id="forgot-info">Forgot Username/Password ?</p>
        </div>
      </div>
    </form>
  
<?php
} else {
?>
  <div class="table-container">
    <div>
      <h3 class="list-header">All user list</h3>
    </div>
    
  <table class="table-list">
    <thead>
      <tr>
        <td>Username</td>
        <td>Email</td>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($records as $record) {

      ?>
      <tr>
        <td>
          <?php
          echo $record['username'];
          ?>
        </td>
        <td>
          <?php
          echo $record['email'];
          ?>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  </div>

<?php
}
?>

</body>
</html>


