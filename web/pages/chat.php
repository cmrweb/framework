<?php
needLog();
$getuser = new User("id!=$userid");?>
<div id="online_user">

</div>

<span id="search" class="btn primary">search</span>
<input placeholder="username" autocomplete="off" spellcheck="false" type='text' id='keyword' name="keyword" onkeyup='autocomplet()'>
<div id='list'></div>

<section class="messenger">
<i data-user="<?=$userid?>" id="delete" class="fas fa-times-circle "></i>
<section id="chat">
    <h2><span class="loader"></span></h2>
</section>
<?= $html->formOpen('', 'post', 'xlarge primary chatform'); ?>

    <input type="hidden" name="sendTo" id="sendTo">

    <div class="chatInput">
<?php echo $html->input("text", "message", "message") .
    $html->button('submit', 'success center', 'envoyer', 'send', 'send');?>
</div>
<?= $html->formClose();?>
</section>


<script>
    $('#send').on('click', (e) => {
        e.preventDefault()

        var data = $('#message').val()+","+$('#sendTo').val()+","+$("#delete").attr('data-user');

        if($('#message').val()!=""){
            ajaxRequest('insert/chat', data);
            $("#send").prop('disabled', true);
            $('#send').html("<span class='loader'></span>");

            var id = +$('#sendTo').val();
            ajaxSelect('select/chat',id)
        }
        


    })
    $("#delete").on("click",(e)=>{
        var data = $("#delete").attr('data-user');
        ajaxRequest('delete/chat', data);
    })


    function autocomplet() {
        var min_length = 1; 
        var keyword = $('#keyword').val();
        if (keyword.length > min_length) {
            $('.messenger').hide();

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
                    $('#list').show();
                    $('#list').html(data);
                }
            });

        } else {
            $('#list').hide();

        }
    }
    function set_item(id, username) {
        console.log(id+","+username)
        $('#keyword').hide();
        $('#search').show();
        $('.messenger').show();
        $('#sendTo').val(id);
        $('#list').hide();           
         var data =$('#sendTo').val();
        ajaxSelect('select/chat',data);
    }
</script>