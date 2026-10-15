<?php
include __ROOT__.'views/layouts/header.php';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') { $_SESSION['form_started']['contact'] = time(); }
$values = $data['values'] ?? [];
?>
<section class="login-panel contact-panel"><p class="eyebrow">Parliamone</p><h1>Contatti</h1><p>Scrivimi per informazioni sui libri, sui racconti o per una collaborazione.</p>
<?php if (!empty($_SESSION['contact_sent'])): unset($_SESSION['contact_sent']); ?><p role="status" class="form-feedback">Messaggio affidato al servizio di posta. Grazie per avermi scritto.</p><?php endif; ?>
<?php if (!empty($data['message'])): ?><p role="alert" class="form-feedback"><?= Helpers::escape($data['message']) ?></p><?php endif; ?>
<form action="<?= URL_GEN ?>auth/contact" method="post"><?= Middleware::field() ?>
<label for="contact-name">Nome</label><input id="contact-name" name="name" autocomplete="name" required maxlength="100" value="<?= Helpers::escape($values['name'] ?? '') ?>">
<label for="contact-email">Email</label><input id="contact-email" name="email" type="email" autocomplete="email" required maxlength="254" value="<?= Helpers::escape($values['email'] ?? '') ?>">
<label for="contact-message">Messaggio</label><textarea id="contact-message" name="message" rows="7" minlength="10" maxlength="5000" required><?= Helpers::escape($values['message'] ?? '') ?></textarea>
<div class="honeypot" aria-hidden="true"><label for="website">Lascia vuoto</label><input id="website" type="text" name="website" tabindex="-1" autocomplete="off"></div>
<button class="button" type="submit">Invia messaggio</button></form>
<p class="social-links"><a href="https://www.instagram.com/lazonamorta9/">Instagram</a> · <a href="https://www.facebook.com/zonamorta.it">Facebook</a> · <a href="https://www.linkedin.com/in/nicola-pasa-83087215/">LinkedIn</a></p></section>
<?php include __ROOT__.'views/layouts/footer.php'; ?>
