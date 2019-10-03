<?= !$admin?
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post",
    'Reservation'=> ROOT_DIR."/resa"
],
'dark'),
'nav navrad'):
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post",
    'Article Editor'=> ROOT_DIR."/edit",
    'Reservation'=> ROOT_DIR."/resa"
],
'dark'),
'nav navrad');