<h2>Posts</h2>
<?php foreach ($posts as $post): ?>
    <div class="post">
        <?php if (!empty($post['image'])): ?>
            <img class="thumb" src="<?= htmlspecialchars($post['image']) ?>" alt="thumb">
        <?php endif; ?>
        <h3><a href="/posts/show/<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
        <small>di <?= htmlspecialchars($post['author'] ?? '—') ?> — <?= $post['created_at'] ?? '' ?></small>
        <p><?= nl2br(htmlspecialchars(substr($post['content'],0,300))) ?><?php if (strlen($post['content'])>300) echo '...'; ?></p>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
            <p>
                <a href="/posts/edit/<?= $post['id'] ?>">Modifica</a> |
                <a href="/posts/delete/<?= $post['id'] ?>" onclick="return confirm('Eliminare?')">Elimina</a>
            </p>
        <?php endif; ?>
        <div style="clear:both;"></div>
    </div>
<?php endforeach; ?>
