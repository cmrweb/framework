<?php
$page = "DEV";
$isTrue = true;
$new = 34;
$imgPath = ROOT_DIR.IMG_DIR;
$post = new Post();
//dump($post->getData());
foreach ($post->getData() as $key => $value) {
    $posts[$key] = $value;
}
