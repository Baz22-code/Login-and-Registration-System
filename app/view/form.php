<?php require_once __DIR__ . '/../../public/assets/partials/header.php'; ?>

<body>
    <div class="login-form">
        <h1>Login</h1>  

        <form method="POST"  id="loginForm">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <p id="error-message" style="color: red; display: none;"></p> <!-- Error message -->
            <input type="submit" id="loginButton" value="Login">
        </form>

        <a href="/Login-System/public/index.php/forgot" class="underline-link">Forgot Password?</a>
        <hr class="styled-line">
        <button onclick="redirectTo('/Login-System/public/index.php/register')">Create new account</button>

<?php require __DIR__ . "/../../public/assets/partials/footer.php"; ?>
