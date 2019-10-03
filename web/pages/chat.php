<?php
needLog();
echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') . 
    $html->input("text", "message", "message") .
    $html->button('submit', 'success center', 'envoyer', 'send','send') .
    $html->formClose();
?>
<section id="chat">
    <h2>Chargement !!!</h2>
</section>
<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data =$('#message').val();
        ajaxRequest('insert/chat', data);
    })
    $(document).ready(() => {

        ajaxSelect('select/chat');

    })
</script>