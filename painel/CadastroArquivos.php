<?php
session_start();
require_once('../util/ValidaLogin.php');
?>
<script type="text/javascript">
    function validarDados() {
        var titulo = document.getElementById("titulo").value;
        if (titulo == "") {
            alert("Titulo deve ser informado.");
            return;
        }

        var pdf = document.getElementById("pdf").value;
        if (pdf == "") {
            alert("O arquivo deve ser selecionado.");
            return;
        }

        document.forms['formulario'].submit();
    }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastros de Arquivos
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastros</a></li>
            <li class="active">Cadastrar Arquivos</li>
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
            </div>
            <form action="../bean/BeanCadArquivos.php" method="POST" id="formulario" role="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input name="titulo" id="titulo" type="text" class="form-control" placeholder="Titulo">
                                </div>
                                <div class="form-group">
                                    <label>Selecione o arquivo PDF:</label>
                                    <input name="pdf" id="pdf" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="validarDados()">Efetuar Cadastro</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger">Limpar Campos</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->