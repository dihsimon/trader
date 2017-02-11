<?php session_start();
require_once("../util/ValidaLogin.php");
require_once ("../model/Clientes.php");
$cliente = new Clientes();
$cliente = unserialize($_SESSION['logado']);
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
            Meu Cadastro
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastros</a></li>
            <li class="active">Meu Cadastro</li>
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
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="codigo" id="codigo" value="<?php echo $cliente->getCodigo();?>">
                                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" tabindex="1"
                                               value="<?php echo $cliente->getNome();?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="apelido" id="apelido" class="form-control" placeholder="Apelido" tabindex="2"
                                               value="<?php echo $cliente->getApelido();?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control " placeholder="E-mail" tabindex="3"
                                       value="<?php echo $cliente->getEmail();?>">
                            </div>


                            <div class="form-group">
                                <input type="text" name="interesses" id="interesses" class="form-control" placeholder="Interesses" tabindex="4"
                                       value="<?php echo $cliente->getInteresses();?>">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="area" id="area" class="form-control" placeholder="Área Atuação" tabindex="5"
                                               value="<?php echo $cliente->getAreaAtuacao();?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select name="tempo_trader" id="tempo_trader" class="form-control">
                                            <option value="0">Quanto Tempo no Trade?</option>
                                            <option value="Nunca Operei" <?php if ($cliente->getTempoTrader() == "Nunca Operei") echo "selected"; ?>>Nunca Operei</option>
                                            <option value="Menos 1 Ano" <?php if ($cliente->getTempoTrader() == "Menos 1 Ano") echo "selected"; ?>>Menos 1 Ano</option>
                                            <option value="Entre 1 Ano e 2" <?php if ($cliente->getTempoTrader() == "Entre 1 Ano e 2") echo "selected"; ?>>Entre 1 Ano e 2</option>
                                            <option value="Mais 2 Anos" <?php if ($cliente->getTempoTrader() == "Mais 2 Anos") echo "selected"; ?>>Mais 2 Anos"</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                        

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="telefone" id="telefone" class="form-control" onkeyup="mascaraTelefone(this);" placeholder="Telefone" tabindex="5"
                                               value="<?php echo $cliente->getTelefone();?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="celular" id="celular" class="form-control" onkeyup="mascaraCelular(this);" placeholder="Celular" tabindex="6"
                                               value="<?php echo $cliente->getCelular();?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="facebook" id="facebook" required class="form-control" placeholder="Facebook.com/" tabindex="5"
                                               value="<?php echo $cliente->getFacebook();?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" required id="password" class="form-control" placeholder="Password" tabindex="6"
                                               >
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="validarDados()">Atualizar Informações</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->