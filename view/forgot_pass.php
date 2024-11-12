<?php require "assets/partials/header.php"?>    
<body>

    <div class="forgot-form">

        <h1>Forgot Password</h1>  

        <form action="">
            <div class="form_2">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="username" placeholder="Secret ID">
            </div>
            <div class="form_3">
            <input type="submit" id="proceed_btn" value="Proceed">
            <input type="button" id="cancel_btn" value="Cancel" onclick="window.location.href='/Login/index.php'">
            </div>
        </form>
        
<?php require "assets/partials/footer.php"?>