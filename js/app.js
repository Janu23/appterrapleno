function blockForm(idCheck, idForm){
    var edit = document.getElementById(idCheck).checked;
    var buttons = document.getElementById(idForm+"Buttons");
    var form = document.getElementById(idForm);
    var allElements = form.elements;
    if (edit){
        for (var i = 0, l = allElements.length; i < l; ++i) {
             allElements[i].readOnly = false;
            //allElements[i].disabled=false;
        }
        buttons.hidden = false;
    } else{
        for (var i = 0, l = allElements.length; i < l; ++i) {
             allElements[i].readOnly = true;
              //allElements[i].disabled=true;
        }
        buttons.hidden = true;
    }
    edit.disabled = false;
}

function dinamicInputForm(idCheck, idInput){
    var check = document.getElementById(idCheck).checked;
    var inputForm = document.getElementById(idInput);
    
    if (check){
        inputForm.hidden = false;
    } else{
        inputForm.hidden = true;
    }
}

function drenagemSub(){
    var drenagemSubterranea = (document.getElementById("drenagemSubterraneaExiste").checked) ? true : false;

    var tipoDiv = document.getElementById("tipoDiv");
    var tituloSubterraneaDiv = document.getElementById("tituloSubterraneaDiv");
    var danificadaSubterraneaDiv = document.getElementById("danificadaSubterraneaDiv");
    var insuficienteSubterraneaDiv = document.getElementById("insuficienteSubterraneaDiv");
    var obstruidaSubterraneaDiv = document.getElementById("obstruidaSubterraneaDiv");
    var satisfatoriaSubterraneaDiv = document.getElementById("satisfatoriaSubterraneaDiv");

    if (drenagemSubterranea){
        tipoDiv.hidden = false;
        tituloSubterraneaDiv.hidden = false;
        danificadaSubterraneaDiv.hidden = false;
        insuficienteSubterraneaDiv.hidden = false;
        obstruidaSubterraneaDiv.hidden = false;
        satisfatoriaSubterraneaDiv.hidden = false;
    } else{
        tipoDiv.hidden = true;
        tituloSubterraneaDiv.hidden = true;
        danificadaSubterraneaDiv.hidden = true;
        insuficienteSubterraneaDiv.hidden = true;
        obstruidaSubterraneaDiv.hidden = true;
        satisfatoriaSubterraneaDiv.hidden = true;
    }
}

function ocorrencia(){
    var selectBox = document.getElementById("tipoDeOcorrencia");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if (selectedValue == "check_outro_tipo_ocorrencia"){
        document.getElementById("outroTipoDeOcorrenciaDiv").hidden = false;
    }else{
        document.getElementById("outroTipoDeOcorrenciaDiv").hidden = true;
    }

    if (selectedValue == "nenhuma"){
        document.getElementById("localizacao").disabled = true;
        document.getElementById("dimensao").disabled = true;
    } else {
        document.getElementById("localizacao").disabled = false;
        document.getElementById("dimensao").disabled = false;
    }
}

/*Função para permitir que apenas umas das opções de trinca/fissura e tampa sejam marcadas(função generica)*/
function checkExclusivo(id,id_desmarcar){
    var status = document.getElementById(id).checked;    
        if (status){
          document.getElementById(id_desmarcar).checked = false; 
        }
  }