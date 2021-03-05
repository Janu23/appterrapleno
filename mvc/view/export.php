<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../model/Terrapleno.php';
    require_once '../../config/Template.php';
    $template = new Template();
    $tp = new Terrapleno();
    $fotos = new Fototerrapleno();
    $template->tpArray = $tp->findAll();
    $template->fotosArray = $fotos->findAll();

    $template->render('export.tpl.php');
?>