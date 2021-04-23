<?php
    require('../model/Terrapleno.php');
    session_start();
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');

    if (isset($_POST["image"])){
        $data = $_POST["image"];

        //list($type, $data) = explode(';', $data);
        //list($base, $data) = explode(',', $data);

        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        
        $data = base64_decode($data);
        
        $dia = date("d/m/Y");
        $diretorio = "../../fotos/".str_replace("/","-",$dia);
        if (!file_exists($diretorio)){
          mkdir($diretorio, 0777);
        };
        $file = $diretorio."/".$_SESSION['identificacao']."_croqui.png";
        file_put_contents($file, $data);

        $tp = new Terrapleno();
        $tp->salvarFoto($_SESSION['id'], $_SESSION['identificacao']."_croqui.png", date("d/m/Y"), " ");
    }
?>