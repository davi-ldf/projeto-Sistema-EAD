<?php
include('lib/config.php');
include('lib/enviarArquivo.php');
include('lib/protect.php');
protect(1);
//'0' means normal users can access
//'1' means only adm can access

$id = intval($_GET['id']);
if(isset($_POST['enviar'])) {

    $nome = $mysqli->escape_string($_POST['nome']);
    $email = $mysqli->escape_string($_POST['email']);
    $creditos = $mysqli->escape_string($_POST['creditos']);
    $senha = $mysqli->escape_string($_POST['senha']);
    $rsenha = $mysqli->escape_string($_POST['rsenha']);
    $admin = $mysqli->escape_string($_POST['admin']);

    $erro = array();
    if(empty($nome))
        $erro[] = "Preencha o nome";

    if(empty($email))
        $erro[] = "Preencha o e-mail";

    if(empty($creditos)) 
        $creditos = 0;

    if($rsenha != $senha) 
        $erro[] = "As senhas não batem";

    if(count($erro) == 0) {

        $sql_code = "UPDATE usuarios
        SET nome = '$nome',
        email = '$email',
        creditos = '$creditos',
        admin = '$admin'
        WHERE id = '$id'";
        
        if(!empty($senha)) {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql_code = "UPDATE usuarios
            SET nome = '$nome',
            email = '$email',
            senha = '$senha',
            creditos = '$creditos',
            admin = '$admin'
            WHERE id = '$id'";

        }

        $mysqli->query($sql_code) or die($mysqli->error);
        ?>
        <h1>Usuário atualizado com sucesso!</h1>
        <a href="index.php?p=gerenciar_usuarios">Clique aqui</a> para voltar
        <?php


    }
    
}
$sql_query = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id'") or die($mysqli->error);
$usuario = $sql_query->fetch_assoc();

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Usuário</h4>
                    <span>Preencha as informações e clique em Salvar.</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="index.php?p=gerenciar_usuarios">
                            Gerenciar Usuários
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Cadastrar Usuário</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
        <?php if(isset($erro) && count($erro) > 0) {?> 
        <div class="alert alert-danger" role="alert">
            <?php foreach($erro as $e) { echo "$e<br>"; }?>
        </div>
        <?php 
        }
        ?>
            <div class="card">
                <div class="card-header">
                    <h5>Formulário de Cadastro</h5>
                </div>
                <div class="card-block">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input class="form-control" name="nome" type="text" value="<?php echo $usuario['nome']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input class="form-control" name="email" type="email" value="<?php echo $usuario['email']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Créditos</label>
                                    <input class="form-control" name="creditos" type="text" value="<?php echo $usuario['creditos']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Senha</label>
                                    <input class="form-control" name="senha" type="password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Repita a senha</label>
                                    <input class="form-control" name="rsenha" type="password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Tipo</label>
                                    <select name="admin" class="form-control">
                                        <option value="0">Usuário</option>
                                        <option <?php if($usuario['admin']) echo 'selected'; ?> value="1">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciar_usuarios" class="btn btn-primary btn-round"> <i class="ti-arrow-left"></i>Voltar</a>
                                <button type="submit" name="enviar" class="btn btn-success btn-round float-right"> <i class="ti-save"></i>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>