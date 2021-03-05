<?php

    $id = $_GET['id'];

    if ($id) {

        $select_endereco = 'SELECT * FROM enderecos WHERE id = '.$id;
        $result = mysqli_query($conexao, $select_endereco);
        $endereco = mysqli_fetch_object($result);

        $action = 'sistema/validacoes/edicao/editar-endereco.php';
        $botao = 'Salvar';
    } else {
        $action = 'sistema/validacoes/cadastro/cadastrar-endereco.php';
        $botao = 'Cadastrar';
    }
?>

<div class="col-md-10 cabecalho">
    <div class="col-md-12">
        <label class="cabecalho-label">Cadastro de Endereços</label>
    </div>
</div>

<div class="col-md-10 offset-1 div-form">
    <form method="post" action="<?php echo $action; ?>">

        <?php if ($id) { ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php } ?>

        <div class="row">
            <div class="col-sm-4">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control cep" name="cep" id="cep"
                       value="<?php echo $endereco->cep; ?>" required placeholder="Digite o CEP...">
            </div>
        </div>

        <div class="bloco-endereco" <?php if($id) { echo 'style="display: block !important;"'; } ?> >
            <div class="row mt-2">
                <div class="col-sm-8">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco->endereco; ?>" required>
                </div>
                <div class="col-sm-4">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $endereco->bairro; ?>" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $endereco->numero; ?>" required>
                </div>
                <div class="col-sm-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $endereco->complemento; ?>">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $endereco->cidade; ?>" required>
                </div>
                <div class="col-sm-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $endereco->estado; ?>" required>
                </div>
            </div>

            <div class="row mt-5 text-end">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-success"><?php echo $botao; ?></button
                </div>
            </div>
        </div>
    </form>
</div>