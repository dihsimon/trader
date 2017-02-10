<?php
session_start();
require_once('../util/ValidaLogin.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consultar Usuários
            <small> Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Consultas</a></li>
            <li class="active">Consultas de Usuários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuários</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Código</th>
                                    <th style="width: 200px;">Login</th>
                                    <th style="width: 200px;">Nivél</th>
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
                                    <td>' . $exibe->codigo . '</td>
                                    <td>' . $exibe->titulo . '</td>
                                    <td>' . $exibe->nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $exibe->usuario . '</td>';
                                    echo ("<form action='../login/AlterarArquivos.php' method='POST' id='formulario'>");
                                    echo ("<input type='hidden' name='codigo' value='$exibe->codigo'/>");
                                    echo ("<input type='hidden' name='titulo' value='$exibe->titulo'/>");
                                    echo ("<input type='hidden' name='nome' value='$exibe->nome'/>");
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
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>