const card = document.querySelector('.card3D');
card.innerHTML= card.innerHTML+`<div id="topright"></div>
<div id="top"></div>
<div id="topleft"></div>
<div id="bottomright"></div>
<div id="bottom"></div>
<div id="bottomleft"></div>`;
function card3D(id) {
    let transform, shadow,textShadow,top;
    switch (id) {
        case "top":
            top = "30px";
            transform = "rotate3d(-77, -2, 0, 45deg)";
            shadow = "#78787859 2px 15px 3px";
            textShadow = "#b8b3b3 2px 7px 3px";
            break;
        case "bottom":
            top="0";
            transform = "rotate3d(0, 0, 0, 45deg)";
            shadow = "#78787859 2px 2px 3px";
            textShadow = "#b8b3b3 2px 2px 3px";
            break;
        case "topright":
            top = "30px";
            transform = "rotate3d(-9, -38, 2, 45deg)";
            shadow = "#78787859 -15px 10px 3px";
            textShadow = "#b8b3b3 -7px 5px 3px";
            break;
        case "topleft":
            top = "30px";
            transform = "rotate3d(-9, 22, 2, 45deg)";
            shadow = "#78787859 15px 10px 3px";
            textShadow = "#b8b3b3 7px 5px 3px";
            break;
        case "bottomright":
            top="30px";
            transform = "rotate3d(-7, 60, 0, -45deg)";
            shadow = "#78787859 -15px -10px 3px";
            textShadow = "#b8b3b3 -7px -5px 3px";
            break;
        case "bottomleft":
            top="30px";
            transform = "rotate3d(7, 15, 0, 45deg)";
            shadow = "#78787859 15px -10px 3px";
            textShadow = "#b8b3b3 7px -5px 3px";
            break;
        default:
            break;
    }
    document.getElementById(id).addEventListener("mouseover", e => {
        card.style.top = top;
        card.style.transform = transform;
        card.style.boxShadow = shadow;
        card.style.textShadow = textShadow;
    });
};
card3D("top");
card3D("bottom");
card3D("topright");
card3D("topleft");
card3D("bottomright");
card3D("bottomleft");