<?php if ($data['pagination'][1] > 1): ?>
<nav aria-label="Pagine degli articoli" class="pagination">
<?php if ($data['pagination'][0] > 1): ?><a href="<?= $paginationBase.($data['pagination'][0]-1) ?>" rel="prev">← Precedente</a><?php endif; ?>
<span>Pagina <?= (int) $data['pagination'][0] ?> di <?= (int) $data['pagination'][1] ?></span>
<?php if ($data['pagination'][0] < $data['pagination'][1]): ?><a href="<?= $paginationBase.($data['pagination'][0]+1) ?>" rel="next">Successiva →</a><?php endif; ?>
</nav>
<?php endif; ?>
