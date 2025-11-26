<?php
require "db.php";
if(!isset($_GET["id"])){
    die("No ID provided");
}
$id = $_GET["id"];
//POST the updated content of the post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];


    $stmt = $pdo->prepare("UPDATE posts SET title=:title, content=:content WHERE id=:id");
    $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);


    header("Location: index.php");
    exit;
}
//GET the already posted content
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=:id");
$stmt->execute(['id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$post){
    die("Post not found");
}
require 'includes/header.php';
?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Edit Article</div>
                <div class="card-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="<?=htmlspecialchars($post['title'])?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Text</label>
                            <textarea name="content" class="form-control" rows="6" required><?=htmlspecialchars($post['content'])?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php require "includes/footer.php"; ?>