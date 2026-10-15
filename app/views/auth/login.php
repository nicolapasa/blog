<?php include __ROOT__.'views/layouts/header.php'; ?>
<section class="login-panel" aria-labelledby="login-title"><p class="eyebrow">Area riservata</p><h1 id="login-title">Accedi a Redrum</h1><p>Gestisci racconti, pagine e profilo.</p>
<?php if (!empty($data['message'])): ?><p class="form-error" role="alert"><?= Helpers::escape($data['message']) ?></p><?php endif; ?>
<form action="<?= URL_GEN ?>auth/signin" method="post">
<?= Middleware::field() ?>
<label for="username">Nome utente</label><input id="username" name="username" type="text" autocomplete="username" required maxlength="255" value="<?= Helpers::escape($data['username'] ?? '') ?>">
<label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required>
<button class="button" type="submit">Accedi</button>
</form><p><a href="<?= URL_GEN ?>auth/forgot">Hai dimenticato la password?</a></p><a href="<?= URL_GEN ?>">← Torna al blog</a></section>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
