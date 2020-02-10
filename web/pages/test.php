<!-- Ajouter user à l'url. -->
<link rel='stylesheet' href="<?= ROOT_DIR . PAGES_DIR ?>style/user.css">
<form method='post' class='large primary'>
    <h1>Connexion</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type="email" class='input mailSecure' name="email" id="email">
    </div>
    <div class='form'>
        <label for='preemail'>preemail</label>
        <input type="password" class='input' name="preemail" id="preemail">
    </div>
    <button type='submit' class='success center' name='conn'>connexion</button>
</form>
<form method='post' class='large primary'>
    <h1>Inscription</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type="email" class='input mailSecure' name="email" id="email">
    </div>
    <div class='form'>
        <label for='preemail'>preemail</label>
        <input type="password" class='input passSecure' name="preemail" id="preemail">
    </div>
    <button type='submit' class='success center' name='send'>inscription</button>
</form>
<?php $user=new User("id=".$userid); if ($user->getData()) : ?>
    <h1>Read Update Delete</h1>
    <?php foreach ($user->getData() as $key => $value) : ?>
        <form method='post' class='small primary'>
            <input type="hidden" name="id" label="" class="" placeholder="<?= $value['id'] ?>" value="<?= $value['id'] ?>">
            <div class='form'>
                <label for='email'>email</label>
                <input type="email" name="email" id="email" class="input" placeholder="<?= $value['email'] ?>" value="<?= $value['email'] ?>">
            </div>
            <div class='form'>
                <label for='preemail'>preemail</label>
                <input type="password" name="preemail" id="preemail" class="input" placeholder="<?= $value['preemail'] ?>" value="<?= $value['preemail'] ?>">
            </div>
            <button type='submit' class='success center' name='update'>mettre a jour</button>
            <button type='delete' class='danger center' name='delete'>supprimer</button>
        </form>
<?php endforeach;
endif;
