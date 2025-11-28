<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>George's Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">

        <?php
    $path=parse_url($_SERVER['REQUEST_URI'])['path'];;
    if($path <> '/post' ):
    ?>
        <a class="navbar-brand" href="../index.php">George's Blog</a>
    <?php
    else:
    ?>
        <a class="navbar-brand" href="/index.php">George's Blog</a>
        <?php endif; ?>
        </div>
    </nav>
    <div class="container">
