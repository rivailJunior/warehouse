 <script type="text/javascript">
    /*
    * return the pallet value
    */
    function getValuePallet(id, callback) {
        var valor = null;
        $.ajax({
            url:"<?php echo site_url('warecontroller/getValuePallet')?>",
            type:"post",
            data:{
                'pallet':id
            },
            success:function (res){
                callback(res);
            },
            error:function(err){
                console.log("error", err);
            }
        });
    };//fim
      
    $(document).ready(function () {
        //return all master per pallet
        $(".getPallets").click(function () {
            var link = $(this).attr('href');
            $("#modal-body-principal").load(link, function (){
                $('#myModal').modal('show');
            });
            return false;
        });

        //insert the current index pallet in the array
        $(".btnincluir").click(function (){
            var elemento = $(this),
            row = $(this).closest('tr').index(),
            pallet = $(this).attr("id");
            var origem = $('.origem').val(),
            destino = $('.destino').val();
            //adiciona item no arrayPallet
            addPallets(pallet);
        
            getValuePallet(pallet, function (res) {
                updateValorTotal(res);
                var valorAtualizado = totalValuePallets();
                //if response value is bigger the limite value can do nothing
                if(valorAtualizado < valorLimite) {
                    $(elemento).removeClass('btn-primary');
                    $(elemento).addClass('btn-success');
                    $("#totalValue").html("<h3>Total R$: "+parseFloat(valorAtualizado)+"</h3>"); 
                    
                } else {
                    if((origem > 0) && (destino > 0) && (origem != destino)){
                        $("#divInfoLimite").show('slow', function () {
                        $(this).html('O valor total dos pallets R$: '+ valorAtualizado + 
                            " ultrapassa o valor limite do trajeto selecionado R$: "+valorLimite);
                        });    
                    }
                    //remove esse item do arrayPallet
                    removeItemArrayPallet(pallet); 
                }
            });
        });

        $("#btFinalizar").click(function (){
            var destino = $('.destino').val(),
            origem = $('.origem').val();
            if((origem == 0) || (destino == 0) || (origem == destino)) {
                 mensagem("info", "Selecione percurso a ser feita a transeferncia.", "ATENÇÃO");
            } else {
                if(arrayPallets.length > 0 ) {
                    realizarTransferencias(origem, destino, function (res, err){
                        if(res == true){
                            mensagem("success", "Transferencia realizada com sucesso!", "SUCESSO");
                            setTimeout(function(){ window.location.reload(); }, 4000);
                        }else{
                            mensagem("error", "Erro ao realizar transferencia.", "ATENÇÃO");
                        }
                    });    
                }else{
                    mensagem("info", "Nenhum item foi adicionado.", "ATENÇÃO");
                }
                
            }
        });
    });
</script>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Pallet</th>
            <th>Warehouse</th>
            <th>Total Martes</th>
            <th style="width:250px">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if($pallets->num_rows() > 0){ foreach ($pallets->result() as $index => $row) { ?>
        <tr>
            <td>
                <?php echo $row->pallet_code;?></td>
            <td>
                <?php echo $row->label;?></td>
            <td>
                <?php echo $row->total_master;?></td>
            <td style="width:250px">
                <a class="btn btn-primary getPallets" 
                href="<?php echo site_url('warecontroller/getInfoPallets/'.$row->pallet);?>">
                    <i class="glyphicon glyphicon-zoom-in"></i> Ver
                </a>
                <a class="btn btn-primary btnincluir" id="<?php echo $row->pallet;?>">
                    <i class="glyphicon glyphicon-ok"></i> Incluir
                </a>
            </td>
        </tr>
        <?php } } else { echo "<td colspan='4'>Nenhum palet encontrado!</td>"; } ?>

    </tbody>
    <tfoot>
        <th class="bg-info " colspan="3">
            <span class="pull-right" id="totalValue"><h3>Total R$: 00,00</h3></span>
        </th>
        <th colspan="1">
            <button type="" id="btFinalizar"  class="btn btn-success btn-lg ">Finalizar</button>
        </th>
    </tfoot>
</table>

<!--modal-->
<div class="modal fade bs-example-modal-lg" id="myModal"  role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Masters</h4>
            </div>
            <!---modal body-->
            <div class="modal-header">
                <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>    
                <button type="button" id="finalizarMaster" class="btn btn-success ">Salvar</button>
                <h4 id="spanValorTotalMaster" class="pull-right">R$: 00.00</h4>
            </div>
            <!--/modal body-->
            <div class="modal-body" >
                 <div class="row" id="modal-body-principal">
                     
                 </div>
            </div>
            
        </div>
    </div>
</div>

