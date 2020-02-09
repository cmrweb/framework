<?php $_SESSION['init']=true?>
<link rel="stylesheet" href="<?= ROOT_DIR . PAGES_DIR ?>style/home.css">
<div class="card3D">
    <section>
        <img src="<?= ROOT_DIR . IMG_DIR ?>photo.png" alt="photo enrique camara">
        <div>
            <h4>Enrique CAMARA</h4>
            <h5>Développeur Formateur Web</h5>

            <p> <a href="<?= ROOT_DIR ?>/asset/cv2020.pdf" download=""><i class="far fa-file-pdf"></i> mon cv</a></p>
            <p><a href="mailto:contact@cmrweb.fr"><i class="fas fa-envelope-open-text"></i> contact@cmrweb.fr</a></p>
            <p><a href="https://www.linkedin.com/in/enrique-camara/"><i class="fab fa-linkedin"></i> Linkedin</a></p>
        </div>
    </section>
    <hr>
    <p><strong>Autodidacte</strong> dans la <strong>programmation</strong>,
        j’ai commencer par la <strong>modélisation</strong> et <strong>l’animation 3D</strong> 🖊 pour finir par le <strong>développement de jeux vidéo</strong> 🎮 sur <strong>Unity</strong> en <strong>JS</strong> puis en <strong>C#</strong>.
        Par la suite j’ai suivie <strong>2 formations👨🏽‍🎓 développeur web</strong> pour <strong>apprendre</strong> et <strong>comprendre</strong> la <strong>programmation</strong>👨🏽‍💻 à un autre niveau,
        depuis, j’ai réaliser plusieurs <strong>projet perso</strong> « site <strong>WordPress</strong>, <strong>WooCommerce</strong>, <strong>Progressive Web App</strong>, et un <strong>Framework</strong> <strong>PHP</strong> avec des <strong>lib JavaScript</strong> et des classes <strong>CSS</strong>».
        En <strong>freelance</strong> depuis <strong>décembre 2017.</strong><br>Disponible par contact mail.</p>
</div>
<script src="<?= ROOT_DIR . JS_DIR ?>card3D.js"></script>

<?= $html->code("section", $html->menu(['<h2>Cours/Tuto</h2>' . $html->menu(["HTML/CSS" => "https://formation.cmrweb.fr/", "JavaScript" => "https://formation.cmrweb.fr/javascript/", "React" => "https://react.cmrweb.fr/", "angular" => "https://angular.cmrweb.fr/",]) => "#"]), "tuto") .
    $html->h('2', !empty($username) ? 'Bienvenu(e) ' . $username : 'Bienvenu(e)', 'large') .
    $html->code(
        "section",
        $html->h('1', "cmrframework") .
            $html->a("https://github.com/cmrweb/cmrweb",$html->img(ROOT_DIR.IMG_DIR."github.png","lien github cmrweb","logo"), true) .
            $html->h('4', "cmrframework inBulid") .
            $html->iframe("https://www.youtube.com/embed/kbLOpv2vWo4") .
            $html->menu(['<h2>Installation</h2>' . $html->menu([
                    "installer composer" => "https://getcomposer.org/download/",
                    $html->p("Dans l'invite de commande taper : ").
                    "composer create-project cmrweb/cmrframework:dev-master nom_du_projet" => ""]) => "#"]) .
            $html->menu(['<h2>Utilisation</h2>' . $html->menu([
                "Dans le dossier cmrframework :" => "#", 
                "cd lib" => "#", 
                "cli/cmrgen Table field1-varchar-150 field2-char-100 field3-int" => "#", 
                "chager les valeur du <strong>.env</strong>" => "#", 
                "ajouter votre route dans : web\includes\main.php" => "#", 
                "rendez vous sur l'url pour créer la table" => "#", 
                "supprimer du code la partie SQL" => "#", 
                "passer votre route à chaque header(Location)" => "#"]) => "#"]) .
            $html->a("https://docs.google.com/presentation/d/1FP2pDqd5z5KtJ_tku4P9MljjPUj33xVLkF9VqpDlFII/edit?usp=sharing", "docs pdf", true),
        "large tuto home"
    );
