var nameExp = /^[a-zA-Zàâäéèêëîïôöùûüœ\'\s-]{2,20}$/;
var regAge = /^[0-9]{1,2}$/;
var emailExp = /^[a-z0-9._-]{1,}@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
var passExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

var erreur = `<div class="large bg-danger center p2"></div>`;

var isVisible = false;
function showPassword() {
    if (!isVisible) {
        $("#hidePass").html(`<i class="far fa-eye"></i>`);
        $("#hidePass i").css("color", "blue")
        $("#pwd").attr("type", "text");
        isVisible = true;
    } else {
        $("#hidePass").html(`<i class="fas fa-eye-slash"></i>`);
        $("#pwd").attr("type", "password");
        isVisible = false;
    }
}
function secure(input, event, exp, message) {
    $(input).on(event, function () {
        if ($(this).val() == "" && $(this).val().length <= 2) {
            $(this).removeClass("border-danger");
            $(this).next().remove(".bg-danger");
            $(this).css({
                background: "#ffffff",
                border: "1px solid #ccc"
            });
            $("#send").attr("disabled", true);
        } else if (exp.test($(this).val())) {
            $(this).next().remove(".bg-danger")
            $(this).css({
                "background": "#80e397c7",
                "font-weight": "bold"
            });
            $(this).removeClass("border-danger");
            $(this).addClass("border-success");

        } else {
            $(this).next().remove(".bg-danger")
            $(this).after(erreur).next().html(message);
            $(this).css("background", "#f27480bf");
            $(this).removeClass("border-success");
            $(this).addClass("border-danger");
            $("#send").attr("disabled", true);
        }
    });
}
secure(".nameSecure", "keyup blur focus", nameExp, "Entrez 2 à 20 caractères sans utilisé de caractères speciaux");
secure(".mailSecure", "keyup blur focus", emailExp, "Adresse Email non valide");
secure(".passSecure", "keyup blur", passExp, "Entrez au moins 6 caractère avec au moins une Majuscule et un chiffre");

$(".ageSecure").on("keyup blur focus", function () {
    if ($(this).val() == "") {
        $(this).removeClass("border-danger");
        $(this).next().remove(".bg-danger");
        $(this).css({
            background: "#ffffff",
            border: "1px solid #ccc"
        });
        $("#send").attr("disabled", true);
    } else if ($(this).val() > 18) {
        $(this).next().remove(".bg-danger")
        $(this).css({
            "background": "#80e397c7",
            "font-weight": "bold"
        });
        $(this).removeClass("border-danger");
        $(this).addClass("border-success");
        $("#send").removeAttr("disabled");
    } else {
        $(this).next().remove(".bg-danger");
        $(this).after(erreur).next().html("Vous êtes trop jeune");
        $(this).css("background", "#f27480bf");
        $(this).removeClass("border-success");
        $(this).addClass("border-danger");
        $("#send").attr("disabled", true);
    }
});

$("#send").on("click", (e) => {
    e.preventDefault();
});

$("#closeForm").click(()=>{
    $("form").hide();
});