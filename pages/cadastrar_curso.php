<?php
include('lib/config.php');
include('lib/enviarArquivo.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['enviar'])) {

    $titulo = $mysqli->escape_string($_POST['titulo']);
    $descricao_curta = $mysqli->escape_string($_POST['descricao_curta']);
    $preco = $mysqli->escape_string($_POST['preco']);
    $conteudo = $mysqli->escape_string($_POST['conteudo']);

    $erro = array();
    if(empty($titulo))
        $erro[] = "Preencha o título";

    if(empty($descricao_curta))
        $erro[] = "Preencha a descrição curta";

    if(empty($preco)) 
        $erro[] = "Preencha o preço";

    if(empty($conteudo)) 
        $erro[] = "Preencha o conteúdo";

    if(!isset($_FILES['imagem']) || !isset($_FILES) || $_FILES['imagem']['size'] == 0)
        $erro[] = "Selecione uma imagem para o conteúdo";

    if(count($erro) == 0) {

        $deu_certo = enviarArquivo($_FILES['imagem']['error'], $_FILES['imagem']['size'], $_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']);
        if($deu_certo !== false) {

            $sql_code = "INSERT INTO cursos (titulo, descricao_curta, conteudo, data_cadastro, preco, imagem) VALUES (
                '$titulo',
                '$descricao_curta',
                '$conteudo',
                NOW(),
                '$preco',
                '$deu_certo'
            )";
            $inserido = $mysqli->query($sql_code);
            if(!$inserido)
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            else
                ?>
                <p>Arquivo enviado com sucesso!</p>
                <a href="index.php?p=gerenciar_cursos">Clique aqui</a> para voltar
                <?php

        } else
            $erro[] = "Falha ao enviar a imagem";

    }

    
}

?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Cadastrar Curso</h4>
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
                        <a href="index.php?p=gerenciar_cursos">
                            Gerenciar Cursos
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Cadastrar Curso</a>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Título</label>
                                    <input class="form-control" name="titulo" type="text">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Descrição curta</label>
                                    <input class="form-control" name="descricao_curta" type="text">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="">Imagem</label>
                                    <input class="form-control" name="imagem" type="file">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Preço</label>
                                    <input class="form-control" name="preco" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Conteúdo</label>
                                    <textarea class="form-control" rows="10" name="conteudo"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="index.php?p=gerenciar_cursos" class="btn btn-primary btn-round"> <i class="ti-arrow-left"></i>Voltar</a>
                                <button type="submit" name="enviar" class="btn btn-success btn-round float-right"> <i class="ti-save"></i>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>