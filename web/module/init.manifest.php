<?php
/***
 * 
 * PWA Generation
 * */
$maifest = json_decode(file_get_contents("./manifest.json"));
if (isset($_POST['send_app'])) {
    //check si les champs sont !empty réecrire manifest.json
    if (!empty($_POST['AppName']) && !empty($_POST['AppShortName']) && !empty($_POST['color']) && !empty($_POST['bgcolor'])) {
        $maifest->name = $_POST['AppName'];
        $maifest->short_name = $_POST['AppShortName'];
        $maifest->theme_color = $_POST['color'];
        $maifest->background_color = $_POST['bgcolor'];
        $maifest->display = $_POST['display'];
        $maifest->orientation = $_POST['orient'];
        
        file_put_contents("./manifest.json",json_encode($maifest,JSON_UNESCAPED_SLASHES));
        //generation des icons !!Changer le path
        if (is_array($_FILES)) {
            $uploadedFile = $_FILES['file']['tmp_name'];
            $sourceProperties = getimagesize($uploadedFile);
            $newFileName = time();
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $imageType = $sourceProperties[2];
            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageSrc = imagecreatefrompng($uploadedFile);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 512, 512);
                    imagepng($tmp, "./images/icons/icon-512x512." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 384, 384);
                    imagepng($tmp, "./images/icons/icon-384x384." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 192, 192);
                    imagepng($tmp, "./images/icons/icon-192x192." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 152, 152);
                    imagepng($tmp, "./images/icons/icon-152x152." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 144, 144);
                    imagepng($tmp, "./images/icons/icon-144x144." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 128, 128);
                    imagepng($tmp, "./images/icons/icon-128x128." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 96, 96);
                    imagepng($tmp, "./images/icons/icon-96x96." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 72, 72);
                    imagepng($tmp, "./images/icons/icon-72x72." . $ext);
                    break;
                case IMAGETYPE_JPEG:
                    $imageSrc = imagecreatefromjpeg($uploadedFile);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 512, 512);
                    imagejpeg($tmp, "./images/icons/icon-512x512." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 384, 384);
                    imagejpeg($tmp, "./images/icons/icon-384x384." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 192, 192);
                    imagejpeg($tmp, "./images/icons/icon-192x192." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 152, 152);
                    imagejpeg($tmp, "./images/icons/icon-152x152." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 144, 144);
                    imagejpeg($tmp, "./images/icons/icon-144x144." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 128, 128);
                    imagejpeg($tmp, "./images/icons/icon-128x128." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 96, 96);
                    imagejpeg($tmp, "./images/icons/icon-96x96." . $ext);
                    $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1], 72, 72);
                    imagejpeg($tmp, "./images/icons/icon-72x72." . $ext);
                    break;
                default:
                    echo "type invalid";
                    exit;
                    break;
            }
            move_uploaded_file($uploadedFile,  "./images/icons/" . $newFileName . "." . $ext);
        }
        $_SESSION['message']['success'] = "PWA initialiser";
    }else{
        $_SESSION['message']['danger'] = "Veuillez Remplir les champs";
    }
}
function imageResize($imageSrc, $imageWidth, $imageHeight, $newImageWidth, $newImageHeight)
{
    $newImageLayer = imagecreatetruecolor($newImageWidth, $newImageHeight);
    imagecopyresampled($newImageLayer, $imageSrc, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $imageWidth, $imageHeight);
    return $newImageLayer;
}
?>
<!-- build PWA on init -->
<form action="" method="post" enctype="multipart/form-data" class="form p4 light large">
    <h2>Progressive Web App</h2>
    <label for="AppName">App Name</label>
    <input type="text" id="AppName" name="AppName" class="input m2" placeholder="App Name">
    <label for="shortname">Short Name</label>
    <input type="text" id="shortname" name="AppShortName" class="input m2" placeholder="Short Name">
    <label for="thclr">Theme Color</label>
    <input type="color" id="thclr" name="color" class=" m2" placeholder="Theme Color" value="#ccc">
    <label for="bgclr">Background Color</label>
    <input type="color" id="bgclr" name="bgcolor" class=" m2" placeholder="Background Color" value="#fff">
    <label for="display">Display Mode</label>
    <select class="input m2" name="display" id="display">
        <option value="Browser">Browser</option>
        <option value="Standalone">Standalone</option>
        <option value="Minimal UI">Minimal UI</option>
        <option value="Fullscreen">Fullscreen</option>
    </select>
    <label for="orient">Orientation</label>
    <select class="input m2" name="orient" id="orient">
        <option value="Any">Any</option>
        <option value="Portrait">Portrait</option>
        <option value="Landscape">Landscape</option>
    </select>
    <label for="icon">Icon 512x512</label>
    <input type="file" id="icon" class="input m2" placeholder="" name="file" id="">
    <button class="btn success large center" name="send_app">envoyer</button>
</form>
<!-- 
    FIN PWA GENERATION

 -->