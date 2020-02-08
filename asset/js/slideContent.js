function slideContent(selecteur, startPos, time, transition) {
    let block = document.querySelector(selecteur);
    block.style.position = "relative";
    block.style.left = startPos + "px";
    block.style.transition = "all linear " + transition + "s";

    setTimeout(() => {
        block.style.left = 0;
    }, time);
}
function slideTopContent(selecteur, startPos, time, transition) {
    let block = document.querySelector(selecteur);
    block.style.position = "relative";
    block.style.top = startPos + "px";
    block.style.transition = "all linear " + transition + "s";

    setTimeout(() => {
        block.style.top = 0;
    }, time);
}