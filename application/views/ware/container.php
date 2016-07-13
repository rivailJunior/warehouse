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
            var elemento = $(this);
            var row = $(this).closest('tr').index();
            var pallet = $(this).attr("id");
            var total = addPallets(pallet);
            getValuePallet(pallet, function (res) {
                updateValorTotal(res);
                var valorAtualizado = totalValuePallets();
                console.log('valorAtualizado ' , valorAtualizado);
                       
                //if response value is bigger the limite value can do nothing
                if(valorAtualizado < valorLimite){
                    $(elemento).removeClass('btn-primary');
                    $(elemento).addClass('btn-success');
                    
                    $("#totalValue").html("<h3>Total R$: "+parseFloat(valorAtualizado)+"</h3>");   

                   
                } else {  
                    $("#divInfoLimite").show('slow', function (){
                        $(this).html('O valor total dos pallets R$: '+ valorAtualizado + 
                            " ultrapassa o valor limite do trajeto selecionado R$: "+valorLimite);
                    });
                }
            });
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
            <button type=""  class="btn btn-success btn-lg ">Finalizar</button>
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
            <!--/modal body-->
            <div class="modal-body" >
                 <div class="row" id="modal-body-principal">
                     
                 </div>
            </div>
            <!---modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

