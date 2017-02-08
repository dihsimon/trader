<?php
session_start();
require_once('../util/ValidaLogin.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consultar Arquivos
            <small>Cadastrados no Sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Consultas</a></li>
            <li class="active">Consultas Arquivos</li>
        </ol>
    </section>
 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Arquivos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabela" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 200px;">Título</th>
                                    <th style="width: 90px;">Data</th>
                                    <th style="width: 80px;">Usuário</th>
                                    <th style="width: 80px;">Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once ("../dao/ArquivosDAO.php");
                                $dao = new ArquivosDAO();
                                $retorno = $dao->buscarTodos();
                                while ($exibe = mysql_fetch_object($retorno)) {
                                    $d = explode("-", $exibe->data);
                                    $data = $d[2] . "/" . $d[1] . "/" . $d[0];
                                    echo '<tr>
                                    <td> <a target="_blank" href="../pdfs/' . $exibe->nome . '">' . $exibe->titulo . '</a></td>
                                    <td>' . $data . '</td>
                                    <td>' . $exibe->usuario . '</td>';
                                    echo ("<form action='../login/AlterarArquivos.php' method='POST' id='formulario'>");
                                    echo ("<input type='hidden' name='codigo' value='$exibe->codigo'/>");
                                    echo ("<input type='hidden' name='titulo' value='$exibe->titulo'/>");
                                    echo ("<input type='hidden' name='data' value='$exibe->data'/>");
                                    echo ("<input type='hidden' name='codigo_usuario' value='$exibe->codigo_usuario'/>");
                                    echo "<td><button class='btn btn-block btn-primary'>Alterar</button></td>";
                                    echo ("</form>");
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->