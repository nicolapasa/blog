<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="login-panel"><h1>Nuova password</h1>
<?php if (!empty($data['message'])): ?><p role="alert" class="form-feedback"><?= Helpers::escape($data['message']) ?></p><?php endif; ?>
<?php if (!empty($data['values']['token'])): ?>
<form action="<?= URL_GEN ?>auth/reset" method="post"><?= Middleware::field() ?><input type="hidden" name="token" value="<?= Helpers::escape($data['values']['token']) ?>">
<label for="password">Nuova password (da 8 a 72 caratteri)</label><input type="password" name="password" id="password" minlength="8" maxlength="72" autocomplete="new-password" required>
<label for="confirmation">Ripeti la password</label><input type="password" name="password_confirmation" id="confirmation" minlength="8" maxlength="72" autocomplete="new-password" required><button class="button" type="submit">Salva nuova password</button></form>
<?php endif; ?><a href="<?= URL_GEN ?>auth/forgot">Richiedi un nuovo link</a></section>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
