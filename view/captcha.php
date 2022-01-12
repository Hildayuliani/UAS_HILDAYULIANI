<!-- <?php 
include '../controller/Auth.php';
$ctrl = new Auth();
//mengaktifkan session
session_start();
 
$code = $ctrl->acakCaptcha();
// menentukan session
$_SESSION["code"] = $code;
 
// membuat gambar dengan menentukan ukuran
$wh = imagecreatetruecolor(240, 50);
 
//warna background captcha
$bgc = imagecolorallocate($wh, 30, 86, 165);

$fc = imagecolorallocate($wh, 240, 240, 245);
imagefill($wh, 0, 0, $bgc);
 
imagestring($wh, 10,50, 15, $code, $fc);

//buat gambar
header("content-type: image/jpg");
imagejpeg($wh);
imagedestroy($wh);
?> -->