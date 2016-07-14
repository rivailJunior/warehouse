<script type="text/javascript">
   
   //printa cabecalho do panel caso o pallet ja tenha sido incluido por completo
    var printPanel = function(item){
        if(panelHeader.includes(item) == true){
            $('.panel-heading').css('background-color', '#5cb85c');
            $('.panel-heading a').css('color', 'white');
            $('.btnAddMaster').hide();
        }
    }//fim

    var returnValorTotalMaster = function(url, cb) {
        $.ajax({
            url:url,
            type:"post",
            success:function (res){

                cb(res);
            },
            error:function (error){
                cb(error);
            }
        })
    };//fim

    function finishTransferByMaster(masters, cb) {
        $.ajax({
            url:"<?php echo site_url('warecontroller/finishTransferByMaster')?>",
            type:"post",
            data:{
                'masters': masters,
                'origem':$('.origem').val(),
                'destino':$('.destino').val()
            },
            success:function(res){
                cb(res);
            },
            error:function(err){
                cb(err);
                //console.log(err);
            }
        });
    }//fim

    $(document).ready(function (){
        //retorna o pallet do qual o panel pertence
        var item =  $('.panel-group').attr("id").split('_')[1];
        printPanel(item);

        $(".btnAddMaster").click(function (){
            var elemento = $(this),
            arrayHelp =  [], 
            pallet = $(this).attr("id").split('_')[0],
            master = $(this).attr("id").split('_')[1],
            origem = $('.origem').val(),
            destino = $('.destino').val();
            if((origem > 0) && (destino > 0) && (origem != destino)){
                $(elemento).removeClass('btn-primary');
                $(elemento).addClass('btn-success');
                returnValorTotalMaster(elemento.attr("href"), function (res, err) {
                   updateValorTotal(res);
                   totalValuePallets();
                   $("#spanValorTotalMaster").html("R$: "+parseFloat(totalValuePallets())+" ");
                });
                addMasters(master); 
            }else{
                mensagem("info", "Verifique se origem e destino estão selecionados!", "ATENÇÃO!");
            }
            return false;
        });

        $("#finalizarMaster").click(function () {
           var origem = $(".origem").val(),
           destino = $('.destino').val();
        
           if((origem > 0) && (destino > 0) && (origem != destino)){
                if(arrayMasters.length > 0){
                    finishTransferByMaster(arrayMasters, function(res, err){
                        if(res == true){
                            mensagem("success", "Transferencia de master realizada com sucesso!", "SUCESSO!");
                            setTimeout(function(){ window.location.reload(); }, 4000);

                        } else {
                            mensagem("success", "Transferencia de master realizada com sucesso!", "SUCESSO!");
                        }
                    }) 
                }else{
                    mensagem('info', 'Nenhum item foi selecionado!', 'ATENÇÃO!');
                }
           } else {
                 mensagem('info', 'Primeiro selecione origem e destino e depois os itens necessarios!', 'ATENÇÃO!');
           }    
        
        });
    });
</script>
<div class="col-md-12">
    <?php 
        if(isset($pallets)){
            foreach ($pallets->result() as $i => $row) {
     ?>
    <div class="panel-group" id="accordion_<?php echo $row->pallet;?>" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading panelHeader">
                    <a role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" 
                    href="<?php echo "#collapse".$i; ?>">
                    <label><?php echo "Codigo do master: ".$row->master_code;?></label></a>
                    <a class="btn btn-primary btnAddMaster" 
                    href="<?php echo site_url('warecontroller/getValueMaster/'.$row->master)?>"
                    id="<?php echo $row->pallet."_".$row->master;?>">
                    <i class="glyphicon glyphicon-ok"></i>
                    Adicionar Master</a> 
            </div>
        
            <div id="<?php echo "collapse".$i; ?>" class="panel-collapse collapse" role="tabpanel" 
            aria-labelledby="headingOne">
                <div class="panel-body">
                  <table class="table table-bordered table-hover table-striped">
                      <thead>
                          <tr>
                              <th>Master</th>
                              <th>Imei Code</th>
                              <th>Produto</th>
                              <th>Preço</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $fields = " product.code as product_code,
                                        product.comercial_name as product,
                                        product.id as id_produtc,
                                        product.unitary_price as price,
                                        imei.code as imei_code,
                                        imei.id as imei,
                                        master.code as master";
                            $this->db->select($fields);
                            $this->db->from('product ');
                            $this->db->join('imei', 'imei.product_id = product.id');
                            $this->db->join('master', 'master.id = imei.master_id');
                            $this->db->where('master.id', $row->master);
                            $product = $this->db->get();
                            foreach ($product->result() as $index => $pro) {
                            
                        ?>
                          <tr>
                              <td><?php echo $pro->master;?></td>
                              <td><?php echo $pro->imei_code;?></td>
                              <td><?php echo $pro->product;?></td>
                              <td><?php echo $pro->price;?></td>
                          </tr>
                          <?php
                            }
                          ?>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }else{
        echo "<div><h4>Ops, Nada encontrado!</h4></div>";
    }

    ?>
</div>