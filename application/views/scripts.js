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
        if(type == 'savetrue'){
            toastr.success(title, 'SALVO COM SUCESSO!', {timeOut: 3000});
        }
        if(type == "savefalse"){
            toastr.error(title, 'ERRO AO SALVAR!', {timeOut: 3000});
        }
        if(type == "edittrue"){
            toastr.success(title, 'ALTERADO COM SUCESSO!', {timeOut: 3000});
        }
        if(type == "editfalse"){
            toastr.error(title, 'ERRO AO ALTERAR!', {timeOut: 3000});
        }
        if(type == "removetrue"){
            toastr.success(title, 'REMOVIDO COM SUCESSO!', {timeOut: 3000})
        } 
        if(type == "removefalse"){
            toastr.error(title, 'ERRO AO REMOVER!', {timeOut: 3000})
        }
        if(type == "custom"){
            toastr.info(title, text, {timeOut: 3000});
        } 

    }

    function ajaxform(linkurl, dados, typerequest, table){
        if (typerequest == "update") {
              $.ajax({
                url:linkurl,
                type:"post",
                data:{
                    'dados': JSON.stringify(dados)
                },
                success:function(res){
                    if(res == 1){
                         mensagem("edittrue",table,"");
                     }else{
                         mensagem("editfalse",table,"");
                     }       
                },error:function(res){
                    console.log("error: "+res);
                }
            });
        }
        if (typerequest == "add") {
              $.ajax({
                url:linkurl,
                type:"post",
                data:{
                    'dados':  JSON.stringify(dados)
                },
                success:function(res){
                    if(res == 1){
                         mensagem("savetrue",table,"");
                     }else{
                         mensagem("savefalse",table,"");
                     }       
                },error:function(res){
                    console.log("error: "+res);
                }
            });
        }
        if(typerequest == "remove"){
             $.ajax({
                url:linkurl,
                type:"post",
                data:{
                    'dados':  JSON.stringify(dados)
                },
                success:function(res){
                    console.log(res);
                    if(res == 1){
                         mensagem("removetrue",table,"");
                         
                     }else{
                         mensagem("removefalse",table,"");
                     }       
                },error:function(res){
                    console.log("error: ",res);
                    if(res.status == 500) {
                        mensagem("custom", "Exclusão "+table, "EXCLUSÃO NÃO REALIZADA, verifique se o item não possui ligação com outros itens no sistema")
                    }

                }
            });
        }
        if(typerequest == "ativar"){
                $.ajax({
                url:linkurl,
                type:"post",
                data:{
                    'dados':  JSON.stringify(dados)
                },
                success:function(res){
                    console.log(res);
                    if(res == 1){
                         mensagem("edittrue",table,"");
                         
                     }else{
                         mensagem("editfalse",table,"");
                     }       
                },error:function(res){
                    console.log("error: ",res);
                }
            });
        }
      
    }