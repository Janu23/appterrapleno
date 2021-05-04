<?php include('header.tpl.php'); ?>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1"><?php echo strtoupper ("Editar Ficha Terrapleno"); ?></span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="filter.php">Home</a></li>
         <li class="breadcrumb-item"><a href="tp_list.php">Planilha Terrapleno</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
    </nav>
    <div style="padding:20px;">
            <div class="card">
                <div class="card-header">
                    Cabeçalho de Informações (<b>Cód. Ficha:</b> <?php echo $this->arrayFicha['codAuto'];?>)
                </div>
                <div class="card-body">
                    <div class="col-sm-6">
                        <h5 class="card-title"><b>Identificação:</b> <?php echo $this->arrayFicha['identificacao'];?></h5>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="card-title" style="text-align:center;"><b>Nível de Risco:</b> <?php echo $this->arrayFicha['nivel_risco'];?></h4>
                    </div>
                </div>
            </div>  
        <br>
        <div class="card">
            <div class="card-header">
                Fotos <span><img src="../../img/icons/camera.png" width="30px"/></span>&nbsp;<b>(Total de fotos adicionadas:</b> <?php echo $this->count[0]; ?>)
                <?php
                        if (isset($this->arrayFicha['edit_fotos'])){
                            if ($this->arrayFicha['edit_fotos'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
            </div>
            <div class="card-body">
                <div class="col-sm-6">
                <form action="../controller/terraplenoController.php" enctype="multipart/form-data" method="post" id="infoFotos"> 
                    <fieldset>
                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                    <input type="hidden" name="identificacao" value="<?php echo $this->arrayFicha['identificacao']; ?>">
                    <label class=" control-label" for="foto">Adicione a foto:</label> 
                        <input id="foto" name="foto[]" type="file" accept="image/*" multiple>  
                </div>
                <div class="col-sm-6">
                <br>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Observações</span>
                            <textarea id="observacao" name="observacao" class="form-control" type="text" rows="1" maxlength="150"></textarea>
                        </div>
                    </div>           
                </div>
                <div class="col-sm-12" id="infoFotosButtons">
                    <div class="form-group"  style="float:right;">
                        <button id="salvarFotos" name="submit" value="salvarFotos" class="btn btn-success" type="submit">Salvar</button>
                        <button id="cancelarFotos" name="cancelarFotos" class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
                </fieldset>
                </form>
            </div>
        </div> 
        <br>

        <div class="card">
            <div class="card-header">Editar Croqui</div>
            <div class="card-body">
                <div class="col-sm-10">
                    <p>O Croqui pode ser editado quantas vezes quiser. Porém, somente a última edição permanecerá armazenada.</p>
                </div>
                <div class="col-sm-2">
                    <a href="edit_croqui.php?id=<?php echo $this->id; ?>" class="btn btn-primary" style="float:right;"><span style="float:left;"></span><b>Editar</b> &nbsp; <img src="../../img/icons/pencil.png" width="20px"/> </a>
                </div>
            </div>
        </div>
        
        <div class="card" hidden>
            <div class="card-header">Editar Croqui</div>
            <div class="card-body">
                <div class="col-sm-12">
                    <h5 class="card-title"></h5>
                </div>
                <div class="col-sm-12" style="padding:0px;">
                <canvas id="canvas" class="canvas" width="900px" height="400px" style = "background-size: 100% 100%;">
                    Seu browser não suporta canvas, é hora de trocar!.
                </canvas>
                </div>
                <div class="col-sm-12">
                    <button id="saveBtn" class="btn btn-success" type="button">Salvar</button>
                    <input type='text' id="togglePaletteOnly" />
                </div>
            </div>
        </div>  
        <br>
        <div class="panel-group" id="accordion">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10"><b>Resumo Geral</b></a>
                    </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-sm-4" style="border-right: 1px solid grey;">
                            <h5 class="card-title"><b>Vegetação:</b> <?php echo $this->arrayFicha['vegetacao'];?></h5>
                            <p class="card-text"><b>Presença d'água:</b> <?php echo $this->arrayFicha['presenca_agua'];?></p> 
                            <p class="card-text"><b>Ocorrências:</b> <?php echo $this->arrayFicha['ocorrencias'];?></p> 
                            <p class="card-text"><b>Causas Prováveis:</b> <?php echo $this->arrayFicha['causas_provaveis'];?></p> 
                        </div>
                        <div class="col-sm-4" style="border-right: 1px solid grey;">
                            <p class="card-text"><b>Contém Contenção:</b> <?php echo $this->arrayFicha['contem_contencao'];?></p> 
                            <p class="card-text"><b>Contém passivo Ambiental:</b> <?php echo $this->arrayFicha['contem_passivo_ambiental'];?></p> 
                            <p class="card-text"><b>Situação Passivo:</b> <?php echo $this->arrayFicha['situacao_passivo'];?></p> 
                            <p class="card-text"><b>Diretriz Recuperacação:</b> <?php echo $this->arrayFicha['diretriz_recuperacao'];?></p> 
                        </div>
                        <div class="col-sm-4">
                        <p class="card-text"><b>Comprimento:</b> <?php echo $this->arrayFicha['comprimento']." m";?></p> 
                        <p class="card-text"><b>Condição Drenagem Subterrânea:</b> <?php echo $this->arrayFicha['condicao_drenagem_subterranea'];?></p>
                        <p class="card-text"><b>Condição Drenagem Superficial:</b> <?php echo $this->arrayFicha['condicao_drenagem_superficial'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Informações Gerais</a> 
                    <?php
                        if (isset($this->arrayFicha['edit_info_geral'])){
                            if ($this->arrayFicha['edit_info_geral'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                    
                    <form action="../controller/terraplenoController.php" method="post" id="infoGeral"> 
                        <fieldset>
                                <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                <div class="col-sm-12">    
                                    <div class="form-group">
                                        <div class="input-group" style="text-align:right;">
                                            <label class="form-check-label" for="flexCheckDefault">Clique para editar os campos abaixo &nbsp;</label>
                                            <input class="form-check-input" type="checkbox" value="" id="checkboxInfoGeral" onclick="blockForm('checkboxInfoGeral','infoGeral');">     
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon"> Km</span>
                                        <input id="km" name="km" class="form-control" type="text" value="<?php echo $this->arrayFicha['km']; ?>" readonly required>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Km Final</span>
                                        <input id="kmFinal" name="kmFinal" class="form-control" type="text" value="<?php echo $this->arrayFicha['km_final'];?>" readonly required>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Rodovia</span>
                                        <input id="rodovia" name="rodovia" class="form-control" type="text" value="<?php echo $this->arrayFicha['rodovia']; ?>" readonly required>
                                        </div>
                                        
                                    </div>           
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Sentido</span>
                                        <input id="sentido" name="sentido" class="form-control" type="text" value="<?php echo $this->arrayFicha['sentido'];?>" readonly required>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Estado</span>
                                        <input id="estado" name="estado" class="form-control" type="text" value="<?php echo $this->arrayFicha['estado']; ?>" readonly required>
                                        </div>    
                                    </div>           
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Trecho</span>
                                        <input id="trecho" name="trecho" class="form-control" type="text" value="<?php echo $this->arrayFicha['trecho'];?>" readonly required>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Lado</span>
                                        <input id="lado" name="lado" class="form-control" type="text" value="<?php echo $this->arrayFicha['lado']; ?>" readonly required>
                                        </div>    
                                    </div>           
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Terrapleno/Contenção</span>
                                        <input id="terraplenoContencao" name="terraplenoContencao" class="form-control" type="text" value="<?php echo $this->arrayFicha['terrapleno_contencao']; ?>" readonly required>
                                        </div>    
                                    </div>           
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Distância Acostamento</span>
                                        <input id="distanciaAcostamento" name="distanciaAcostamento" class="form-control" type="text" value="<?php echo $this->arrayFicha['distancia_acostamento']; ?>" readonly required>
                                        </div>    
                                    </div>           
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Material Origem</span>
                                        <input id="materialOrigem" name="materialOrigem" class="form-control" type="text" value="<?php echo $this->arrayFicha['material_origem']; ?>" readonly required>
                                        </div>    
                                    </div>           
                                </div>
                                <div class="col-sm-12"><label>Coordenadas 1</label></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Latitude</span>
                                        <input id="latitude1" name="latitude1" class="form-control" type="text" value="<?php echo $this->arrayFicha['latitude1']; ?>" readonly required>
                                        </div>
                                        
                                    </div>           
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Longitude</span>
                                        <input id="longitude1" name="longitude1" class="form-control" type="text" value="<?php echo $this->arrayFicha['longitude1'];?>" readonly required>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-12"><label>Coordenadas 2</label></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Latitude</span>
                                        <input id="latitude2" name="latitude2" class="form-control" type="text" value="<?php echo $this->arrayFicha['latitude2']; ?>" readonly >
                                        </div>
                                        
                                    </div>           
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">Longitude</span>
                                        <input id="longitude2" name="longitude2" class="form-control" type="text" value="<?php echo $this->arrayFicha['longitude2'];?>" readonly>
                                        </div>
                                    </div>           
                                </div>
                                <div class="col-sm-12" id="infoGeralButtons" hidden>
                                    <div class="form-group"  style="float:right;">
                                        <button id="salvarInfoGeral" name="submit" value="salvarInfoGeral" class="btn btn-success" type="submit">Salvar</button>
                                        <button id="cancelarInfoGeral" name="cancelarInfoGeral" class="btn btn-danger" type="reset">Cancelar</button>
                                    </div>
                                </div>
                                </fieldset>
                          </form>
                    </div>
                </div>      
            </div><!--panel1-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Geometria</a>
                    <?php
                        if (isset($this->arrayFicha['edit_geometria'])){
                            if ($this->arrayFicha['edit_geometria'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoGeometria"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                    <div class="col-sm-12">    
                                        <div class="form-group">
                                            <div class="input-group" style="text-align:right;">
                                                <label class="form-check-label" for="flexCheckDefault">Clique para editar os campos abaixo &nbsp;</label>
                                                <input class="form-check-input" type="checkbox" value="" id="checkboxGeometria" onclick="blockForm('checkboxGeometria','infoGeometria');">     
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"> Banqueta</span>
                                                <input id="banqueta" name="banqueta" class="form-control" type="text" value="<?php echo $this->arrayFicha['banqueta']; ?>" readonly required>
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"> Altura</span>
                                                <input id="altura" name="altura" class="form-control" type="text" value="<?php echo $this->arrayFicha['altura']; ?>" readonly required>
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"> Inclinação</span>
                                                <input id="inclinacao" name="inclinacao" class="form-control" type="text" value="<?php echo $this->arrayFicha['inclinacao']; ?>" readonly required>
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon">Comprimento</span>
                                            <input id="comprimento" name="comprimento" class="form-control" type="text" value="<?php echo $this->arrayFicha['comprimento']; ?>" readonly required>
                                            </div>  
                                        </div>           
                                    </div>
                                    <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label>Geometria</label>
                                                    <select class="form-control select2" name="geometria" id="geometria" style="width: 100%;">
                                                    <?php echo '<option selected value="'.$this->arrayFicha['geometria'].'">'.$this->arrayFicha['geometria'].'</option>';?>
                                                        <option value="Curva Convexa">Curva Convexa</option>
                                                        <option value="Curva Côncava">Curva Côncava</option>
                                                        <option value="Reta">Reta</option>
                                                    </select>   
                                                </div>
                                            </div>           
                                        </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Tipo Terrapleno</label>
                                                <select class="form-control select2" name="tipoTerrapleno" id="tipoTerrapleno" style="width: 100%;">
                                                <?php echo '<option selected value="'.$this->arrayFicha['tipo_terrapleno'].'">'.$this->arrayFicha['tipo_terrapleno'].'</option>';?>
                                                    <option value="Aterro">Aterro</option>
                                                    <option value="Caixa de Empréstimo">Caixa de Empréstimo</option>
                                                    <option value="Corte">Corte</option>
                                                </select>   
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label>Tipo Relevo</label>
                                                <select class="form-control select2" name="tipoRelevo" id="tipoRelevo" style="width: 100%;">
                                                <?php echo '<option selected value="'.$this->arrayFicha['tipo_relevo'].'">'.$this->arrayFicha['tipo_relevo'].'</option>';?>
                                                    <option value="Nivelado">Nivelado</option>
                                                    <option value="Ondulado">Ondulado</option>
                                                    <option value="Suave">Suave</option>
                                                </select>  
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label>Localização Dispositivo</label>
                                                    <select class="form-control select2" name="localizacaoDispositivo" id="localizacaoDispositivo" style="width: 100%;">
                                                    <?php echo '<option selected value="'.$this->arrayFicha['localizacao_dispositivo'].'">'.$this->arrayFicha['localizacao_dispositivo'].'</option>';?>
                                                        <option value="Acesso">Acesso</option>
                                                        <option value="Marginal">Marginal</option>
                                                        <option value="Tronco">Tronco</option>
                                                    </select>   
                                                </div>
                                            </div>           
                                        </div>
                                    <div class="col-sm-12" id="infoGeometriaButtons">
                                        <div class="form-group"  style="float:right;">
                                            <button id="salvarGeometria" name="submit" value="salvarGeometria" class="btn btn-success" type="submit">Salvar</button>
                                            <button id="cancelarGeometria" name="cancelarGeometria" class="btn btn-danger" type="reset">Cancelar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel2-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Vegetação</a>
                    <?php
                        if (isset($this->arrayFicha['edit_vegetacao'])){
                            if ($this->arrayFicha['edit_vegetacao'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoVegetacao"> 
                                <fieldset>   
                                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                    <div class="col-sm-12">
                                        <p><b>Tipo Vegetação:</b></p>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="form-check-label" for="flexCheckDefault">Arbórea &nbsp;</label>
                                                <input class="form-check-input" type="checkbox" value="Arbórea" name="arborea" id="arborea" onclick="checkExclusivo('arborea','nenhuma')" <?php  echo ($this->arrayFicha['arborea'] == "S") ? 'checked' : '';?>>     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="form-check-label" for="flexCheckDefault">Arbustiva &nbsp;</label>
                                                <input class="form-check-input" type="checkbox" value="Arbustiva" name="arbustiva" id="arbustiva" onclick="checkExclusivo('arbustiva','nenhuma')" <?php  echo ($this->arrayFicha['arbustiva'] == "S") ? 'checked' : '';?>>     
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="form-check-label" for="flexCheckDefault">Rasteira &nbsp;</label>
                                                <input class="form-check-input" type="checkbox" value="Rasteira" name="rasteira" id="rasteira" onclick="checkExclusivo('rasteira','nenhuma')" <?php  echo ($this->arrayFicha['rasteira'] == "S") ? 'checked' : '';?>>     
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="form-check-label" for="flexCheckDefault">Nenhuma &nbsp;</label>
                                                <input class="form-check-input" type="checkbox" value="Nenhuma" name="nenhuma" id="nenhuma" onclick="checkExclusivo('nenhuma', 'rasteira');checkExclusivo('nenhuma', 'arbustiva');checkExclusivo('nenhuma', 'arborea');" <?php  echo ($this->arrayFicha['nenhuma'] == "S") ? 'checked' : '';?>>     
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"> Vegetação</span>
                                                <input id="vegetacao" name="vegetacao" class="form-control" type="text" value="<?php echo $this->arrayFicha['vegetacao']; ?>" readonly required>
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="col-sm-12">
                                        <p><b>Densidade Vegetação:</b></p>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label for="alta">Alta &nbsp;</label>
                                            <input type="radio" id="alta" name="densidadeVegetacao" value="Alta" <?php  echo ($this->arrayFicha['densidade_vegetacao'] == "Alta") ? 'checked' : '';?>>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label for="esparsa">Esparsa &nbsp;</label>
                                            <input type="radio" id="esparsa" name="densidadeVegetacao" value="Esparsa" <?php  echo ($this->arrayFicha['densidade_vegetacao'] == "Esparsa") ? 'checked' : '';?>>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label for="media">Média &nbsp;</label>
                                            <input type="radio" id="media" name="densidadeVegetacao" value="Média" <?php  echo ($this->arrayFicha['densidade_vegetacao'] == "Média" || $this->arrayFicha['densidade_vegetacao'] == "Media") ? 'checked' : '';?>>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">    
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label for="nenhuma">Nenhuma &nbsp;</label>
                                            <input type="radio" id="nenhuma" name="densidadeVegetacao" value="Nenhuma" <?php  echo ($this->arrayFicha['densidade_vegetacao'] == "Nenhuma") ? 'checked' : '';?>>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="infoVegetacaoButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarVegetacao" name="submit" value="salvarVegetacao" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarVegetacao" name="cancelarVegetacao" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel3-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Drenagem</a>
                    <?php
                        if (isset($this->arrayFicha['edit_drenagem'])){
                            if ($this->arrayFicha['edit_drenagem'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoDrenagem"> 
                                <fieldset>
                                         <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                        <div class="col-sm-12">
                                            <p><b>Drenagem Superficial:</b></p>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Natural &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Natural" name="naturalSuperficial" id="naturalSuperficial" <?php  echo (stripos($this->arrayFicha['drenagem_superficial'],"Natural")> -1) ? 'checked' : '';?>>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Construída &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Construída" name="construidaSuperficial" id="construidaSuperficial" <?php  echo (stripos($this->arrayFicha['drenagem_superficial'],"Construída")> -1) ? 'checked' : '';?>>     
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <p><b>Condição Drenagem Superficial:</b></p>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Danificada &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Danificada" name="danificadaSuperficial" id="danificadaSuperficial" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_superficial'],"Danificada")> -1) ? 'checked' : '';?>>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Insuficiente &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Insuficiente" name="insuficienteSuperficial" id="insuficienteSuperficial" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_superficial'],"Insuficiente")> -1) ? 'checked' : '';?>>     
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Obstruída &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Obstruída" name="obstruidaSuperficial" id="obstruidaSuperficial" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_superficial'],"Obstruída")> -1) ? 'checked' : '';?>>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Satisfatória &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Satisfatória" name="satisfatoriaSuperficial" id="satisfatoriaSuperficial" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_superficial'],"Satisfatória")> -1) ? 'checked' : '';?>>     
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">    
                                        <hr>
                                            <div class="form-group">
                                            <label class="form-check-label" for="flexCheckDefault" style="">Local Drenagem Superficial 1 &nbsp;</label>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Banqueta" name="localDreSuper1"  <?php  echo ($this->arrayFicha['local_dre_super1'] == "Banqueta") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Banqueta &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Crista" name="localDreSuper1"  <?php  echo ($this->arrayFicha['local_dre_super1'] == "Crista") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Crista &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Pé de Corte" name="localDreSuper1"  <?php  echo ($this->arrayFicha['local_dre_super1'] == "Pé de Corte") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Pé de Corte &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Inexistente" name="localDreSuper1"  <?php  echo ($this->arrayFicha['local_dre_super1'] == "Inexistente"  ||$this->arrayFicha['local_dre_super1'] == "" ) ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Inexistente &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"> 
                                        <hr>   
                                            <div class="form-group">
                                            <label class="form-check-label" for="flexCheckDefault" style="">Local Drenagem Superficial 2 &nbsp;</label>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Banqueta" name="localDreSuper2"  <?php  echo ($this->arrayFicha['local_dre_super2'] == "Banqueta") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Banqueta &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Crista" name="localDreSuper2"  <?php  echo ($this->arrayFicha['local_dre_super2'] == "Crista") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Crista &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Pé de Corte" name="localDreSuper2" <?php  echo ($this->arrayFicha['local_dre_super2'] == "Pé de Corte") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Pé de Corte &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Inexistente" name="localDreSuper2"  <?php  echo ($this->arrayFicha['local_dre_super2'] == "Inexistente"  ||$this->arrayFicha['local_dre_super2'] == "" ) ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Inexistente &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"> 
                                        <hr>   
                                            <div class="form-group">
                                            <label class="form-check-label" for="flexCheckDefault" style="">Local Drenagem Superficial 3 &nbsp;</label>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Banqueta" name="localDreSuper3"  <?php  echo ($this->arrayFicha['local_dre_super3'] == "Banqueta") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Banqueta &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Crista" name="localDreSuper3"  <?php  echo ($this->arrayFicha['local_dre_super3'] == "Crista") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Crista &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Pé de Corte" name="localDreSuper3"  <?php  echo ($this->arrayFicha['local_dre_super3'] == "Pé de Corte") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Pé de Corte &nbsp;</label>
                                                </div>
                                                <div class="input-group">
                                                    <input class="form-check-input" type="radio" value="Inexistente" name="localDreSuper3"  <?php  echo ($this->arrayFicha['local_dre_super3'] == "Inexistente" ||$this->arrayFicha['local_dre_super3'] == "" ) ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Inexistente &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <hr>
                                            <p><b>Drenagem Subterrânea:</b></p>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                <label for="sim">Sim &nbsp;</label>
                                                <input type="radio" id="drenagemSubterraneaExiste" name="drenagemSubterranea" value="Existente" onclick="drenagemSub();" <?php  echo ($this->arrayFicha['drenagem_subterranea'] == "Existente") ? 'checked' : '';?>>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                <label for="esparsa">Não &nbsp;</label>
                                                <input type="radio" id="drenagemSubterraneaInexiste" name="drenagemSubterranea" value="Inexistente" onclick="drenagemSub();" <?php  echo ($this->arrayFicha['drenagem_subterranea'] == "Inexistente") ? 'checked' : '';?>>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="tituloSubterraneaDiv" hidden>
                                            <p><b>Condição Drenagem Subterrânea:</b></p>
                                        </div>
                                        <div class="col-sm-3" id="danificadaSubterraneaDiv" hidden>    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Danificada &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Danificada" name="danificadaSubterranea" id="danificadaSubterranea" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_subterranea'],"Danificada")> -1) ? 'checked' : '';?>>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" id="insuficienteSubterraneaDiv" hidden>    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Insuficiente &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Insuficiente" name="insuficienteSubterranea" id="insuficienteSubterranea" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_subterranea'],"Insuficiente")> -1) ? 'checked' : '';?>>     
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" id="obstruidaSubterraneaDiv" hidden>    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Obstruída &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Obstruída" name="obstruidaSubterranea" id="obstruidaSubterranea" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_subterranea'],"Obstruída")> -1) ? 'checked' : '';?>>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" id="satisfatoriaSubterraneaDiv" hidden>    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="form-check-label" for="flexCheckDefault">Satisfatória &nbsp;</label>
                                                    <input class="form-check-input" type="checkbox" value="Satisfatória" name="satisfatoriaSubterranea" id="satisfatoriaSubterranea" <?php  echo (strpos($this->arrayFicha['condicao_drenagem_subterranea'],"Satisfatória")> -1) ? 'checked' : '';?>>     
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="tipoDiv" hidden>
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"> Tipo</span>
                                                    <input id="tipo" name="tipo" class="form-control" type="text" value="<?php echo $this->arrayFicha['tipo']; ?>">
                                                </div>
                                            </div>           
                                        </div>
                                    
                                    
                                        <div class="col-sm-12" id="infoDrenagemButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarDrenagem" name="submit" value="salvarDrenagem" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarDrenagem" name="cancelarDrenagem" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel5-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Ocorrências</a>
                    <?php
                        if (isset($this->arrayFicha['edit_ocorrencias'])){
                            if ($this->arrayFicha['edit_ocorrencias'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoOcorrencias"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                    <input type="hidden" name="avaliacaoAtual" value="<?php echo $this->arrayFicha['avaliacao_atual']; ?>">
                                    <input type="hidden" name="kmPatologiaAtual" value="<?php echo $this->arrayFicha['km_patologia_atual']; ?>">
                                    <input type="hidden" name="dimensoesAtual" value="<?php echo $this->arrayFicha['dimensoes_atual']; ?>">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <label>Presença de Água</label>
                                                <select class="form-control select2" name="presencaAgua" id="presencaAgua" style="width: 100%;">
                                                <?php echo '<option selected value="'.$this->arrayFicha['presenca_agua'].'">'.$this->arrayFicha['presenca_agua'].'</option>';?>
                                                    <option value="Áreas Saturadas">Áreas Saturadas</option>
                                                    <option value="Corpo Hídrico Próximo">Corpo Hídrico Próximo</option>
                                                    <option value="Influência de Corpo Hídrico">Influência de Corpo Hídrico</option>
                                                    <option value="Não há Água">Não há Água</option>
                                                    <option value="Surgências Localizadas">Surgências Localizadas</option>
                                                    <option value="Travessia de Talvegue">Travessia de Talvegue</option>
                                                    <option value="Úmido">Úmido</option>
                                                </select>  
                                            </div>
                                        </div>           
                                    </div>
                                        <div class="col-sm-12">
                                        <hr>
                                        </div>
                                        <div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                <label>Tipo de Ocorrência<small style="color:red;"> (Adicione quantas vezes for necessário)</small></label>
                                                    <select class="form-control select2" name="tipoDeOcorrencia" id="tipoDeOcorrencia" style="width: 100%;" onchange="ocorrencia();">
                                                        <option value="abatimento_de_pista_no_acostamento">Abatimento de Pista no Acostamento</option>
                                                        <option value="abatimento_do_talude">Abatimento do Talude</option>
                                                        <option value="arvores_com_risco_de_queda">Árvores Com Risco de Queda</option>
                                                        <option value="blocos_instaveis">Blocos Instáveis</option>
                                                        <option value="desagregacao_superficial">Desagregação Superficial</option>
                                                        <option value="descalcamento_na_base">Descalçamento da Base</option>
                                                        <option value="escorregamento">Escorregamento</option>
                                                        <option value="erosao_diferenciada">Erosão Diferenciada</option>
                                                        <option value="erosao_laminar">Erosão Laminar </option>
                                                        <option value="erosao_em_sulcos">Erosão em Sulcos</option>
                                                        <option value="erosao_em_ravina">Erosão em Ravina</option>
                                                        <option value="erosao_em_vocoroca">Erosão em Voçoroca</option>
                                                        <option value="nenhuma">Nenhuma</option>
                                                        <option value="check_outro_tipo_ocorrencia">Outro Tipo de Ocorrência</option>
                                                        <option value="queimadas">Queimadas</option>
                                                        <option value="queda_de_bloco">Queda de Bloco</option>
                                                        <option value="rastejo">Rastejo</option>
                                                        <option value="rolamento_de_bloco">Rolamento de Bloco</option>
                                                        <option value="solo_exposto">Solo Exposto</option>
                                                        <option value="trincas_no_acostamento">Trincas no Acostamento</option>
                                                    </select>  
                                                </div>
                                            </div>           
                                        </div>
                                
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label> Dimensão (m) <small style="color:red;">*</small></label>
                                                    <input id="dimensao" name="dimensao" class="form-control" type="text" placeholder="5,25m ou 5mX4mX2,5m" required>
                                                </div>
                                            </div>           
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label> Localização (km) <small style="color:red;">*</small></label>
                                                    <input id="localizacao" name="localizacao" class="form-control" type="text"  placeholder="Km 000+450 ao Km 000+556" required>
                                                </div>
                                            </div>           
                                        </div>
                                        <div class="col-sm-12" id="outroTipoDeOcorrenciaDiv" hidden>
                                            <br>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <label>Descreva <u>aqui</u> o outro tipo de ocorrência:</label>
                                                        <textarea id="outroTipoDeOcorrencia" name="outroTipoDeOcorrencia" class="form-control" type="text" rows="2" maxlength="150"><?php echo $this->arrayFicha['outro_tipo_ocorrencia']; ?></textarea>
                                                    </div>
                                                </div>           
                                            </div>
                                        <br>
                                    </div><!--Fim bloco tipo ocorrência-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Avaliações Anteriores</label>
                                                <p><?php echo $this->arrayFicha['km_da_patologia']; ?></p>
                                            </div>
                                        </div>           
                                    </div>        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Avaliações Atuais</label>
                                                <p><?php echo str_replace(".","</br>",$this->arrayFicha['avaliacao_atual']); ?></p>
                                            </div>
                                        </div>           
                                    </div>
                                        
                                        <div class="col-sm-12" id="infoOcorrenciasButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarOcorrencias" name="submit" value="salvarOcorrencias" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarOcorrencias" name="cancelarOcorrencias" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel5-->
            <!--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Causas Prováveis</a>
                    <?php
                        /*if (isset($this->arrayFicha['edit_causas_provaveis'])){
                            if ($this->arrayFicha['edit_causas_provaveis'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }*/
                    ?>
                    </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoCausasProvaveis"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php //echo $this->id; ?>">
                                    <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Inclinação Acentuada" name="inclinacaoAcentuada" id="inclinacaoAcentuada" <?php  //echo ($this->arrayFicha['inclinacao_acentuada'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Inclinação Acentuada &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Deficiência Superficial" name="deficienciaSuperficial" id="deficienciaSuperficial" <?php  //echo ($this->arrayFicha['deficiencia_superficial'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Deficiência Superficial &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Tipo Solo" name="tipoSolo" id="tipoSolo" <?php  //echo ($this->arrayFicha['tipo_solo'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Tipo Solo &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Ausência Superficial" name="ausenciaSuperficial" id="ausenciaSuperficial" <?php  //echo ($this->arrayFicha['ausencia_superficial'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Ausência Superficial &nbsp;</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Secagem Umedecimento de Solo" name="secagemUmedecimentoDeSolo" id="secagemUmedecimentoDeSolo" <?php  //echo ($this->arrayFicha['secagem_umedecimento_de_solo'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Secagem Umedecimento de Solo &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Deficiência na Fundação" name="deficienciaNaFundacao" id="deficienciaNaFundacao" <?php  //echo ($this->arrayFicha['deficiencia_na_fundacao'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Deficiência na Fundação &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Deficiência da Proteção Superficial" name="deficienciaDaProtecaoSuperficial" id="deficienciaDaProtecaoSuperficial" <?php  //echo ($this->arrayFicha['deficiencia_da_protecao_superficial'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Deficiência da Proteção Superficial &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Compactação Inadequada" name="compactacaoInadequada" id="compactacaoInadequada" <?php  //echo ($this->arrayFicha['compactacao_inadequada'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Compactação Inadequada &nbsp;</label>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Descontinuidade do Maciço" name="descontinuidadeDoMacico" id="descontinuidadeDoMacico" <?php  //echo ($this->arrayFicha['descontinuidade_do_macico'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Descontinuidade do Maciço &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Saturação do Solo" name="saturacaoDoSolo" id="saturacaoDoSolo" <?php  //echo ($this->arrayFicha['saturacao_do_solo'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Saturação do Solo &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Ação de Terceiros" name="acaoDeTerceiros" id="acaoDeTerceiros" <?php  //echo ($this->arrayFicha['acao_de_terceiro'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Ação de Terceiros &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Descompactação de Raízes" name="descompactacaoDeRaizes" id="descompactacaoDeRaizes" <?php  //echo ($this->arrayFicha['descompactacao_de_raizes'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Descompactação de Raízes &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Má Conformação do Talude" name="maConformacaoDoTalude" id="maConformacaoDoTalude" <?php  //echo ($this->arrayFicha['ma_conformacao_do_talude'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Má Conformação do Talude &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Evolução de Erosão" name="evolucaoDeErosao" id="evolucaoDeErosao" <?php  //echo ($this->arrayFicha['evolucao_erosao'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Evolução de Erosão &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Estiagem" name="estiagem" id="estiagem" <?php  //echo ($this->arrayFicha['estiagem'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Estiagem &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Outras Causas Prováveis" name="checkOutrasCausasProvaveis" id="checkOutrasCausasProvaveis" onclick="dinamicInputForm('checkOutrasCausasProvaveis','outrasCausasProvaveisDiv');" <?php  echo ($this->arrayFicha['check_outras_causas_provaveis'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Outras Causas Prováveis &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="outrasCausasProvaveisDiv" hidden>
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Outras Causas Prováveis</span>
                                                    <textarea id="outrasCausasProvaveis" name="outrasCausasProvaveis" class="form-control" type="text" rows="3" maxlength="150"><?php //echo $this->arrayFicha['outras_causas_provaveis']; ?></textarea>
                                                </div>
                                            </div>           
                                        </div>
                                        <div class="col-sm-12" id="infoCausasProvaveisButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarCausasProvaveis" name="submit" value="salvarCausasProvaveis" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarCausasProvaveis" name="cancelarCausasProvaveis" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Soluções Prováveis</a>
                    <?php
                        /*if (isset($this->arrayFicha['edit_solucoes_provaveis'])){
                            if ($this->arrayFicha['edit_solucoes_provaveis'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }*/
                    ?>
                    </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoSolucoesProvaveis"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php //echo $this->id; ?>">
                                    <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Recuperação de Cobertura Vegetal" name="recuperacaoDeCoberturaVegetal" id="recuperacaoDeCoberturaVegetal" <?php  echo ($this->arrayFicha['recuperacao_de_cobertura_vegetal'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Recuperação de Cobertura Vegetal &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Retaludamento" name="retaludamento" id="retaludamento" <?php  echo ($this->arrayFicha['retaludamento'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Retaludamento &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Remoção de Massa Instavel" name="remocaoDeMassaInstavel" id="remocaoDeMassaInstavel" <?php  echo ($this->arrayFicha['remocao_de_massa_instavel'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Remoção de Massa Instavel &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Implantação de Drenagem" name="implantacaoDeDrenagem" id="implantacaoDeDrenagem" <?php  echo ($this->arrayFicha['implantacao_de_drenagem'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Implantação de Drenagem &nbsp;</label>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Implantação de Contenção" name="implantacaoDeContencao" id="implantacaoDeContencao" <?php  echo ($this->arrayFicha['implantacao_de_contencao'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Implantação de Contenção &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Recuperacação de Plataforma" name="recuperacaoDePlataforma" id="recuperacaoDePlataforma" <?php  echo ($this->arrayFicha['recuperacao_de_plataforma'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Recuperacação de Plataforma &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Outra Intervenção Necessária" name="outraIntervencaoNecessaria" id="outraIntervencaoNecessaria" onclick="dinamicInputForm('outraIntervencaoNecessaria','outraIntervencaoNecessariaDiv');" <?php  echo ($this->arrayFicha['outras_intervencoes_necessarias'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Outra Intervenção Necessária &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Caso Ruptura" name="casoRuptura" id="casoRuptura" onclick="dinamicInputForm('casoRuptura','casoRupturaDiv');" <?php  echo ($this->arrayFicha['caso_ruptura'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Caso Ruptura &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="outraIntervencaoNecessariaDiv" hidden>
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Descrição Outras Intervenções Necessárias</span>
                                                    <textarea id="descricaoOutrasIntervencoesNecessarias" name="descricaoOutrasIntervencoesNecessarias" class="form-control" type="text" rows="3" maxlength="150"><?php echo $this->arrayFicha['descricao_outras_intervencoes_necessarias']; ?></textarea>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-sm-12" id="casoRupturaDiv" hidden>
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Descrição Caso Ruptura</span>
                                                    <textarea id="descricaoCasoRuptura" name="descricaoCasoRuptura" class="form-control" type="text" rows="3" maxlength="150"><?php echo $this->arrayFicha['descricao_caso_ruptura']; ?></textarea>
                                                </div>
                                            </div>    
                                        </div>                                        
                                        <div class="col-sm-12">
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Observações</span>
                                                    <textarea id="observacoesFicha" name="observacoesFicha" class="form-control" type="text" rows="3" maxlength="150"><?php echo $this->arrayFicha['observacoes_ficha']; ?></textarea>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-sm-12" id="infoSolucoesProvaveisButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarSolucoesProvaveis" name="submit" value="salvarSolucoesProvaveis" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarSolucoesProvaveis" name="cancelarSolucoesProvaveis" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Outros</a>
                    <?php
                        if (isset($this->arrayFicha['edit_outros'])){
                            if ($this->arrayFicha['edit_outros'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoOutros"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                    <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Superfície Ruptura" name="superficieRuptura" id="superficieRuptura" <?php  echo ($this->arrayFicha['superficie_ruptura'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Superfície Ruptura &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Contém Passivo Ambiental" name="contemPassivoAmbiental" id="contemPassivoAmbiental" onclick="dinamicInputForm('contemPassivoAmbiental','passivoAmbientalDiv');" <?php  echo ($this->arrayFicha['contem_passivo_ambiental'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Contém Passivo Ambiental &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="passivoAmbientalDiv" hidden>
                                        <br>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Descrição Passivo Ambiental</span>
                                                    <textarea id="passivoAmbiental" name="passivoAmbiental" class="form-control" type="text" rows="2" maxlength="150"><?php echo $this->arrayFicha['passivo_ambiental']; ?></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        <div class="col-sm-12" id="infoOutrosButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarOutros" name="submit" value="salvarOutros" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarOutros" name="cancelarOutros" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel8-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Estrutura de Contenção</a>
                    <?php
                        if (isset($this->arrayFicha['edit_estrutura_de_contencao'])){
                            if ($this->arrayFicha['edit_estrutura_de_contencao'] == 1){
                                echo '<span style="float:right;"><img src="../../img/icons/ok.png" width="20px"/></span>';
                            }else {
                                echo '<span style="float:right;"><img src="../../img/icons/error.png" width="20px"/></span>';
                            }
                        }
                    ?>
                    </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <form action="../controller/terraplenoController.php" method="post" id="infoEstruturaDeContencao"> 
                                <fieldset>
                                    <input type="hidden" name="id" value="<?php echo $this->id; ?>">
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Foto Inacessível Cima" name="fotoInacessivelCima" id="fotoInacessivelCima" <?php  echo ($this->arrayFicha['foto_inacessivel_cima'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Foto Inacessível Cima &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Obra" name="obra" id="obra" <?php  echo ($this->arrayFicha['obra'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Obra &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Encosta" name="encosta" id="encosta" <?php  echo ($this->arrayFicha['encosta'] == "S") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Encosta &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">    
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input class="form-check-input" type="checkbox" value="Contém Contenção" name="contemContencao" id="contemContencao" onclick="dinamicInputForm('contemContencao','bloco1');" <?php  echo ($this->arrayFicha['contem_contencao'] == "Sim") ? 'checked' : '';?>>     
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-left:20px;">Contém Contenção &nbsp;</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="bloco1" hidden>
                                            <br><hr>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Tipo Contenção 1</label>
                                                        <select class="form-control select2" name="tipoContencao1" id="tipoContencao1" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['tipo_contencao1'].'">'.$this->arrayFicha['tipo_contencao1'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Bioengenharia">Bioengenharia</option>
                                                            <option value="Concreto Projetado">Concreto Projetado</option>
                                                            <option value="Enrocamento de Pedra">Enrocamento de Pedra</option>
                                                            <option value="Enrocamento de Pedra Argamassada">Enrocamento de Pedra Argamassada</option>
                                                            <option value="Muro de Alvenaria">Muro de Alvenaria</option>
                                                            <option value="Muro de Concreto">Muro de Concreto</option>
                                                            <option value="Muro de Gabião">Muro de Gabião</option>
                                                            <option value="Sacaria de Solo Cimento">Sacaria de Solo Cimento</option>
                                                            <option value="Terra Armada">Terra Armada</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                            <br>    
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Extensão da Estrutura de Contenção</span>
                                                    <input id="extensaoEstruturaContencao1" name="extensaoEstruturaContencao1" class="form-control" type="text" value="<?php echo $this->arrayFicha['extensao_estrutura_contencao1']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Altura da Estrutura de Contenção</span>
                                                    <input id="alturaEstruturaContencao1" name="alturaEstruturaContencao1" class="form-control" type="text" value="<?php echo $this->arrayFicha['altura_estrutura_contencao1']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Ancoragens 1</label>
                                                        <select class="form-control select2" name="ancoragens1" id="ancoragens1" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['ancoragens1'].'">'.$this->arrayFicha['ancoragens1'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Cabeça Danificada">Cabeça Danificada</option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Sem Ancoragem">Sem Ancoragem</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Elementos Concreto/Aço 1</label>
                                                        <select class="form-control select2" name="elementosConcretoAco1" id="elementosConcretoAco1" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['elementos_concreto_aco1'].'">'.$this->arrayFicha['elementos_concreto_aco1'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Deformação">Deformação</option>
                                                            <option value="Não se aplica">Não se Aplica</option>
                                                            <option value="Trinca">Trinca</option>
                                                        </select>   
                                                    </div>
                                                </div> 
                                                <br><hr>         
                                            </div>
                                            <!--2-->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Tipo Contenção 2</label>
                                                        <select class="form-control select2" name="tipoContencao2" id="tipoContencao2" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['tipo_contencao2'].'">'.$this->arrayFicha['tipo_contencao2'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Bioengenharia">Bioengenharia</option>
                                                            <option value="Concreto Projetado">Concreto Projetado</option>
                                                            <option value="Enrocamento de Pedra">Enrocamento de Pedra</option>
                                                            <option value="Enrocamento de Pedra Argamassada">Enrocamento de Pedra Argamassada</option>
                                                            <option value="Muro de Alvenaria">Muro de Alvenaria</option>
                                                            <option value="Muro de Concreto">Muro de Concreto</option>
                                                            <option value="Muro de Gabião">Muro de Gabião</option>
                                                            <option value="Sacaria de Solo Cimento">Sacaria de Solo Cimento</option>
                                                            <option value="Terra Armada">Terra Armada</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                            <br>    
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Extensão da Estrutura de Contenção</span>
                                                    <input id="extensaoEstruturaContencao2" name="extensaoEstruturaContencao2" class="form-control" type="text" value="<?php echo $this->arrayFicha['extensao_estrutura_contencao2']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Altura da Estrutura de Contenção</span>
                                                    <input id="alturaEstruturaContencao2" name="alturaEstruturaContencao2" class="form-control" type="text" value="<?php echo $this->arrayFicha['altura_estrutura_contencao2']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Ancoragens 2</label>
                                                        <select class="form-control select2" name="ancoragens2" id="ancoragens2" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['ancoragens2'].'">'.$this->arrayFicha['ancoragens2'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Cabeça Danificada">Cabeça Danificada</option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Sem Ancoragem">Sem Ancoragem</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Elementos Concreto/Aço 2</label>
                                                        <select class="form-control select2" name="elementosConcretoAco2" id="elementosConcretoAco2" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['elementos_concreto_aco2'].'">'.$this->arrayFicha['elementos_concreto_aco2'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Deformação">Deformação</option>
                                                            <option value="Não se aplica">Não se Aplica</option>
                                                            <option value="Trinca">Trinca</option>
                                                        </select>   
                                                    </div>
                                                </div>  
                                                <br><hr>         
                                            </div>
                                            <!--3-->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Tipo Contenção 3</label>
                                                        <select class="form-control select2" name="tipoContencao3" id="tipoContencao3" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['tipo_contencao3'].'">'.$this->arrayFicha['tipo_contencao3'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Bioengenharia">Bioengenharia</option>
                                                            <option value="Concreto Projetado">Concreto Projetado</option>
                                                            <option value="Enrocamento de Pedra">Enrocamento de Pedra</option>
                                                            <option value="Enrocamento de Pedra Argamassada">Enrocamento de Pedra Argamassada</option>
                                                            <option value="Muro de Alvenaria">Muro de Alvenaria</option>
                                                            <option value="Muro de Concreto">Muro de Concreto</option>
                                                            <option value="Muro de Gabião">Muro de Gabião</option>
                                                            <option value="Sacaria de Solo Cimento">Sacaria de Solo Cimento</option>
                                                            <option value="Terra Armada">Terra Armada</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                            <br>    
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Extensão da Estrutura de Contenção</span>
                                                    <input id="extensaoEstruturaContencao3" name="extensaoEstruturaContencao3" class="form-control" type="text" value="<?php echo $this->arrayFicha['extensao_estrutura_contencao3']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Altura da Estrutura de Contenção</span>
                                                    <input id="alturaEstruturaContencao3" name="alturaEstruturaContencao3" class="form-control" type="text" value="<?php echo $this->arrayFicha['altura_estrutura_contencao3']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Ancoragens 3</label>
                                                        <select class="form-control select2" name="ancoragens3" id="ancoragens3" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['ancoragens3'].'">'.$this->arrayFicha['ancoragens3'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Cabeça Danificada">Cabeça Danificada</option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Sem Ancoragem">Sem Ancoragem</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Elementos Concreto/Aço 3</label>
                                                        <select class="form-control select2" name="elementosConcretoAco3" id="elementosConcretoAco3" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['elementos_concreto_aco3'].'">'.$this->arrayFicha['elementos_concreto_aco3'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Deformação">Deformação</option>
                                                            <option value="Não se aplica">Não se Aplica</option>
                                                            <option value="Trinca">Trinca</option>
                                                        </select>   
                                                    </div>
                                                </div>    
                                                <br><hr>         
                                            </div>
                                            <!--4-->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Tipo Contenção 4</label>
                                                        <select class="form-control select2" name="tipoContencao4" id="tipoContencao4" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['tipo_contencao4'].'">'.$this->arrayFicha['tipo_contencao4'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Bioengenharia">Bioengenharia</option>
                                                            <option value="Concreto Projetado">Concreto Projetado</option>
                                                            <option value="Enrocamento de Pedra">Enrocamento de Pedra</option>
                                                            <option value="Enrocamento de Pedra Argamassada">Enrocamento de Pedra Argamassada</option>
                                                            <option value="Muro de Alvenaria">Muro de Alvenaria</option>
                                                            <option value="Muro de Concreto">Muro de Concreto</option>
                                                            <option value="Muro de Gabião">Muro de Gabião</option>
                                                            <option value="Sacaria de Solo Cimento">Sacaria de Solo Cimento</option>
                                                            <option value="Terra Armada">Terra Armada</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                            <br>    
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Extensão da Estrutura de Contenção</span>
                                                    <input id="extensaoEstruturaContencao4" name="extensaoEstruturaContencao4" class="form-control" type="text" value="<?php echo $this->arrayFicha['extensao_estrutura_contencao4']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Altura da Estrutura de Contenção</span>
                                                    <input id="alturaEstruturaContencao4" name="alturaEstruturaContencao4" class="form-control" type="text" value="<?php echo $this->arrayFicha['altura_estrutura_contencao4']; ?>">
                                                    </div>  
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Ancoragens 4</label>
                                                        <select class="form-control select2" name="ancoragens4" id="ancoragens4" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['ancoragens4'].'">'.$this->arrayFicha['ancoragens4'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Cabeça Danificada">Cabeça Danificada</option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Sem Ancoragem">Sem Ancoragem</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label>Elementos Concreto/Aço 4</label>
                                                        <select class="form-control select2" name="elementosConcretoAco4" id="elementosConcretoAco4" style="width: 100%;">
                                                        <?php echo '<option selected value="'.$this->arrayFicha['elementos_concreto_aco4'].'">'.$this->arrayFicha['elementos_concreto_aco4'].'</option>';?>
                                                            <option value=" "></option>
                                                            <option value="Condições Normais">Condições Normais</option>
                                                            <option value="Deformação">Deformação</option>
                                                            <option value="Não se aplica">Não se Aplica</option>
                                                            <option value="Trinca">Trinca</option>
                                                        </select>   
                                                    </div>
                                                </div>           
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-12">
                                            <hr>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Situação Passivo</span>
                                                        <textarea id="situacaoPassivo" name="situacaoPassivo" class="form-control" type="text" rows="2" maxlength="150"><?php echo $this->arrayFicha['situacao_passivo']; ?></textarea>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Diretriz de Recuperação</span>
                                                        <textarea id="diretrizRecuperacao" name="diretrizRecuperacao" class="form-control" type="text" rows="2" maxlength="150"><?php echo $this->arrayFicha['diretriz_recuperacao']; ?></textarea>
                                                    </div>
                                                </div>    
                                            </div>
                                        <div class="col-sm-12" id="infoEstruturaDeContencaoButtons">
                                            <div class="form-group"  style="float:right;">
                                                <button id="salvarEstruturaDeContencao" name="submit" value="salvarEstruturaDeContencao" class="btn btn-success" type="submit">Salvar</button>
                                                <button id="cancelarEstruturaDeContencao" name="cancelarEstruturaDeContencao" class="btn btn-danger" type="reset">Cancelar</button>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--panel9-->
            <!--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Fotos</a>
                    </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                    <div class="panel-body">
                    
                    </div>
                </div>
            </div>-->
        </div><!--end panelgroup-->
        <div class="col-sm-12">
            <td><a href="tp_list.php" class="btn btn-primary" style="float:left;"><span style="float:left;"><img src="../../img/icons/arrow.png" width="20px"/> </span>&nbsp; Voltar para planilha</a></td>
            <td><a href="tp_edit.php?id=<?php echo $this->id+1; ?>" class="btn btn-primary" style="float:right;"><span style="float:left;"></span>Avaliar <b>Próxima</b> Ficha &nbsp; <img src="../../img/icons/arrow.png" width="20px" style="transform: rotate(180deg);"/> </a></td> 
            <td>&nbsp;</td>
            <td><a href="tp_edit.php?id=<?php echo $this->id-1; ?>" class="btn btn-primary" style="float:right;"><span style="float:left;"> <img src="../../img/icons/arrow.png" width="20px"/></span>&nbsp; Avaliar Ficha <b>Anterior </b> </a></td>
            <br><br>

        </div>
        <br>
    </div>        <br><br>
    </div><!--end container-->
    <script src='../../spectrum/spectrum.js'></script>
    <script>
        $("#togglePaletteOnly").spectrum({
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            color: 'black',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });
    </script>
    <script>
            window.onload = function ()
            {
                // Your code goes here
                var Draw = {
                obj : document.getElementById('canvas'),
                contexto : document.getElementById('canvas').getContext("2d"),
                _init:function(){
                    Draw.obj.addEventListener("touchmove",  Draw._over, false);
                    Draw.obj.addEventListener("touchstart", Draw._ativa, false);
                    Draw.obj.addEventListener("touchend", Draw._inativa, false);

                    Draw.obj.onselectstart = function () { return false; };
                },
                _over:function(e){
                    const x = e.targetTouches[0].clientX;
                    const y = e.targetTouches[0].clientY;
                    if(!Draw.ativo) return;
                    Draw.contexto.beginPath();
                    Draw.contexto.lineTo(Draw.x,Draw.y);
                    Draw.contexto.lineTo(x, y);
                    Draw.contexto.stroke();
                    Draw.contexto.closePath();
                    Draw.x = x;
                    Draw.y = y;
                },
                _ativa:function(e){
                    Draw.ativo = true;
                    Draw.x = e.targetTouches[0].clientX;
                    Draw.y = e.targetTouches[0].clientY;
                },
                _inativa:function(){
                    Draw.ativo = false;
                }   
            }
            Draw._init();
            }
            const saveBtn = document.getElementById("saveBtn");
            const canvas = document.getElementById("canvas");

            var ctxBg = canvas.getContext('2d');

            var imgSprite = new Image();
            imgSprite.src = "../../img/croqui.jpeg";
            imgSprite.onload = function() {
            ctxBg.drawImage(imgSprite,0,0,1135,550,0,0,900,400);

        }


        saveBtn.onclick = function (e) {
            var http = new XMLHttpRequest();

            // Converte o canvas para image/png; base64:
            var image = canvas.toDataURL();

            // Define a imagem como valor a ser enviado:
            var params = "image=" + image; 
            //console.log(params);
            http.open("POST", "../controller/save.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Talvez o Content-type pode ser outro, não tenho certeza quanto a isso

            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    alert("Imagem armazenada com sucesso!");
                }
            }
            http.send(params);
        }     

        togglePaletteOnly.onchange = function(){
            const saveBtn = document.getElementById("saveBtn");
            const canvas = document.getElementById("canvas");
            const cor = document.getElementById("togglePaletteOnly");

            var ctxBg = canvas.getContext('2d');
            ctxBg.strokeStyle=cor.value;
        }
           
        </script>
<?php include('footer.tpl.php'); ?>
