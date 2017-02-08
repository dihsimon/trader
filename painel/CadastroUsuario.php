<?php
session_start();
require_once('../util/ValidaLogin.php');
?>
<script type="text/javascript">
    function validarDados() {
        var login = document.getElementById("login").value;
        if (login == "") {
            alert("Login deve ser informado.");
            return;
        }
        var password = document.getElementById("password").value;
        if (password == "") {
            alert("Senha deve ser informado.");
            return;
        }
        var senha = document.getElementById("password").value;
        if (senha.length < 6) {
            alert("Senha deve Conter no minimo 6 caracteres")
            return;
        }
        var nivel = document.getElementById("nivel").value;
        if (nivel == 0) {
            alert("Selecione um Tipo de Usuário para Continuar")
            return;
        }

        document.forms['formulario'].submit();
    }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastros de Usuários
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastros</a></li>
            <li class="active">Cadastro Usuários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Dados</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div><!-- /.box-header -->
            <form action="../bean/BeanCadUsuario.php" method="POST" id="formulario" role="form">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuário</label>
                                    <input name="login" id="login" type="text" class="form-control" id="exampleInputEmail1" placeholder="E-mail de Acesso ao Sistema">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="validarDados()">Efetuar Cadastro</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger">Limpar Campos</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nivél</label>
                                <select name="nivel" id="nivel" class="form-control select2" multiple="multiple" data-placeholder="Selecione o Nivél do Usuário" style="width: 100%;">
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuário</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->