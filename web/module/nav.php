<?php if(!$userid&&!$admin):
echo $html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR."/" ,
    'Articles'=> ROOT_DIR."/post",
    'Articles Editor'=> ROOT_DIR."/edit"
],
''),
'nav navClassic');
elseif($admin):
    echo $html->code('nav',
    $html->menu([
        'Home'=> ROOT_DIR."/" ,
        'Dev'=> ROOT_DIR."/dev",
        'Demo'=> ROOT_DIR."/post",
        'Article Editor'=> ROOT_DIR."/edit",
        // 'Chat'=> ROOT_DIR."/chat"
    ],
    ''),
    'nav navClassic');
elseif($userid&&!$admin):
echo $html->code('nav',
$html->menu([
    'Home'=> ROOT_DIR."/" ,
    'Dev'=> ROOT_DIR."/dev",
    'Demo'=> ROOT_DIR."/post",
    // 'Chat'=> ROOT_DIR."/chat"
],
''),
'nav navClassic');
endif;