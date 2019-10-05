<?php
needLog();
$getuser = new User("id!=$userid");?>
<section class="messenger">
<i data-user="<?=$userid?>" id="delete" class="fas fa-times-circle "></i>
<section id="chat">
    <h2><span class="loader"></span></h2>
</section>
<?= $html->formOpen('', 'post', 'xlarge primary chatform'); ?>
    <select name="sendTo" id="sendTo">
 
<?php foreach ($getuser->getData() as $key=>$value) : ?>
    <option value="<?= $value['user_id']?>"><?=$value['username']?></option>
<?php endforeach; ?>
    </select>
    <div class="chatInput">
<?php echo $html->input("text", "message", "message") .
    $html->button('submit', 'success center', 'envoyer', 'send', 'send');?>
</div>
<?= $html->formClose();?>
</section>
<script>
    $('#send').on('click', (e) => {
        e.preventDefault()
        var data = $('#message').val()+","+$('#sendTo option:selected').val()+","+$("#delete").attr('data-user');
        if($('#message').val()!=""){
            ajaxRequest('insert/chat', data);
            $("#send").prop('disabled', true);
            $('#send').html("<span class='loader'></span>");
        }

    })
    $("#delete").on("click",(e)=>{
        var data = $("#delete").attr('data-user');
        ajaxRequest('delete/chat', data);
    })
    $(document).ready(() => {
        ajaxSelect('select/chat');
        $('#chat').scrollTop($('#chat')[0].scrollHeight);
    })
</script>