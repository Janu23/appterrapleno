<?php
ob_start();//solução para o problema de cabeçalho export excel não carregado 
require_once '../model/Terrapleno.php';
$fototerrapleno = new Fototerrapleno();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
<?php

    $arquivo = "terrapleno.xls";
    $html = ' ';
    $html .= '<table border="1">';
    $html .= '<tr><td colspan="132" align="center">Planilha Terrapleno</td></tr>';
    $html .='<tr>';
    $html .='<th>codAuto</th>';
    $html .='<th>situacao</th>';
    $html .='<th>codMonitoramento</th>';
    $html .='<th>codCadastro</th>';
    $html .='<th>identificacao</th>';
    $html .='<th>material_origem</th>';
    $html .='<th>lado</th>';
    $html .='<th>latitude1</th>';
    $html .='<th>longitude1</th>';
    $html .='<th>latitude2</th>';
    $html .='<th>longitude2</th>';
    $html .='<th>trecho</th>';
    $html .='<th>terrapleno_contencao</th>';
    $html .='<th>distancia_acostamento</th>';
    $html .='<th>km</th>';
    $html .='<th>km_final</th>';
    $html .='<th>rodovia</th>';
    $html .='<th>sentido</th>';
    $html .='<th>estado</th>';
    $html .='<th>banqueta</th>';
    $html .='<th>altura</th>';
    $html .='<th>inclinacao</th>';
    $html .='<th>tipo_terrapleno</th>';
    $html .='<th>tipo_relevo</th>';
    $html .='<th>arbustiva</th>';
    $html .='<th>rasteira</th>';
    $html .='<th>arbórea</th>';
    $html .='<th>nenhuma</th>';
    $html .='<th>vegetacao</th>';
    $html .='<th>densidade_vegetacao</th>';
    $html .='<th>drenagem_superficial</th>';
    $html .='<th>condicao_drenagem_superficial</th>';
    $html .='<th>drenagem_subterranea</th>';
    $html .='<th>condicao_drenagem_subterranea</th>';
    $html .='<th>tipo</th>';
    $html .='<th>presenca_agua</th>';
    $html .='<th>erosao_em_sulcos</th>';
    $html .='<th>erosao_laminar</th>';
    $html .='<th>desagregacao_superficial</th>';
    $html .='<th>queimadas</th>';
    $html .='<th>arvores_com_risco_de_queda</th>';
    $html .='<th>descalcamento_na_base</th>';
    $html .='<th>blocos_instaveis</th>';
    $html .='<th>queda_de_bloco</th>';
    $html .='<th>escorregamento</th>';
    $html .='<th>rastejo</th>';
    $html .='<th>erosao_diferenciada</th>';
    $html .='<th>abatimento_de_pista_no_acostamento</th>';
    $html .='<th>solo_exposto</th>';
    $html .='<th>abatimento_do_talude</th>';
    $html .='<th>trincas_no_acostamento</th>';
    $html .='<th>rolamento_de_bloco</th>';
    $html .='<th>erosao_em_vocoroca</th>';
    $html .='<th>erosao_em_ravina</th>';
    $html .='<th>check_outro_tipo_ocorrencia</th>';
    $html .='<th>outro_tipo_ocorrencia</th>';
    $html .='<th>ocorrencias</th>';
    $html .='<th>avaliacao_atual</th>';
    $html .='<th>inclinacao_acentuada</th>';
    $html .='<th>deficiencia_superficial</th>';
    $html .='<th>tipo_solo</th>';
    $html .='<th>ausencia_superficial</th>';
    $html .='<th>secagem_umedecimento_de_solo</th>';
    $html .='<th>deficiencia_na_fundacao</th>';
    $html .='<th>deficiencia_da_protecao_superficial</th>';
    $html .='<th>compactacao_inadequada</th>';
    $html .='<th>descontinuidade_do_macico</th>';
    $html .='<th>saturacao_do_solo</th>';
    $html .='<th>acao_de_terceiro</th>';
    $html .='<th>descompactacao_de_raizes</th>';
    $html .='<th>ma_conformacao_do_talude</th>';
    $html .='<th>evolucao_erosao</th>';
    $html .='<th>estiagem</th>';
    $html .='<th>check_outras_causas_provaveis</th>';
    $html .='<th>causas_provaveis</th>';
    $html .='<th>nivel_risco</th>';
    $html .='<th>recuperacao_de_cobertura_vegetal</th>';
    $html .='<th>retaludamento</th>';
    $html .='<th>remocao_de_massa_instavel</th>';
    $html .='<th>implantacao_de_drenagem</th>';
    $html .='<th>implantacao_de_contencao</th>';
    $html .='<th>recuperacao_de_plataforma</th>';
    $html .='<th>outras_intervencoes_necessarias</th>';
    $html .='<th>descricao_outras_intervencoes_necessarias</th>';
    $html .='<th>dimensoes</th>';
    $html .='<th>caso_ruptura</th>';
    $html .='<th>descricao_caso_ruptura</th>';
    $html .='<th>outras_descricoes_caso_ruptura</th>';
    $html .='<th>descricao_caso_ruptura2</th>';
    $html .='<th>descricao_caso_ruptura3</th>';
    $html .='<th>descricao_caso_ruptura4</th>';
    $html .='<th>localizacao_dispositivo</th>';
    $html .='<th>comprimento</th>';
    $html .='<th>data</th>';
    $html .='<th>data_ligacao</th>';
    $html .='<th>km_da_patologia</th>';
    $html .='<th>observacoes_ficha</th>';
    $html .='<th>contem_passivo_ambiental</th>';
    $html .='<th>passivo_ambiental</th>';
    $html .='<th>geometria</th>';
    $html .='<th>superficie_ruptura</th>';
    $html .='<th>contem_contencao</th>';
    $html .='<th>tipo_contencao1</th>';
    $html .='<th>extensao_estrutura_contencao1</th>';
    $html .='<th>altura_estrutura_contencao1</th>';
    $html .='<th>ancoragens1</th>';
    $html .='<th>elementos_concreto_aco1</th>';
    $html .='<th>tipo_contencao2</th>';
    $html .='<th>extensao_estrutura_contencao2</th>';
    $html .='<th>altura_estrutura_contencao2</th>';
    $html .='<th>ancoragens2</th>';
    $html .='<th>elementos_concreto_aco2</th>';
    $html .='<th>tipo_contencao3</th>';
    $html .='<th>extensao_estrutura_contencao3</th>';
    $html .='<th>altura_estrutura_contencao3</th>';
    $html .='<th>ancoragens3</th>';
    $html .='<th>elementos_concreto_aco3</th>';
    $html .='<th>tipo_contencao4</th>';
    $html .='<th>extensao_estrutura_contencao4</th>';
    $html .='<th>altura_estrutura_contencao4</th>';
    $html .='<th>ancoragens4</th>';
    $html .='<th>elementos_concreto_aco4</th>';
    $html .='<th>foto_inacessivel_cima</th>';
    $html .='<th>obra</th>';
    $html .='<th>encosta</th>';
    $html .='<th>local_dre_super1</th>';
    $html .='<th>local_dre_super2</th>';
    $html .='<th>local_dre_super3</th>';
    $html .='<th>situacao_passivo</th>';
    $html .='<th>diretriz_recuperacao</th>';
    $html .='<th>Status</th>';
    $html .='</tr>';

    foreach ($this->tpArray as $tp){
        $html .='<tr>';
        $html .='<td>'.$tp['codAuto'].'</td>';
        $html .='<td>'.$tp['situacao'].'</td>';
        $html .='<td>'.$tp['codMonitoramento'].'</td>';
        $html .='<td>'.$tp['codCadastro'].'</td>';
        $html .='<td>'.$tp['identificacao'].'</td>';
        $html .='<td>'.$tp['material_origem'].'</td>';
        $html .='<td>'.$tp['lado'].'</td>';
        $html .='<td>'.$tp['latitude1'].'</td>';
        $html .='<td>'.$tp['longitude1'].'</td>';
        $html .='<td>'.$tp['latitude2'].'</td>';
        $html .='<td>'.$tp['longitude2'].'</td>';
        $html .='<td>'.$tp['trecho'].'</td>';
        $html .='<td>'.$tp['terrapleno_contencao'].'</td>';
        $html .='<td>'.str_replace(".",",",$tp['distancia_acostamento']).'</td>';
        $html .='<td>'.$tp['km'].'</td>';
        $html .='<td>'.$tp['km_final'].'</td>';
        $html .='<td>'.$tp['rodovia'].'</td>';
        $html .='<td>'.$tp['sentido'].'</td>';
        $html .='<td>'.$tp['estado'].'</td>';
        $html .='<td>'.$tp['banqueta'].'</td>';
        $html .='<td>'.str_replace(".",",",$tp['altura']).'</td>';
        $html .='<td>'.str_replace(".",",",$tp['inclinacao']).'</td>';
        $html .='<td>'.str_replace(".",",",$tp['tipo_terrapleno']).'</td>';
        $html .='<td>'.$tp['tipo_relevo'].'</td>';
        $html .='<td>'.$tp['arbustiva'].'</td>';
        $html .='<td>'.$tp['rasteira'].'</td>';
        $html .='<td>'.$tp['arborea'].'</td>';
        $html .='<td>'.$tp['nenhuma'].'</td>';
        $html .='<td>'.$tp['vegetacao'].'</td>';
        $html .='<td>'.$tp['densidade_vegetacao'].'</td>';
        $html .='<td>'.$tp['drenagem_superficial'].'</td>';
        $html .='<td>'.$tp['condicao_drenagem_superficial'].'</td>';
        $html .='<td>'.$tp['drenagem_subterranea'].'</td>';
        $html .='<td>'.$tp['condicao_drenagem_subterranea'].'</td>';
        $html .='<td>'.$tp['tipo'].'</td>';
        $html .='<td>'.$tp['presenca_agua'].'</td>';
        $html .='<td>'.$tp['erosao_em_sulcos'].'</td>';
        $html .='<td>'.$tp['erosao_laminar'].'</td>';
        $html .='<td>'.$tp['desagregacao_superficial'].'</td>';
        $html .='<td>'.$tp['queimadas'].'</td>';
        $html .='<td>'.$tp['arvores_com_risco_de_queda'].'</td>';
        $html .='<td>'.$tp['descalcamento_na_base'].'</td>';
        $html .='<td>'.$tp['blocos_instaveis'].'</td>';
        $html .='<td>'.$tp['queda_de_bloco'].'</td>';
        $html .='<td>'.$tp['escorregamento'].'</td>';
        $html .='<td>'.$tp['rastejo'].'</td>';
        $html .='<td>'.$tp['erosao_diferenciada'].'</td>';
        $html .='<td>'.$tp['abatimento_de_pista_no_acostamento'].'</td>';
        $html .='<td>'.$tp['solo_exposto'].'</td>';
        $html .='<td>'.$tp['abatimento_do_talude'].'</td>';
        $html .='<td>'.$tp['trincas_no_acostamento'].'</td>';
        $html .='<td>'.$tp['rolamento_de_bloco'].'</td>';
        $html .='<td>'.$tp['erosao_em_vocoroca'].'</td>';
        $html .='<td>'.$tp['erosao_em_ravina'].'</td>';
        $html .='<td>'.$tp['check_outro_tipo_ocorrencia'].'</td>';
        $html .='<td>'.$tp['outro_tipo_ocorrencia'].'</td>';
        $html .='<td>'.$tp['ocorrencias'].'</td>';
        $dreSub = "";
        $dreSup = "";
        if ($tp['edit']!=""){
            //drenagem superficial
            $sup = ($tp['drenagem_superficial']!="") ? $tp['drenagem_superficial'] : 'Inexistente';
            $condSup = ($tp['condicao_drenagem_superficial']!="") ? $tp['condicao_drenagem_superficial'] : 'Inexistente';
            $dreSup = "Drenagem Superficial:".$sup." - Condição:".$condSup."/";
            //drenagem subterranea
            $sub = ($tp['drenagem_subterranea']!="" || $tp['drenagem_subterranea']!="Inexistente") ? $tp['drenagem_subterranea'] : 'Inexistente';
            //$condSub = ($tp['condicao_drenagem_subterranea']!="" || $tp['condicao_drenagem_subterranea']!="Inexistente") ? $tp['condicao_drenagem_subterranea'] : 'Inexistente'; 

                if ($tp['condicao_drenagem_subterranea']==""){
                    $condSub = "Inexistente";
                }else {
                    $condSub = $tp['condicao_drenagem_subterranea'];
                }
            
                if ($sub == "Inexistente"){
                    $condSub = "Inexistente.";
                } 
            
            
            $dreSub = "Drenagem Subterrânea:".$sub." - Condição:".$condSub."/";
        }  
        $html .='<td>'.$dreSup.$dreSub.$tp['avaliacao_atual'].'</td>';
        $html .='<td>'.$tp['inclinacao_acentuada'].'</td>';
        $html .='<td>'.$tp['deficiencia_superficial'].'</td>';
        $html .='<td>'.$tp['tipo_solo'].'</td>';
        $html .='<td>'.$tp['ausencia_superficial'].'</td>';
        $html .='<td>'.$tp['secagem_umedecimento_de_solo'].'</td>';
        $html .='<td>'.$tp['deficiencia_na_fundacao'].'</td>';
        $html .='<td>'.$tp['deficiencia_da_protecao_superficial'].'</td>';
        $html .='<td>'.$tp['compactacao_inadequada'].'</td>';
        $html .='<td>'.$tp['descontinuidade_do_macico'].'</td>';
        $html .='<td>'.$tp['saturacao_do_solo'].'</td>';
        $html .='<td>'.$tp['acao_de_terceiro'].'</td>';
        $html .='<td>'.$tp['descompactacao_de_raizes'].'</td>';
        $html .='<td>'.$tp['ma_conformacao_do_talude'].'</td>';
        $html .='<td>'.$tp['evolucao_erosao'].'</td>';
        $html .='<td>'.$tp['estiagem'].'</td>';
        $html .='<td>'.$tp['check_outras_causas_provaveis'].'</td>';
        $html .='<td>'.$tp['causas_provaveis'].'</td>';
        $html .='<td>'.$tp['nivel_risco'].'</td>';
        $html .='<td>'.$tp['recuperacao_de_cobertura_vegetal'].'</td>';
        $html .='<td>'.$tp['retaludamento'].'</td>';
        $html .='<td>'.$tp['remocao_de_massa_instavel'].'</td>';
        $html .='<td>'.$tp['implantacao_de_drenagem'].'</td>';
        $html .='<td>'.$tp['implantacao_de_contencao'].'</td>';
        $html .='<td>'.$tp['recuperacao_de_plataforma'].'</td>';
        $html .='<td>'.$tp['outras_intervencoes_necessarias'].'</td>';
        $html .='<td>'.$tp['descricao_outras_intervencoes_necessarias'].'</td>';
        $html .='<td>'.$tp['dimensoes_atual'].'</td>';
        $html .='<td>'.$tp['caso_ruptura'].'</td>';
        $html .='<td>'.$tp['descricao_caso_ruptura'].'</td>';
        $html .='<td>'.$tp['outras_descricoes_caso_ruptura'].'</td>';
        $html .='<td>'.$tp['descricao_caso_ruptura2'].'</td>';
        $html .='<td>'.$tp['descricao_caso_ruptura3'].'</td>';
        $html .='<td>'.$tp['descricao_caso_ruptura4'].'</td>';
        $html .='<td>'.$tp['localizacao_dispositivo'].'</td>';
        $html .='<td>'.str_replace(".",",",$tp['comprimento']).'</td>';
        $html .='<td>'.$tp['data'].'</td>';
        $html .='<td>'.$tp['data_ligacao'].'</td>';
        $html .='<td>'.$tp['km_patologia_atual'].'</td>';
        //$html .='<td>'.$tp['observacoes_ficha'].'</td>';
        $html .='<td></td>';
        $html .='<td>'.$tp['contem_passivo_ambiental'].'</td>';
        $html .='<td>'.$tp['passivo_ambiental'].'</td>';
        $html .='<td>'.$tp['geometria'].'</td>';
        $html .='<td>'.$tp['superficie_ruptura'].'</td>';
        $html .='<td>'.$tp['contem_contencao'].'</td>';
        $html .='<td>'.$tp['tipo_contencao1'].'</td>';
        $html .='<td>'.$tp['extensao_estrutura_contencao1'].'</td>';
        $html .='<td>'.$tp['altura_estrutura_contencao1'].'</td>';
        $html .='<td>'.$tp['ancoragens1'].'</td>';
        $html .='<td>'.$tp['elementos_concreto_aco1'].'</td>';
        $html .='<td>'.$tp['tipo_contencao2'].'</td>';
        $html .='<td>'.$tp['extensao_estrutura_contencao2'].'</td>';
        $html .='<td>'.$tp['altura_estrutura_contencao2'].'</td>';
        $html .='<td>'.$tp['ancoragens2'].'</td>';
        $html .='<td>'.$tp['elementos_concreto_aco2'].'</td>';
        $html .='<td>'.$tp['tipo_contencao3'].'</td>';
        $html .='<td>'.$tp['extensao_estrutura_contencao3'].'</td>';
        $html .='<td>'.$tp['altura_estrutura_contencao3'].'</td>';
        $html .='<td>'.$tp['ancoragens3'].'</td>';
        $html .='<td>'.$tp['elementos_concreto_aco3'].'</td>';
        $html .='<td>'.$tp['tipo_contencao4'].'</td>';
        $html .='<td>'.$tp['extensao_estrutura_contencao4'].'</td>';
        $html .='<td>'.$tp['altura_estrutura_contencao4'].'</td>';
        $html .='<td>'.$tp['ancoragens4'].'</td>';
        $html .='<td>'.$tp['elementos_concreto_aco4'].'</td>';
        $html .='<td>'.$tp['foto_inacessivel_cima'].'</td>';
        $html .='<td>'.$tp['obra'].'</td>';
        $html .='<td>'.$tp['encosta'].'</td>';
        $html .='<td>'.$tp['local_dre_super1'].'</td>';
        $html .='<td>'.$tp['local_dre_super2'].'</td>';
        $html .='<td>'.$tp['local_dre_super3'].'</td>';
        $html .='<td>'.$tp['situacao_passivo'].'</td>';
        $html .='<td>'.$tp['diretriz_recuperacao'].'</td>';
        if ($tp['edit']==""){
            $editado = $tp['edit'];
        }else if ($tp['edit']==0){
            $editado = "Em Aberto";
        }else {
            $editado = "Editado";
        }
        $html .='<td>'.$editado.'</td>';
        
        if ($fototerrapleno->countParam("fotos", "codFicha", $tp['codAuto'])[0]>0){
            foreach ($fototerrapleno->findByFilter("fotos", "codFicha", $tp['codAuto']) as $foto){
                $html .='<td>'.$foto["nome"].'</td>';
                $html .='<td>'.$foto["observacao"].'</td>';
            }
        }
        $html .='</tr>';
    }
    $html .='</table>';

     // Configurações header para forçar o download
     header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");
     header ("Content-type: application/x-msexcel");
     header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
     header ("Content-Description: PHP Generated Data" );
     // Envia o conteúdo do arquivo                            
     echo $html;
     exit;  
     ob_end_flush();   
 ?>
     </body>
 </html>