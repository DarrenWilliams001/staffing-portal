<?php

use Login\Login;

$login = new Login;
if (isset($_POST['submit'])) {
    $login->login($_POST['username'], $_POST['password']);
}
?>

<body class="bg-dark">
    <div class="d-flex mt-5 justify-content-center align-content-center">
        <img width="350px" src="Assets/TPBG-white.png" alt="Logo">
    </div>
    <div class="login-block bg-light mx-auto">
        <form class="d-flex flex-column align-items-center my-2" action="" method="post">
            <label class="my-2">Username: </label><input type="text" name="username" class="form-control mx-2" />
            <label class="my-2">Password: </label><input type="password" name="password" class="form-control mx-2" />
            <input type="submit" name="submit" value="Login" class="btn my-2 btn-primary" />
            <p>Having trouble logging in? <a href="mailto:darren@23redracing.com.au">Click here</a> </p>
        </form>
    </div>