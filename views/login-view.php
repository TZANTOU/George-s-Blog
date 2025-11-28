<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Find the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :u");
    $stmt->execute(['u'=>$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify his password
    if($user && password_verify($password,$user['password'])){
        // Save Session ID
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: index.php');
    }
    else{
        $error = "Wrong username or password";
        echo $error;
    }

}
require 'includes/header.php';
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">




                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center">
                <small>Don't have an account? <a href="register.php">Sign up</a></small>
            </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
?>
