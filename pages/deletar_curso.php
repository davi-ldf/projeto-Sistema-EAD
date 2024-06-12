<?php 
include('lib/config.php');
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_cursos = "SELECT * FROM cursos WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_cursos) or die($mysqli->error);
    $num_cursos = $sql_query->num_rows;


    if(isset($_POST['confirmar'])) {
        $mysql_query = $mysqli->query("SELECT imagem FROM cursos WHERE id = '$id'") or die($mysqli->error);
        $curso = $mysql_query->fetch_assoc();
        if(unlink($curso['imagem'])) {
            $sql_code = "DELETE FROM cursos WHERE id = '$id'";
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

            if($sql_query) {
                die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");
            }
        }
    }
} else {
    die("ID do curso não fornecido.");
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
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Preço</th>
                                    <th>Botões</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($num_cursos == 0) { ?>
                                    <tr>
                                        <td colspan="5">Nenhum curso foi cadastrado</td>
                                    </tr>
                                    <?php } else {
                                        while($curso = $sql_query->fetch_assoc()) {
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $curso['id'];?></th>
                                        <td><img src="<?php echo $curso['imagem'];?>" height="50" alt=""></img></td>
                                        <td><?php echo $curso['titulo'];?></td>
                                        <td>R$ <?php echo number_format($curso['preco'], 2, ',', '.');?></td>
                                        <td><a href="index.php?p=editar_curso&id=<?php echo $curso['id'];?>">editar</a> | <a href="index.php?p=deletar_curso&id=<?php echo $curso['id'];?>">deletar</a></td>
                                    </tr>
                                    <?php }
                                    
                                    } ?>
                                    <h1>Tem certeza que deseja deletar este curso?</h1>
                                    <a href="index.php?p=gerenciar_cursos"><button class="btn btn-success btn-round float-left">Não</button></a>
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