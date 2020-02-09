<?php

$projectName = preg_replace("/\//","",$_ENV['ROOT_PATH']);
?>

<form action="" method="post">
    <label for="projectName">Nom du projet</label>
    <input type="text" id="projectName" value="<?=$projectName?>">
</form>