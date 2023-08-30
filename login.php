<php session_start();  ?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login_process.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

<script>
 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // In a real-world scenario, you would perform proper validation and password hashing here

    // For the sake of this example, let's assume a simple authentication check
    if ($username === "your_username" && $password === "your_password") {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirect to a dashboard page
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password.";
    }
}


</script>

