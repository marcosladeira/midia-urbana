<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviando...</title>
</head>

<body onload="confirma()">
    <?php
    if ($_POST) {
        $para = "marcosladeirarolim@gmail.com";
        $assunto = $_POST["assunto"];

        $corpo = "Nome: " . $_POST["nome"] . "<br>";
        $corpo .= "Email: " . $_POST["email"] . "<br>";
        $corpo .= "Telefone: " . $_POST["fone"] . "<br><br>";
        
        $corpo .= "Mensagem: " . $_POST["corpo"] . "<br>";

        $cabecalho = "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $cabecalho .= "From: " . ($_POST["email"] . "\r\n");
        $cabecalho .= "Reply-to: " . ($_POST["email"] . "\r\n");

        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $resultado = mail($para, $assunto, $corpo, $cabecalho);
            if ($resultado) {
                $mensagem = "Email enviado com sucesso";
            } else {
                $mensagem = "Falha ao enviar o email. Revise suas informações ou tente novamente mais tarde";
            }
        } else {
            $mensagem = "Falha ao enviar, Email incorreto";
        }
        echo ("<script>
                function confirma() {
                    if (confirm('" . $mensagem . "')) {
                       window.location.replace('" . $_POST["retorno"] . "');
                    }else{
                        window.location.replace('" . $_POST["retorno"] . "');
                    }
                }
            </script>");
    }
    ?>
</body>
<script>
    
</script>
</html>