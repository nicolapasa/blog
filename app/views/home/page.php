<?php include __ROOT__.'views/layouts/header.php'; $page = $data['page']; ?>
<article class="reading-column static-page"><header class="article-header"><h1><?= Helpers::escape($page->title) ?></h1></header>
<?php if (!empty($page->image)): ?><img class="page-image" src="<?= Helpers::escape(URL_IMAGES.$page->image) ?>" alt="<?= Helpers::escape($page->title) ?>"><?php endif; ?>
<div class="article-body"><?= $page->content ?></div><p class="page-back"><a href="<?= URL_GEN ?>">← Torna alle pubblicazioni</a></p></article>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
