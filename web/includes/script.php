
    <script src="<?= ROOT_DIR . JS_DIR ?>prism.js"></script>
    <script src="<?= ROOT_DIR . JS_DIR ?>script.js"></script>
    <script src="<?= ROOT_DIR . JS_DIR ?>secureForm.js"></script>
<?php if (!$dev) : ?>
  <script>
    sw_register();
  </script>
<?php endif;?>  

    </body>

    </html>