<?php
needLog();
$getuser = new User();
echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary'); ?>
    <select name="sendTo" id="sendTo">
        <option value="0">Tous</option>
<?php foreach ($getuser->getData() as $key=>$value) : ?>
    <option value="<?=$value['user_id']?>"><?=$value['username']?></option>
<?php endforeach; ?>
    </select>
<?php echo $html->input("text", "message", "message") .
    $html->button('submit', 'success center', 'envoyer', 'send', 'send') .
    $html->formClose();
?>
<section id="chat">
    <h2>Chargement !!!</h2>
</section>
<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data = $('#message').val()+","+$('#sendTo option:selected').val();
        ajaxRequest('insert/chat', data);
    })
    $(document).ready(() => {

        ajaxSelect('select/chat');

    })
</script>