
<?php include 'header.php' ?>
<?php include 'navbar.php' ;
include "dbConnection.php";

if(isset($_SESSION["success"])): ?>
<div class="container pt-5 d-flex justify-content-center">
    <div class="alert alert-info col-3 d-flex justify-content-center" role="alert">
      <?php echo $_SESSION["success"] ?>
    </div>
</div>
<?php endif ?>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

        <?php 
        $query = "select * from product";
        $res = mysqli_query($conn, $query);
        $Products = mysqli_fetch_all($res, MYSQLI_ASSOC);

        if(count($Products) > 0)
        {
            foreach($Products as $product)
            { ?>
                <div class="pro">
                  <form action="cartHandle.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product["product_id"] ?>">
                    <img src="img/products/<?php echo $product['image'] ?>" alt="" />
                    <div class="des">
                      <h3><?php echo $product['name']; ?></h3>
                      <h5><?php echo $product['description']; ?></h5>
                      <div class="star ">
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                      </div>
                      <h4><?php echo $product['price']; ?></h4>
                      <label>quantity</label><br>
                      <input type="number" name="quantity">
                      <button type="submit" name="addToCart">
                        <a class="cart "><i class="fas fa-shopping-cart "></i></a>
                      </button>
                    </div>

                    <?php if(isset($_SESSION["success_cart"]) && $_GET["id"] == $product["product_id"]): ?>
                      <div class="alert alert-info" role="alert">
                        <?php echo $_SESSION["success_cart"] ?>
                      </div>
                    <?php endif ?>
                    
                  </form>
                </div>
            <?php }
        }
        ?>
            </div>
        </div>
    </section>
    


    <section id="pagenation" class="section-p1 d-flex justify-content-center">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php 
    include 'footer.php' ;
    unset($_SESSION["success"]);
    unset($_SESSION["success_cart"]);
    ?>