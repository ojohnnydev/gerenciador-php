<?php

    include '../../../conexao.php';

    $cep = preg_replace("/[^0-9]/", "", $_POST['cep']);
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $insert_endereco = 'INSERT INTO enderecos(cep, endereco, bairro, numero, complemento, cidade, estado) 
                        VALUES("'.$cep.'", "'.$endereco.'", "'.$bairro.'", "'.$numero.'", "'.$complemento.'", "'.$cidade.'", "'.$estado.'")';
    mysqli_query($conexao, $insert_endereco);

    header("location: ../../../index.php?msg=sucesso");
?>