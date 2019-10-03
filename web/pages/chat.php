<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query = " CREATE TABLE IF NOT EXISTS chat
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`nom` varchar(100) NOT NULL,
`message` text NOT NULL)";

$req = $db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$chat = new Chat();
// if (isset($_POST['send'])) {
//     $chat->setData([
//         "nom" => $_POST['nom'],
//         "message" => $_POST['message']
//     ]);

//     header("Location: ./");
// }
if (isset($_POST['update'])) {
    $chat->update([
        "nom" => $_POST['nom'],
        "message" => $_POST['message']
    ], "id=" . $_POST['id']);

    header("Location: ./");
}
if (isset($_POST['delete'])) {
    $chat->delete($_POST['id']);
    header("Location: ./");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') . $html->input("text", "nom", "nom") .
    $html->textarea("5", "message", "message", "message") .

    $html->button('submit', 'success center', 'envoyer', 'send','send') .
    $html->formClose();



?>
<section id="chat">
    <h2></h2>
    <p></p>
</section>
<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data = $('#nom').val() +
            "," + $('#message').val();

        ajaxRequest('insert/chat', data);
        ajaxSelect('select/chat', data);

    })
    $(document).ready(() => {

        ajaxSelect('select/chat');

    })
</script>