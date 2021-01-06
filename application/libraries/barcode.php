<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'libraries/Barcode/autoload.php');
 
class barcode {
 
    public function get($type, $code, $weight = '')
	{
		if($type == 'barcode')
		{
			$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
			$barcode = $generator->getBarcode($code, $generator::TYPE_CODE_128);

			$png = imagecreatefromstring($barcode);
			$out = imagecreatetruecolor(250, 100);
			$white = imagecolorallocate($out, 255, 255, 255);
			imagefill($out, 0, 0, $white);
			imagecopyresampled($out, $png, 15, 1, 0, 0, 224, 30, 224, 30);
			$black = imagecolorallocate($out, 0, 0, 0);
			$new = imagecreatetruecolor(750, 55);
			imagefill($new, 0, 0, $white);
			imagecopyresized($new, $out, 1, 20, 0, 0, 125, 50, 250, 100);
			$font_path = APPPATH.'libraries/MPDF56/ttfonts/THSarabun-Bold.ttf';
			imagettftext($new, 16, 0, 20, 48, $black, $font_path, $code);
			ob_clean();
			imagejpeg($new, NULL, 100);
			imagedestroy($new);
		}
		else if($type == 'qrcode')
		{
			$png = imagecreatefromstring(file_get_contents('https://chart.googleapis.com/chart?chs=65x65&cht=qr&chl='.$code.'&chld=L|0'));
			$out = imagecreatetruecolor(250, 100);
			$white = imagecolorallocate($out, 255, 255, 255);
			imagefill($out, 0, 0, $white);
			imagecopyresampled($out, $png, 1, 3, 0, 0, 65, 65, 65, 65);
			$black = imagecolorallocate($out, 0, 0, 0);
			$new = imagecreatetruecolor(750, 55);
			imagefill($new, 0, 0, $white);
			imagecopyresized($new, $out, 3, 6, 0, 0, 180, 70, 250, 100);
			$font_path = APPPATH.'libraries/MPDF56/ttfonts/THSarabun-Bold.ttf';
			imagettftext($new, 15, 0, 53, 27, $black, $font_path, $code);
			imagettftext($new, 15, 0, 53, 45, $black, $font_path, 'Wt. '.number_format($weight, 3).' g');
			ob_clean();
			imagejpeg($new, NULL, 100);
			imagedestroy($new);
		}
		else if(true || $type == 'rfid')
		{
			$out = imagecreatetruecolor(250, 300);
			$white = imagecolorallocate($out, 255, 255, 255);
			imagefill($out, 0, 0, $white);
			$black = imagecolorallocate($out, 0, 0, 0);
			$new = imagecreatetruecolor(750, 55);
			imagefill($new, 0, 0, $white);
			$font_path = APPPATH.'libraries/MPDF56/ttfonts/THSarabun-Bold.ttf';
			imagettftext($new, 16, 0, 5, 25, $black, $font_path, $code);
			imagettftext($new, 16, 0, 5, 48, $black, $font_path, 'Wt. '.number_format($weight, 3).' g');
			ob_clean();
			imagejpeg($new, NULL, 100);
			imagedestroy($new);
		}
	}
}
 
?>