<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $to = "afrobrasilstudios@gmail.com";
    $subject = "Novo contato do site AfroBrasil";
    $body = "Nome: $nome\n";
    $body .= "Email: $email\n";
    $body .= "Mensagem:\n$mensagem\n";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Mensagem enviada com sucesso!</p>";
    } else {
        echo "<p>Erro ao enviar mensagem. Tente novamente.</p>";
    }
}
?>
