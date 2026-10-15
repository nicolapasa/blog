<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="intro"><p class="eyebrow">Il blog di Nicola Pasa</p><h1>Storie da leggere.<br>Anche a luci spente.</h1><p>Sono uno scrittore horror indipendente. Qui trovi i miei racconti, i miei libri e le mie riflessioni sulla scrittura e sulla società.</p><a class="button" href="#storie">Esplora le storie ↓</a></section>
<section id="storie" class="post-list" aria-labelledby="stories-title"><p class="eyebrow">Dall’archivio di Redrum</p><h2 id="stories-title">Le ultime pubblicazioni</h2>
<?php if (count($data['blogs']) === 0): ?><p>Le prossime storie arriveranno qui. Torna a trovarmi.</p><?php endif; ?>
<?php foreach ($data['blogs'] as $index => $post): ?>
<?php if ($index === 0 && $data['pagination'][0] === 1): ?><p class="featured-label">In evidenza · L’ultima pubblicazione</p><?php endif; ?>
<?php include __ROOT__.'views/layouts/post-card.php'; endforeach; ?>
</section>
<?php $paginationBase = URL_GEN.'home/index/'; include __ROOT__.'views/layouts/pagination.php'; ?>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
