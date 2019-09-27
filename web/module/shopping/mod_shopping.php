<?php
//require_once '../' . ROOT_DIR . MOD_DIR . 'shopping/mod_form_shopping.php';
$article = new Shopping();
$article->setData(["arg2"=>"test","arg3"=>"1","arg5"=>"1","arg6"=>"dadadad"]);
$countCom = new DB;
$countCom->select("parent_id,COUNT(parent_id) as comm", "cmr_post", null, false);
//dump($countCom->result);
//dump($article->getData());
$user=new User();


//dump($user->getData());
foreach ($article->getData() as $key => $value) : ?>
	<article class="article" value="<?= $value['id']; ?>">
		<h1><a href="article/<?= $value['id']; ?>"><?= $value['name'] ?></a></h1>
        <p><?= $value['price']?> €</p>
		<p><?= $value['description']?></p>
		<?php
		preg_match("/mp4|MOV|wmv|mkv|avi|m4v|webm/i",$value["img"],$video);
		if($video):
		?>
				<video src="<?= ROOT_DIR . IMG_DIR . '/' . $value["img"] ?>"width='100%' controls></video>
		<?php endif;
				preg_match("/png|jpg|jpeg/i",$value["img"],$img);
				if($img):
				?> 
		<a href="article/<?= $value['post_id']; ?>"><img src="<?= ROOT_DIR . IMG_DIR . '/' . $value["img"] ?>" alt="" width="100%"></a>
		<?php endif;?>
	</article>
<?php
endforeach;
