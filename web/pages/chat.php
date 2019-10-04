<?php
needLog();
$getuser = new User();?>
<section id="chat">
    <h2><span class="loader"></span></h2>
</section>
<?php
echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary chatform'); ?>
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

<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data = $('#message').val()+","+$('#sendTo option:selected').val();
        ajaxRequest('insert/chat', data);
        $("#send").prop('disabled', true);
        $('#send').html("<span class='loader'></span>");
    })
    $(document).ready(() => {

        ajaxSelect('select/chat');

    })
</script>