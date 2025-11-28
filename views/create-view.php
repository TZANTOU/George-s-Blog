<?php require "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];


    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
    $stmt->execute(['title' => $title, 'content' => $content]);


    header("Location: index.php");
    exit;
}
require 'includes/header.php';
?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">New Article</div>
                <div class="card-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Text</label>
                            <textarea name="content" class="form-control" rows="6" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php require "includes/footer.php"; ?>