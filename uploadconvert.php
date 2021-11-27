

<?php
 if(isset($_POST['convert']))
{
$connection = mysqli_connect('localhost','root','','convertedfile');
require_once __DIR__ . '/vendor/autoload.php';
//$destination = 'uploads/' . $file_name;
    // Create new pdf 
$mpdf = new \Mpdf\Mpdf();
$mpdf->showImageErrors = true;

$mypdf =  '<img src="uploads/test.jpg" width="100%"/>';
//$mpdf->Image('uploads/logo.jpg', 0,0, 500, 500, 'jpg', 'REVA LOGO', true, false);    
$mpdf->WriteHTML($mypdf);
$mpdf->Output('Convertedfile.pdf','I');
}
?>


