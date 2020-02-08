<style>
    .card3D {
        perspective: 800px;
        position: relative;
        width: 80%;
        margin: auto;
        padding: 20px;
        border: 2px solid #031c1d;
        transform: rotate3d(0, 0, 0, 45deg);
        transition: all linear 1s;
        border-radius: 25px;
        box-shadow: #78787859 2px 2px 3px;
        background: #3e8486e0;
        color: #f5f5f5;
        text-shadow: #000 1px 1px 3px;
        z-index: 800;
    }

    .card3D img {
        width: 150px;
        border-radius: 40px;
    }

    .card3D section {
        display: flex;

    }

    .card3D section div {
        width: 100%;
        text-align: center;
    }

    #topright {
        position: absolute;
        width: 40px;
        height: 40px;
        top: 0;
        right: 0;
        z-index: 1000;
    }

    #bottomright {
        position: absolute;
        width: 40px;
        height: 40px;
        bottom: 0;
        right: 0;
        z-index: 1000;
    }

    #topleft {
        position: absolute;
        width: 40px;
        height: 40px;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    #bottomleft {
        position: absolute;
        width: 40px;
        height: 40px;
        bottom: 0;
        left: 0;
        z-index: 1000;
    }

    #top {
        position: absolute;
        width: auto;
        height: 40px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 800;
    }

    #bottom {
        position: absolute;
        width: auto;
        height: 40px;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 800;
    }

    .tuto {
        width: 80%;
        margin: 10px auto;
    }

    .tuto ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .tuto>ul>li {
        padding: 5px;
        text-align: center;
        border: 1px solid #000;
        border-radius: 25px;
        background: #3e8486e0;
        color: #f5f5f5;
        text-shadow: #000 1px 1px 3px;
    }

    .tuto ul li:hover ul li {
        display: block;
    }

    .tuto ul li ul li {
        display: none;
        margin: 0;
        padding: 5px;
        transition: all linear 1s;
    }

    @media(min-width: 1024px) {
        .card3D {
            width: 40%;
        }
    }
</style>
<div class="card3D">
    <div id="topright"></div>
    <div id="top"></div>
    <div id="topleft"></div>
    <div id="bottomright"></div>
    <div id="bottom"></div>
    <div id="bottomleft"></div>
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
<script>
    function card3D(id) {
        const card = document.querySelector('.card3D');
        element = [
            card.querySelector("#top"),
            card.querySelector("#bottom"),
            card.querySelector("#topright"),
            card.querySelector("#topleft"),
            card.querySelector("#bottomright"),
            card.querySelector("#bottomleft")
        ];
        for (let i = 0; i < element.length; i++) {
            console.log(element[i])
        }

        let transform, shadow;
        switch (id) {
            case "top":
                transform = "rotate3d(-77, -2, 0, 45deg)";
                shadow = "#78787859 2px 15px 3px";
                break;
            case "bottom":
                transform = "rotate3d(0, 0, 0, 45deg)";
                shadow = "#78787859 2px 2px 3px";
                break;
            case "topright":
                transform = "rotate3d(-9, -38, 2, 45deg)";
                shadow = "#78787859 -15px 10px 3px";
                break;
            case "topleft":
                transform = "rotate3d(-9, 22, 2, 45deg)";
                shadow = "#78787859 15px 10px 3px";
                break;
            case "bottomright":
                transform = "rotate3d(-7, 60, 0, -45deg)";
                shadow = "#78787859 -15px -10px 3px";
                break;
            case "bottomleft":
                transform = "rotate3d(7, 15, 0, 45deg)";
                shadow = "#78787859 15px -10px 3px";
                break;
            default:
                break;
        }
        document.getElementById(id).addEventListener("mouseover", e => {
            card.style.transform = transform;
            card.style.boxShadow = shadow;
        })
    }
    card3D("top");
    card3D("bottom");
    card3D("topright");
    card3D("topleft");
    card3D("bottomright");
    card3D("bottomleft");
</script>

<?=
    $html->code("section", $html->menu(['<h2>Cours/Tuto</h2>' . $html->menu(["HTML/CSS" => "https://formation.cmrweb.fr/", "JavaScript" => "https://formation.cmrweb.fr/javascript/", "React" => "https://react.cmrweb.fr/", "angular" => "https://angular.cmrweb.fr/",]) => "#"]), "tuto") .
        $html->h('2', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large') .
        $html->code(
            "section",
            $html->h('1', "cmrframework") .
                $html->a("https://github.com/cmrweb/cmrweb", "lien GitHub", true) .
                $html->h('4', "cmrframework inBulid") .
                $html->a("https://www.youtube.com/watch?v=kbLOpv2vWo4&t=563s", "docs video", true) .
                $html->menu(['Install' . $html->menu(["composer" => "https://getcomposer.org/download/", "composer create-project cmrweb/cmrframework:dev-master" => "#"]) => "#"]) .
                $html->menu(['Usage' . $html->menu(["cd lib/cli" => "#", "php generator.php Voiture nom-varchar-150 couleur-varchar-100 porte-int" => "#", "change .env info" => "#", "add route in web\includes\main.php" => "#", "launch page for create table" => "#", "comment or remove the sql part" => "#", "uncomment the PHP code" => "#", "replace 'name' by your input name" => "#"]) => "#"]) .
                $html->a("https://docs.google.com/presentation/d/1FP2pDqd5z5KtJ_tku4P9MljjPUj33xVLkF9VqpDlFII/edit?usp=sharing", "docs pdf", true),
            "large home"
        );
