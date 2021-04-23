<?php 
    //session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../DataTables-1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="../../DataTables-1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css"> 
        <link rel='stylesheet' href='../../spectrum/spectrum.css' />
        <script src="../../js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
     
        <title></title>
    </head>
    <body 
    <?php
        if (strpos($_SERVER["REQUEST_URI"],"tp_edit")> -1){
            echo "onload=\"dinamicInputForm('contemPassivoAmbiental','passivoAmbientalDiv');dinamicInputForm('contemContencao','bloco1');drenagemSub();\"";
        }
    ?>
    >
