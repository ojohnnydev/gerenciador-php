<?php

    include '../../../conexao.php';

    $id = $_POST['id'];
    $cep = preg_replace("/[^0-9]/", "", $_POST['cep']);
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $update_endereco = 'UPDATE enderecos 
                        SET cep = "'.$cep.'", endereco = "'.$endereco.'", bairro = "'.$bairro.'", 
                        numero = "'.$numero.'", complemento = "'.$complemento.'", cidade = "'.$cidade.'", estado = "'.$estado.'" 
                        WHERE id = '.$id;
    mysqli_query($conexao, $update_endereco);

    header("location: ../../../index.php?msg=atualizacao");
?>