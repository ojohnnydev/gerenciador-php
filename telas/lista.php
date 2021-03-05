<?php

    $busca = $_GET['busca'];

    $select_enderecos = 'SELECT id, cep, endereco, bairro, cidade FROM enderecos WHERE TRUE ';

    if($busca){
        $select_enderecos.= " AND endereco LIKE '%$busca%' OR bairro LIKE '%$busca%' OR cidade LIKE '%$busca%' ";
    }

    $result = mysqli_query($conexao, $select_enderecos);
    $qtd_registros = mysqli_num_rows($result);
?>

<div class="col-md-10 cabecalho">
    <div class="row">
        <div class="col-sm-6">
            <label class="cabecalho-label">Lista de Endereços</label>
        </div>
        <div class="col-sm-6">
            <form method="get" action="index.php">
                <div class="row" >
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="busca" value="<?php echo $busca; ?>" placeholder="Busca">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-10 offset-1 div-table">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>CEP</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <?php


                if ($qtd_registros > 0) {

                    while ($endereco = mysqli_fetch_object($result)) { ?>

                        <tr>
                            <td><?php echo $endereco->id; ?></td>
                            <td class="cep"><?php echo $endereco->cep; ?></td>
                            <td><?php echo $endereco->endereco; ?></td>
                            <td><?php echo $endereco->bairro; ?></td>
                            <td><?php echo $endereco->cidade; ?></td>
                            <td>
                                <a href="index.php?action=atualizar&id=<?php echo $endereco->id; ?>">
                                    <span class="links ml-1" title="Editar"><i class="fas fa-edit"></i></span>
                                </a>
                                <a href="sistema/validacoes/exclusao/excluir-endereco.php?id=<?php echo $endereco->id; ?>">
                                    <span class="links ml-1" title="Deletar"><i class="fas fa-trash-alt"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php }

                } else { ?>

                    <tr>
                        <td colspan="7" class="text-center">Nenhum registro encontrado!</td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</div>