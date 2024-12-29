<?php require_once __DIR__ . '/../../public/assets/partials/header.php'; ?>   

<body>

    <div class="login-form">

        <h1>Login</h1>  

        <form method="POST" id="loginForm">
            <label for="Uname">Username</label>
            <input type="text" name="username" id="username">
            <label for="Uname">Password</label>
            <input type="password" name="password" id="password">
            <input type="submit" id="time" value="Login">
        </form>

        <a href="/Login-System/public/index.php/forgot" class="underline-link">Forgot Password?</a>
        <hr class="styled-line">
        <button onclick="redirectToRegister()">Create new account</button>

<?php require __DIR__ . "/../../public/assets/partials/footer.php"?>