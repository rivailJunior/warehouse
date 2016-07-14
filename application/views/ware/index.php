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

    //mostra toast de mensagens
    function mensagem(type, title, text) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "2000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        if(type == 'success'){
            toastr.success(title, text, {timeOut: 4000});
        }
        if(type == "error"){
            toastr.error(title, text, {timeOut: 4000});
        }
        if(type == "info"){
            toastr.info(title, text, {timeOut: 4000});
        } 
    };//fim

    function realizarTransferencias(origem, destino, callback) {
        $.ajax({
            url:"<?php echo site_url('warecontroller/finishTransfer')?>",
            type:"post",
            data:{
                'pallets': arrayPallets,
                'origem': origem,
                'destino':destino
            },
            success:function (res){
                callback(res);
            },
            error:function(err) {
                callback(err);
            }
        });
    };//fim
     
    //insere valor
    function updateValorTotal(valor) {
        //console.log('valor ' , valor);
        if(verifyItem(valor, valorTotal) == false) {
            valorTotal.push(valor);
        }
        return valorTotal;
    }//function

    //remove um item do array
    function removeItemArrayPallet(item) {
        var i = arrayPallets.indexOf(item);
        if(i != -1) {
            arrayPallets.splice(i, 1);
        }
        return arrayPallets;
    };//fim
     
    //retorna valor total do pallet
    function totalValuePallets() {
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
           // alert('selecione percurso a ser transportado!');
            mensagem("info", "ATENÇÃO","Selecione percurso a ser feita a transeferncia");
        } else {         
            if(verifyItem(pallet, arrayPallets) == false) {
                var data = {
                pallet: pallet,
                master:master
                };    
                arrayMasters.push(data);
                console.log(arrayMasters);
                mensagem("success","Master "+master+" foi adicionado.", "SUCESSO!");
            }
        }
        return arrayMasters;
    }//fim

    //insere intens nos pallets
    function addPallets(item) {
        var origem = $(".origem").val(),
        destino = $('.destino').val();
        if((origem == 0) || (destino == 0)){
            mensagem("info", "Primeiro selecione o percurso a realizar o transporte", "ATENÇÃO!");
        }else{
            if(verifyItem(item, arrayPallets) == false) {
                arrayPallets.push(item); 
                panelHeader.push(item);
                mensagem("success", "Pallet "+item+" foi adicionado a lista", "SUCESSO!");
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
 