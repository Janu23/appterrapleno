<?php
    session_start();
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    require_once '../model/Terrapleno.php';
    require_once '../../config/Template.php';
    $template = new Template();
    $terrapleno = new Terrapleno();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $template->arrayFicha = $terrapleno->find($id);

    //Se o id(sequncial) da proxima ficha(clicando no next ficha) não existir, volta pra planilha
    if(!$template->arrayFicha){
        header("location: tp_list.php");
    }

    $template->count = $terrapleno->countParam("fotos","codFicha",$id);
    $template->id = $id;
    $_SESSION['identificacao'] = $template->arrayFicha['identificacao'];
    $template->render('tp_edit.tpl.php');

?>