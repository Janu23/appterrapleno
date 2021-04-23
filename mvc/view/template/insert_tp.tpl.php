<?php include('header.tpl.php'); ?>
   <!-- As a heading -->
   <nav class="navbar bg-dark navbar-dark">
  <span class="navbar-brand mb-0 h1"><?php echo strtoupper ("Cadastrar Ficha Terrapleno"); ?></span>
    </nav>
    <nav aria-label="breadcrumb bg-white">
    <ol class="breadcrumb bg-white">
         <li class="breadcrumb-item"><a href="filter.php">Home</a></li>
         <li class="breadcrumb-item"><a href="tp_list.php">Planilha Terrapleno</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Ficha</li>
    </ol>
    </nav>
    <div class="container-fluid">
        <form action="../controller/terraplenoController.php" enctype="multipart/form-data" method="post" id="novaFicha"> 
                    <fieldset>
            <div class="card">
                <div class="card-header">
                    Informações Gerais
                </div>
                <div class="card-body">
                <div class="col-sm-12" style="text-align:right;"><small><h11 style="color:red;text-align:right;">* (Campos Obrigatórios)</h11></small></div>
                <div class="col-sm-6">
                <br>
                    <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"> Km <small style="color:red;">*</small></span>
                            <input id="km" name="km" class="form-control" type="text" required>
                            </div>
                        </div>           
                    </div>
                <div class="col-sm-6">
                <br>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">Km Final</span>
                        <input id="kmFinal" name="kmFinal" class="form-control" type="text">
                        </div>
                    </div>           
                </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Distância Acostamento</span>
                            <input id="distanciaAcostamento" name="distanciaAcostamento" class="form-control" type="text" required>
                            </div>    
                        </div>           
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">Material Origem</span>
                            <input id="materialOrigem" name="materialOrigem" class="form-control" type="text" required>
                            </div>    
                        </div>           
                    </div>
                    <div class="col-sm-12">    
                        <label>Coordenadas 1</label>
                    </div>
                    <div class="col-sm-5">    
                          <div class="input-group">
                             <span class="input-group-addon">Latitude <h11 style="color:red;">*</h11></span>
                            <input id="latitude1" name="latitude1" class="form-control" type="text" required>
                         </div>
                         <br>
                    </div>
                    <div class="col-sm-5">    
                          <div class="input-group">
                             <span class="input-group-addon">Longitude <h11 style="color:red;">*</h11></span>
                            <input id="longitude1" name="longitude1" class="form-control" type="text" required>
                         </div>
                         <br>
                    </div>
                    <div class="col-sm-1"><a onclick="getLocation1()" class="btn btn-success"><img src="../../img/icons/refresh.png" width="15px;"></a></div>
                    <br>
                    <div class="col-sm-12">    
                        <label>Coordenadas 2</label>
                    </div>
                    <div class="col-sm-5">    
                          <div class="input-group">
                             <span class="input-group-addon">Latitude</span>
                            <input id="latitude2" name="latitude2" class="form-control" type="text">
                         </div>
                         <br>
                    </div>
                    <div class="col-sm-5">    
                          <div class="input-group">
                             <span class="input-group-addon">Longitude</span>
                            <input id="longitude2" name="longitude2" class="form-control" type="text">
                         </div>
                         <br>
                    </div>
                    <div class="col-sm-1"><a onclick="getLocation2()" class="btn btn-success"><img src="../../img/icons/refresh.png" width="15px;"></a></div>
                    
                    <div class="col-sm-12">    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Terrapleno/Conteção</label>
                                <select class="form-control select2" name="terraplenoContencao" id="terraplenoContencao" style="width: 100%;">
                                    <option value="Terrapleno">Terrapleno</option>
                                    <option value="Conteção">Conteção</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Lado</label>
                                <select class="form-control select2" name="lado" id="lado" style="width: 100%;">
                                    <option value="Direito">Direito</option>
                                    <option value="Esquerdo">Esquerdo</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Sentido</label>
                                <select class="form-control select2" name="sentido" id="sentido" style="width: 100%;">
                                    <option value="CANTEIRO CENTRAL">CANTEIRO CENTRAL</option>
                                    <option value="NORTE">NORTE</option>
                                    <option value="SUL">SUL</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Estado</label>
                                <select class="form-control select2" name="estado" id="estado" style="width: 100%;">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Rodovia</label>
                                <select class="form-control select2" name="rodovia" id="rodovia" style="width: 100%;">
                                    <option value="BR-101">BR-101</option>
                                    <option value="BR-135">BR-135</option>
                                    <option value="LMG-754">LMG-754</option>
                                    <option value="MG-231">MG-231</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label>Trecho</label>
                                <select class="form-control select2" name="trecho" id="trecho" style="width: 100%;">
                                    <option value="BR-101">BR-101</option>
                                    <option value="BR-135">BR-135</option>
                                    <option value="Cidade de Pomar">Cidade de Pomar</option>
                                    <option value="Contorno de Iconha">Contorno de Iconha</option>
                                    <option value="Contorno de Vitória">Contorno de Vitória</option>
                                    <option value="Trecho Iconha">Trecho Iconha</option>
                                </select>  
                            </div>
                        </div>           
                    </div>
                    
                    <div class="col-sm-6">
                    
                    </div>
                </div>
            </div>  
        <br>
        <div class="col-sm-12">
                <br>
                    <div class="form-group"  style="float:right;">
                        <button id="cadastrar" name="submit" value="Cadastrar" class="btn btn-success" type="submit">Salvar</button>
                        <button id="cancelar" name="cancelar" class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </fieldset>
        </form> 
        <hr>
        <div class="col-sm-12">
            <td><a href="tp_list.php" class="btn btn-primary" style="float:left;"><span style="float:left;"><img src="../../img/icons/arrow.png" width="20px"/> </span>&nbsp; Voltar para planilha</a></td>
        </div>
        <br><br>
    </div>
    <script>
        var x1=document.getElementById("latitude1");
        var y1=document.getElementById("longitude1");
        function getLocation1()
        {
        if (navigator.geolocation)
            {
            navigator.geolocation.getCurrentPosition(showPosition1);
            }
        else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
        }
        function showPosition1(position)
        {
        x1.value= position.coords.latitude;
        y1.value = position.coords.longitude; 
        }

        var x2=document.getElementById("latitude2");
        var y2=document.getElementById("longitude2");
        function getLocation2()
        {
        if (navigator.geolocation)
            {
            navigator.geolocation.getCurrentPosition(showPosition2);
            }
        else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
        }
        function showPosition2(position)
        {
        x2.value= position.coords.latitude;
        y2.value = position.coords.longitude; 
        }
    </script>
<?php include('footer.tpl.php'); ?>
