<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Nova conta</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <style>
        body {
            background-image: url('./mgs-background.svg');
            background-color: #fcfcfc;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .formulario {
            box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
            border-radius: 1.5%;
            background-color: white;
        }

        .text-muted {
            color: red !important;
        }
    </style>
</head>

<body>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php


    ?>
    <div class="container-fluid  mb-4">


        <div class="row mb-4">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 p-5 formulario">

                <p>&nbsp;</p>
                <form action="verifica.php" method="POST">
                    <div class="form-group">
                        <label id="labelCPF" for="campoCPF">Insira o seu CPF</label>
                        <input type="text" class="form-control" id="campoCPF" name="campoCPF">
                        <small id="CpfAlert" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="campoNome">Nome</label>
                        <input type="text" class="form-control" id="campoNome" name="campoNome" placeholder="Primeiro Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="campoSobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="campoSobrenome" name="campoSobrenome" placeholder="Segundo Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="campoEmail">Email</label>
                        <input type="text" class="form-control" id="campoEmail" name="campoEmail" placeholder="Endereço de email" required>
                    </div>
                    <div class="form-group">
                        <label for="campoConfirmaEmail">Confirme seu email</label>
                        <input type="text" class="form-control" id="campoConfirmaEmail" name="campoConfirmaEmail" placeholder="Confirme o endereço de email" required>
                    </div>
                    <div class="form-group">
                        <label for="campoSenha">Senha</label>
                        <input type="password" class="form-control" id="campoSenha" name="campoSenha" placeholder="Insira sua senha" required>
                    </div>
                    <div class="form-group">
                        <label for="campoConfirmaSenha">Confirme sua senha</label>
                        <input type="password" class="form-control" id="campoConfirmaSenha" name="campoConfirmaSenha" placeholder="Confirme sua senha" required>
                    </div>
                    <div class="form-group">
                        <label for="campoCidade">Cidade/Município</label>
                        <input type="text" class="form-control" id="campoCidade" name="campoCidade" placeholder="Insira o nome de sua Cidade" required>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Eu entendo e concordo com a <a href="https://eadhml.mgs.srv.br/termos/termos_02122020.html" target="_blank">política do
                                site</a></label>
                    </div>
                    <button type="submit" id="submitButton" class="btn btn-primary">Criar minha conta</button>
                    <div id="cancelButton" class="btn btn-secundary">Cancelar</div>
                </form>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="col-sm-4"></div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                /*document.getElementById("labelCPF").innerHTML = "Insira o CPF";*/
                const submit = document.getElementById("submitButton");

                submit.addEventListener("click", validate);
            });



            if (document.body.contains(document.getElementById("submitButton"))) {
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    window.scrollTo(0, 500);
                }, "1000");
            }



            function validate(e) {

                if (!validarCPF(document.getElementById("campoCPF").value)) {
                    document.getElementById("CpfAlert").innerHTML = "Insira o CPF corretamente.";
                    e.preventDefault();
                }
            }

            function validarCPF(cpf) {
                cpf = cpf.replace(/[^\d]+/g, "");
                if (cpf == "") return false;
                // Elimina CPFs invalidos conhecidos
                if (
                    cpf.length != 11 ||
                    cpf == "00000000000" ||
                    cpf == "11111111111" ||
                    cpf == "22222222222" ||
                    cpf == "33333333333" ||
                    cpf == "44444444444" ||
                    cpf == "55555555555" ||
                    cpf == "66666666666" ||
                    cpf == "77777777777" ||
                    cpf == "88888888888" ||
                    cpf == "99999999999"
                )
                    return false;
                // Valida 1o digito
                add = 0;
                for (i = 0; i < 9; i++) add += parseInt(cpf.charAt(i)) * (10 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11) rev = 0;
                if (rev != parseInt(cpf.charAt(9))) return false;
                // Valida 2o digito
                add = 0;
                for (i = 0; i < 10; i++) add += parseInt(cpf.charAt(i)) * (11 - i);
                rev = 11 - (add % 11);
                if (rev == 10 || rev == 11) rev = 0;
                if (rev != parseInt(cpf.charAt(10))) return false;
                return true;
            }

            window.onload = function() {
                botaoEnviar = document.getElementById("submitButton");
                botaoEnviar.onclick = function() {
                    valorCPF = document.getElementById("campoCPF").value;
                    unMask = valorCPF.replace(/\D/g, "");
                    if (unMask.length === 11) {
                        valorCPF = valorCPF.replace(/\D/g, "");
                        document.getElementById("campoCPF").value = valorCPF;
                        console.log(valorCPF);
                    };
                };
            };
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script>
            $(document).ready(function() {
                var $seuCampoCpf = $("#campoCPF");
                $seuCampoCpf.mask('000.000.000-00', {
                    reverse: true
                });

            });
        </script>


</body>

</html>