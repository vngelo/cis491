
<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit']))
{
  
  require "config.php";
  require "common.php";

  try 
  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $new_user = array(
      "username" => $_POST['username'],
      "password"  => $_POST['password'],
    );

    $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "users",
        implode(", ", array_keys($new_user)),
        ":" . implode(", :", array_keys($new_user))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  }

  catch(PDOException $error) 
  {
    echo $sql . "<br>" . $error->getMessage();
  }
  
}
?>

<?php require "header.php"; ?>

<?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
  <blockquote><?php echo $_POST['username']; ?> successfully added.</blockquote>
<?php 
} ?>

<h2>Add a user</h2>

<form method="post">
  <label for="user">Username</label>
  <input type="text" name="username" id="user">
  <label for="pass">Password</label>
  <input type="text" name="password" id="pass">
  <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>