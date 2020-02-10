<style>
    .myForm {
        position: absolute;
        z-index: 1000;
        top: 152px;
        left: 0;
        right: 0;
        background: #b2b2b2;
        padding: 20px;
        width: 60%;
        margin: auto;
    }

    .d-none {
        display: none;
        visibility: hidden;
    }
</style>
<h1>Liste de contact</h1>
<button id="openForm" class="btn primary large center" onclick="openModal('addContactModal')">Ajouter un contact</button>
<div id="list">
</div>
<div id="addContactModal" class="hide">
    <form action="#" class="myForm">
        <div class="form">
            <input class="input" type="text" id="nom" placeholder="nom" name="nom">
        </div>

        <div class="form">
            <input class="input" type="text" id="prenom" placeholder="prenom">
        </div>

        <div class="form">
            <input class="input" type="email" id="email" placeholder="email">
        </div>

        <div class="form">
            <input class="input" type="tel" id="tel" placeholder="tel">
        </div>

        <button class="btn success" id="addContact">Ajouter</button>
        <p id="error" class="bg-danger center"></p>
    </form>
</div>

<script>
    let contact = [
        //je crée des faux user pour créer mon affichage
        {
            nom: "camara",
            prenom: "enrique",
            email: "contact@cmrweb.fr",
            tel: "0651002653"
        }
    ];
    /*
        L'affichage
    */
    function refreshList() {
        let content = "";
        contact.map((user) => {
            content += `<div class="medium flexRow">
                <h3 class="m2">${user.nom.toUpperCase()} ${user.prenom}</h3>
                <a class="btn primary" href="mailto:${user.email}">${user.email}</a>
                <a class="btn success" href="tel:+33${user.tel.slice(1)}">${user.tel}</a>
            </div>`;
        });
        document.getElementById('list').innerHTML = content;
    }
    refreshList();
    /*
        recupere la valeur de mes input
    */
    document.getElementById('addContact').addEventListener('click', (e) => {
        e.preventDefault();
        let nom = document.getElementById('nom');
        let prenom = document.getElementById('prenom');
        let email = document.getElementById('email');
        let tel = document.getElementById('tel');
        if (nom.value != "" && prenom.value != "" && email.value != "" && tel.value != "") {
            contact.push({
                nom: nom.value,
                prenom: prenom.value,
                email: email.value,
                tel: tel.value
            });
            document.getElementById('openForm').innerHTML = "Ajouter un contact";
            refreshList();
            nom.value = "";
            prenom.value = "";
            email.value = "";
            tel.value = "";
            document.getElementById('error').innerHTML = ""
        } else {
            document.getElementById('error').innerHTML = "Veuillez remplir les champs!"
        }

    });
</script>