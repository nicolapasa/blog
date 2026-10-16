<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="intro"><p class="eyebrow">Il blog di Nicola Pasa</p><h1>Storie da leggere.<br>Anche a luci spente.</h1><p>Sono uno scrittore horror indipendente. Qui trovi i miei racconti, i miei libri e le mie riflessioni sulla scrittura e sulla società.</p><a class="button" href="#storie">Esplora le storie ↓</a></section>
<?php if ($data['pagination'][0] === 1): ?>
<nav class="explore-links" aria-label="Esplora Redrum"><?php foreach ($data['categories'] as $category): ?><a href="<?= URL_GEN.'home/categories/'.rawurlencode($category->title) ?>"><?= Helpers::escape(ucfirst($category->title)) ?> →</a><?php endforeach; ?></nav>
<?php foreach ($data['pages'] as $book): if ($book->slug !== 'terre-morte') { continue; } ?>
<section class="book-feature" aria-labelledby="book-title">
<?php if (!empty($book->image)): ?><img src="<?= Helpers::escape(URL_IMAGES.$book->image) ?>" alt="Copertina di <?= Helpers::escape($book->title) ?>" loading="lazy"><?php endif; ?>
<div><p class="eyebrow">Il romanzo</p><h2 id="book-title"><?= Helpers::escape($book->title) ?></h2><p><?= (new Helpers)->cut_text($book->content, 240) ?></p><a class="read-link" href="<?= URL_GEN.'home/pages/'.rawurlencode($book->slug) ?>">Scopri il libro →</a></div>
</section>
<?php endforeach; endif; ?>
<section id="storie" class="post-list" aria-labelledby="stories-title"><p class="eyebrow">Dall’archivio di Redrum</p><h2 id="stories-title">Le ultime pubblicazioni</h2>
<?php if (count($data['blogs']) === 0): ?><p>Le prossime storie arriveranno qui. Torna a trovarmi.</p><?php endif; ?>
<?php foreach ($data['blogs'] as $index => $post): ?>
<?php if ($index === 0 && $data['pagination'][0] === 1): ?><p class="featured-label">In evidenza · L’ultima pubblicazione</p><?php endif; ?>
<?php include __ROOT__.'views/layouts/post-card.php'; endforeach; ?>
</section>
<?php $paginationBase = URL_GEN.'home/index/'; include __ROOT__.'views/layouts/pagination.php'; ?>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
