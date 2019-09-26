<?php
require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php';
$article = new Article('parent_id=0', true);
$countCom = new DB;
$countCom->select("parent_id,COUNT(parent_id) as comm", "cmr_post", null, false);
//dump($countCom->result);
//dump($article->getData());
$user=new User();


//dump($user->getData());
foreach ($article->getData() as $key => $value) : ?>
	<article class="article" value="<?= $value['post_id']; ?>">
		<h1><a href="article/<?= $value['post_id']; ?>"><?= $value['title'] ?></a></h1>
	<!-- TEST LIKE
 	<?php
		if(isset($_POST['like'])){
			$article->like($value['post_id']);
			dump($value['post_id']);
		}
		?>
		<form action="" method="post">
			<button type="submit" data-id="<?=$value['post_id']?>" name="like">like <?= $value['like']; ?></button>			
		</form>	
	
	-->
		<?php foreach ($user->getData() as $k => $v) :
			if ($v["user_id"] == $value["user_id"]) : ?>
				<small><?= $v["username"] ?></small>
			<?php endif;endforeach;?>
		<?php foreach ($countCom->result as $k => $v) :
			if ($v['parent_id'] == $value['post_id']) : ?>
				<small><?= $v['comm'] ?> Commentaire</small>
			<?php endif;endforeach;?>
		<!-- TEST Hashtag
			<p><?= preg_replace("/\#/","<a href=''>#</a>",$value['post']); ?></p>	
		-->	
		<p><?= $value['post']?></p>
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
