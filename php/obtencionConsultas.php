<?php 
    include "ConexionConsultar.php";
    $beneficiarios=new ConexionConsultar();
    $arregloBeneficiarios=$beneficiarios->obtenerBeneficiarios();    
    
?>