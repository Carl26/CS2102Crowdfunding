<!DOCTYPE html>  
<head>
  <title>Crowdfunding Signup</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h2>Sign Up</h2>
  <ul>
    <form name="display" action="signup.php" method="POST">
      <li>Email:</li>
      <li><input type="text" name="email_su"></li>
      <li>Username:</li>
      <li><input type="text" name="username_su"></li>
      <li>Password:</li>
      <li><input type="password" name="password_su"></li>
      <li><input type="submit" name="submit_su" value="Sign up now!"></li>
    </form>
  </ul>

  <?php
    $db = pg_connect("host=localhost port=5432 dbname=project_crowdfunding user=postgres password=123");  
    if (isset($_POST[submit_su])) {
      $result = pg_query($db, "INSERT INTO users VALUES ('$_POST[email_su]', '$_POST[username_su]', false, '$_POST[password_su]');");
      if ($result) {
        header("Location: signin.php");  
      } else {
        echo 'Sign up failed! Did you fill in all fields? Or this email is already registered!';
      }
    }
  ?>
</body>
</html>
