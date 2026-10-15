<?php
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog MVC</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 15px; }
        header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
        nav a { margin-right:10px; text-decoration:none; }
        .error { color: red; }
        form input, form textarea { display:block; width:100%; padding:8px; margin-bottom:10px; }
        .post { border-bottom:1px solid #ddd; padding:10px 0; overflow:auto; }
        .thumb { float:left; margin-right:15px; max-width:150px; max-height:120px; object-fit:cover; }
    </style>
</head>
<body>
    <header>
        <h1><a href="/posts">Blog MVC</a></h1>
        <nav>
            <?php if (isset($_SESSION['user_id'])):
                $me = (function(){ $pdo = Database::getInstance(); $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?'); $stmt->execute([$_SESSION['user_id']]); return $stmt->fetch(PDO::FETCH_ASSOC); })();
            ?>
                <span>Benvenuto, <?= htmlspecialchars($me['name'] ?? 'Utente') ?></span>
                <a href="/posts/create">Nuovo post</a>
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
                <a href="/register">Registrati</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <?php
        $viewPath = __DIR__ . '/'. $path . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo '<p>View non trovata: ' . htmlspecialchars($path) . '</p>';
        }
        ?>
    </main>
</body>
</html>
