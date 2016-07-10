
<!DOCTYPE html>
<html>

<head>
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/selectize/dist/css/selectize.default.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/selectize/examples/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/selectize/examples/css/stylesheet.css')?>">
   
    <!-- CSS App -->
    <link href="<?php echo base_url('/assets/toastr-master/build/toastr.css') ?>" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/flatadmin/') ?>/css/themes/flat-blue.css">
    <script type="text/javascript" src="<?php echo base_url('/assets/toastr-master/build/toastr.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/flatadmin/') ?>/dist/lib/js/jquery.min.js"></script>
       
</head>

<body class="flat-blue">
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                       
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
<!--                     <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $usuario['nome'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username"><?php echo $usuario['nome'] ?></h4>
                                        <p><?php echo $usuario['login'] ?></p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <a type="button" href="<?php echo site_url('usuariocontroller/perfil/'.$usuario['id']) ?>" class="btn btn-default"><i class="fa fa-user"></i> Profile</a>
                                            <a type="button" href="<?php echo site_url('logincontroller/logout_user') ?>" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">Warehouse System</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo site_url('warecontroller/index') ?>">
                                    <span class="icon fa fa-home"></span><span class="title">Transporting</span>
                                </a>
                            </li>
                            <li>
                                <a  href="<?php echo site_url('warecontroller/dash') ?>">
                                    <span class="icon fa fa-user"></span><span class="title">Dash</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="side-body">
            
            
       
