<?php
echo $html->h("1", "boutique");
?>
<form>
    <input type="text" name="" id="name">
    <input type="text" name="" id="description">
    <button type="submit">send</button>
</form>

<script>
    $('button').click((e) => {
        e.preventDefault();
        //console.log($('#name').val())
        var name = $('#name').val()
        var description = $('#description').val()
        ajaxRequest("insert",{
            "name": name,
            "description": description
        })

    })
</script>