<?php require __DIR__ . "/assets/partials/header.php"?>    
<body>

    <div  class="register-form">

        <h1>Registration</h1>  

        <form action="">
            
            <input type="text" name="Firstname" placeholder="Firstname">
            <input type="text" name="Lastname" placeholder="Lastname">
        
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder ="Password">
            <input type="password" name="Confirm_password" placeholder="Confirm Password">
            
            <div class="form_1">
            <input type="submit" id="create_btn" value="Create">
            <input type="button" id="cancel_btn" value="Cancel" onclick="window.location.href='/Login/index.php'">
            </div>
            
        </form>
        
        
<?php require __DIR__ . "/assets/partials/footer.php"?>