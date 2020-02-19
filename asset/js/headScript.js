function moveTo(url){
    return window.location = window.location.href.match(/.*\//g)[0]+url;
}
function openContactForm(){
    document.querySelector('.card3D').style.transform = "rotate3d(0, -1, 0, 180deg)";
    setTimeout(()=>{
        document.querySelector('.card3D').innerHTML = `
        <form method="post" id="contactModal">
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
        </form>`;
        document.querySelector('.card3D').style.transform = "rotate3d(0, -1, 0, 0deg)";
    },1000);
}