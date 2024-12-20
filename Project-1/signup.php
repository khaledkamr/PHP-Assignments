<?php

include "header.php";
include "navbar.php";
include "dbConnection.php";

$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$phone = isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";
$address = isset($_SESSION["address"]) ? $_SESSION["address"] : "";
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
                
<?php 
  if(isset($_SESSION["errors"])) {
    foreach($_SESSION["errors"] as $error): ?>
      <div class="alert alert-danger container"><?php echo $error; ?></div>
<?php 
    endforeach;
  }
?>
                <h3 class="card-title text-left mb-3">Register</h3>
                <form action="insert.php" method="post">

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="username" value="<?php echo $username; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email" value="<?php echo $email; ?>">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>

                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control p_input"name="phone" value="<?php echo $phone; ?>">
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name="address" value="<?php echo $address; ?>">
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit" name="signup" class="btn btn-primary btn-block enter-btn">Signup</button>
                  </div>

                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php include "footer.php" ?>


    <!-- regex 

  $regex = /^01[0,1,2,5][0-9]{8}$/

  preg_match($regex,) 
  
  -->
<?php 
unset($_SESSION["errors"]);
unset($_SESSION["username"]);
unset($_SESSION["email"]);
unset($_SESSION["phone"]);
unset($_SESSION["address"]);
?>