"use strict";
// if('serviceWorker' in navigator){
//     try {
//         navigator.serviceWorker.register('serviceWorker.js');
//     } catch (error) {
//         console.log(error);
//     }
// }
/*
PWA
*/

// let deferredPrompt;
// var btnAdd =document.getElementById('addBtn');
// window.addEventListener('beforeinstallprompt', (e) => {
// // Prevent Chrome 67 and earlier from automatically showing the prompt
// e.preventDefault();
// // Stash the event so it can be triggered later.
// deferredPrompt = e;
// btnAdd.style.display = 'block';
// });
// btnAdd.addEventListener('click', function(e) {
// // hide our user interface that shows our A2HS button
// btnAdd.style.display = 'none';
// // Show the prompt
// deferredPrompt.prompt();
// // Wait for the user to respond to the prompt
// deferredPrompt.userChoice.then((choiceResult) => {
//   if (choiceResult.outcome === 'accepted') {
//     console.log('User accepted the A2HS prompt');
//   } else {
//     console.log('User dismissed the A2HS prompt');
//   }
//   deferredPrompt = null;
// });
// }); 

// window.addEventListener('appinstalled', function() {
//   app.logEvent('a2hs', 'installed');
// });
// if (window.matchMedia('(display-mode: standalone)').matches) {
//   console.log('display-mode is standalone');
// }

var erreur = "<div class='erreur danger'><i class='fas fa-exclamation-triangle'></i> </div>";
var regExEmail = /^[a-z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
var regExName = /^[a-zA-Z0-9âäéèêëîïôöùûüœ\'\s-]{2,}$/;
var regExPassMax = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
var regExPassLow = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
var regExNum = /^[0-9]{2}$/;
function passConfirm(){
    $('.passConfirm').blur(function(){
        if($('.pass').val()!=$(this).val()){
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Les mots de passe ne correspondent pas!");
        }else{
            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).next().remove(".erreur");
        }
    })

}
function focusBlur() {
    $("input:focus").css({
        background: "#fff",
        border: "1px solid royalblue"
    });
    $(":input").focus(function () {
        $(this).css({
            background: "#fff",
            border: "1px solid royalblue"
        });
        $(this).next().remove(".erreur");
    });

    $(":submit").removeAttr("style");//supprime l'attribut style

    $(":input").blur(function () {
        $(this).css({
            background: "#fff",
            border: "1px solid #ccc"
        });
    });
}
function checkNames() {
    $(".secureName").on("keyup blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "1px solid #ccc"
            });
        }
        else if (!regExName.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez au moins deux caractéres et evité les caractéres speciaux");
        }
        else {
            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).next().remove(".erreur");
        }
    });
}
function checkPassword() {
    $(".secureMax:password").on("keyup blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "1px solid #ccc"
            });
        }
        else if (!regExPassMax.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> le mot de passe doit contenir au moins 8 character, une Majuscule et un chiffre");
        }
        else {
            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).next().remove(".erreur");
        }
    });
    $(".secureLow:password").on("keyup blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "1px solid #ccc"
            });
        }
        else if (!regExPassLow.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> le mot de passe doit contenir au moins 6 character, une Majuscule et un chiffre");
        }
        else {
            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).next().remove(".erreur");
        }
    });
}
function checkEmail() {
    $("#email").on("blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "1px solid #ccc"
            });
        }
        else if (!regExEmail.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez une adresse mail valide");
        }
        else {
            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).next().remove(".erreur");
        }
    });
}
function checkAge() {
    $('.secureAge:number').on("keyup change", function () {

        $(this).next().remove(".erreur");

        if (!regExNum.test($(this).val())) {

            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez un nombre entre 10 et 80");
        }
        else if ($(this).val() < 18) {

            $(this).css({
                background: "#fff",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Vous êtes mineur");
        }
        else if ($(this).val() >= 18 && $(this).val() < 60) {

            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).after(erreur).next().text("Vous êtes majeur").css("color", "blue");

        }
        else if ($(this).val() >= 60) {

            $(this).css({
                background: "rgb(228, 255, 217)",
                border: "1px solid rgb(7, 156, 5)"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Vous êtes retraité");
        }

    });
}
function openPopup() {
    $('.formSign').hide()
    $('.formLog').hide()
    $('.formBall,.background').hide()
    $(".newMsg,.background").click((e) => {
        e.preventDefault()
        $('.formBall,.background').slideToggle('fast')
    });
    var popupBtn = $('.popupBtn');
    //console.log(popupBtn)
    popupBtn[0].addEventListener('click', (e) => {
        e.preventDefault()
        $('.formSign').toggle('fast')
        $('.formLog').hide()
    });
    popupBtn[1].addEventListener('click', (e) => {
        e.preventDefault()
        $('.formLog').toggle('fast')
        $('.formSign').hide()
    });

}
$(document).ready(function () {
    focusBlur();
    checkNames();
    checkEmail();
    checkAge();
    checkPassword();
    passConfirm();
    openPopup();

});