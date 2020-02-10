<?php

?>
<style>
    #bot {
        padding: 20px;
        margin: 40px;
        background: #dedfe4;
        box-shadow: #0000008f -3px -3px 6px;
    }

    #bot h3 {
        padding: 20px;
    }

    #bot>div>div {
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    #bot p {
        background: #59585847;
        display: inherit;
        padding: 20px 40px;
        width: 39%;
        margin: 10px 10px;
    }

    #bot p:hover {
        box-shadow: #2eb900c7 0px 1px 5px;
    }

    #contactModal {
        width: 60%;
        margin: auto;
        position: fixed;
        left: 0;
        right: 0;
        top: 20%;
        background: #ebe8d8f0;
        padding: 50px;
        z-index: 2000;
        border-radius: 25px;
    }

    #bgCover {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #00000080;
        z-index: 1000;
    }
</style>
<div id="bot">
</div>

<form method="post" id="contactModal" class="hide">
    <h1>Contact</h1>
    <div class="form">
        <label for="nom">Nom Prenom</label>
        <input type="text" name="" id="nom" class="input">
    </div>

    <div class="form">
        <label for="mail">Adresse email</label>
        <input type="text" name="" id="mail" class="input">
    </div>
    <div class="form">
        <label for="msg">Message</label>
        <textarea name="" class="input" id="msg" cols="30" rows="10"></textarea>
    </div>
    <button class="btn light large center">Envoyer</button>
</form>
<script>
    //bot nextStep
    const bot = <?= json_encode(json_decode(file_get_contents("web/module/json/dial.json"), true)) ?>;
    // console.log(bot);
    let path = [];
    let nextStep = next => {
        let content = "";

        path.push(next);
        content = `<div data-id="${next}">`
        content += `<h3>${bot[next].question}</h3><div>`;
        for (let r = 0; r < bot[next].reponses.length; r++)
            content += !bot[next].reponses[r].id ? `<p onclick="nextStep('${bot[next].reponses[r].next}')">${bot[next].reponses[r].text}</p>` : `<p onclick="openModal('${bot[next].reponses[r].id}')">${bot[next].reponses[r].text}</p>`;
        content += `</div></div>`;
        document.getElementById("bot").innerHTML = content;
        if (next == 0) {
            path = [];
        }
        console.log(path);
    };
    nextStep(0);

    //add dev 
    //add formation
    //add aide FAQ
</script>