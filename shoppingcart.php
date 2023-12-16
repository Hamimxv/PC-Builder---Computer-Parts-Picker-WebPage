<?php
// Sample product data
$products = [
    ['name' => 'Product 1', 'price' => 150, 'image' => 'product1.jpg'],
    ['name' => 'Product 2', 'price' => 200, 'image' => 'product2.jpg'],
    ['name' => 'Product 3', 'price' => 250, 'image' => 'product3.jpg'],
    ['name' => 'Product 4', 'price' => 100, 'image' => 'product4.jpg'],
];

// Initialize shopping cart
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1;
    } else {
        $_SESSION['cart'][$productId]++;
    }
}

// Calculate total items and total price
$totalItems = array_sum($_SESSION['cart']);
$totalPrice = 0;
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $totalPrice += $quantity * $products[$productId]['price'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #ebecff;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .cart,
        .summary {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 48%;
            box-sizing: border-box;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            color: #333;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: #2E3192;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .head-img {
            width: 100px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .summary select,
        .summary button,
        .promo-btn,
        #promocode { 
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .summary select,
        .summary select,
                #promocode {
            color: #2E3192;
        }

        .summary select:focus,
        .summary select:hover,
        .summary button:hover,
        .promo-btn:hover,
        #promocode:focus,
        #promocode:hover { 
            transform: scale(1.01);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }

        .summary select:focus,
        .summary select:hover {
            color: #2E3192;
        }



        .promo-btn {
            width: 100%;
            padding: 10px;
            background-color: #2E3192;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .promo-btn:hover {
            background-color: #1a1b41;
        }

        .checkout {
            width: 100%;
            padding: 15px;
            background-color: #2E3192;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .checkout:hover {
            background-color: #1a1b41;
        }

        .checkout span {
            position: absolute;
            display: block;
        }

        .checkout span:nth-child(1),
        .checkout span:nth-child(3) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        }

        .checkout:hover span:nth-child(1),
        .checkout:hover span:nth-child(3) {
            left: 100%;
            transition: 1s;
        }

        .checkout span:nth-child(2),
        .checkout span:nth-child(4) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;

        }

        .checkout:hover span:nth-child(2),
        .checkout:hover span:nth-child(4) {
            top: 100%;
            transition: 1s;
            transition-delay: 0.25s;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="cart">
            <div class="top">
                <h2>Shopping Cart</h2>
                <h2 id="itemA"><?= $totalItems ?> Items</h2>
            </div>
            <table cellspacing="0" class="table-head">
                <tr>
                    <th width="150" class="head-img">Image</th>
                    <th width="360">Name</th>
                    <th width="150">Price</th>
                    <th width="70">Delete</th>
                </tr>
            </table>
            <table id="root" cellspacing="0">
                <?php foreach ($_SESSION['cart'] as $productId => $quantity) : ?>
                    <tr>
                        <td width="150"><img src="<?= $products[$productId]['image'] ?>" alt="Product Image"></td>
                        <td width="360"><?= $products[$productId]['name'] ?></td>
                        <td width="150">$<?= $products[$productId]['price'] ?></td>
                        <td width="70"><a href="?remove=<?= $productId ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr />
        </div>

        <div class="summary">
            <div class="top">
                <h2>Order Summary</h2>
            </div>
            <div class="detail">
                <h2 id="itemB"><?= $totalItems ?> Items</h2>
                <h2 id="totalA">$<?= number_format($totalPrice, 2) ?></h2>
            </div>
            <div style="margin-top: 30px; padding: 0 30px">
                <h2>Shipping Method</h2>
                <select>
                    <option value="standard">Standard Delivery</option>
                    <option value="express">Express Delivery</option>
                </select>
                <h2>Promo Code</h2>
                <input type="text" placeholder="Promo/ Coupon Code" id="promocode" />
                <button class="first-btn promo-btn" id="promo" onclick="promo()">Apply</button>
            </div>
            <hr />
            <div class="top">
                <h2>Total</h2>
                <h2 id="totalB">$<?= number_format($totalPrice, 2) ?></h2>
            </div>
            <div style="padding: 0 10px; margin-bottom: 20px">
                <a href="./checkout.html"><button class="checkout"><span></span><span></span><span></span><span></span>Confirm Order</button></a>
            </div>
        </div>
    </div>


</body>

</html>
