<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get products from DB
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            width: 250px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }
        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Our Products</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h3>" . $row["name"] . "</h3>";
            echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "'><br>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p><strong>₹" . $row["price"] . "</strong></p>";
            echo "</div>";
        }
    } else {
        echo "No products found.";
    }

    $conn->close();
    ?>
</body>
</html>
