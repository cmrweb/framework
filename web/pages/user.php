
<!-- Ajouter user à l'url. -->
<link rel='stylesheet' href="<?= ROOT_DIR . PAGES_DIR ?>style/user.css">
<form method='post' class='large primary formLog'>
    <h1>Connexion</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type="email" class='input' name="email" id="email">
    </div>
    <div class='form'>
        <label for='password'>password</label>
        <input type="password" class='input' name="password" id="password">
    </div>
    <button type='submit' class='success center' name='conn'>connexion</button>
</form>
<form method='post' class='large primary formSign'>
    <h1>Inscription</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type="email" class='input mailSecure' name="email" id="email">
    </div>
    <div class='form'>
        <label for='password'>password</label>
        <input type="password" class='input passSecure' name="password" id="password">
    </div>
    <button type='submit' class='success center' name='insc'>inscription</button>
</form>

