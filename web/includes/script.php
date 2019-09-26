
    <script src="<?= ROOT_DIR . JS_DIR ?>prism.js"></script>
    <script src="<?= ROOT_DIR . JS_DIR ?>script.js"></script>
    <script>
        $(document).ready(()=>{
            $('#imgpreview').hide();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgpreview').attr('src', e.target.result);
                }
                if (input.files[0]) {
                reader.readAsDataURL(input.files[0]);
                }
            }

        }

        $("#upload").change(function() {
            $('#imgpreview').show();
            readURL(this);
        });
    </script>
    </body>

    </html>