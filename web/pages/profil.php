<!-- Ajouter profil à l'url. -->
<link rel='stylesheet' href="<?= ROOT_DIR . PAGES_DIR ?>style/profil.css">

<?php if ($profil->getData("user_id=" . $userid)) : ?>
    <h1>Mise à jour du profil</h1>
    <?php foreach ($profil->getData("user_id=" . $userid) as $key => $value) : ?>
        <form method='post' class='small primary'>
            <input type="hidden" name="user_id" value="<?= $userid ?>">
            <input type="hidden" name="id" value="<?= $value['id'] ?>">
            <div class='form'>
                <label for='email'>email</label>
                <input type="email" name="email" id="email" class="input" value="<?php foreach($user->getData() as $key_user => $val_user)echo $val_user['email'] ?>">
            </div>
            <div class='form'>
                <label for='nom'>nom</label>
                <input type="text" name="nom" id="nom" class="input" placeholder="<?= $value['nom'] ?>" value="<?= $value['nom'] ?>">
            </div>
            <div class='form'>
                <label for='prenom'>prenom</label>
                <input type="text" name="prenom" id="prenom" class="input" placeholder="<?= $value['prenom'] ?>" value="<?= $value['prenom'] ?>">
            </div>
            <div class='form'>
                <label for='age'>age</label>
                <input type="number" name="age" id="age" class="input" placeholder="<?= $value['age'] ?>" value="<?= $value['age'] ?>">
            </div>
            <div class='form'>
                <label for='adresse'>adresse</label>
                <input type="text" name="adresse" id="adresse" class="input" placeholder="<?= $value['adresse'] ?>" value="<?= $value['adresse'] ?>">
            </div>
            <div class='form'>
                <label for='cp'>cp</label>
                <input type="number" name="cp" id="cp" class="input" placeholder="<?= $value['cp'] ?>" value="<?= $value['cp'] ?>">
            </div>
            <button type='submit' class='success center' name='update'>mettre a jour</button>
            
        </form>
    <?php endforeach;
else : ?>
    <form method='post' class='large primary'>
        <h1>Profil</h1>
        <input type="hidden" name="user_id" value="<?= $userid ?>">
        <div class='form'>
            <label for='nom'>nom</label>
            <input type="text" class='input' name="nom" id="nom">
        </div>
        <div class='form'>
            <label for='prenom'>prenom</label>
            <input type="text" class='input' name="prenom" id="prenom">
        </div>
        <div class='form'>
            <label for='age'>age</label>
            <input type="number" class='input' name="age" id="age">
        </div>
        <div class='form'>
            <label for='adresse'>adresse</label>
            <input type="text" class='input' name="adresse" id="adresse">
        </div>
        <div class='form'>
            <label for='cp'>cp</label>
            <input type="number" class='input' name="cp" id="cp">
        </div>
        <button type='submit' class='success center' name='send'>envoyer</button>
    </form>
<?php endif;
