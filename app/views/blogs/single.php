<?php include __ROOT__.'views/layouts/header.php'; $post = $data['post']; ?>
<article class="reading-column">
<header class="article-header"><p class="eyebrow"><?= Helpers::escape($post->category) ?></p><h1><?= Helpers::escape($post->title) ?></h1><p class="post-meta"><?= Helpers::italianDate($post->created_at) ?> · Nicola Pasa · <?= Helpers::readingTime($post->content) ?> min di lettura</p></header>
<?php if (!empty($post->image)): ?><img class="article-image" src="<?= Helpers::escape(URL_IMAGES.$post->image) ?>" alt="<?= Helpers::escape($post->title) ?>"><?php endif; ?>
<div class="article-body"><?= $post->content ?></div>
<aside class="author-note"><h2>Nicola Pasa</h2><p>Scrittore horror indipendente. Su Redrum condivido racconti, libri e riflessioni sulla scrittura e sulla società.</p><a href="<?= URL_GEN ?>home/static/contact">Entra in contatto</a></aside>
</article>
<?php if (count($data['related'])): ?><section class="post-list"><h2>Continua a leggere</h2><?php foreach ($data['related'] as $post) { include __ROOT__.'views/layouts/post-card.php'; } ?></section><?php endif; ?>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
