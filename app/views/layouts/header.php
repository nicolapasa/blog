<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$description = isset($data['post']) || isset($data['page']) ? trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags(($data['post'] ?? $data['page'])->content), ENT_QUOTES, 'UTF-8'))) : 'Racconti horror, libri e riflessioni sulla scrittura di Nicola Pasa. Entra nel mondo di Redrum.';
$description = mb_substr($description, 0, 160);
?>
<title><?= Helpers::escape($data['title'] ?? 'Redrum | Nicola Pasa') ?></title>
<meta name="description" content="<?= Helpers::escape($description) ?>">
<meta property="og:title" content="<?= Helpers::escape($data['title'] ?? 'Redrum') ?>">
<meta property="og:description" content="<?= Helpers::escape($description) ?>">
<meta property="og:type" content="<?= isset($data['post']) ? 'article' : 'website' ?>">
<link rel="alternate" type="application/rss+xml" title="Redrum · Aggiornamenti" href="<?= URL_GEN ?>home/feed">
<meta property="og:locale" content="it_IT">
<?php if (!empty($data['post']->image)): ?>
<meta property="og:image" content="<?= Helpers::escape(URL_IMAGES.$data['post']->image) ?>">
<?php endif; ?>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Coustard&family=Lora:ital,wght@0,400;0,600;1,400&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= PUBLIC_DIR ?>css/main.css">
<?php if (isset($_SESSION['username'])): ?>
<script src="https://cdn.tiny.cloud/1/bvd9c7l707a61o6ecrwwobfnj29yan9dsr1xgl52wshmyk98/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<?php endif; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
<a class="skip-link" href="#contenuto">Vai al contenuto</a>
<header class="site-header">
<a href="<?= URL_GEN ?>" aria-label="Redrum, pagina iniziale"><img src="<?= URL_IMAGES ?>logodesign2.png" alt="" class="brand-symbol"><span id="logo">Redrum</span></a>
<p class="motto">Ex Ignorantia Ad Sapientiam<br>Ex Luce Ad Tenebras</p>
<nav aria-label="Navigazione principale" class="site-nav">
<a href="<?= URL_GEN ?>">Home</a>
<?php foreach ($data['categories'] as $category): ?>
<a href="<?= URL_GEN.'home/categories/'.rawurlencode($category->title) ?>"><?= Helpers::escape($category->title) ?></a>
<?php endforeach; ?>
<?php foreach ($data['pages'] as $page): ?>
<a href="<?= URL_GEN.'home/pages/'.rawurlencode($page->slug) ?>"><?= Helpers::escape($page->title) ?></a>
<?php endforeach; ?>
<a href="<?= URL_GEN ?>home/static/contact">Contatti</a>
<form action="<?= URL_GEN ?>home/search/" method="get" role="search" class="site-search">
<label for="site-search" class="sr-only">Cerca nel blog</label><input id="site-search" type="search" name="search" placeholder="Cerca una storia…" required><button type="submit">Cerca</button>
</form>
</nav>
</header>
<main id="contenuto">
<?php if (!empty($_SESSION['username'])): ?>
<nav class="admin-nav" aria-label="Area riservata"><a href="<?= URL_GEN ?>admin/index">Articoli</a><a href="<?= URL_GEN ?>admin/indexPages">Pagine</a><a href="<?= URL_GEN ?>admin/users">Utenti</a><a href="<?= URL_GEN ?>auth/register">Nuovo utente</a><a href="<?= URL_GEN ?>">Vedi il blog</a></nav>
<?php endif; ?>
