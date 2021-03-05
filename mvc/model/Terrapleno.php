<?php
    include_once '../../Conexao.php';
    include_once 'Fototerrapleno.php';
    class Terrapleno{
        private $codAuto;
        private $situacao;
        private $codMonitoramento;
        private $codCadastro;
        private $identificacao;
        private $material_origem;
        private $lado;
        private $latitude1;
        private $longitude1;
        private $latitude2;
        private $longitude2;
        private $trecho;
        private $terrapleno_contencao;
        private $distancia_acostamento;
        private $km;
        private $km_final;
        private $rodovia;
        private $sentido;
        private $estado;
        private $banqueta;
        private $altura;
        private $inclinacao;
        private $tipo_terrapleno;
        private $tipo_relevo;
        private $arbustiva;
        private $rasteira;
        private $arborea;
        private $nenhuma;
        private $vegetacao;
        private $densidade_vegetacao;
        private $drenagem_superficial;
        private $condicao_drenagem_superficial;
        private $drenagem_subterranea;
        private $condicao_drenagem_subterranea;
        private $tipo;
        private $presenca_agua;
        private $erosao_em_sulcos;
        private $erosao_laminar;
        private $desagregacao_superficial;
        private $queimadas;
        private $arvores_com_risco_de_queda;
        private $descalcamento_na_base;
        private $blocos_instaveis;
        private $queda_de_bloco;
        private $escorregamento;
        private $rastejo;
        private $erosao_diferenciada;
        private $abatimento_de_pista_no_acostamento;
        private $solo_exposto;
        private $abatimento_do_talude;
        private $trincas_no_acostamento;
        private $rolamento_de_bloco;
        private $erosao_em_vocoroca;
        private $erosao_em_ravina;
        private $check_outro_tipo_ocorrencia;
        private $outro_tipo_ocorrencia;
        private $ocorrencias;
        private $inclinacao_acentuada;
        private $deficiencia_superficial;
        private $tipo_solo;
        private $ausencia_superficial;
        private $secagem_umedecimento_de_solo;
        private $deficiencia_na_fundacao;
        private $deficiencia_da_protecao_superficial;
        private $compactacao_inadequada;
        private $descontinuidade_do_macico;
        private $saturacao_do_solo;
        private $acao_de_terceiro;
        private $descompactacao_de_raizes;
        private $ma_conformacao_do_talude;
        private $evolucao_erosao;
        private $estiagem;
        private $check_outras_causas_provaveis;
        private $causas_provaveis;
        private $nivel_risco;
        private $recuperacao_de_cobertura_vegetal;
        private $retaludamento;
        private $remocao_de_massa_instavel;
        private $implantacao_de_drenagem;
        private $implantacao_de_contencao;
        private $recuperacao_de_plataforma;
        private $outras_intervencoes_necessarias;
        private $descricao_outras_intervencoes_necessarias;
        private $dimensoes;
        private $caso_ruptura;
        private $descricao_caso_ruptura;
        private $outras_descricoes_caso_ruptura;
        private $descricao_caso_ruptura2;
        private $descricao_caso_ruptura3;
        private $descricao_caso_ruptura4;
        private $localizacao_dispositivo;
        private $comprimento;
        private $data;
        private $data_ligacao;
        private $km_da_patologia;
        private $observacoes_ficha;
        private $contem_passivo_ambiental;
        private $passivo_ambiental;
        private $geometria;
        private $superficie_ruptura;
        private $contem_contencao;
        private $tipo_contencao1;
        private $extensao_estrutura_contencao1;
        private $altura_estrutura_contencao1;
        private $ancoragens1;
        private $elementos_concreto_aco1;
        private $tipo_contencao2;
        private $extensao_estrutura_contencao2;
        private $altura_estrutura_contencao2;
        private $ancoragens2;
        private $elementos_concreto_aco2;
        private $tipo_contencao3;
        private $extensao_estrutura_contencao3;
        private $altura_estrutura_contencao3;
        private $ancoragens3;
        private $elementos_concreto_aco3;
        private $tipo_contencao4;
        private $extensao_estrutura_contencao4;
        private $altura_estrutura_contencao4;
        private $ancoragens4;
        private $elementos_concreto_aco4;
        private $foto_inacessivel_cima;
        private $obra;
        private $encosta;
        private $local_dre_super1;
        private $local_dre_super2;
        private $local_dre_super3;
        private $situacao_passivo;
        private $diretriz_recuperacao;
        private $status;
        private $edit;
        private $fotos;
       
        function __construct( $codAuto = null,
        $situacao = null,
        $codMonitoramento = null,
        $codCadastro = null,
        $identificacao = null,
        $material_origem = null,
        $lado = null,
        $latitude1 = null,
        $longitude1 = null,
        $latitude2 = null,
        $longitude2 = null,
        $trecho = null,
        $terrapleno_contencao = null,
        $distancia_acostamento = null,
        $km = null,
        $km_final = null,
        $rodovia = null,
        $sentido = null,
        $estado = null,
        $banqueta = null,
        $altura = null,
        $inclinacao = null,
        $tipo_terrapleno = null,
        $tipo_relevo = null,
        $arbustiva = null,
        $rasteira = null,
        $arborea = null,
        $nenhuma = null,
        $vegetacao = null,
        $densidade_vegetacao = null,
        $drenagem_superficial = null,
        $condicao_drenagem_superficial = null,
        $drenagem_subterranea = null,
        $condicao_drenagem_subterranea = null,
        $tipo = null,
        $presenca_agua = null,
        $erosao_em_sulcos = null,
        $erosao_laminar = null,
        $desagregacao_superficial = null,
        $queimadas = null,
        $arvores_com_risco_de_queda = null,
        $descalcamento_na_base = null,
        $blocos_instaveis = null,
        $queda_de_bloco = null,
        $escorregamento = null,
        $rastejo = null,
        $erosao_diferenciada = null,
        $abatimento_de_pista_no_acostamento = null,
        $solo_exposto = null,
        $abatimento_do_talude = null,
        $trincas_no_acostamento = null,
        $rolamento_de_bloco = null,
        $erosao_em_vocoroca = null,
        $erosao_em_ravina = null,
        $check_outro_tipo_ocorrencia = null,
        $outro_tipo_ocorrencia = null,
        $ocorrencias = null,
        $inclinacao_acentuada = null,
        $deficiencia_superficial = null,
        $tipo_solo = null,
        $ausencia_superficial = null,
        $secagem_umedecimento_de_solo = null,
        $deficiencia_na_fundacao = null,
        $deficiencia_da_protecao_superficial = null,
        $compactacao_inadequada = null,
        $descontinuidade_do_macico = null,
        $saturacao_do_solo = null,
        $acao_de_terceiro = null,
        $descompactacao_de_raizes = null,
        $ma_conformacao_do_talude = null,
        $evolucao_erosao = null,
        $estiagem = null,
        $check_outras_causas_provaveis = null,
        $causas_provaveis = null,
        $nivel_risco = null,
        $recuperacao_de_cobertura_vegetal = null,
        $retaludamento = null,
        $remocao_de_massa_instavel = null,
        $implantacao_de_drenagem = null,
        $implantacao_de_contencao = null,
        $recuperacao_de_plataforma = null,
        $outras_intervencoes_necessarias = null,
        $descricao_outras_intervencoes_necessarias = null,
        $dimensoes = null,
        $caso_ruptura = null,
        $descricao_caso_ruptura = null,
        $outras_descricoes_caso_ruptura = null,
        $descricao_caso_ruptura2 = null,
        $descricao_caso_ruptura3 = null,
        $descricao_caso_ruptura4 = null,
        $localizacao_dispositivo = null,
        $comprimento = null,
        $data = null,
        $data_ligacao = null,
        $km_da_patologia = null,
        $observacoes_ficha = null,
        $contem_passivo_ambiental = null,
        $passivo_ambiental = null,
        $geometria = null,
        $superficie_ruptura = null,
        $contem_contencao = null,
        $tipo_contencao1 = null,
        $extensao_estrutura_contencao1 = null,
        $altura_estrutura_contencao1 = null,
        $ancoragens1 = null,
        $elementos_concreto_aco1 = null,
        $tipo_contencao2 = null,
        $extensao_estrutura_contencao2 = null,
        $altura_estrutura_contencao2 = null,
        $ancoragens2 = null,
        $elementos_concreto_aco2 = null,
        $tipo_contencao3 = null,
        $extensao_estrutura_contencao3 = null,
        $altura_estrutura_contencao3 = null,
        $ancoragens3 = null,
        $elementos_concreto_aco3 = null,
        $tipo_contencao4 = null,
        $extensao_estrutura_contencao4 = null,
        $altura_estrutura_contencao4 = null,
        $ancoragens4 = null,
        $elementos_concreto_aco4 = null,
        $foto_inacessivel_cima = null,
        $obra = null,
        $encosta = null,
        $local_dre_super1 = null,
        $local_dre_super2 = null,
        $local_dre_super3 = null,
        $situacao_passivo = null,
        $diretriz_recuperacao = null,
        $status = null,
        $edit = null){
            if($codAuto){
                $this->codAuto = $codAuto;
            }
            $this->situacao = $situacao;
            $this->codMonitoramento = $codMonitoramento;
            $this->codCadastro = $codCadastro;
            $this->identificacao = $identificacao;
            $this->material_origem = $material_origem;
            $this->lado = $lado;
            $this->latitude1 = $latitude1;
            $this->longitude1 = $longitude1;
            $this->latitude2 = $latitude2;
            $this->longitude2 = $longitude2;
            $this->trecho = $trecho;
            $this->terrapleno_contencao = $terrapleno_contencao;
            $this->distancia_acostamento = $distancia_acostamento;
            $this->km = $km;
            $this->km_final = $km_final;
            $this->rodovia = $rodovia;
            $this->sentido = $sentido;
            $this->estado = $estado;
            $this->banqueta = $banqueta;
            $this->altura = $altura;
            $this->inclinacao = $inclinacao;
            $this->tipo_terrapleno = $tipo_terrapleno;
            $this->tipo_relevo = $tipo_relevo;
            $this->arbustiva = $arbustiva;
            $this->rasteira = $rasteira;
            $this->arborea = $arborea;
            $this->nenhuma = $nenhuma;
            $this->vegetacao = $vegetacao;
            $this->densidade_vegetacao = $densidade_vegetacao;
            $this->drenagem_superficial = $drenagem_superficial;
            $this->condicao_drenagem_superficial = $condicao_drenagem_superficial;
            $this->drenagem_subterranea = $drenagem_subterranea;
            $this->condicao_drenagem_subterranea = $condicao_drenagem_subterranea;
            $this->tipo = $tipo;
            $this->presenca_agua = $presenca_agua;
            $this->erosao_em_sulcos = $erosao_em_sulcos;
            $this->erosao_laminar = $erosao_laminar;
            $this->desagregacao_superficial = $desagregacao_superficial;
            $this->queimadas = $queimadas;
            $this->arvores_com_risco_de_queda = $arvores_com_risco_de_queda;
            $this->descalcamento_na_base = $descalcamento_na_base;
            $this->blocos_instaveis = $blocos_instaveis;
            $this->queda_de_bloco = $queda_de_bloco;
            $this->escorregamento = $escorregamento;
            $this->rastejo = $rastejo;
            $this->erosao_diferenciada = $erosao_diferenciada;
            $this->abatimento_de_pista_no_acostamento = $abatimento_de_pista_no_acostamento;
            $this->solo_exposto = $solo_exposto;
            $this->abatimento_do_talude = $abatimento_do_talude;
            $this->trincas_no_acostamento = $trincas_no_acostamento;
            $this->rolamento_de_bloco = $rolamento_de_bloco;
            $this->erosao_em_vocoroca = $erosao_em_vocoroca;
            $this->erosao_em_ravina = $erosao_em_ravina;
            $this->check_outro_tipo_ocorrencia = $check_outro_tipo_ocorrencia;
            $this->outro_tipo_ocorrencia = $outro_tipo_ocorrencia;
            $this->ocorrencias = $ocorrencias;
            $this->inclinacao_acentuada = $inclinacao_acentuada;
            $this->deficiencia_superficial = $deficiencia_superficial;
            $this->tipo_solo = $tipo_solo;
            $this->ausencia_superficial = $ausencia_superficial;
            $this->secagem_umedecimento_de_solo = $secagem_umedecimento_de_solo;
            $this->deficiencia_na_fundacao = $deficiencia_na_fundacao;
            $this->deficiencia_da_protecao_superficial = $deficiencia_da_protecao_superficial;
            $this->compactacao_inadequada = $compactacao_inadequada;
            $this->descontinuidade_do_macico = $descontinuidade_do_macico;
            $this->saturacao_do_solo = $saturacao_do_solo;
            $this->acao_de_terceiro = $acao_de_terceiro;
            $this->descompactacao_de_raizes = $descompactacao_de_raizes;
            $this->ma_conformacao_do_talude = $ma_conformacao_do_talude;
            $this->evolucao_erosao = $evolucao_erosao;
            $this->estiagem = $estiagem;
            $this->check_outras_causas_provaveis = $check_outras_causas_provaveis;
            $this->causas_provaveis = $causas_provaveis;
            $this->nivel_risco = $nivel_risco;
            $this->recuperacao_de_cobertura_vegetal = $recuperacao_de_cobertura_vegetal;
            $this->retaludamento = $retaludamento;
            $this->remocao_de_massa_instavel = $remocao_de_massa_instavel;
            $this->implantacao_de_drenagem = $implantacao_de_drenagem;
            $this->implantacao_de_contencao = $implantacao_de_contencao;
            $this->recuperacao_de_plataforma = $recuperacao_de_plataforma;
            $this->outras_intervencoes_necessarias = $outras_intervencoes_necessarias;
            $this->descricao_outras_intervencoes_necessarias = $descricao_outras_intervencoes_necessarias;
            $this->dimensoes = $dimensoes;
            $this->caso_ruptura = $caso_ruptura;
            $this->descricao_caso_ruptura = $descricao_caso_ruptura;
            $this->outras_descricoes_caso_ruptura = $outras_descricoes_caso_ruptura;
            $this->descricao_caso_ruptura2 = $descricao_caso_ruptura2;
            $this->descricao_caso_ruptura3 = $descricao_caso_ruptura3;
            $this->descricao_caso_ruptura4 = $descricao_caso_ruptura4;
            $this->localizacao_dispositivo = $localizacao_dispositivo;
            $this->comprimento = $comprimento;
            $this->data = $data;
            $this->data_ligacao = $data_ligacao;
            $this->km_da_patologia = $km_da_patologia;
            $this->observacoes_ficha = $observacoes_ficha;
            $this->contem_passivo_ambiental = $contem_passivo_ambiental;
            $this->passivo_ambiental = $passivo_ambiental;
            $this->geometria = $geometria;
            $this->superficie_ruptura = $superficie_ruptura;
            $this->contem_contencao = $contem_contencao;
            $this->tipo_contencao1 = $tipo_contencao1;
            $this->extensao_estrutura_contencao1 = $extensao_estrutura_contencao1;
            $this->altura_estrutura_contencao1 = $altura_estrutura_contencao1;
            $this->ancoragens1 = $ancoragens1;
            $this->elementos_concreto_aco1 = $elementos_concreto_aco1;
            $this->tipo_contencao2 = $tipo_contencao2;
            $this->extensao_estrutura_contencao2 = $extensao_estrutura_contencao2;
            $this->altura_estrutura_contencao2 = $altura_estrutura_contencao2;
            $this->ancoragens2 = $ancoragens2;
            $this->elementos_concreto_aco2 = $elementos_concreto_aco2;
            $this->tipo_contencao3 = $tipo_contencao3;
            $this->extensao_estrutura_contencao3 = $extensao_estrutura_contencao3;
            $this->altura_estrutura_contencao3 = $altura_estrutura_contencao3;
            $this->ancoragens3 = $ancoragens3;
            $this->elementos_concreto_aco3 = $elementos_concreto_aco3;
            $this->tipo_contencao4 = $tipo_contencao4;
            $this->extensao_estrutura_contencao4 = $extensao_estrutura_contencao4;
            $this->altura_estrutura_contencao4 = $altura_estrutura_contencao4;
            $this->ancoragens4 = $ancoragens4;
            $this->elementos_concreto_aco4 = $elementos_concreto_aco4;
            $this->foto_inacessivel_cima = $foto_inacessivel_cima;
            $this->obra = $obra;
            $this->encosta = $encosta;
            $this->local_dre_super1 = $local_dre_super1;
            $this->local_dre_super2 = $local_dre_super2;
            $this->local_dre_super3 = $local_dre_super3;
            $this->situacao_passivo = $situacao_passivo;
            $this->diretriz_recuperacao = $diretriz_recuperacao;
            $this->status = $status;
            $this->edit = $edit;
        }
        public function __set($name, $value){
            $this->$name = $value;
        }

        public function __get($name){
            return $this->$name;
        }

        public function addFoto(Fototerrapleno $foto) {
            $this->fotos[] = $foto;
            return $foto->insert();
        }
        public function updateParam($tabela, $coluna, $valor, $id){
            $sql = "UPDATE {$tabela} SET {$coluna} = :valor WHERE codAuto = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('valor' , $valor);
            $consulta->bindValue('id', $id);
            return $consulta->execute();
        }

        public function update($coluna = null, $valor = null, $id = null){
            $sql = "UPDATE tp SET {$coluna} = :valor WHERE codAuto = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('valor' , $valor);
            $consulta->bindValue('id', $id);
            return $consulta->execute();
        }

        public function delete($id = null){
            $sql =  "DELETE FROM tp WHERE codAuto = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
            return $consulta->execute();
        }

        public function findByFilter($tabela, $coluna, $valor){
            $sql = "SELECT * FROM {$tabela} WHERE {$coluna}={$valor}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findInterval($tabela, $coluna, $valor1, $valor2){
            $sql = "SELECT * FROM {$tabela} WHERE {$coluna}>={$valor1} AND {$coluna}<={$valor2}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findInfo($valor){
            $sql = "SELECT codAuto, identificacao, km, km_final, edit FROM tp WHERE CAST(substring(identificacao,11,3) AS DECIMAL(10,2)) ={$valor}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findInfoInterval($valor1, $valor2){
            $sql = "SELECT codAuto, identificacao, km, km_final, edit FROM tp WHERE CAST(substring(identificacao,11,3) AS decimal(10,2)) >={$valor1} AND CAST(substring(identificacao,11,3) AS decimal(10,2)) <={$valor2}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findAllInfoHeader(){
            $sql = "SELECT codAuto, identificacao, km, km_final, edit  FROM tp";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function find($id = null){
            $sql =  "SELECT * FROM tp WHERE codAuto = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
            return $consulta->fetch();
        }

        public function findAll(){
            $sql = "SELECT * FROM tp";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function count(){
            $sql = "SELECT COUNT(*) AS linhas FROM tp";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetch();
        }

        public function countParam($tabela, $coluna, $valor){
            $sql = "SELECT COUNT(*) AS num FROM {$tabela} WHERE {$coluna}={$valor}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetch();
        }
        
        public function salvarFoto($id, $nome, $data, $observacao = null){
            $sql = "INSERT INTO fotos(codFicha, nome, data, observacao) VALUES (:codFicha, :nome, :data, :observacao)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('codFicha',$id);
            $consulta->bindValue('nome',$nome);
            $consulta->bindValue('data',$data);
            $consulta->bindValue('observacao',$observacao);
            return $consulta->execute();
        }

        public function getTable($tabela){
            $sql = "SELECT * FROM {$tabela}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function findInfoEdit($tabela, $id){
            $sql = "SELECT edit_geometria, edit_vegetacao, edit_drenagem, edit_ocorrencias, edit_causas_provaveis, edit_solucoes_provaveis, edit_outros, edit_estrutura_de_contencao, edit_fotos FROM {$tabela} WHERE codAuto = {$id}";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetch();
        }

    }
?>