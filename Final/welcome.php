<?php
// Initialize the session
require_once('file_upload_functions.php');

session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our File Uploader.</h1>

    </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <p>Choose a photo for your profile picture:</p></br>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" /><br />
            <center><input type="file" name="profile_picture" /></center><br />
            <input type="submit" name="submit" value="Upload file" />
        </form>
<?php

// Inspect the values PHP retrieves in $_FILES
echo "<hr />";
var_dump($_FILES);
echo "<hr />";

upload_file('profile_picture');

?>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>