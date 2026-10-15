<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="post-list"><h1>Risultati della ricerca</h1>
<?php if (count($data['result']) === 0): ?><p>Nessun articolo trovato. Prova con un altro titolo o una parola diversa.</p><?php endif; ?>
<?php foreach ($data['result'] as $post) { include __ROOT__.'views/layouts/post-card.php'; } ?>
</section>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
