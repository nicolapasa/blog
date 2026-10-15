<article class="post-card">
<?php if (!empty($post->image)): ?><a href="<?= URL_GEN.'blogs/show/'.rawurlencode($post->slug) ?>" tabindex="-1" aria-hidden="true"><img src="<?= Helpers::escape(URL_IMAGES.$post->image) ?>" alt="" loading="lazy" class="post-image"></a><?php endif; ?>
<p class="eyebrow"><?= Helpers::escape($post->category) ?> · <?= Helpers::readingTime($post->content) ?> min di lettura</p>
<h2><a href="<?= URL_GEN.'blogs/show/'.rawurlencode($post->slug) ?>"><?= Helpers::escape($post->title) ?></a></h2>
<p class="post-meta"><?= Helpers::italianDate($post->created_at) ?> · Nicola Pasa</p>
<p><?= (new Helpers)->cut_text($post->content, 350) ?></p>
<a class="read-link" href="<?= URL_GEN.'blogs/show/'.rawurlencode($post->slug) ?>">Continua a leggere <span aria-hidden="true">→</span></a>
</article>
