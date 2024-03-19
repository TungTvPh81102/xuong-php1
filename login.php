<?php
session_start();
include "db-connect.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userData = mysqli_fetch_array($login_query_run);
        $user_id =   $userData['id'];
        $user_name =   $userData['fullname'];
        $_SESSION['auth_user_id'] = $user_id;
        $_SESSION['auth_name'] = $user_name;
        $_SESSION['status'] = 'Login Successfuly';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = 'Invalid Email and Password';
        header("Location: index.php");
        exit();
    }
}
?>
<!-- <form action="login.php" method="post">
    <div class="modal-body">
        <div class="form-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Enter email id">
        </div>
        <div class="form-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Enter password">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="login" type="submit" class="btn btn-primary">Login</button>
    </div>
</form> -->