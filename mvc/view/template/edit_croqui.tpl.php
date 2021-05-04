<?php include('header.tpl.php'); ?>
    <div class="container-fluid">
        <div class="card">
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
                    <td><a href="tp_edit.php?id=<?php echo $this->id; ?>" class="btn btn-primary" style="float:right;"><span style="float:left;"><img src="../../img/icons/arrow.png" width="20px"/> </span>&nbsp; Voltar para diagnóstico</a></td>

                </div>
            </div>
        </div>  
    </div>
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
            imgSprite.src = "../../img/croqui/<?php echo $_SESSION['identificacao']; ?>.jpg";
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
