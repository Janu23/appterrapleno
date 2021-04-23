<?php
        ob_start();//solução para o problema de cabeçalho export excel não carregado 
        require('../model/Terrapleno.php');
        session_start();

      /* Informa o nível dos erros que serão exibidos */
        error_reporting(E_ALL);
        /* Habilita a exibição de erros */
        ini_set("display_errors", 1);

        //var_dump($_POST);
        if (isset($_POST['submit']) && $_POST['submit'] != 'Cadastrar'){
            $id = $_POST['id'];
        }

        $tp = new Terrapleno();
         //delete
        if ((isset($_POST['submit']) && $_POST['submit'] === 'Delete') || isset($_GET['id'])){
            $idToDelete = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];
      
            $_SESSION['opResult'] = $tp->delete($idToDelete);
            //header('Location: ../views/tp_list.php');
            exit();
        }

      if (isset($_POST['submit']) && $_POST['submit'] === 'Cadastrar'){
        $dp = new Terrapleno();

        if ($_POST['sentido']== "CANTEIRO CENTRAL"){
            $sentido = "C";
        }else if ($_POST['sentido']== "NORTE"){
            $sentido = "N";
        } else {
            $sentido = "S";
        }

        $numRodovia = substr($_POST['rodovia'], -3);
        $identificacao_base = "TP ".$numRodovia." ".$_POST['estado']." ".$_POST['km']." ".$sentido;
        $nIdentificacao = $dp->verificaIdentificacao("tp",'"'.$identificacao_base.'"');

        $identificacao = $identificacao_base." ".($nIdentificacao[0]+1);
        $dispositivo = new Terrapleno();
        //Set variáveis de cadastro
        $dispositivo->__set("km", $_POST['km']);
        $dispositivo->__set("kmFinal", $_POST['kmFinal']);
        $dispositivo->__set("distanciaAcostamento", $_POST['distanciaAcostamento']);
        $dispositivo->__set("materialOrigem", $_POST['materialOrigem']);
        $dispositivo->__set("latitude1", $_POST['latitude1']);
        $dispositivo->__set("longitude1", $_POST['longitude1']);
        $dispositivo->__set("latitude2", $_POST['latitude2']);
        $dispositivo->__set("longitude2", $_POST['longitude2']);
        $dispositivo->__set("terraplenoContencao", $_POST['terraplenoContencao']);
        $dispositivo->__set("lado", $_POST['lado']);
        $dispositivo->__set("sentido", $_POST['sentido']);
        $dispositivo->__set("estado", $_POST['estado']);
        $dispositivo->__set("rodovia", $_POST['rodovia']);
        $dispositivo->__set("trecho", $_POST['trecho']);
        $dispositivo->__set("identificacao", $identificacao);

        $result = $dispositivo->insert();
        if ($result){
            unset($_SESSION);
            $id = $dispositivo->getMaxCodAuto("tp")[0];
        } else {
            $id = 0;
        }

        $dispositivo->update('edit_info_geral', "1", $id);
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarFotos'){
  
        $result = 1;
        $numfotos = $tp->countParam("fotos","codFicha",$id)[0];
        $identificacao = $_POST['identificacao'];
        $observacao = $_POST['observacao'];
        $data = date("d/m/Y");
        $diretorio = "../../fotos/".str_replace("/","-",$data);
        if (!file_exists($diretorio)){
          mkdir($diretorio, 0777);
        }

        //ver se os arquivos foram setados
	      $arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;

        //laço de inserção dos arquivos
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){
          $currentName = $arquivo['name'][$controle]; 
          $parts = explode(".",$currentName);
          $extension = array_pop($parts);
          $newName = $identificacao."_".$numfotos;
          $destination = "{$diretorio}/{$newName}.{$extension}";
        //renomeia os arquivos e define o local onde salva
            if ( move_uploaded_file ($arquivo['tmp_name'][$controle] , $destination)) {
              $result *= $tp->salvarFoto($id, $newName.".".$extension, $data, $observacao);
              $tp->update('edit_fotos', $result, $id);
              $_SESSION['resultFotos'] = 1;
              //echo "Arquivo enviado com sucesso!";
            } 
            else {
              //echo  "Erro, o arquivo 1 nao enviado! \ n" ;
              $result = 0;
              $tp->update('edit_fotos', $result, $id);
              $_SESSION['resultFotos'] = 0;
            }
            $numfotos++;
        }
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarInfoGeral'){
          $result = 1;
          $result *= $tp->update('km', $_POST['km'], $id);
          $result *= $tp->update('km_final', $_POST['kmFinal'], $id);
          $result *= $tp->update('rodovia', $_POST['rodovia'], $id);
          $result *= $tp->update('sentido', $_POST['sentido'], $id);
          $result *= $tp->update('estado', $_POST['estado'], $id);
          $result *= $tp->update('trecho', $_POST['trecho'], $id);
          $result *= $tp->update('lado', $_POST['lado'], $id);
          $result *= $tp->update('terrapleno_contencao', $_POST['terraplenoContencao'], $id);
          $result *= $tp->update('distancia_acostamento', $_POST['distanciaAcostamento'], $id);
          $result *= $tp->update('material_origem', $_POST['materialOrigem'], $id);
          $result *= $tp->update('latitude1', $_POST['latitude1'], $id);
          $result *= $tp->update('longitude1', $_POST['longitude1'], $id);
          $result *= $tp->update('latitude2', $_POST['latitude2'], $id);
          $result *= $tp->update('longitude2', $_POST['longitude2'], $id);
          $tp->update('edit_info_geral', $result, $id);
          $_SESSION['resultInfoGeral'] = $result;
      }


      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarGeometria'){
          $result = 1;
          $result *= $tp->update('banqueta', $_POST['banqueta'], $id);
          $result *= $tp->update('altura', $_POST['altura'], $id);
          $result *= $tp->update('inclinacao', $_POST['inclinacao'], $id);
          $result *= $tp->update('tipo_terrapleno', $_POST['tipoTerrapleno'], $id);
          $result *= $tp->update('tipo_relevo', $_POST['tipoRelevo'], $id);

        //input comprimento
        if (isset($_POST['comprimento'])){
          $result *= $tp->update('comprimento', $_POST['comprimento'], $id);
        }

        //input localizacaoDispositivo
        if (isset($_POST['localizacaoDispositivo'])){
        $result *= $tp->update('localizacao_dispositivo', $_POST['localizacaoDispositivo'], $id);
        }

        //input geometria
        if (isset($_POST['geometria'])){
          $result *= $tp->update('geometria', $_POST['geometria'], $id);
        }

          $tp->update('edit_geometria', $result, $id);
          $_SESSION['resultGeometria'] = $result;
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarVegetacao'){
    
          $result = 1;
          $vegetacao = "";

          //input arborea
          $arborea = (isset($_POST['arborea'])) ? "S" : "N";
          $result *= $tp->update('arborea', $arborea, $id);
          if (isset($_POST['arborea'])){
            $vegetacao = $vegetacao."Arborea.";
          }

          //input arbustiva
          $arbustiva = (isset($_POST['arbustiva'])) ? "S" : "N";
          $result *= $tp->update('arbustiva', $arbustiva, $id);
          if (isset($_POST['arbustiva'])){
            $vegetacao = $vegetacao."Arbustiva.";
          }

          //input rasteira
          $rasteira = (isset($_POST['rasteira'])) ? "S" : "N";
          $result *= $tp->update('rasteira', $rasteira, $id);
          if (isset($_POST['rasteira'])){
            $vegetacao = $vegetacao."Rasteira.";
          }

          //input nenhuma
          $nenhuma = (isset($_POST['nenhuma'])) ? "S" : "N";
          $result *= $tp->update('nenhuma', $nenhuma, $id);         
          if (isset($_POST['nenhuma'])){
            $vegetacao = "Nenhuma.";
          }
          
          $result *= $tp->update('vegetacao', $vegetacao, $id);
          $result *= $tp->update('densidade_vegetacao', $_POST['densidadeVegetacao'], $id);
          
          $tp->update('edit_vegetacao', $result, $id);
          $_SESSION['resultVegetacao'] = $result;
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarDrenagem'){
  
        $result = 1;
        $drenagemSuperficial = "";
        $condicaoDrenagemSuperficial = "";
        $condicaoDrenagemSubterranea = "";

        //input drenagem superficial
        if (isset($_POST['naturalSuperficial'])){
          $drenagemSuperficial = $drenagemSuperficial."Natural.";
        }
        if (isset($_POST['construidaSuperficial'])){
          $drenagemSuperficial = $drenagemSuperficial."Construída.";
        }

        $result *= $tp->update('drenagem_superficial', $drenagemSuperficial, $id);

        //input condição drenagem superficial
        if (isset($_POST['danificadaSuperficial'])){
          $condicaoDrenagemSuperficial = $condicaoDrenagemSuperficial."Danificada.";
        }
        if (isset($_POST['insuficienteSuperficial'])){
          $condicaoDrenagemSuperficial = $condicaoDrenagemSuperficial."Insuficiente.";
        }
        if (isset($_POST['obstruidaSuperficial'])){
          $condicaoDrenagemSuperficial = $condicaoDrenagemSuperficial."Obstruída.";
        }
        if (isset($_POST['satisfatoriaSuperficial'])){
          $condicaoDrenagemSuperficial = $condicaoDrenagemSuperficial."Satisfatória.";
        }
        $result *= $tp->update('condicao_drenagem_superficial', $condicaoDrenagemSuperficial, $id);

        //input drenagem subterranea
        if (isset($_POST['drenagemSubterranea'])){
          $result *= $tp->update('drenagem_subterranea', $_POST['drenagemSubterranea'], $id);
        }

        $condicaoDrenagemSubterranea = "";
        //input condição drenagem subterranea
        if (isset($_POST['danificadaSubterranea'])){
          $condicaoDrenagemSubterranea = $condicaoDrenagemSubterranea."Danificada.";
        }
        if (isset($_POST['insuficienteSubterranea'])){
          $condicaoDrenagemSubterranea = $condicaoDrenagemSubterranea."Insuficiente.";
        }
        if (isset($_POST['obstruidaSubterranea'])){
          $condicaoDrenagemSubterranea = $condicaoDrenagemSubterranea."Obstruída.";
        }
        if (isset($_POST['satisfatoriaSubterranea'])){
          $condicaoDrenagemSubterranea = $condicaoDrenagemSubterranea."Satisfatória.";
        }

        if (isset($_POST['drenagemSubterranea'])){
          $result *= $tp->update('drenagem_subterranea', $_POST['drenagemSubterranea'], $id);
        }

        //input tipo drenagem superficial
        if (isset($_POST['tipo'])){
          $result *= $tp->update('tipo', $_POST['tipo'], $id);
        }

        //Se o check de drenagem subterranea for "não", limpas os forms vinculados
        if (isset($_POST['drenagemSubterranea']) && $_POST['drenagemSubterranea']=="Inexistente"){
          $result *= $tp->update('tipo', ' ', $id);
          $result *= $tp->update('condicao_drenagem_subterranea', ' ', $id);
        }

        if ($_POST['drenagemSubterranea']=="Inexistente"){
          $condicaoDrenagemSubterranea = "Inexistente";
        }

        $result *= $tp->update('condicao_drenagem_subterranea', $condicaoDrenagemSubterranea, $id);

        //input localDreSuper1
        if (isset($_POST['localDreSuper1'])){
          $result *= $tp->update('local_dre_super1', $_POST['localDreSuper1'], $id);
        }

        //input localDreSuper2
        if (isset($_POST['localDreSuper2'])){
          $result *= $tp->update('local_dre_super2', $_POST['localDreSuper2'], $id);
        }

        //input localDreSuper3
        if (isset($_POST['localDreSuper3'])){
          $result *= $tp->update('local_dre_super3', $_POST['localDreSuper3'], $id);
        }

        $tp->update('edit_drenagem', $result, $id);
        $_SESSION['resultDrenagem'] = $result;
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarOcorrencias'){
  
        $result = 1;
        $ocorrencias = "";  

        //input presença de água
        if (isset($_POST['presencaAgua'])){
          $result *= $tp->update('presenca_agua', $_POST['presencaAgua'], $id);
        }
        //Marca S na coluna da tabela correspondente ao select escolhido
        if (isset($_POST['tipoDeOcorrencia'])){
          $result *= $tp->update($_POST['tipoDeOcorrencia'], "S", $id);
        }

        if ($_POST['tipoDeOcorrencia']=="check_outro_tipo_ocorrencia"){
          $tipo = str_replace("_"," ",mb_convert_case($_POST['outroTipoDeOcorrencia'], MB_CASE_TITLE, 'UTF-8').": ".str_replace(".",",",$_POST['dimensao'])." - ".$_POST['localizacao']);
          $result *= $tp->update('outro_tipo_ocorrencia', $_POST['outroTipoDeOcorrencia'], $id);
        }else{
          $tipo = str_replace("_"," ",mb_convert_case($_POST['tipoDeOcorrencia'], MB_CASE_TITLE, 'UTF-8').": ".str_replace(".",",",$_POST['dimensao'])." - ".$_POST['localizacao']);
        }

        $kmPatologiaNovo = str_replace("_"," ",mb_convert_case($_POST['tipoDeOcorrencia'], MB_CASE_TITLE, 'UTF-8').": ".$_POST['localizacao']);
        $dimensaoNova = str_replace("_"," ",mb_convert_case($_POST['tipoDeOcorrencia'], MB_CASE_TITLE, 'UTF-8').": ".$_POST['dimensao']);
        

        //concatena o conteudo do banco com a nova avaliacao
        $ocorrencias = $_POST['avaliacaoAtual'].$tipo.". ";
        $kmPatologia = $_POST['kmPatologiaAtual'].$kmPatologiaNovo.". ";
        $dimensoes= $_POST['dimensoesAtual'].$dimensaoNova.". ";

        //sobrescreve caso a opção escolhida seja "nenhuma"
        if ($_POST['tipoDeOcorrencia']=="nenhuma"){
          $ocorrencias = "Nenhuma.";  
          $kmPatologia = "Nenhuma.";              
          $dimensoes = "Nenhuma.";                       
        } 
        $result *= $tp->update('avaliacao_atual',$ocorrencias, $id);
        $result *= $tp->update('km_patologia_atual',$kmPatologia, $id);
        $result *= $tp->update('dimensoes_atual',$dimensoes, $id);

        $localizacao = (isset($_POST['localizacao'])) ? $_POST['localizacao'] : ' ';
        $dimensao = (isset($_POST['dimensao'])) ? $_POST['dimensao'] : ' ';

        $result *= $tp->update('localizacao', $localizacao, $id);
        $result *= $tp->update('dimensao', $dimensao, $id);

        $tp->update('edit_ocorrencias', $result, $id);
        $_SESSION['resultOcorrencias'] = $result;
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarCausasProvaveis'){
  
        $result = 1;
        $causasProvaveis = "";

        //input inclinacaoAcentuada
        $inclinacaoAcentuada = (isset($_POST['inclinacaoAcentuada'])) ? "S" : "N";
        $result *= $tp->update('inclinacao_acentuada', $inclinacaoAcentuada, $id);
        if (isset($_POST['inclinacaoAcentuada'])){
          $causasProvaveis = $causasProvaveis.$_POST['inclinacaoAcentuada'].".";
        }

        //input deficienciaSuperficial
        $deficienciaSuperficial = (isset($_POST['deficienciaSuperficial'])) ? "S" : "N";
        $result *= $tp->update('deficiencia_superficial', $deficienciaSuperficial, $id);
        if (isset($_POST['deficienciaSuperficial'])){
          $causasProvaveis = $causasProvaveis.$_POST['deficienciaSuperficial'].".";
        }

        //input tipoSolo
        $tipoSolo = (isset($_POST['tipoSolo'])) ? "S" : "N";
        $result *= $tp->update('tipo_solo', $tipoSolo, $id);
        if (isset($_POST['tipoSolo'])){
          $causasProvaveis = $causasProvaveis.$_POST['tipoSolo'].".";
        }

        //input ausenciaSuperficial
        $ausenciaSuperficial = (isset($_POST['ausenciaSuperficial'])) ? "S" : "N";
        $result *= $tp->update('ausencia_superficial', $ausenciaSuperficial, $id);
        if (isset($_POST['ausenciaSuperficial'])){
          $causasProvaveis = $causasProvaveis.$_POST['ausenciaSuperficial'].".";
        }

        //input secagemUmedecimentoDeSolo
        $secagemUmedecimentoDeSolo = (isset($_POST['secagemUmedecimentoDeSolo'])) ? "S" : "N";
        $result *= $tp->update('secagem_umedecimento_de_solo', $secagemUmedecimentoDeSolo, $id);
        if (isset($_POST['secagemUmedecimentoDeSolo'])){
          $causasProvaveis = $causasProvaveis.$_POST['secagemUmedecimentoDeSolo'].".";
        }

        //input deficienciaNaFundacao
        $deficienciaNaFundacao = (isset($_POST['deficienciaNaFundacao'])) ? "S" : "N";
        $result *= $tp->update('deficiencia_na_fundacao', $deficienciaNaFundacao, $id);
        if (isset($_POST['deficienciaNaFundacao'])){
          $causasProvaveis = $causasProvaveis.$_POST['deficienciaNaFundacao'].".";
        }

        //input deficienciaDaProtecaoSuperficial
        $deficienciaDaProtecaoSuperficial = (isset($_POST['deficienciaDaProtecaoSuperficial'])) ? "S" : "N";
        $result *= $tp->update('deficiencia_da_protecao_superficial', $deficienciaDaProtecaoSuperficial, $id);
        if (isset($_POST['deficienciaDaProtecaoSuperficial'])){
          $causasProvaveis = $causasProvaveis.$_POST['deficienciaDaProtecaoSuperficial'].".";
        }

        //input compactacaoInadequada
        $compactacaoInadequada = (isset($_POST['compactacaoInadequada'])) ? "S" : "N";
        $result *= $tp->update('compactacao_inadequada', $compactacaoInadequada, $id);
        if (isset($_POST['compactacaoInadequada'])){
          $causasProvaveis = $causasProvaveis.$_POST['compactacaoInadequada'].".";
        }

        //input descontinuidadeDoMacico
        $descontinuidadeDoMacico = (isset($_POST['descontinuidadeDoMacico'])) ? "S" : "N";
        $result *= $tp->update('descontinuidade_do_macico', $descontinuidadeDoMacico, $id);
        if (isset($_POST['descontinuidadeDoMacico'])){
          $causasProvaveis = $causasProvaveis.$_POST['descontinuidadeDoMacico'].".";
        }

        //input saturacaoDoSolo
        $saturacaoDoSolo = (isset($_POST['saturacaoDoSolo'])) ? "S" : "N";
        $result *= $tp->update('saturacao_do_solo', $saturacaoDoSolo, $id);
        if (isset($_POST['saturacaoDoSolo'])){
          $causasProvaveis = $causasProvaveis.$_POST['saturacaoDoSolo'].".";
        }

        //input acaoDeTerceiros
        $acaoDeTerceiros = (isset($_POST['acaoDeTerceiros'])) ? "S" : "N";
        $result *= $tp->update('acao_de_terceiro', $acaoDeTerceiros, $id);
        if (isset($_POST['acaoDeTerceiros'])){
          $causasProvaveis = $causasProvaveis.$_POST['acaoDeTerceiros'].".";
        }

        //input descompactacaoDeRaizes
        $descompactacaoDeRaizes = (isset($_POST['descompactacaoDeRaizes'])) ? "S" : "N";
        $result *= $tp->update('descompactacao_de_raizes', $descompactacaoDeRaizes, $id);
        if (isset($_POST['descompactacaoDeRaizes'])){
          $causasProvaveis = $causasProvaveis.$_POST['descompactacaoDeRaizes'].".";
        }

        //input maConformacaoDoTalude
        $maConformacaoDoTalude = (isset($_POST['maConformacaoDoTalude'])) ? "S" : "N";
        $result *= $tp->update('ma_conformacao_do_talude', $maConformacaoDoTalude, $id);
        if (isset($_POST['maConformacaoDoTalude'])){
          $causasProvaveis = $causasProvaveis.$_POST['maConformacaoDoTalude'].".";
        }

        //input evolucaoDeErosao
        $evolucaoDeErosao = (isset($_POST['evolucaoDeErosao'])) ? "S" : "N";
        $result *= $tp->update('evolucao_erosao', $evolucaoDeErosao, $id);
        if (isset($_POST['evolucaoDeErosao'])){
          $causasProvaveis = $causasProvaveis.$_POST['evolucaoDeErosao'].".";
        }

        //input estiagem
        $estiagem = (isset($_POST['estiagem'])) ? "S" : "N";
        $result *= $tp->update('estiagem', $estiagem, $id);
        if (isset($_POST['estiagem'])){
          $causasProvaveis = $causasProvaveis.$_POST['estiagem'].".";
        }

        //input checkOutrasCausasProvaveis
        $checkOutrasCausasProvaveis = (isset($_POST['checkOutrasCausasProvaveis'])) ? "S" : "N";
        $result *= $tp->update('check_outras_causas_provaveis', $checkOutrasCausasProvaveis, $id);
        if (isset($_POST['outrasCausasProvaveis'])){
          $causasProvaveis = $causasProvaveis.$_POST['outrasCausasProvaveis'].".";
          $result *= $tp->update('outras_causas_provaveis', $_POST['outrasCausasProvaveis'], $id);

        } else {
          $result *= $tp->update('outras_causas_provaveis', ' ', $id);          
        }
        //Se o checkbox outro tipo estiver desmarcado, o campo de texto vinculado a ele é limpo
        if ($checkOutrasCausasProvaveis == "N"){
          $result *= $tp->update('outras_causas_provaveis', ' ', $id);          
        }
        $result *= $tp->update('causas_provaveis', $causasProvaveis, $id);

        $tp->update('edit_causas_provaveis', $result, $id);
        $_SESSION['resultCausasProvaveis'] = $result;
        //echo("<script>location.href='../view/tp_edit.php?id={$id}';</script>");
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarSolucoesProvaveis'){
  
        $result = 1;

        //input recuperacaoDeCoberturaVegetal
        $recuperacaoDeCoberturaVegetal = (isset($_POST['recuperacaoDeCoberturaVegetal'])) ? "S" : "N";
        $result *= $tp->update('recuperacao_de_cobertura_vegetal', $recuperacaoDeCoberturaVegetal, $id);
      
        //input retaludamento
        $retaludamento = (isset($_POST['retaludamento'])) ? "S" : "N";
        $result *= $tp->update('retaludamento', $retaludamento, $id);
      
        //input remocaoDeMassaInstavel
        $remocaoDeMassaInstavel = (isset($_POST['remocaoDeMassaInstavel'])) ? "S" : "N";
        $result *= $tp->update('remocao_de_massa_instavel', $remocaoDeMassaInstavel, $id);
      
        //input implantacaoDeDrenagem
        $implantacaoDeDrenagem = (isset($_POST['implantacaoDeDrenagem'])) ? "S" : "N";
        $result *= $tp->update('implantacao_de_drenagem', $implantacaoDeDrenagem, $id);
      
        //input implantacaoDeContencao
        $implantacaoDeContencao = (isset($_POST['implantacaoDeContencao'])) ? "S" : "N";
        $result *= $tp->update('implantacao_de_contencao', $implantacaoDeContencao, $id);
      
        //input recuperacaoDePlataforma
        $recuperacaoDePlataforma = (isset($_POST['recuperacaoDePlataforma'])) ? "S" : "N";
        $result *= $tp->update('recuperacao_de_plataforma', $recuperacaoDePlataforma, $id);
      
        //input outraIntervencaoNecessaria
        $outraIntervencaoNecessaria = (isset($_POST['outraIntervencaoNecessaria'])) ? "S" : "N";
        $result *= $tp->update('outras_intervencoes_necessarias', $outraIntervencaoNecessaria, $id);
        
        if (isset($_POST['descricaoOutrasIntervencoesNecessarias'])){
          $result *= $tp->update('descricao_outras_intervencoes_necessarias', $_POST['descricaoOutrasIntervencoesNecessarias'], $id);
        } else {
          $result *= $tp->update('descricao_outras_intervencoes_necessarias', ' ', $id);          
        }
        //Se o checkbox outro tipo estiver desmarcado, o campo de texto vinculado a ele é limpo
        if ($outraIntervencaoNecessaria == "N"){
          $result *= $tp->update('descricao_outras_intervencoes_necessarias', ' ', $id);          
        }

        //input casoRuptura
        $casoRuptura = (isset($_POST['casoRuptura'])) ? "S" : "N";
        $result *= $tp->update('caso_ruptura', $casoRuptura, $id);

        if (isset($_POST['descricaoCasoRuptura'])){
          $result *= $tp->update('descricao_caso_ruptura', $_POST['descricaoCasoRuptura'], $id);
        } else {
          $result *= $tp->update('descricao_caso_ruptura', ' ', $id);          
        }
        //Se o checkbox outro tipo estiver desmarcado, o campo de texto vinculado a ele é limpo
        if ($casoRuptura == "N"){
          $result *= $tp->update('descricao_caso_ruptura', ' ', $id);          
        }

        //input observacoesFicha
        if (isset($_POST['observacoesFicha'])){
          $result *= $tp->update('observacoes_ficha', $_POST['observacoesFicha'], $id);
        }
    
        $tp->update('edit_solucoes_provaveis', $result, $id);
        $_SESSION['resultSolucoesProvaveis'] = $result;
        //echo("<script>location.href='../view/tp_edit.php?id={$id}';</script>");
      }  

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarOutros'){
  
        $result = 1;

         //input contemPassivoAmbiental
         $contemPassivoAmbiental = (isset($_POST['contemPassivoAmbiental'])) ? "S" : "N";
         $result *= $tp->update('contem_passivo_ambiental', $contemPassivoAmbiental, $id);
 
         if (isset($_POST['passivoAmbiental'])){
           $result *= $tp->update('passivo_ambiental', $_POST['passivoAmbiental'], $id);
         } else {
           $result *= $tp->update('passivo_ambiental', ' ', $id);          
         }
         //Se o checkbox outro tipo estiver desmarcado, o campo de texto vinculado a ele é limpo
         if ($contemPassivoAmbiental == "N"){
           $result *= $tp->update('passivo_ambiental', ' ', $id);          
         }

        //input superficieRuptura
        $superficieRuptura = (isset($_POST['superficieRuptura'])) ? "S" : "N";
        $result *= $tp->update('superficie_ruptura', $superficieRuptura, $id);

        $tp->update('edit_outros', $result, $id);
        $_SESSION['resultOutros'] = $result;
        //echo("<script>location.href='../view/tp_edit.php?id={$id}';</script>");
      }

      if (isset($_POST['submit']) && $_POST['submit'] === 'salvarEstruturaDeContencao'){
  
        $result = 1;

        //input contemContencao
        $contemContencao = (isset($_POST['contemContencao'])) ? "Sim" : "Não";
        $result *= $tp->update('contem_contencao', $contemContencao, $id);

        //input encosta
        $encosta = (isset($_POST['encosta'])) ? "S" : "N";
        $result *= $tp->update('encosta', $encosta, $id);

        //input obra
        $obra = (isset($_POST['obra'])) ? "S" : "N";
        $result *= $tp->update('obra', $obra, $id);

        //input fotoInacessivelCima
        $fotoInacessivelCima = (isset($_POST['fotoInacessivelCima'])) ? "S" : "N";
        $result *= $tp->update('foto_inacessivel_cima', $fotoInacessivelCima, $id);

        //input situacaoPassivo
        if (isset($_POST['situacaoPassivo'])){
          $result *= $tp->update('situacao_passivo', $_POST['situacaoPassivo'], $id);
        }else {
          $result *= $tp->update('situacao_passivo', ' ', $id);          
        }

        //input diretrizRecuperacao
        if (isset($_POST['diretrizRecuperacao'])){
          $result *= $tp->update('diretriz_recuperacao', $_POST['diretrizRecuperacao'], $id);
        }


        //A informação de estrutura de contenção só é atualizada se o check contemContencao estiver marcado
        if ($contemContencao == "Sim"){        
          //grupo 1 - estrutura de contenção

          //input tipoContencao1
          if (isset($_POST['tipoContencao1'])){
            $result *= $tp->update('tipo_contencao1', $_POST['tipoContencao1'], $id);
          }

          //input extensaoEstruturaContencao1
          if (isset($_POST['extensaoEstruturaContencao1'])){
            $result *= $tp->update('extensao_estrutura_contencao1', $_POST['extensaoEstruturaContencao1'], $id);
          }

          //input alturaEstruturaContencao1
          if (isset($_POST['alturaEstruturaContencao1'])){
            $result *= $tp->update('altura_estrutura_contencao1', $_POST['alturaEstruturaContencao1'], $id);
          }

          //input ancoragens1
          if (isset($_POST['ancoragens1'])){
            $result *= $tp->update('ancoragens1', $_POST['ancoragens1'], $id);
          }

          //input elementosConcretoAco1
          if (isset($_POST['elementosConcretoAco1'])){
            $result *= $tp->update('elementos_concreto_aco1', $_POST['elementosConcretoAco1'], $id);
          }

          //grupo 2 - estrutura de contenção

          //input tipoContencao2
          if (isset($_POST['tipoContencao2'])){
            $result *= $tp->update('tipo_contencao2', $_POST['tipoContencao2'], $id);
          }

          //input extensaoEstruturaContencao2
          if (isset($_POST['extensaoEstruturaContencao2'])){
            $result *= $tp->update('extensao_estrutura_contencao2', $_POST['extensaoEstruturaContencao2'], $id);
          }

          //input alturaEstruturaContencao2
          if (isset($_POST['alturaEstruturaContencao2'])){
            $result *= $tp->update('altura_estrutura_contencao2', $_POST['alturaEstruturaContencao2'], $id);
          }

          //input ancoragens2
          if (isset($_POST['ancoragens2'])){
            $result *= $tp->update('ancoragens2', $_POST['ancoragens2'], $id);
          }

          //input elementosConcretoAco2
          if (isset($_POST['elementosConcretoAco2'])){
            $result *= $tp->update('elementos_concreto_aco2', $_POST['elementosConcretoAco2'], $id);
          }

          //grupo 3 - estrutura de contenção

          //input tipoContencao3
          if (isset($_POST['tipoContencao3'])){
            $result *= $tp->update('tipo_contencao3', $_POST['tipoContencao3'], $id);
          }

          //input extensaoEstruturaContencao3
          if (isset($_POST['extensaoEstruturaContencao3'])){
            $result *= $tp->update('extensao_estrutura_contencao3', $_POST['extensaoEstruturaContencao3'], $id);
          }

          //input alturaEstruturaContencao3
          if (isset($_POST['alturaEstruturaContencao3'])){
            $result *= $tp->update('altura_estrutura_contencao3', $_POST['alturaEstruturaContencao3'], $id);
          }

          //input ancoragens3
          if (isset($_POST['ancoragens3'])){
            $result *= $tp->update('ancoragens3', $_POST['ancoragens3'], $id);
          }

          //input elementosConcretoAco3
          if (isset($_POST['elementosConcretoAco3'])){
            $result *= $tp->update('elementos_concreto_aco3', $_POST['elementosConcretoAco3'], $id);
          }

          //grupo 4 - estrutura de contenção

          //input tipoContencao4
          if (isset($_POST['tipoContencao4'])){
            $result *= $tp->update('tipo_contencao4', $_POST['tipoContencao4'], $id);
          }

          //input extensaoEstruturaContencao4
          if (isset($_POST['extensaoEstruturaContencao4'])){
            $result *= $tp->update('extensao_estrutura_contencao4', $_POST['extensaoEstruturaContencao4'], $id);
          }

          //input alturaEstruturaContencao4
          if (isset($_POST['alturaEstruturaContencao4'])){
            $result *= $tp->update('altura_estrutura_contencao4', $_POST['alturaEstruturaContencao4'], $id);
          }

          //input ancoragens4
          if (isset($_POST['ancoragens4'])){
            $result *= $tp->update('ancoragens4', $_POST['ancoragens4'], $id);
          }

          //input elementosConcretoAco4
          if (isset($_POST['elementosConcretoAco4'])){
            $result *= $tp->update('elementos_concreto_aco4', $_POST['elementosConcretoAco4'], $id);
          }

        } else {
          $result *= $tp->update('tipo_contencao1', '-', $id);
          $result *= $tp->update('extensao_estrutura_contencao1', '-', $id);
          $result *= $tp->update('altura_estrutura_contencao1', '-', $id);
          $result *= $tp->update('ancoragens1', '-', $id);
          $result *= $tp->update('elementos_concreto_aco1', '-', $id);

          $result *= $tp->update('tipo_contencao2', '-', $id);
          $result *= $tp->update('extensao_estrutura_contencao2', '-', $id);
          $result *= $tp->update('altura_estrutura_contencao2', '-', $id);
          $result *= $tp->update('ancoragens2', '-', $id);
          $result *= $tp->update('elementos_concreto_aco2', '-', $id);
          
          $result *= $tp->update('tipo_contencao3', '-', $id);
          $result *= $tp->update('extensao_estrutura_contencao3', '-', $id);
          $result *= $tp->update('altura_estrutura_contencao3', '-', $id);
          $result *= $tp->update('ancoragens3', '-', $id);
          $result *= $tp->update('elementos_concreto_aco3', '-', $id);

          $result *= $tp->update('tipo_contencao4', '-', $id);
          $result *= $tp->update('extensao_estrutura_contencao4', '-', $id);
          $result *= $tp->update('altura_estrutura_contencao4', '-', $id);
          $result *= $tp->update('ancoragens4', '-', $id);
          $result *= $tp->update('elementos_concreto_aco4', '-', $id);
        }

        $tp->update('edit_estrutura_de_contencao', $result, $id);
        $_SESSION['resultEstruturaDeContencao'] = $result;
        //echo("<script>location.href='../view/tp_edit.php?id={$id}';</script>");
      }

      //parametrizacao automatica das causas e soluções provaveis
      //Define tudo como N inicialmente.
      //Causas provaveis
      $result *= $tp->update('ausencia_superficial', "N", $id);//A
      $result *= $tp->update('secagem_umedecimento_de_solo', "N", $id);//A
      $result *= $tp->update('deficiencia_na_fundacao', "N", $id);//C
      $result *= $tp->update('deficiencia_da_protecao_superficial', "N", $id);//D
      $result *= $tp->update('compactacao_inadequada', "N", $id);//E
      $result *= $tp->update('descontinuidade_do_macico', "N", $id);//F
      $result *= $tp->update('saturacao_do_solo', "N", $id);//G
      $result *= $tp->update('acao_de_terceiro', "N", $id);//H
      $result *= $tp->update('descompactacao_de_raizes', "N", $id);//I
      $result *= $tp->update('ma_conformacao_do_talude', "N", $id);//J
      $result *= $tp->update('evolucao_erosao', "N", $id);//K
      $result *= $tp->update('estiagem', "N", $id);//L

      //Solucoes provaveis
      $result *= $tp->update('recuperacao_de_cobertura_vegetal', "N", $id);//A
      $result *= $tp->update('retaludamento', "N", $id);//B
      $result *= $tp->update('remocao_de_massa_instavel', "N", $id);//C
      $result *= $tp->update('implantacao_de_drenagem', "N", $id);//D
      $result *= $tp->update('implantacao_de_contencao', "N", $id);//E
      $result *= $tp->update('recuperacao_de_plataforma', "N", $id);//F

      //A partir da avaliacao atual é verificada o padrão de texto para definir o diagnostico
      if (isset($ocorrencias)){
        if (strpos($ocorrencias,"Queimadas")> -1){
          //causas provaveis
          $result *= $tp->update('estiagem', "S", $id);//L
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H

          //solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
        }

        if (strpos($ocorrencias,"Arvores Com Risco de Queda")> -1){
          //Causas provaveis
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('descompactacao_de_raizes', "S", $id);//I

          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
        }

        if (strpos($ocorrencias,"Descalcamento da Base")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
        }

        if (strpos($ocorrencias,"Erosao Laminar")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
        }

        if (strpos($ocorrencias,"Blocos Instaveis")> -1|| strpos($ocorrencias,"Queda de Bloco")> -1 || strpos($ocorrencias,"Rolamento de Bloco")> -1){
          //Causas provaveis
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('descontinuidade_do_macico', "S", $id);//F
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K

          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
        }

        if (strpos($ocorrencias,"Rastejo")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J

          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
        }

        if (strpos($ocorrencias,"Abatimento do Talude")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('descontinuidade_do_macico', "S", $id);//F
          $result *= $tp->update('saturacao_do_solo', "S", $id);//G
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K


          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
          $result *= $tp->update('recuperacao_de_plataforma', "S", $id);//F
        }

        if (strpos($ocorrencias,"Trincas no Acostamento")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('descontinuidade_do_macico', "S", $id);//F
          $result *= $tp->update('saturacao_do_solo', "S", $id);//G
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K


          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
          $result *= $tp->update('recuperacao_de_plataforma', "S", $id);//F
        }

        if (strpos($ocorrencias,"Abatimento de Pista no Acostamento")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('descontinuidade_do_macico', "S", $id);//F
          $result *= $tp->update('saturacao_do_solo', "S", $id);//G
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K


          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
          $result *= $tp->update('recuperacao_de_plataforma', "S", $id);//F
        }

        if (strpos($ocorrencias,"Escorregamento")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('descontinuidade_do_macico', "S", $id);//F
          $result *= $tp->update('saturacao_do_solo', "S", $id);//G
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K

          //Solucoes provaveis
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
          $result *= $tp->update('implantacao_de_contencao', "S", $id);//E
        }

        if (strpos($ocorrencias,"Solo Exposto")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('evolucao_erosao', "S", $id);//K
          $result *= $tp->update('estiagem', "S", $id);//L

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
        }

        if (strpos($ocorrencias,"Desagregacao Superficial")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
        }

        if (strpos($ocorrencias,"Erosao Diferenciada")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('estiagem', "S", $id);//L

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
        }

        if (strpos($ocorrencias,"Erosao em Ravina")> -1 || strpos($ocorrencias,"Erosao em Vocoroca")> -1 || strpos($ocorrencias,"Erosao em Sulcos")> -1){
          //Causas provaveis
          $result *= $tp->update('ausencia_superficial', "S", $id);//A
          $result *= $tp->update('deficiencia_na_fundacao', "S", $id);//C
          $result *= $tp->update('deficiencia_da_protecao_superficial', "S", $id);//D
          $result *= $tp->update('compactacao_inadequada', "S", $id);//E
          $result *= $tp->update('acao_de_terceiro', "S", $id);//H
          $result *= $tp->update('ma_conformacao_do_talude', "S", $id);//J
          $result *= $tp->update('evolucao_erosao', "S", $id);//K

          //Solucoes provaveis
          $result *= $tp->update('recuperacao_de_cobertura_vegetal', "S", $id);//A
          $result *= $tp->update('retaludamento', "S", $id);//B
          $result *= $tp->update('remocao_de_massa_instavel', "S", $id);//C
          $result *= $tp->update('implantacao_de_drenagem', "S", $id);//D
        }

      }

      $data = date("d/m/Y");
      $result *= $tp->update('data', $data, $id);

      $dataLigacao = date('d/m/Y H:i:s');
      $result *= $tp->update('data_ligacao', $dataLigacao, $id);

      //atualiza o status de edição sempre que uma operação é realizada

      $infoEdit = $tp->findInfoEdit("tp", $id);
      
      if ($infoEdit["edit_geometria"] == 1 || 
          $infoEdit["edit_vegetacao"] == 1 ||
          $infoEdit["edit_drenagem"] == 1 ||
          $infoEdit["edit_ocorrencias"] == 1 ||
          $infoEdit["edit_outros"] == 1 ||
          $infoEdit["edit_estrutura_de_contencao"] == 1 ||
          $infoEdit["edit_fotos"] == 1){
            $resultadoEdit = 0;
            $tp->update('edit', $resultadoEdit, $id);  
      }
      if ($infoEdit["edit_geometria"] == 1 && 
          $infoEdit["edit_vegetacao"] == 1 &&
          $infoEdit["edit_drenagem"] == 1 &&
          $infoEdit["edit_ocorrencias"] == 1 &&
          $infoEdit["edit_outros"] == 1 &&
          $infoEdit["edit_estrutura_de_contencao"] == 1 &&
          $infoEdit["edit_fotos"] == 1){
            $resultadoEdit = 1;
            $tp->update('edit', $resultadoEdit, $id);          
      }

      echo("<script>location.href='../view/tp_edit.php?id={$id}';</script>");
      ob_end_flush();  
?>