<?php require_once __DIR__ . '/../../public/assets/partials/header.php'; ?>  
<body>

    <div class="forgot-form">

        <h1>Forgot Password</h1>  

        <form method="POST" id="forgot_pass">
            <div class="form_2">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="secretId" id="secretId" placeholder="Secret ID">
            </div>
            <div class="form_3">
            <input type="submit" id="proceed_btn" value="Proceed">
            <input type="button" id="cancel_btn" value="Cancel" onclick="window.location.href='/Login-System/public/index.php'">
            </div>
        </form>
        
<?php require __DIR__ . "/../../public/assets/partials/footer.php"?>