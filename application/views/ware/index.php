<script type="text/javascript">
    //global arrays master e pallets
    var arrayPallets = [],
    arrayMasters = [],
    panelHeader = [],
    valorTotal = [],
    valorLimite = 0;
    //verifica se o item ja existe no array
    var verifyItem  = function(item, array){
        return array.includes(item);
    }//fim
     
    //insere valor
    function updateValorTotal(valor) {
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
     var origem = $(".origem").val(),
        destino = $('.destino').val();
        if((origem == 0) || (destino == 0)) {
            alert('selecione percurso a ser transportado!');
        } else {         
            if(verifyItem(pallet, arrayPallets) == false) {
                var data = {
                pallet: pallet,
                master:master
                };    
                arrayMasters.push(data);
            } else {
                alert('Esse pallet foi selecionado por completo');  
            }
        }
        return arrayMasters;
    }//fim

    //insere intens nos pallets
    function addPallets(item) {
        var origem = $(".origem").val(),
        destino = $('.destino').val();
        if((origem == 0) || (destino == 0)){
            alert('selecione percurso a ser transportado!');
        }else{
            if(verifyItem(item, arrayPallets) == false) {
                arrayPallets.push(item); 
                panelHeader.push(item);
            }
        }
        return arrayPallets;
    }//fim function 

    $(document).ready(function() {
        var url = "<?php echo site_url('warecontroller/getPallets')?>";
        $("#card-body-principal").load(url);

        //seleciona destino
        $(".destino").change(function (){
            var destino = $(this).val();
            var origem = $(".origem").val();
            if((origem != 0) && (destino != 0)){
                $.ajax({
                    url:"<?php echo site_url('warecontroller/getLimitByWare')?>",
                    type:"post",
                    data:{
                        'origem':origem,
                        'destino':destino
                    },
                    success:function (res){
                        if(res != ""){
                            valorLimite = parseFloat(res);
                            $("#spanlimite").html("R$: "+valorLimite);
                        }
                    },
                    error:function (err){

                    }
                });
            }
        });
        
        //seleciona origem
        $(".origem").change(function (){
            var destino = $(this).val();
            var origem = $(".destino").val();
            if((origem != 0) && (destino != 0)){
                $.ajax({
                    url:"<?php echo site_url('warecontroller/getLimitByWare')?>",
                    type:"post",
                    data:{
                        'origem':origem,
                        'destino':destino
                    },
                    success:function (res){
                        if(res != ""){
                            valorLimite = parseFloat(res);
                            $("#spanlimite").html("R$: "+valorLimite);
                        }
                    },
                    error:function (err){
                        
                    }
                })
            }
        });

    });//fim doc
</script>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <h4>Bem vindo,<small>Selecione os de origem e destino desejado</small></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-2">
                    <label>Origem <code>*</code></label>
                    <select name="origem" class="form-control origem">
                        <option value="0">Selecione</option>
                        <?php 
                            if ($warehouses->num_rows() > 0) {
                                foreach ($warehouses->result() as $index => $row) {
                                $selected = $row->id == 13 ? "selected" : " ";
                         ?>
                            <option <?php echo $selected;?> value="<?php echo $row->id;?>"><?php echo $row->label;?></option>
                         <?php
                                }
                            }
                         ?>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-2">
                    <label>Destino <code>*</code></label>
                    <select name="destino" class="form-control destino">
                         <option value="0">Selecione</option>
                        <?php 
                            if ($warehouses->num_rows() > 0) {
                                foreach ($warehouses->result() as $index => $row) {
                         ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->label;?></option>
                         <?php
                                }
                            }
                         ?>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-2">
                    <label> </label>
                    <h4 id="spanlimite">RS: 00.00</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row"  >
                <div class="col-md-12">
                    <div class="alert alert-danger" hidden id="divInfoLimite">
                        o Valor total do pallet selecionado excede o valor limite de transporte 
                        entre essas duas cidades!
                    </div>
                </div>
            </div>
            <div id="card-body-principal">
   
            </div>
        </div>
    </div>
</div>
 