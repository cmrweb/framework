
<!-- Ajouter test à l'url. -->
<link rel='stylesheet' href="<?= ROOT_DIR . PAGES_DIR ?>style/test.css">
<form method='post' class='large primary'>
<h1>Create</h1>
<div class='form'>
<label for='nom'>nom</label>
<input type="text" class='input' name="nom"  id="nom">
</div>
<div class='form'>
<label for='prenom'>prenom</label>
<input type="text" class='input' name="prenom"  id="prenom">
</div>
<div class='form'>
<label for='age'>age</label>
<input type="number" class='input' name="age" id="age">
</div>
<button type='submit' class='success center' name='send'>envoyer</button>
    </form>
<?php if($test->getData()): ?>
    <h1>Read Update Delete</h1>
<?php  foreach ($test->getData() as $key => $value) : ?>
    <form method='post' class='small primary'>
            <input type="hidden" name="id" label="" class="" placeholder="<?=$value['id']?>"  value="<?=$value['id']?>">
<div class='form'>
<label for='nom'>nom</label>
<input type="text" name="nom"  id="nom" class="input" placeholder="<?=$value['nom']?>" value="<?=$value['nom']?>"> 
</div>
<div class='form'>
<label for='prenom'>prenom</label>
<input type="text" name="prenom"  id="prenom" class="input" placeholder="<?=$value['prenom']?>" value="<?=$value['prenom']?>"> 
</div>
<div class='form'>
<label for='age'>age</label>
<input type="number" name="age" id="age" class="input" placeholder="<?=$value['age']?>" value="<?=$value['age']?>"> 
</div>
<button type='submit' class='success center' name='update'>mettre a jour</button>
        <button type='delete' class='danger center'  name='delete'>supprimer</button>
        </form>
<?php endforeach;
endif;
