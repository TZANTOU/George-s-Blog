<?php
require "db.php";
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
require 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>My Articles</h1>
    <a href="create.php" class="btn btn-primary">+ New Article</a>
</div>

<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-md-12 mb-3"> <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                    <p class="card-text">
                        <?php echo nl2br(htmlspecialchars(substr($post['content'], 0, 100))); ?>...
                    </p>
                    <a href="/views/post-view.php?id=<?=$post['id'];?>" class="btn btn-primary">Read More</a>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <small><?php echo $post['created_at']; ?></small>
                    </h6>
                    <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                    <a href="delete.php?id=<?php echo $post['id']; ?>"
                       class="btn btn-danger btn-sm float-end"
                       onclick="return confirm('Sure?')">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
require 'includes/footer.php';
?>
