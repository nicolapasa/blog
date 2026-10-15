<h2>Nuovo post</h2>
<form method="POST" action="/posts/create" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Titolo" required>
    <textarea name="content" rows="8" placeholder="Contenuto" required></textarea>
    <label>Immagine (opzionale):</label>
    <input type="file" name="image" accept="image/*">
    <button type="submit">Crea</button>
</form>
