
function ajaxRequest(action,currentdata){
    $.ajax({
        url: "traitement/"+action,
        type: "POST",
        data: currentdata,
        success:function(currentdata){
            console.log(currentdata);
        }
    });
}
