
function ajaxRequest(action,currentdata=null){
    if(currentdata){
        $.ajax({
            url: "traitement/"+action,
            type: "post",
            data: {currentdata},
            success:function(currentdata){
                //console.log(currentdata);
            }
        });
    }else{
        $.ajax({
            url: "traitement/"+action,
            type: "post",
            success:function(currentdata){
                //console.log(currentdata);
            }
        });
    }

}
