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
<?php if ($dev) : ?>
    <form method="post">
        <button class='btn dark' name='init'>Réinitialiser</button>
    </form>

<?php endif;
// require_once 'web/module/cmr.bot.php'; ?>
<?= $html->code("section", $html->menu(['<h2>Cours/Tuto</h2>' . $html->menu(["HTML/CSS" => "https://formation.cmrweb.fr/", "JavaScript" => "https://formation.cmrweb.fr/javascript/", "React" => "https://react.cmrweb.fr/", "angular" => "https://angular.cmrweb.fr/",]) => "#"]), "tuto") .
    $html->h('2', !empty($username) ? 'Bienvenu(e) ' . $username : 'Bienvenu(e)', 'large');
?>

<section class="large tuto home">
    <?= $html->h('1', "cmrframework") .
        $html->a("https://github.com/cmrweb/cmrweb", $html->img(ROOT_DIR . IMG_DIR . "github.png", "lien github cmrweb", "logo"), true) .
        $html->h('4', "cmrframework inBulid") .
        $html->iframe("https://www.youtube.com/embed/InM_uDLBm7Q") .
        $html->menu(['<h2>Installation</h2>' . $html->menu([
            "installer WampServer" => "http://www.wampserver.com/en/download-wampserver-64bits/",
            "installer composer" => "https://getcomposer.org/download/",
            $html->p("Dans l'invite de commande : ") .
                "composer create-project cmrweb/cmrframework:dev-master nom_du_projet" => ""
        ]) => "#"]); ?>
    <ul>
        <li>
            <input type="text" readonly value="cd lib">
            <input type="text" readonly value="cli/cmr">
            <input type="text" readonly value="help">
        </li>
        <li>
        <input type="text" readonly value="generate table nom-type-valeur nom-type-valeur-table.field">
        </li>
        <li>
            <p>Créer une table utilisateur avec les champs nom, prenom, age.</p>
            <input type="text" readonly value="generate utilisateur nom-char-255 prenom-char-255 age-int-3">
        </li>
        <li>
            <p>Créer une table actif avec la clé étrangère de la table utilisateur et un champ date</p>
            <input type="text" readonly value="generate actif user_id-int-11-utilisateur.id is_actif-date">
        </li>

    </ul>


</section>
<script src="<?= ROOT_DIR . JS_DIR ?>slideContent.js"></script>
<script>
        slideContent(".home",2000,500,2);
        slideContent(".tuto",-2000,500,2);
        slideContent(".title",-500,500,2);
        slideTopContent(".header",-1000,200,2);
        slideTopContent(".card3D",-1000,1000,1);   
</script>
