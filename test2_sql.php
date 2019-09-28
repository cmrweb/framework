<?php
// $db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
// $query=" CREATE TABLE IF NOT EXISTS test2
// (
//     id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
// nom varchar(100),
// prenom varchar(100))";

// $req=$db->prepare($query);

// $req->execute();
$test = new test2();
if(isset($_POST['send'])){
 $test->setData(["nom"=>$_POST['nom'],"prenom"=>$_POST['prenom']]);   
 header("Location: ./");
}

//dump($test->getData());
echo
    $html->formOpen('', 'post', 'large primary') .
        $html->input("text", "nom", "nom") .
        $html->input("text", "prenom", "prenom") .
        $html->button('submit', 'success center', 'envoyer', 'send') .
        $html->formClose();

        
foreach ($test->getData() as $key => $value):?>
<p><?=$value['nom']." ".$value['prenom']?></p>
<?php endforeach?>