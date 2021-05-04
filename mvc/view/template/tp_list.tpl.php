<?php include('header.tpl.php'); ?>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1"><?php echo strtoupper ("Planilha Terrapleno"); ?></span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="filter.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo "Planilha Terrapleno"; ?></li>
    </ol>
    </nav>
    <div id="container-tabela">
            <form action="tp_list.php" method="post"> 
                <fieldset>
 
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Deixando os campos de entrada(abaixo) em branco, serão retornados todos os elementos do filtro selecionado.</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Início Seleção</span>
                            <input id="inicioTrecho" name="inicioTrecho" class="form-control" type="text" placeholder="Exemplo filtro km: 270">
                            </div>
                           
                        </div>           
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Final Seleção</span>
                            <input id="finalTrecho" name="finalTrecho" class="form-control" type="text" placeholder="210">
                            </div>
                        </div>           
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button id="filtrar" name="filtrar" value="filtrar" class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
          <hr>
        </div>
        
        <div id="container" style="padding:20px;" >
            <div class="alert alert-success col-sm-3" id="msg-desempenho" role="alert" style="text-align:center;">
            <?php echo "Acumulado: ".$this->fichasEditadas[0]; ?>
            </div>
            <div class="col-sm-1"></div>
            <div class="alert alert-warning col-sm-3" id="msg-desempenho" role="alert" style="text-align:center;">
            <?php echo "Fichas em Aberto: ".$this->fichasEmAberto[0]; ?>
            </div>
            <div class="col-sm-1"></div>

            <div class="alert alert-primary col-sm-3" id="msg-desempenho" role="alert" style="text-align:center;">
            <?php echo "Fichas Restantes: ".($this->totalFichas[0]-$this->fichasEditadas[0]); ?>
            </div>
            <div class="col-sm-12">
                <p><b>Deseja cadastrar uma nova ficha? <span><a href="insert_tp.php">Clique aqui!&nbsp;<img src="../../img/icons/add.png" width="20px;" /></a></b></span></p>
            </div>
            <table class="table table-responsive hover" id="tabela">
                <thead class="thead-dark">
                    <tr>
                        <th>Status</th>
                        <th>Cód. Ficha</th>
                        <th>identificação</th>
                        <th>Km</th>
                        <th>KmFinal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php  if($this->tableArray) foreach($this->tableArray as $dados) { ?>
                    <tr>
                        <?php    
                            if ($dados['edit']==1){
                                $ok = '<span><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else if ($dados['edit']==0 && $dados['edit']!=NULL){
                                $ok = '<span><img src="../../img/icons/exc.png" width="20px"/></span>';
                            }else {
                                $ok = '';
                            }
                         ?>
                        <td><?php echo $ok; ?></td>
                        <td style="text-align:center;"><?php echo $dados['codAuto']; ?></td>
                        <td><?php echo $dados['identificacao']; ?></td>
                        <td><?php echo $dados['km']; ?></td>
                        <td><?php echo $dados['km_final']; ?></td>
                        <td><a href="tp_edit.php?id=<?php echo $dados['codAuto']; ?>" class="btn btn-secondary "><b>Editar</b> &nbsp;<img src="../../img/icons/pencil.png" width="20px"/></a></td>
                    </tr>
                <?php 
                    }
                ?>
                </tbody>
            </table>
        <br><br>
        <td><a href="filter.php" class="btn btn-primary" style="float:right;"><span style="float:left;"><img src="../../img/icons/arrow.png" width="20px"/> </span>&nbsp; Voltar para Home</a></td>
        <br><br>
        </div>

<?php include('footer.tpl.php'); ?>