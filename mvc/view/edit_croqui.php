<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../../config/Template.php';
    $template = new Template();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    }
   
    $template->id = $id;
    $template->render('edit_croqui.tpl.php');
?>