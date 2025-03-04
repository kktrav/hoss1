<?php
  session_start();

  

  if(isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($username)) {
      $error['login'] = "Enter Username";
    } else if(empty($password)) {
      $error['login'] = "Enter Password";
    }

    if(count($error) == 0) {
      $query = "SELECT * FROM patient WHERE username='$username' AND password='$password'";
      $result = mysqli_query($connect,$query);

      if(mysqli_num_rows($result) == 1) {
        echo "<script>alert('You are logged in')</script>";
        $_SESSION['patient'] = $username;
        header("Location:patient/index.php");
        exit();
      } else {
        echo "<script>alert('Invalid Username or Password')</script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Patient's Login Page</title>
  </head>
  <body style="background-image: url(img/hospital.jpg);background-size: cover;">
    <?php
      include("include/header.php");
    ?>
    <div style="margin-top: 20px;"></div>
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 mt-4 p-4 bg-light text-black rounded">
            <center>
              <i class="fa-solid fa-bed-pulse fa-2xl my-3" style="color: black;"></i>
            </center>
            <form method="post" class="my-2">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
              </div>
              <div style="margin-top: 10px;"></div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control">
              </div>
              <div style="margin-top: 10px;"></div>
              <div>
                <?php
                  if(isset($error['login'])) {
                    $sh = $error['login'];
                    $show = "<h6 class='alert alert-danger' role='alert'>$sh</h6>";
                  } else {
                    $show = "";
                  }
                  echo $show;
                ?>
              </div>
              <div style="margin-top: 20px;"></div>
              <input type="Submit" name="login" class="btn btn-success">
              <div style="margin-top: 20px;"></div>
              <p>Don't have an account!  <a href="createAccount.php">Sign Up</a></p>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </body>
</html>