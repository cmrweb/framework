
    <script src="<?= ROOT_DIR . JS_DIR ?>prism.js"></script>
    <script src="<?= ROOT_DIR . JS_DIR ?>script.js"></script>
    <script src="<?= ROOT_DIR . JS_DIR ?>secureForm.js"></script>
    <!-- <script src="<?= ROOT_DIR . JS_DIR ?>cmrSlide.js"></script> -->
    <script src="<?= ROOT_DIR . JS_DIR ?>slideContent.js"></script>
    <script>
        $(document).ready(()=>{
            $('.imgpreview').hide();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.imgpreview').attr('src', e.target.result);
                }
                if (input.files[0]) {
                reader.readAsDataURL(input.files[0]);
                }
            }

        }

        $("#img:file").change(function() {
            $('.imgpreview').show();
            readURL(this);
        });
        
        slideContent(".home",2000,500,2);
        slideContent(".title",-500,500,2);
        slideTopContent(".header",-1000,200,2);
        slideTopContent(".card",-1000,1000,1);
    </script>
    </body>

    </html>