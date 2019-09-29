<?= empty($userid)?
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post"
],
'dark'),
'nav navrad'):
$html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR ,
    'Docs'=> ROOT_DIR."/docs",
    'Article'=> ROOT_DIR."/post",
    'Article Editor'=> ROOT_DIR."/edit"
],
'dark'),
'nav navrad');