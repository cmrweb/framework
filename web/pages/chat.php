<?php
needLog();
$getuser = new User("id!=$userid");?>

<input autocomplete="off" spellcheck="false" type='text' id='keyword' name="keyword" onkeyup='autocomplet()'>
<ul id='name_list_id'></ul>
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
    function autocomplet() {
        var min_length = 1; // min caracters to display the autocomplete
        var keyword = $('#keyword').val();
        if (keyword.length > min_length) {
            $.ajax({
                url: 'ajax/search',
                type: 'POST',
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    var regex = /(?<name>\<section)\D*.*(?<end>\<\/section\>)/gm;
                        var found = data.match(regex);
                        data = found;
                    //console.log(data)
                    $('#name_list_id').show();
                    $('#name_list_id').html(data);
                }
            });
        } else {
            $('#name_list_id').hide();
        }
    }
    function set_item(id, username) {
        console.log(id+","+username)
        $('#keyword').val(username);
        $('#name_list_id').hide();
    }
</script>