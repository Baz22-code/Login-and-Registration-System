<?php 

    session_start();
    require_once __DIR__ . '/../../public/assets/partials/header.php';
?>

<body>
        <h1><?php echo "Welcome, " . $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName']; ?></h1>


<?php require __DIR__ . "/../../public/assets/partials/footer.php"; ?>
