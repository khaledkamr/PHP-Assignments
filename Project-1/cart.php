<?php 
include 'header.php';
include 'navbar.php';
include 'dbConnection.php' ;

$query = "SELECT product.image, product.name, product.description, cart.quantity, product.price
  FROM cart JOIN product ON cart.product_id=product.product_id";
$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res) > 0) {
    $items = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
$i = 0;

$query = "SELECT SUM(product.price * cart.quantity) AS TOTAL
    FROM cart JOIN product ON product.product_id = cart.product_id";
$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res) == 1) {
    $total = mysqli_fetch_assoc($res);
}
?>

<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%" class="border">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                </tr>
            </thead>
   
            <tbody class="p-5">
                <?php foreach($items as $item): ?>
                <tr>
                    <td><img src="img/products/<?php echo $item["image"] ?>" alt="product <?php echo ++$i ?>"></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["description"] ?></td>
                    <td><?php echo $item["quantity"] ?></td>
                    <td><?php echo $item["price"] . "$" ?></td>
                    <td><?php echo $item["quantity"] * $item["price"] . "$" ?></td>
                    <td class="pb-3"><button type="submit"  class="btn btn-danger">Remove</button></td>
                    <td><button type="submit"  class="btn btn-primary">Edit</button></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <!-- confirm order  -->
            <!-- <td><button type="submit" name="" class="btn btn-success mt-5">Confirm</button></td> -->
            
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo $total["TOTAL"] . "$" ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>25.00$</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>10.00$</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo ($total["TOTAL"] + 25.0 + 10.0) . "$" ?></strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

<?php include "footer.php" ?>

