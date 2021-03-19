-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: terrapleno
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codFicha` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data` varchar(12) DEFAULT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tp`
--

DROP TABLE IF EXISTS `tp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tp` (
  `codAuto` int NOT NULL AUTO_INCREMENT,
  `situacao` int DEFAULT NULL,
  `codMonitoramento` int DEFAULT NULL,
  `codCadastro` int DEFAULT NULL,
  `identificacao` varchar(30) DEFAULT NULL,
  `material_origem` varchar(30) DEFAULT NULL,
  `lado` varchar(15) DEFAULT NULL,
  `latitude1` varchar(20) DEFAULT NULL,
  `longitude1` varchar(20) DEFAULT NULL,
  `latitude2` varchar(20) DEFAULT NULL,
  `longitude2` varchar(20) DEFAULT NULL,
  `trecho` varchar(30) DEFAULT NULL,
  `terrapleno_contencao` varchar(20) DEFAULT NULL,
  `distancia_acostamento` varchar(10) DEFAULT NULL,
  `km` varchar(15) DEFAULT NULL,
  `km_final` varchar(15) DEFAULT NULL,
  `rodovia` varchar(20) DEFAULT NULL,
  `sentido` varchar(20) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `banqueta` varchar(5) DEFAULT NULL,
  `altura` varchar(15) DEFAULT NULL,
  `inclinacao` varchar(15) DEFAULT NULL,
  `tipo_terrapleno` varchar(30) DEFAULT NULL,
  `tipo_relevo` varchar(20) DEFAULT NULL,
  `arbustiva` varchar(5) DEFAULT NULL,
  `rasteira` varchar(5) DEFAULT NULL,
  `arborea` varchar(5) DEFAULT NULL,
  `nenhuma` varchar(5) DEFAULT NULL,
  `vegetacao` varchar(50) DEFAULT NULL,
  `densidade_vegetacao` varchar(30) DEFAULT NULL,
  `drenagem_superficial` varchar(30) DEFAULT NULL,
  `condicao_drenagem_superficial` varchar(60) DEFAULT NULL,
  `drenagem_subterranea` varchar(30) DEFAULT NULL,
  `condicao_drenagem_subterranea` varchar(60) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `presenca_agua` varchar(50) DEFAULT NULL,
  `erosao_em_sulcos` varchar(5) DEFAULT NULL,
  `erosao_laminar` varchar(5) DEFAULT NULL,
  `desagregacao_superficial` varchar(5) DEFAULT NULL,
  `queimadas` varchar(5) DEFAULT NULL,
  `arvores_com_risco_de_queda` varchar(5) DEFAULT NULL,
  `descalcamento_na_base` varchar(5) DEFAULT NULL,
  `blocos_instaveis` varchar(5) DEFAULT NULL,
  `queda_de_bloco` varchar(5) DEFAULT NULL,
  `escorregamento` varchar(5) DEFAULT NULL,
  `rastejo` varchar(5) DEFAULT NULL,
  `erosao_diferenciada` varchar(5) DEFAULT NULL,
  `abatimento_de_pista_no_acostamento` varchar(5) DEFAULT NULL,
  `solo_exposto` varchar(5) DEFAULT NULL,
  `abatimento_do_talude` varchar(5) DEFAULT NULL,
  `trincas_no_acostamento` varchar(5) DEFAULT NULL,
  `rolamento_de_bloco` varchar(5) DEFAULT NULL,
  `erosao_em_vocoroca` varchar(5) DEFAULT NULL,
  `erosao_em_ravina` varchar(5) DEFAULT NULL,
  `check_outro_tipo_ocorrencia` varchar(5) DEFAULT NULL,
  `outro_tipo_ocorrencia` varchar(150) DEFAULT NULL,
  `ocorrencias` varchar(400) DEFAULT NULL,
  `inclinacao_acentuada` varchar(5) DEFAULT NULL,
  `deficiencia_superficial` varchar(5) DEFAULT NULL,
  `tipo_solo` varchar(5) DEFAULT NULL,
  `ausencia_superficial` varchar(5) DEFAULT NULL,
  `secagem_umedecimento_de_solo` varchar(5) DEFAULT NULL,
  `deficiencia_na_fundacao` varchar(5) DEFAULT NULL,
  `deficiencia_da_protecao_superficial` varchar(5) DEFAULT NULL,
  `compactacao_inadequada` varchar(5) DEFAULT NULL,
  `descontinuidade_do_macico` varchar(5) DEFAULT NULL,
  `saturacao_do_solo` varchar(5) DEFAULT NULL,
  `acao_de_terceiro` varchar(5) DEFAULT NULL,
  `descompactacao_de_raizes` varchar(5) DEFAULT NULL,
  `ma_conformacao_do_talude` varchar(5) DEFAULT NULL,
  `evolucao_erosao` varchar(5) DEFAULT NULL,
  `estiagem` varchar(5) DEFAULT NULL,
  `check_outras_causas_provaveis` varchar(5) DEFAULT NULL,
  `causas_provaveis` varchar(500) DEFAULT NULL,
  `nivel_risco` varchar(30) DEFAULT NULL,
  `recuperacao_de_cobertura_vegetal` varchar(5) DEFAULT NULL,
  `retaludamento` varchar(5) DEFAULT NULL,
  `remocao_de_massa_instavel` varchar(5) DEFAULT NULL,
  `implantacao_de_drenagem` varchar(5) DEFAULT NULL,
  `implantacao_de_contencao` varchar(5) DEFAULT NULL,
  `recuperacao_de_plataforma` varchar(5) DEFAULT NULL,
  `outras_intervencoes_necessarias` varchar(5) DEFAULT NULL,
  `descricao_outras_intervencoes_necessarias` varchar(250) DEFAULT NULL,
  `dimensoes` varchar(500) DEFAULT NULL,
  `caso_ruptura` varchar(5) DEFAULT NULL,
  `descricao_caso_ruptura` varchar(300) DEFAULT NULL,
  `outras_descricoes_caso_ruptura` varchar(100) DEFAULT NULL,
  `descricao_caso_ruptura2` varchar(100) DEFAULT NULL,
  `descricao_caso_ruptura3` varchar(100) DEFAULT NULL,
  `descricao_caso_ruptura4` varchar(100) DEFAULT NULL,
  `localizacao_dispositivo` varchar(30) DEFAULT NULL,
  `comprimento` varchar(15) DEFAULT NULL,
  `data` varchar(15) DEFAULT NULL,
  `data_ligacao` varchar(50) DEFAULT NULL,
  `km_da_patologia` varchar(100) DEFAULT NULL,
  `observacoes_ficha` varchar(500) DEFAULT NULL,
  `contem_passivo_ambiental` varchar(5) DEFAULT NULL,
  `passivo_ambiental` varchar(30) DEFAULT NULL,
  `geometria` varchar(30) DEFAULT NULL,
  `superficie_ruptura` varchar(5) DEFAULT NULL,
  `contem_contencao` varchar(5) DEFAULT NULL,
  `tipo_contencao1` varchar(100) DEFAULT NULL,
  `extensao_estrutura_contencao1` varchar(15) DEFAULT NULL,
  `altura_estrutura_contencao1` varchar(15) DEFAULT NULL,
  `ancoragens1` varchar(50) DEFAULT NULL,
  `elementos_concreto_aco1` varchar(50) DEFAULT NULL,
  `tipo_contencao2` varchar(100) DEFAULT NULL,
  `extensao_estrutura_contencao2` varchar(15) DEFAULT NULL,
  `altura_estrutura_contencao2` varchar(15) DEFAULT NULL,
  `ancoragens2` varchar(50) DEFAULT NULL,
  `elementos_concreto_aco2` varchar(50) DEFAULT NULL,
  `tipo_contencao3` varchar(100) DEFAULT NULL,
  `extensao_estrutura_contencao3` varchar(15) DEFAULT NULL,
  `altura_estrutura_contencao3` varchar(15) DEFAULT NULL,
  `ancoragens3` varchar(50) DEFAULT NULL,
  `elementos_concreto_aco3` varchar(50) DEFAULT NULL,
  `tipo_contencao4` varchar(100) DEFAULT NULL,
  `extensao_estrutura_contencao4` varchar(15) DEFAULT NULL,
  `altura_estrutura_contencao4` varchar(15) DEFAULT NULL,
  `ancoragens4` varchar(50) DEFAULT NULL,
  `elementos_concreto_aco4` varchar(50) DEFAULT NULL,
  `foto_inacessivel_cima` varchar(5) DEFAULT NULL,
  `obra` varchar(5) DEFAULT NULL,
  `encosta` varchar(5) DEFAULT NULL,
  `local_dre_super1` varchar(30) DEFAULT NULL,
  `local_dre_super2` varchar(30) DEFAULT NULL,
  `local_dre_super3` varchar(30) DEFAULT NULL,
  `situacao_passivo` varchar(500) DEFAULT NULL,
  `diretriz_recuperacao` varchar(500) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `edit` tinyint(1) DEFAULT NULL,
  `edit_info_geral` tinyint(1) DEFAULT NULL,
  `edit_geometria` tinyint(1) DEFAULT NULL,
  `edit_vegetacao` tinyint(1) DEFAULT NULL,
  `edit_drenagem` tinyint(1) DEFAULT NULL,
  `edit_ocorrencias` tinyint(1) DEFAULT NULL,
  `edit_causas_provaveis` tinyint(1) DEFAULT NULL,
  `outras_causas_provaveis` varchar(100) DEFAULT NULL,
  `edit_solucoes_provaveis` tinyint(1) DEFAULT NULL,
  `edit_outros` tinyint(1) DEFAULT NULL,
  `edit_estrutura_de_contencao` tinyint(1) DEFAULT NULL,
  `edit_fotos` tinyint(1) DEFAULT NULL,
  `avaliacao_atual` varchar(1000) DEFAULT NULL,
  `localizacao` varchar(20) DEFAULT NULL,
  `dimensao` varchar(20) DEFAULT NULL,
  `km_patologia_atual` varchar(1000) DEFAULT NULL,
  `dimensoes_atual` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`codAuto`)
) ENGINE=InnoDB AUTO_INCREMENT=2047 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-03 17:35:43
load data local infile '/var/www/html/appterrapleno/base135.csv'
     into table tp
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 1 rows;


--update tp set edit = NULL,	edit_info_geral = NULL, edit_geometria = NULL, edit_vegetacao = NULL, edit_drenagem = NULL,	edit_ocorrencias = NULL,edit_causas_provaveis = NULL,outras_causas_provaveis = NULL,edit_solucoes_provaveis = NULL,edit_outros = NULL,edit_estrutura_de_contencao = NULL,edit_fotos = NULL WHERE edit = 0;     
