<h2>Modifica post</h2>
<form method="POST" action="/posts/edit/<?= $post['id'] ?>" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    <textarea name="content" rows="8" required><?= htmlspecialchars($post['content']) ?></textarea>

    <?php if (!empty($post['image'])): ?>
        <p>Immagine attuale:</p>
        <img src="<?= htmlspecialchars($post['image']) ?>" width="200">
    <?php endif; ?>

    <label>Nuova immagine (opzionale):</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Salva</button>
</form>
