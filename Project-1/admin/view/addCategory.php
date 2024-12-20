<?php

include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
include "../../dbConnection.php";

if(isset($_SESSION["success"])): ?>
  <div class="container pt-5 d-flex justify-content-center">
      <div class="alert alert-info col-3 d-flex justify-content-center" role="alert">
        <?php echo $_SESSION["success"] ?>
      </div>
  </div>
<?php endif ?>

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
                <form method="POST" action="catHandle.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input text-light">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="add" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
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
unset($_SESSION["success"]);
 ?>