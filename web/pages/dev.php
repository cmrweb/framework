<div id="bgCover" class="hide" onclick="openModal()"></div>
<?php
needLog();
require "web/module/contact.list.php";
require "web/module/cmr.bot.php";
?>
<script>
    //add step Contact add contact modal
    let openModal = (id = null) => {
        if (id) {
            document.getElementById(id).classList.toggle("hide");
            document.getElementById("bgCover").classList.toggle("hide");
        } else {
            document.getElementById("contactModal").classList.add("hide");
            document.getElementById("addContactModal").classList.add("hide");
            document.getElementById("bgCover").classList.add("hide");
        }

    }
</script>