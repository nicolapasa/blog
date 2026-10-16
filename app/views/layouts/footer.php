</main>
<aside class="follow-up"><h2>Le prossime storie</h2><p>Segui Redrum nel tuo lettore RSS per ricevere le nuove pubblicazioni.</p><a class="button" href="<?= URL_GEN ?>home/feed">Segui gli aggiornamenti via RSS</a></aside>
<footer class="site-footer">
<p>Redrum · Racconti, libri e riflessioni di Nicola Pasa</p>
<p>&copy; <?= date('Y') ?> Nicola Pasa</p>
<p><a href="<?= URL_GEN ?>home/static/contact">Contatti</a> · <a href="#contenuto">Torna al contenuto</a></p>
<?php if (isset($_SESSION['username'])): ?>
<p><a href="<?= URL_GEN ?>admin/index">Amministrazione</a> · <form class="logout-form" action="<?= URL_GEN ?>auth/logout" method="post"><?= Middleware::field() ?><button type="submit">Esci</button></form></p>
<?php else: ?>
<a href="<?= URL_GEN ?>auth/login">Accedi</a>
<?php endif; ?>
</footer>
</body>
</html>
