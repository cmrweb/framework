
<?php
/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$Animal = new Animal();
if (isset($_POST['send'])) {
    $Animal->setData([
        "race" => $_POST['race'],
        "nom" => $_POST['nom'],
        "color" => $_POST['color']
    ]);

    header("Location: ./animal");
}
if (isset($_POST['update'])) {
    $Animal->update([
        "race" => $_POST['race'],
        "nom" => $_POST['nom'],
        "color" => $_POST['color']
    ], "id=" . $_POST['id']);

    header("Location: ./animal");
}
if (isset($_POST['delete'])) {
    $Animal->delete($_POST['id']);
    header("Location: ./animal");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') . $html->input("text", "race", "race") .
    $html->input("text", "nom", "nom") .
    $html->input("text", "color", "color") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if ($Animal->getData()) {
    echo $html->h('1', 'Read Update Delete');
    foreach ($Animal->getData() as $key => $value) :
        echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'], $value['id']) . $html->input("text", "race", "race", "", $value['race'], $value['race']) .
            $html->input("text", "nom", "nom", "", $value['nom'], $value['nom']) .
            $html->input("text", "color", "color", "", $value['color'], $value['color']) .
            $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
