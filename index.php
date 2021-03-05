<?php

    error_reporting(0);
    include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include 'metas.php'; ?>
        <title>Gerenciador de Endereços</title>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 main">
                    <div class="col-md-3 menu">
                        <div class="col-md-12 item-menu item-menu-ativo" id="lista">
                            <div class="col-md-1 tarja"></div>
                            <div class="col-md-11 descricao">
                                Lista de Endereços
                            </div>
                        </div>
                        <div class="col-md-12 item-menu" id="cadastro">
                            <div class="col-md-1 tarja"></div>
                            <div class="col-md-11 descricao">
                                Cadastro de Endereços
                            </div>
                        </div>
                        <div class="col-md-12 menu-footer"></div>
                    </div>
                    <div class="col-md-9 conteudo">
                        <div class="row lista">
                            <?php include 'telas/lista.php'; ?>
                        </div>

                        <div class="row cadastro">
                            <?php include 'telas/cadastro.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'scripts.php'; ?>
    </body>
</html>

<div class="modal mt-5" tabindex="-1" id="welcomeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sistema Gerenciador de Endereços</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    <b>Seja bem-vindo ao SGE!</b>
                </p>
                <p>
                    Aqui você gerencia todo o processo de cadastro, listagem, edição e exclusão de endereços.<br>
                    Para mais informações contate-nos!
                </p>

                <p>
                    <b>Notas:</b>
                </p>

                <ul>
                    <li>A base de dados utilizada nessa aplicação encontra-se na pasta <code>util/db.sql</code></li>
                    <li>A ferramenta <code>xampp</code> foi utilizada como servidor para a base de dados</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>