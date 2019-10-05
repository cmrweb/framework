
function ajaxRequest(action, currentdata = null) {
    if (currentdata) {
        $.ajax({
            url: "ajax/" + action,
            type: "post",
            data: { currentdata },
            success: function (currentdata) {
                //console.log(currentdata);
                $('#chat').scrollTop($('#chat')[0].scrollHeight);
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
function ajaxSelect(action, currentdata = null) {
    var cacheData;//(?<name>\<section).*(?<end>\<\/section\>)
    var auto_refresh = setInterval(
        function () {
            $.ajax({
                url: 'ajax/' + action,
                type: 'POST',
                data: { currentdata },
                success: function (currentdata) {
                    if (currentdata !== cacheData) {
                        var regex = /(?<name>\<section).*(?<end>\<\/section\>)/gm;
                        var found = currentdata.match(regex);
                        //console.log(found);
                        cacheData = found;
                        $('#chat').html(found);
                        $("#send").prop('disabled', false);
                        $('#send').html("send");
                    }
                }
            })
        }, 5000);
}
