<?php include('header.tpl.php'); ?>
<body>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1">Filtrar Dados Terrapleno</span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item active" aria-current="page">Filtrar Dados</li>
    </ol>
    </nav>
    <div id="container-tabela">
            <form action="tp_list.php" method="post"> 
                <fieldset>
 
                    <div class="col-sm-12">
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
            <div class="col-sm-12">
            <label>Clique no botão abaixo ao final do dia para baixar todas as planilhas e envie-as para o escritório.</label>
            <a href="export.php" class="btn btn-primary btn-lg btn-block mb">Exportar todos os dados</a>
            </div>
        </div>
<?php include('footer.tpl.php'); ?>