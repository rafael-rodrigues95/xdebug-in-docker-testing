<html>
<body>

<?php

$cpf = $_POST["campoCPF"];
$nome = $_POST["campoNome"];
$sobrenome = $_POST["campoSobrenome"];
$email = $_POST["campoEmail"];
$conf_email = $_POST["campoConfirmaEmail"];
$senha = $_POST["campoSenha"];
$conf_senha = $_POST["campoConfirmaSenha"];
$cidade = $_POST["campoCidade"];
$erro = 0;



// Tirar a mascara do CPF
function remove_mascara($masked){
    if (strlen($masked) == 14 || is_numeric(str_replace(array('.','-'), "", $masked)) == TRUE){
        $masked = trim($masked);
        $masked = str_replace(array('.','-','/'), "", $masked);
    }
    return $masked;
}

// Chama a funcao para tirar a mascara
//$cpf = remove_mascara($cpf);
echo $cpf;


if (empty($cpf)){

    echo "Favor digitar seu CPF corretamente.<br />";
    $erro = 1;
}

if (empty($nome)){
    echo "Favor digitar seu nome corretamente.<br />";
    $erro = 1;
}

if (empty($sobrenome)){
    echo "Favor digitar seu sobrenome corretamente.<br />";
    $erro = 1;
}

if (strlen($email) < 8 || strstr($email, '@') == FALSE){
    echo "Favor digitar seu email corretamente.<br />";
    $erro = 1;
}

if (empty($conf_email) OR strstr($conf_email, '@') == FALSE){
    echo "Favor digitar a confirmação do seu email corretamente.<br />";
    $erro = 1;
}

if ($email != $conf_email){
    echo "O email e a confirmação não são iguais.<br />";
    $erro = 1;
}


if (empty($senha)){
    echo "Favor digitar sua senha corretamente.<br />";
    $erro = 1;
}

if (empty($conf_senha)){
    echo "Favor digitar a confirmação da sua senha corretamente.<br />";
    $erro = 1;
}

if ($senha != $conf_senha){
    echo "A senha e a confirmação não são iguais.<br />";
    $erro = 1;
}

if (empty($cidade)){
    echo "Favor digitar sua cidade corretamente.<br />";
    $erro = 1;
}

if ($erro == 0){
    echo "<br/>Todos os dados foram digitados corretamente!";
}

?>
</body>

</html>