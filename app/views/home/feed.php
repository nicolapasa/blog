<?php
$xml = static function ($text) { return htmlspecialchars((string) $text, ENT_XML1 | ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); };
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0"><channel><title>Redrum · Nicola Pasa</title><link><?= $xml(URL_GEN) ?></link><description>Racconti horror, libri e riflessioni di Nicola Pasa.</description><language>it</language>
<?php foreach ($data['posts'] as $post): ?>
<item><title><?= $xml($post->title) ?></title><link><?= $xml(Helpers::postUrl($post)) ?></link><guid isPermaLink="false">redrum-post-<?= (int) $post->id ?></guid><pubDate><?= date(DATE_RSS, strtotime($post->created_at)) ?></pubDate><description><?= $xml(html_entity_decode(strip_tags($post->content), ENT_QUOTES, 'UTF-8')) ?></description></item>
<?php endforeach; ?></channel></rss>
