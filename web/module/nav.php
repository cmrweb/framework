<?= !$admin?
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post",
    'Chat'=> ROOT_DIR."/chat"
],
'dark'),
'nav navrad'):
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post",
    'Article Editor'=> ROOT_DIR."/edit",
    'Chat'=> ROOT_DIR."/chat"
],
'dark'),
'nav navrad');