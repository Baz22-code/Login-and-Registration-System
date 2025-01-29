<?php 
    session_start();
    require_once __DIR__ . '/../../public/assets/partials/header.php'; ?>   
<body>
    <div class="update_pass">
        <h1>Update Password</h1>  

        <form method="POST" id="updatePassword">

            <div class="input-container">
                <input type="text" id="username" name="username"  readonly  placeholder=" " value = "<?php echo htmlspecialchars($_SESSION['user']['username']); ?> " />
                <label for="username">Username</label>
            </div>
            
            <div class="input-container">
                <input type="text" id="secretId" name="secretId" readonly placeholder=" "  value = "<?php echo htmlspecialchars($_SESSION['user']['secretId']); ?>" />
                <label for="secretId">Secret ID</label>
            </div>
                    
            <div class="input-container">
                <input type="password" id="newPassword" name="newPassword" placeholder=" " />
                <label for="newPassword">New Password</label>
                <span class="error" id="passwordError"></span>
            </div>
            
            <div class="input-container">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder=" " />
                <label for="confirmPassword">Confirm Password</label>
                <span class="error" id="confirmPasswordError"></span>
            </div>
            
            <div class="button_container">
                <input type="submit" id="create_btn" value="Update">
                <input type="button" id="cancel_btn" value="Cancel" onclick="window.location.href='/Login-System/public/index.php'">
            </div>
        </form>
    </div>
<?php require __DIR__ . "/../../public/assets/partials/footer.php"?>
