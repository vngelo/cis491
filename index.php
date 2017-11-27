<?php include "header.php"; ?>

<form method="post">
  <label for="username">Username</label>
  <input type="text" name="User" id="username">
  <label for="pw">Password</label>
  <input type="text" name="password" id="pw">
  <input type="submit" name="submit" value="Submit">

</form>

<ul>
  <li><a href="create.php"><strong>Create</strong></a> - add a user</li>
  <li><a href="read.php"><strong>Read</strong></a> - find a user</li>
</ul>

<?php include "footer.php"; ?>
