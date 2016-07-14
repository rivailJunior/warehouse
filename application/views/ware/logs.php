


<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading ">
            Logs
        </div>
        <div class="panel-body">
           
            <div id="card-body-principal">
                   <table class="table table-bordered table-hover table-striped">
                       <thead>
                           <tr>
                               <th>Log id</th>
                               <th>Data</th>
                               <th>Acao</th>
                               <th>Origem</th>
                               <th>Destino</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php 
                            if($logs->num_rows()> 0){
                                foreach ($logs->result() as $index => $log) {
                        ?>
                           <tr>
                               <td><?php echo $log->id;?></td>
                               <td><?php echo $log->created_at;?></td>
                               <td><?php echo $log->acao;?></td>
                               <td><?php echo $log->id_origem;?></td>
                               <td><?php echo $log->id_destino;?></td>
                           </tr>
                           <?php
                                }
                            }
                           ?>
                       </tbody>
                   </table>        
               
            </div>
        </div>
    </div>
</div>