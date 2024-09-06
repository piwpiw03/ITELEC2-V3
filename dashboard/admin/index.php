<?php
require_once 'authentication/admin-class.php';

$admin = new ADMIN();
if (!$admin->isUserLoggedIn()) {
    $admin->redirect('../../');
}


$stmt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmt->execute(array(":id" => $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="http://localhost/ITELEC2-V3/src/css/style.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>WELCOME, <?php echo $user_data['email'] ?></h1>
        <button class="logout-btn"><a href="authentication/admin-class.php?admin_signout">SIGN OUT</a></button>
    </div>
</body>

</html>