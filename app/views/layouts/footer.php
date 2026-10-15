</main>
<footer class="site-footer">
<p>Redrum · Racconti, libri e riflessioni di Nicola Pasa</p>
<p>&copy; <?= date('Y') ?> Nicola Pasa</p>
<p><a href="<?= URL_GEN ?>home/static/contact">Contatti</a> · <a href="#contenuto">Torna al contenuto</a></p>
<?php if (isset($_SESSION['username'])): ?>
<p><a href="<?= URL_GEN ?>admin/index">Amministrazione</a> · <a href="<?= URL_GEN ?>auth/logout">Esci</a></p>
<?php else: ?>
<a href="<?= URL_GEN ?>auth/login">Accedi</a>
<?php endif; ?>
</footer>
</body>
</html>
