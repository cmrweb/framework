
<!-- Ajouter test à l'url. -->
<link rel='stylesheet' href="<?= ROOT_DIR . PAGES_DIR ?>style/test.css">
<form method='post' class='large primary'  enctype="multipart/form-data">

    <h1>Create</h1>
<div class='form'>
<label for='nom'>nom</label>
<input type="text" class='input' name="nom"  id="nom">
</div>
<div class='form'>
<label for='images'>images</label>
<input type="file" class='input' name="images"  id="images">
</div>
<button type='submit' class='success center' name='send'>envoyer</button>
    </form>
<?php if($test->getData()): ?>
    <h1>Read Update Delete</h1>
<?php  foreach ($test->getData() as $key => $value) : ?>
    <form method='post' class='small primary'  enctype="multipart/form-data">
            <input type="hidden" name="id" label="" class="" placeholder="<?=$value['id']?>"  value="<?=$value['id']?>">
<div class='form'>
<label for='nom'>nom</label>
<input type="text" name="nom"  id="nom" class="input" placeholder="<?=$value['nom']?>" value="<?=$value['nom']?>"> 
</div>
<div class='form'><img src="<?=ROOT_DIR.IMG_DIR.'upload/'.$value['images']?>" width='360' height='250'/>
<label for='images'>images</label>
<input type="file" name="images"  id="images" class="input" > 
</div>
<button type='submit' class='success center' name='update'>mettre a jour</button>
        <button type='delete' class='danger center'  name='delete'>supprimer</button>
        </form>
<?php endforeach;
endif;
