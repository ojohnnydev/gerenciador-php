<?php
    $mensagem = $_GET['msg'];
    $action = $_GET['action'];
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

        var lista = 'lista';
        var cadastro = 'cadastro';

        $('#lista').on('click', function () {
            $('#' + cadastro).closest('.item-menu').removeClass('item-menu-ativo');
            $(this).closest('.item-menu').toggleClass('item-menu-ativo');

            $('.cadastro').fadeOut('fast');
            $('.lista').fadeIn('slow');
        });

        $('#cadastro').on('click', function () {
            $('#' + lista).closest('.item-menu').removeClass('item-menu-ativo')
            $(this).closest('.item-menu').toggleClass('item-menu-ativo')

            $('.lista').fadeOut('fast');
            $('.cadastro').fadeIn('slow');
        });

        $('#' + lista).on('mouseover', function () {
            $('#' + cadastro).closest('.item-menu').removeClass('mouseOverMenu')
            $(this).closest('.item-menu').toggleClass('mouseOverMenu')
        });

        $('#' + cadastro).on('mouseover', function () {
            $('#' + lista).closest('.item-menu').removeClass('mouseOverMenu')
            $(this).closest('.item-menu').toggleClass('mouseOverMenu')
        });

        $(".cep").inputmask({"mask": "99.999-999"});
        $('#welcomeModal').modal('show')

        $('#cep').keyup(function () {

            if($('#cep').val().length === 10) {

                $.getJSON("https://viacep.com.br/ws/" + $('#cep').val().replace(/[^\d]+/g,'') + "/json/", function (data) {

                    var resultadoCEP = data;

                    if( (resultadoCEP["logradouro"] !== '' && resultadoCEP["logradouro"] !== undefined) || (resultadoCEP["localidade"] !== '' && resultadoCEP["localidade"] !== undefined) ) {

                        $('#endereco').val(unescape(resultadoCEP["logradouro"]));
                        if (unescape(resultadoCEP["logradouro"]) !== '') {
                            $('#endereco').attr('readonly', true);
                        }

                        $('#bairro').val(unescape(resultadoCEP["bairro"]));
                        if (unescape(resultadoCEP["bairro"]) !== '') {
                            $('#bairro').attr('readonly', true);
                        }

                        $('#cidade').val(unescape(resultadoCEP["localidade"]));
                        if (unescape(resultadoCEP["localidade"]) !== '') {
                            $('#cidade').attr('readonly', true);
                        }

                        $('#estado').val(unescape(resultadoCEP["uf"]));
                        if (unescape(resultadoCEP["uf"]) !== '') {
                            $('#estado').attr('readonly', true);
                        }

                        $('.bloco-endereco').fadeIn('slow');

                        if(resultadoCEP["logradouro"] !== ''){
                            $('#numero').focus();
                        }

                    } else if(resultadoCEP.erro){
                        swal("Erro", 'CEP não encontrado!', "warning");
                    }
                });

            }
            return false;
        });

        if ('<?php echo $mensagem ?>') {

            $('#welcomeModal').modal('hide')
            $('#lista').closest('.item-menu').addClass('item-menu-ativo')

            if ('<?php echo $mensagem ?>' === 'sucesso') {
                swal("", 'Endereço cadastrado com sucesso!', "success");
            }

            if ('<?php echo $mensagem ?>' === 'atualizacao') {
                swal("", 'Endereço alterado com sucesso!', "success");
            }

            if ('<?php echo $mensagem ?>' === 'exclusao') {
                swal("", 'Endereço excluído com sucesso!', "success");
            }
        }

        if ('<?php echo $action ?>') {

            $('#welcomeModal').modal('hide')

            if ('<?php echo $action ?>' === 'atualizar') {
                $('.lista').fadeOut('fast');
                $('.cadastro').fadeIn('slow');
                $('#lista').closest('.item-menu').removeClass('item-menu-ativo')
                $('#cadastro').closest('.item-menu').toggleClass('item-menu-ativo')
            }
        }

        if ('<?php echo $busca ?>') {
            $('#welcomeModal').modal('hide')
        }
    });
</script>