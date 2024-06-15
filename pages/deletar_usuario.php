<?php 
include('lib/config.php');
include('lib/protect.php');
protect(1);
//'0' means normal users can access
//'1' means only adm can access


if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_usuarios = "SELECT * FROM usuarios WHERE id = '$id'";
    //search course
    $sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
    $num_usuarios = $sql_query->num_rows;


    if(isset($_POST['confirmar'])) {
            $sql_code = "DELETE FROM usuarios WHERE id = '$id'";
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            //delete user
            if($sql_query) {
                die("<script>location.href=\"index.php?p=gerenciar_usuarios\";</script>");
                //return to users page
            }
        }
} else {
    die("ID do usuario não fornecido.");
}
?>
<!-- Page-header end -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block table-border style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Créditos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_usuarios == 0) { ?>
                                    <tr>
                                        <td colspan="5">Nenhum usuário foi cadastrado</td>
                                    </tr>
                                    <?php } else {
                                        while($usuario = $sql_query->fetch_assoc()) {
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $usuario['id'];?></th>
                                        <td><?php echo $usuario['nome'];?></td>
                                        <td><?php echo $usuario['email'];?></td>
                                        <td>R$ <?php echo number_format($usuario['creditos'], 2, ',', '.');?></td>
   
                                    </tr>
                                    <?php }
                                    
                                    } ?>
                                    <h1>Tem certeza que deseja deletar este usuário?</h1>
                                    <a href="index.php?p=gerenciar_usuarios"><button class="btn btn-success btn-round float-left">Não</button></a>
                                    <form action="" method="post">
                                        <button name="confirmar" value="1" class="btn btn-danger btn-round float-right" type="submit">Sim</button>
                                    </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>