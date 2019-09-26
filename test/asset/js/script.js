"use strict";

var erreur = "<div class='erreur danger'><i class='fas fa-exclamation-triangle'></i> </div>";
var regExEmail = /^[a-z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
var regExName = /^[a-zA-Zâäéèêëîïôöùûüœ\'\s-]{2,}$/;
var regExPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
var regExNum = /^[0-9]{2}$/;

function focusBlur() {
    $("input:focus").css({
        background: "#a1eaa3",
        border: "1px solid royalblue"
    });
    $(":input").focus(function () {
        $(this).css({
            background: "#a1eaa3",
            border: "1px solid royalblue"
        });
        $(this).next().remove(".erreur");
    });

    $(":submit").removeAttr("style");//supprime l'attribut style

    $(":input").blur(function () {
        $(this).css({
            background: "cornsilk",
            border: "1px solid #ccc"
        });
    });
}
function checkNames() {
    $(":text").on("keyup blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "cornsilk",
                border: "1px solid #ccc"
            });
        }
        else if (!regExName.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#e8a0a0",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez au moins deux caractéres et evité les caractéres speciaux");
        }
        else {
            $(this).css({
                background: "rgb(177, 255, 189)",
                border: "1px solid #ccc"
            });
            $(this).next().remove(".erreur");
        }
    });
}
function checkPassword() {
    $(":password").on("keyup blur focus", function () {
        if ($(this).val() == "") {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "cornsilk",
                border: "1px solid #ccc"
            });
        }
        else if (!regExPass.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#e8a0a0",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> le mot de passe doit contenir au moins 8 character, une Majuscule et un chiffre");
        }
        else {
            $(this).css({
                background: "rgb(177, 255, 189)",
                border: "1px solid #ccc"
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
                background: "cornsilk",
                border: "1px solid #ccc"
            });
        }
        else if (!regExEmail.test($(this).val())) {
            $(this).next().remove(".erreur");
            $(this).css({
                background: "#e8a0a0",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez une adresse mail valide");
        }
        else {
            $(this).css({
                background: "rgb(177, 255, 189)",
                border: "1px solid #ccc"
            });
            $(this).next().remove(".erreur");
        }
    });
}
function checkAge() {
    $('[type="number"]').on("keyup change", function () {

        $(this).next().remove(".erreur");

        if (!regExNum.test($(this).val())) {

            $(this).css({
                background: "#e8a0a0",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Saisisez un nombre entre 10 et 80");
        }
        else if ($(this).val() < 18) {

            $(this).css({
                background: "#e8a0a0",
                border: "2px solid red"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Vous êtes mineur");
        }
        else if ($(this).val() >= 18 && $(this).val() < 60) {

            $(this).css({
                background: "rgb(177, 255, 189)",
                border: "1px solid #ccc"
            });
            $(this).after(erreur).next().text("Vous êtes majeur").css("color", "blue");

        }
        else if ($(this).val() >= 60) {

            $(this).css({
                background: "rgb(177, 255, 189)",
                border: "1px solid #ccc"
            });
            $(this).after(erreur).next().html("<i class='fas fa-exclamation-triangle'></i> Vous êtes retraité");
        }

    });
}
function openPopup() {
    $('.formSign').hide()
    $('.formLog').hide()
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
    openPopup();

});