<?php
  session_start();
?>

<!DOCTYPE html>  
<head>
  <title>Crowdfunding Homepage</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <ul>
    <li><input type='button'value='Sign Up' class="btn" onclick="document.location.href='signup.php';"/></li>
    <li>or</li>
    <li><input type='button'value='Sign In' class="btn" onclick="document.location.href='signin.php';"/></li>
  </ul>
  <h2>All campaigns</h2>

  <?php
    echo "User email is " . $_SESSION["email"] . ".<br>";  
  ?>
</body>
</html>
