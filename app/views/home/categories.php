<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="post-list"><h1><?= Helpers::escape($data['category']) ?></h1>
<?php if (count($data['posts']) === 0): ?><p>Non ci sono ancora articoli in questa categoria.</p><?php endif; ?>
<?php foreach ($data['posts'] as $post) { include __ROOT__.'views/layouts/post-card.php'; } ?>
</section>
<?php $paginationBase = URL_GEN.'home/categories/'.rawurlencode($data['category']).'/'; include __ROOT__.'views/layouts/pagination.php'; ?>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
