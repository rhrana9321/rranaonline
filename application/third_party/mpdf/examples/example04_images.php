<?php



$html = '
<style>
table { border-collapse: collapse; margin-top: 0; text-align: center; }
td { padding: 0.5em; }
h1 { margin-bottom: 0; text-align:center; background:#5d6572; padding-top:15px; padding-bottom:15px; font-size:32px; color:#e8945e; text-transform:uppercase; border:2px #000000 solid; }z


</style>

<div style="border:2px #8f8f8f solid;">
<h1>Ambia Foundation </h1><img src="sunset.jpg" width="100" style="border:3px solid #44FF44; padding: 1em;" />
<div margin-bottom: 0; text-align:center; background:#5d6572; padding-top:15px; padding-bottom:15px; font-size:32px; color:#e8945e; text-transform:uppercase; border:2px #000000 solid;>
DETAILS
</div>
<div style="background-color:#CCFFFF;">
baseline: <img src="sunset.jpg" width="50" style="vertical-align: baseline;" />

</div>

<h3>Image Border and padding</h3>
Ambia Foundation
<img src="sunset.jpg" width="100" style="border:3px solid #44FF44; padding: 1em;" />

</div>

';
//==============================================================
//==============================================================
//==============================================================
include("../mpdf.php");

$mpdf=new mPDF('c'); 

$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================


?>