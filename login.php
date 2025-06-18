<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username']; // This is actually the email
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            // You can redirect or start session here
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<form method="POST" action="">
    <label>Username (Email):</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
