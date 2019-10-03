
function ajaxRequest(action, currentdata = null) {
    if (currentdata) {
        $.ajax({
            url: "ajax/" + action,
            type: "post",
            data: { currentdata },
            success: function (currentdata) {
                //console.log(currentdata);
            }
        });
    } else {
        $.ajax({
            url: "ajax/" + action,
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
                url: 'ajax/'+ action,
                type: 'POST',
                data: { currentdata },
                success: function(currentdata) {
                    if (currentdata !== cacheData) {
                        cacheData = currentdata;
                        $('#chat').html(currentdata);
                    }
                }
            })
        }, 5000); 
}
