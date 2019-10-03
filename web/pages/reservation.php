<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query = " CREATE TABLE IF NOT EXISTS reservation
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`date` date NOT NULL,
`lieu` varchar(255) NOT NULL,
`nom` varchar(100) NOT NULL,
`prix` int NOT NULL)";

$req = $db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$reservation = new Reservation();
// if (isset($_POST['send'])) {
// $reservation->setData(["date" => $_POST['date'],
// "lieu" => $_POST['lieu'],
// "nom" => $_POST['nom'],
// "prix" => $_POST['prix']]); 

// header("Location: ./resa");
// }
if (isset($_POST['update'])) {
    $reservation->update([
        "date" => $_POST['date'],
        "lieu" => $_POST['lieu'],
        "nom" => $_POST['nom'],
        "prix" => $_POST['prix']
    ], "id=" . $_POST['id']);

    header("Location: ./resa");
}
if (isset($_POST['delete'])) {
    $reservation->delete($_POST['id']);
    header("Location: ./resa");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') . $html->input("date", "date", "date") .
    $html->input("text", "lieu", "lieu") .
    $html->input("text", "nom", "nom") .
    $html->input("number", "prix", "prix") .

    $html->button('submit', 'success center', 'envoyer', 'send', 'send') .
    $html->formClose();

if ($reservation->getData()) {
    echo $html->h('1', 'Read Update Delete');
    //     foreach ($reservation->getData() as $key => $value) :
    //     echo $html->formOpen('', 'post', 'large dark') .
    //             $html->input("hidden", "id", "", "", $value['id'],$value['id']) . $html->input("date", "date", "date", "", $value['date'],$value['date']) .
    //  $html->input("text", "lieu", "lieu", "", $value['lieu'],$value['lieu']) .
    //  $html->input("text", "nom", "nom", "", $value['nom'],$value['nom']) .
    //  $html->input("number", "prix", "prix", "", $value['prix'],$value['prix']) .
    //  $html->button('submit', 'success center', 'mettre a jour', 'update') .
    //             $html->button('delete', 'danger center', 'supprimer', 'delete') .
    //             $html->formClose();
    //     endforeach;
}


?>
<section id="resa">
<h2></h2>
<p></p>
</section>
<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data = $('#nom').val() +
            "," + $('#prix').val() +
            "," + $('#lieu').val();

        ajaxRequest('insert/resa', data);
        ajaxSelect('select/resa', data);
    
    })
    $(document).ready(() => {

        ajaxSelect('select/resa');

    })
</script>