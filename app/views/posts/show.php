<h2><?= htmlspecialchars($post['title']) ?></h2>
<p><small>di <?= htmlspecialchars($post['author'] ?? '—') ?> — <?= $post['created_at'] ?? '' ?></small></p>

<?php if (!empty($post['image'])): ?>
    <p><img src="<?= htmlspecialchars($post['image']) ?>" style="max-width:100%;"></p>
<?php endif; ?>

<div><?= nl2br(htmlspecialchars($post['content'])) ?></div>
<p><a href="/posts">Torna ai post</a></p>
