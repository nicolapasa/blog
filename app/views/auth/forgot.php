<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="login-panel"><h1>Recupera password</h1><p>Inserisci l’email del tuo account per ricevere un link temporaneo.</p>
<?php if (!empty($data['message'])): ?><p role="status" class="form-feedback"><?= Helpers::escape($data['message']) ?></p><?php endif; ?>
<form action="<?= URL_GEN ?>auth/forgot" method="post"><?= Middleware::field() ?>
<label for="email">Email</label><input type="email" name="email" id="email" autocomplete="email" required maxlength="254">
<div class="honeypot" aria-hidden="true"><label for="website">Lascia vuoto</label><input type="text" name="website" id="website" tabindex="-1" autocomplete="off"></div>
<button class="button" type="submit">Invia link di recupero</button></form><a href="<?= URL_GEN ?>auth/login">Torna al login</a></section>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
