<?php require_once __DIR__ . '/../../public/assets/partials/header.php'; ?>   
<body>
    <div class="register-form">
        <h1>Registration</h1>  

        <form method="POST" id="registrationForm">
            
            <div class="input-container">
                <input type="text" id="firstName" name="firstName" placeholder=" " />
                <label for="firstName">Firstname</label>
                <span class="error" id="firstNameError"></span>
            </div>
            
            <div class="input-container">
                <input type="text" id="lastName" name="lastName" placeholder=" " />
                <label for="lastName">Lastname</label>
                <span class="error" id="lastNameError"></span>
            </div>

            <div class="input-container">
                <input type="text" id="secretId" name="secretId" placeholder=" " />
                <label for="secretId">Secret ID</label>
                <span class="error" id="secretIdError"></span>
            </div>
        
            <div class="input-container">
                <input type="text" id="username" name="username" placeholder=" " />
                <label for="username">Username</label>
                <span class="error" id="userNameError"></span>
            </div>
            
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder=" " />
                <label for="password">Password</label>
                <span class="error" id="passwordError"></span>
            </div>
            
            <div class="input-container">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder=" " />
                <label for="confirmPassword">Confirm Password</label>
                <span class="error" id="confirmPasswordError"></span>
            </div>
            
            <div class="button_container">
                <input type="submit" id="create_btn" value="Create">
                <input type="button" id="cancel_btn" value="Cancel" onclick="window.location.href='/Login-System/public/index.php'">
            </div>
        </form>
    </div>
<?php require __DIR__ . "/../../public/assets/partials/footer.php"?>
