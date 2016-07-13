
<!DOCTYPE html>
<html>

<head>
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <title>Warehousing System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('/assets/js/jquery-1.10.2.min.js') ?>"></script>
    <script src="<?php echo base_url('/assets/bootstrap/js/bootstrap.min.js ') ?>"></script>
    
</head>

<body class="flat-blue login-page">
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header"><!-- 
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i> -->
                        <h3 class="login-title">Painel Login</h3>
                        <h5 class="login-title">Lucrativa Administrativo</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                <div class="title">Login</div>
                                <p>Entre com login e senha.</p>
                                </div>
                                <div class="pull-right card-action">
                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-link"><i class="fa fa-home"></i></button>
                                    </div>
                                </div>
                                <div class="clear-both"></div>
                            </div>
                            <div class="card-body">
                                <div class="text-indent">
                                    
                                <p class="text-center"><?php echo validation_errors('<a class="error">', '</a>'); ?></p>
                                </div>
                                <div class="text-indent">
                                    <?php 
                                    $atributos = array('class'=>'form-signin');
                                    echo form_open('logincontroller',$atributos); ?>
                                    <div class="col-md-12">
                                        <div class="">
                                            <span>Login</span>
                                            <input class="form-control" type="text" 
                                            placeholder="Login" name="login"  value="<?php echo set_value('login') ?>">
                                        </div>
                                        <div class="">
                                            <span>Senha</span>
                                            <input class="form-control" type="password" placeholder="Senha" 
                                            name="senha" value="<?php echo set_value('senha') ?>">
                                        </div>
                                        <div class="">
                                            <p class="text-center"><button id="btlogar" class="btn btn-success">Logar</button></p>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>

</html>
