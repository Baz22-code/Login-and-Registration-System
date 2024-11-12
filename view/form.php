<?php require "assets/partials/header.php"?>
<body>

    <div class="login-form">

        <h1>Login</h1>  

        <form action="">
            <label for="Uname">Username</label>
            <input type="text" name="username">
            <label for="Uname">Password</label>
            <input type="password" name="password">
            <input type="submit" id="time" value="Login">
        </form>

        <a href="/Login/index.php/forgot" class="underline-link">Forgot Password?</a>
        <hr class="styled-line">
        <button onclick="redirectToRegister()">Create new account</button>

<?php require __DIR__ . "/assets/partials/footer.php"?>