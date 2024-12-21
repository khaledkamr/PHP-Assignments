<?php

include "header.php";

include "sidebar.php";
include "navbar.php";
include "../../dbConnection.php";

$category = isset($_SESSION["category"]) ? $_SESSION["category"] : "";
$title = isset($_SESSION["title"]) ? $_SESSION["title"] : "";
$desc = isset($_SESSION["desc"]) ? $_SESSION["desc"] : "";
$price = isset($_SESSION["price"]) ? $_SESSION["price"] : "";
$quantity = isset($_SESSION["quantity"]) ? $_SESSION["quantity"] : "";
?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-8 mx-auto">


              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="productHandle.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control p_input text-light" value="<?php echo $category ?>">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input text-light" value="<?php echo $title ?>">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input text-light" value="<?php echo $desc ?>">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input text-light" value="<?php echo $price ?>">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input text-light" value="<?php echo $quantity ?>">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control p_input text-light">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="add" class="btn btn-primary btn-block enter-btn ps-5 pe-5">Add</button>
                  </div>

                  <?php
                    if(isset($_SESSION["success_product"])) { ?>
                      <div class="container pt-5 d-flex justify-content-center">
                          <div class="alert alert-info col-3 d-flex justify-content-center" role="alert">
                            <?php echo $_SESSION["success_product"] ?>
                          </div>
                      </div>
                  <?php 
                    }
                    elseif(isset($_SESSION["errors"])) {
                      foreach($_SESSION["errors"] as $error): ?>
                        <div class="alert alert-danger container"><?php echo $error; ?></div>
                  <?php 
                      endforeach;
                    }
                  ?>
                
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

<?php 
include "../view/footer.php";
unset($_SESSION["errors"]);
unset($_SESSION["category"]);
unset($_SESSION["title"]);
unset($_SESSION["desc"]);
unset($_SESSION["price"]);
unset($_SESSION["quantity"]);
unset($_SESSION["success_product"]);
 ?>