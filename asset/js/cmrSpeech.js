var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition
var SpeechRecognitionEvent = SpeechRecognitionEvent || webkitSpeechRecognitionEvent

var recognition = new SpeechRecognition();
//recognition.continuous = false;
recognition.lang = 'fr-FR';
recognition.interimResults = false;
recognition.maxAlternatives = 1;

var speechDiv = document.querySelector('.speech');

var btn = document.createElement('button');
btn.classList.add('speechBtn');
btn.appendChild(document.createTextNode('Parler'))

var input = document.createElement('input');
input.classList.add('speechInput');

speechDiv.appendChild(btn);
speechDiv.appendChild(input);

btn = document.querySelector('.speechBtn');
input = document.querySelector('.speechInput');
//style
speechDiv.style.position= "fixed";
speechDiv.style.display= "flex";
speechDiv.style.zIndex= 500;
speechDiv.style.background= "#e9e9e9";
speechDiv.style.padding= "10px";
speechDiv.style.width= "fit-content";
speechDiv.style.borderRadius= "14px";
speechDiv.style.boxShadow= "#9f9f9f -2px 2px 3px";

input.style.maxWidth = "900px";
input.style.width = "120px";
input.style.padding = "5px";
input.style.borderRadius = "0 20px 20px 0";
input.style.border = "#adadad 1px solid";
input.style.boxShadow = "#9f9f9f 0px 0px 3px";

btn.style.borderRadius = "20px 0 0 20px";
btn.style.border = "1px solid #868686";
btn.style.background = "#0be90b";
btn.style.color = "#fff";
btn.style.textShadow = "#000 1px 1px 3px";
btn.style.boxShadow = "#c8c8c8d1 3px 2px 3px";

//Speech
var isListen = false;
btn.onclick = function () {   
    if(!isListen){
        btn.style.background = "#e90b0b";
        btn.innerHTML = "Je vous écoute";
        recognition.start(); 
        isListen = true;
    }else{
        btn.innerHTML = "Parler";
        btn.style.background = "#0be90b";
        recognition.stop();
        isListen = false;
    } 

}


function action(exp,speech,callback){
    input.style.width = (speech.length + 1) * 8 + 'px';
    input.value = speech;
    if (exp.test(speech)) {
        callback(speech);
    }
}

//regex
const page = /page|direction|va|go/g;
const homePage = /accueil|home|index/g;
const devPage = /test|dave|dev|d\émo/g;
const articlePage = /article|post/g;

const message = /message|formulaire|contact/g;

const oui = /suivant|oui|accept|confirm/g;
const non = /pr\éc\édent|non|refus/g;

recognition.onresult = function (event) {
    let speech = event.results[0][0].transcript;
    let confidence = event.results[0][0].confidence;
    if(confidence>0.8){
        action(page,speech,(e)=>{
            action(homePage,speech,(e)=>{
                console.log(e);
                moveTo("home");
                speechDiv.style.border = "#0b0be9 1px solid";
                console.log("home page");
            });
            action(devPage,speech,(e)=>{
                console.log(e);
                moveTo("dev");
                speechDiv.style.border = "#0b0be9 1px solid";
                console.log("dev page");
            });
            action(articlePage,speech,(e)=>{
                console.log(e);
                moveTo("post");
                speechDiv.style.border = "#0b0be9 1px solid";
                console.log("Article page");
            });
        });
        action(message,speech,()=>{
            speechDiv.style.border = "#0be90b 1px solid";
            openContactForm();
            console.log("message");
        });
        action(oui,speech,()=>{
            speechDiv.style.border = "#0be90b 1px solid";
            console.log("confirmer");
        });
        action(non,speech,()=>{
            speechDiv.style.border = "#e90b0b 1px solid";
            console.log("refuser");
        });
    }else{
        input.value = "je n'ai pas compris!";
        input.style.width = "250px";
    }


}

recognition.onspeechend = function () {
    btn.innerHTML = "Parler";
    btn.style.background = "#0be90b";
    recognition.stop();
    isListen = false;
}

recognition.onerror = function (event) {
    console.log('Error : ' + event.error);
}