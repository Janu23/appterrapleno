<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../model/Terrapleno.php';
    require_once '../../config/Template.php';
    $template = new Template();
    $terrapleno = New Terrapleno();

    if (isset($_POST['inicioTrecho'])){ $_SESSION['inicioTrecho'] = $_POST['inicioTrecho'];}
    if (isset($_POST['finalTrecho'])){ $_SESSION['finalTrecho'] = $_POST['finalTrecho'];}

        
    /*Torna a ordem de inicio do trecho irrelevante */
    if (isset($_SESSION['inicioTrecho']) && isset($_SESSION['finalTrecho'])){
        if ($_SESSION['inicioTrecho']>$_SESSION['finalTrecho']){
            $aux = $_SESSION['finalTrecho'];
            $_SESSION['finalTrecho'] = $_SESSION['inicioTrecho'];
            $_SESSION['inicioTrecho'] = $aux;
        }
    }
    

    if ($_SESSION['inicioTrecho']=="" &&  $_SESSION['finalTrecho']==""){
        $template->tableArray =  $terrapleno->findAllInfoHeader();
     }else if ($_SESSION['inicioTrecho']=="" ||  $_SESSION['finalTrecho']==""){
         if ($_SESSION['inicioTrecho']!=""){
             $template->tableArray =  $terrapleno->findInfo($_SESSION['inicioTrecho']);
         } 
         if ($_SESSION['finalTrecho']!=""){
             $template->tableArray =  $terrapleno->findInfo($_SESSION['finalTrecho']);
         }
     }else{
         $template->tableArray =  $terrapleno->findInfoInterval($_SESSION['inicioTrecho'],$_SESSION['finalTrecho']);
     }

     $template->fichasEditadas = $terrapleno->countParam("tp", "edit", "1");
     $template->fichasEmAberto = $terrapleno->countParam("tp", "edit", "0");
     $template->totalFichas = $terrapleno->count();
     $template->render('tp_list.tpl.php');

?>