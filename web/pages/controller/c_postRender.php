<?php
if(isset($id)){
    $Post = new Post("id=".$id);    
}else{
    $Post = new Post();
}
