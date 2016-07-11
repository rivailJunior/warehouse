<script type="text/javascript">
    //global arrays master e pallets
    var arrayPallets = [];
    var arrayMasters = [];
    var panelHeader = []; 
    var valorTotal = [];
    //verifica se o item ja existe no array
    var verifyItem  = function(item, array) {
        return array.includes(item);
    }//fim
     
    //insere valor
    function updateValorTotal(valor){
        //console.log('valor ' , valor);
        if(verifyItem(valor, valorTotal) == false) {
            valorTotal.push(valor);
        }
        return valorTotal;
    }//function
     
    //retorna valor total do pallet
    function totalValuePallets(){
       var valor = 0;
       for(index in valorTotal){
            valor = parseFloat(valorTotal[index])+valor;
       }
       return valor;
    };//fim

    //adiciona items no array de master
    function addMasters(master, pallet) {          
        if(verifyItem(pallet, arrayPallets) == false) {
            var data = {
            pallet: pallet,
            master:master
            };    
            arrayMasters.push(data);
        } else {
            alert('Esse pallet foi selecionado por completo');  
        }
        return arrayMasters;
    }//fim

    //insere intens nos pallets
    function addPallets(item) {
        if(verifyItem(item, arrayPallets) == false) {
            arrayPallets.push(item); 
            panelHeader.push(item);
        }
       // console.log(arrayPallets);
        return arrayPallets;
    }//fim function 

    $(document).ready(function() {
        var url = "<?php echo site_url('warecontroller/getPallets')?>";
        $("#card-body-principal").load(url);
    });//fim doc
</script>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-8 col-sm-8 col-xs-6">
                <label>Selecione Warehouse</label>
                <input type="text" class="form-control" placeholder="Digite codigo da warehouse">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <h4>RS: 000.00</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="card-body-principal">
   
            </div>
        </div>
    </div>
</div>
 