
function ajaxRequest(action, currentdata = null) {
    if (currentdata) {
        $.ajax({
            url: "traitement/" + action,
            type: "post",
            data: { currentdata },
            success: function (currentdata) {
                //console.log(currentdata);
            }
        });
    } else {
        $.ajax({
            url: "traitement/" + action,
            type: "post",
            success: function (currentdata) {
                //console.log(currentdata);
                $('#chat').html(currentdata);
            }
        });
    }
}
function ajaxSelect(action, currentdata=null){
    var cacheData;
    var auto_refresh = setInterval(
        function() {
            $.ajax({
                url: 'traitement/'+ action,
                type: 'POST',
                data: { currentdata },
                dataType: 'html',
                success: function(currentdata) {
                    if (currentdata !== cacheData) {
                        cacheData = currentdata;
                        $('#chat').html(currentdata);
                    }
                }
            })
        }, 5000); 
}
