<?php session_start();
//require_once('../util/ValidaLogin.php');
//require_once ("../model/Usuarios.php");
//$user = new Usuarios;
//$user = unserialize($_SESSION['logado']);
?>
<div class="content-wrapper">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Olá, Bem Vindo <?php $user->getLogin(); ?></h3>
            <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
        </div><!-- /.box-header -->
        <div class="box-body">
            <p> Navegue pelo Menu ao Lado.</p>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.content-wrapper -->
