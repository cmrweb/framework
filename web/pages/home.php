
<?php
echo $html->menu( ['Cours/Tuto'.$html->menu(["HTML/CSS"=>"https://formation.cmrweb.fr/","JavaScript"=>"https://formation.cmrweb.fr/javascript/","React"=>"https://react.cmrweb.fr/","angular"=>"https://angular.cmrweb.fr/",])=>"#"]);
echo $html->h('2', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large').
$html->code("section",
$html->h('1',"cmrframework").
$html->a("https://github.com/cmrweb/cmrweb","lien GitHub",true).
$html->h('4',"cmrframework inBulid").
$html->a("https://www.youtube.com/watch?v=kbLOpv2vWo4&t=563s","docs video",true).
$html->menu( ['Install'.$html->menu(["composer"=>"https://getcomposer.org/download/","composer create-project cmrweb/cmrframework:dev-master"=>"#"])=>"#"]).
$html->menu( ['Usage'.$html->menu(["cd lib/cli"=>"#","php generator.php Voiture nom-varchar-150 couleur-varchar-100 porte-int"=>"#","change .env info"=>"#","add route in web\includes\main.php"=>"#","launch page for create table"=>"#","comment or remove the sql part"=>"#","uncomment the PHP code"=>"#","replace 'name' by your input name"=>"#"])=>"#"]).
$html->a("https://docs.google.com/presentation/d/1FP2pDqd5z5KtJ_tku4P9MljjPUj33xVLkF9VqpDlFII/edit?usp=sharing","docs pdf",true)
,"large");
