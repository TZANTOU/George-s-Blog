
<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users(username,password) VALUES(:u,:p)");
    if($stmt->execute(['u'=>$username,'p'=>$hashed_password])){
        echo "You Register Succesfully! <a href='login.php'Login</a>";
    }else{
        echo "Something is off.";

    }
}

require 'includes/header.php';
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>Εγγραφή Νέου Χρήστη</h4>
            </div>
            <div class="card-body">

                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?> <br>
                        <a href="login.php" class="fw-bold">Πήγαινε στη Σύνδεση</a>
                    </div>
                <?php else: ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Διάλεξε Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Διάλεξε Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Δημιουργία Λογαριασμού</button>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
            <div class="card-footer text-center">
                <small>Έχεις ήδη λογαριασμό; <a href="login.php">Σύνδεση</a></small>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>