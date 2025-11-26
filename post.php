<?php
require "db.php";
if(!isset($_GET["id"])){
   header("Location: index.php");
   exit();
}
$id=$_GET["id"];
//database
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=:id");
$stmt->execute(['id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
//
if(!$post){
    die("no post found");
}
require 'includes/header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-9">
        <a href="index.php" class="btn btn-outline-secondary btn-sm mb-3">&larr; Articles Section</a>
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h1 class="card-title mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>

                <p class="text-muted mb-4">
                    <small>Posted: <?php echo date('d/m/Y H:i', strtotime($post['created_at'])); ?></small>
                </p>

                <hr>

                <div class="card-text mt-4" style="line-height: 1.8; font-size: 1.1rem;">
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </div>
                <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                <a href="delete.php?id=<?php echo $post['id']; ?>"
                   class="btn btn-danger btn-sm float-end"
                   onclick="return confirm('Sure?')">Delete</a>
            </div>
        </div>

    </div>

</div>
<?php
require 'includes/footer.php';
?>
