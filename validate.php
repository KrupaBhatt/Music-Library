<?php ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200354900','gc200354900', 'vxVB-fmk');
$sql = "SELECT userId, password FROM users WHERE username = :username";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();
if (password_verify($password, $user['password'])) {
    // user found
    session_start(); // access the existing session
    $_SESSION['userId'] = $user['userId']; // store the user's id in a session variable
    header('location:albums.php');  // take authenticated user to albums page
}
else {
    // user not found
    header('location:login.php?invalid=true');
    exit();
}
$conn = null;

ob_flush(); ?>