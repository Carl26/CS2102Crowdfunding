<?php
  session_start();
  ?>
<!DOCTYPE html>  
<head>
  <title>Crowdfunding SignIn</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h2>Sign In</h2>
  <ul>
    <form name="display" action="signin.php" method="POST">
      <li>Email:</li>
      <li><input type="text" name="email_si"></li>
      <li>Password:</li>
      <li><input type="password" name="password_si"></li>
      <li><input type="submit" name="si" value="Sign In!"></li>
    </form>
  </ul>

  <?php
    $db = pg_connect("host=localhost port=5432 dbname=project_crowdfunding user=postgres password=123");  
    if (isset($_POST['si'])) {
      $query = "SELECT * FROM users WHERE email = '$_POST[email_si]' AND password = '$_POST[password_si]';";
      $result = pg_query($db, $query);
      $row = pg_fetch_assoc($result);
      if ($row[email] == null) {
        echo "User not found or wrong credentials!";
      } else {
        echo "Sign in successfully!";
        $_SESSION["email"] = $row[email];
        header("Location: index.php");
      }
    }
  ?>

  <!-- <h2>Search for keywords:</h2>
  <ul>
    <form name="display" action="index.php" method="POST" >
      <li>Keywords:</li>
      <li><input type="text" name="keywords" /></li>
      <li><input type="submit" name="search" /></li>
      <li><input type="button" name="new"></li>
    </form>
  </ul>
  <php
    $db     = pg_connect("host=localhost port=5432 dbname=project_crowdfunding user=postgres password=123");	
    $result = pg_query($db, "SELECT * FROM projects WHERE keywords LIKE '%$_POST[keywords]%' OR LOWER(title) LIKE LOWER('%$_POST[keywords]%')");		
    $row    = pg_fetch_assoc($result);		// To store the result row
    if (isset($_POST['search'])) {
        echo "<ul><form name='update' action='index.php' method='POST' >  
    	<li>Project Title:</li>  
    	<li><input type='text' name='title' value='$row[title]' /></li>  
    	<li>Project Description:</li>  
    	<li><input type='text' name='description' value='$row[description]' /></li>  
    	<li>Start Date:</li>
      <li><input type='text' name='start_date' value='$row[date]' readonly /></li>  
    	<li>Duration:</li>  
    	<li><input type='text' name='duration' value='$row[duration]' /></li> 
      <li>Keywords:</li>  
      <li><input type='text' name='project_keywords' value='$row[keywords]' /></li> 
      <li>Goal:</li>  
      <li><input type='number' name='goal' value='$row[goal]' /></li> 
      <li>Funds raised:</li>  
      <li><input type='number' name='funded' value='$row[funded]' readonly /></li> 
    	<li><input type='submit' name='update_button' /></li>  
    	</form>  
    	</ul>";
    } elseif (isset($_POST['new'])) {
      
    }
    if (isset($_POST['update_button'])) {	// Submit the update SQL command
        $result = pg_query($db, "UPDATE projects SET title = '$_POST[title]',  
    description = '$_POST[description]',date = new Date('$_POST[start_date]'), duration = '$_POST[duration]',  
    keywords = '$_POST[keywords]', goal = '$_POST[goal], funded = '$_POST[funded]'");
        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
    ?>   -->
</body>
</html>
