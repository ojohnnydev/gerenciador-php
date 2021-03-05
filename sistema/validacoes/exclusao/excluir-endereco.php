<?php

    include '../../../conexao.php';

    $id = $_GET['id'];

    $delete_endereco = 'DELETE FROM enderecos WHERE id = '.$id;
    mysqli_query($conexao, $delete_endereco);

    header("location: ../../../index.php?msg=exclusao");
?>