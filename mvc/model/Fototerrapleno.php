<?php
    include_once '../../Conexao.php';
    class Fototerrapleno{
        private $id;
        private $codFicha;
        private $nome;
        private $data;
        private $observacao;
        private $categoria;

        function __construct($id = null, $codFicha = null, $nome = null, $data = null, $observacao = null, $categoria = null){
            if ($id){
                $this->id = $id;
            }
            $this->codFicha = $codFicha;
            $this->nome = $nome;
            $this->data = $data;
            $this->observacao = $observacao;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

       public function __get($name){
           return $this->$name;
       }


    public function insert(){
        $sql = "INSERT INTO fotos(codFicha,nome,data,observacao,categoria) VALUES (:codFicha,:nome,:data,:observacao,:categoria)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('codFicha',  $this->codFicha);
        $consulta->bindValue('nome', $this->nome);
        $consulta->bindValue('data' , $this->data);
        $consulta->bindValue('observacao' , $this->observacao);
        $consulta->bindValue('categoria' , $this->categoria);
        return $consulta->execute();
    }

    public function update(){
        $sql = "UPDATE fotos SET codFicha = :codFicha, nome = :nome, data = :data, observacao = :observacao, categoria = :categoria WHERE id = :id ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('codFicha',  $this->codFicha);
        $consulta->bindValue('nome', $this->nome);
        $consulta->bindValue('data' , $this->data);
        $consulta->bindValue('observacao' , $this->observacao);
        $consulta->bindValue('categoria' , $this->categoria);
        $consulta->bindValue('id' , $this->id);

        return $consulta->execute();
    }    
    
    public function updateParam($tabela, $coluna, $valor, $id){
        $sql = "UPDATE {$tabela} SET {$coluna} = :valor WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('id', $id);
        return $consulta->execute();
    }

    public function delete($id = null){
        $sql =  "DELETE FROM fotos WHERE id = :id";
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

    public function find($id = null){
        $sql =  "SELECT * FROM fotos WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
    }

    public function findAll(){
        $sql = "SELECT * FROM fotos";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }

    public function count(){
        $sql = "SELECT COUNT(*) AS linhas FROM fotos";
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
    }
?>