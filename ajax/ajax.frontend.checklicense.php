<?php
include "../system/globals.php";

$licenseuid = gauntlet_exec($_POST["licenseuid"]);
$domain = gauntlet_exec($_POST["domain"]);

$query = "SELECT * FROM licenseinfo WHERE licensekey = '$licenseuid' AND domain = '$domain'";

$actGetLicense = mysql_query($query);

$LicenseData = mysql_fetch_array($actGetLicense);

$jsondata = array(
'domain'=>$LicenseData["domain"],
'licensekey'=>$LicenseData["licensekey"],
'status'=>$LicenseData["status"]
);

echo json_encode($jsondata);


/*echo "  <div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">Dominio Autorizado:</label>
    <div class=\"col-sm-10\">
      <p class=\"form-control-static\" id=\"result.authorized.domain\">Domain</p>
    </div>
  </div>
  <div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">Chave da Licença</label>
    <div class=\"col-sm-10\">
     <p class=\form-control-static\" id=\"result.licensekey\">Licensekey</p>
    </div>
  </div>
    <div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">Status:</label>
    <div class=\"col-sm-10\">
      <p class=\"form-control-static\" id=\"result.licensekey\">Licensekey</p>
    </div>
  </div>";*/
  
  
  





?>