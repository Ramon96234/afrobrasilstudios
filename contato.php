<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = strip_tags(trim($_POST["nome"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

  $destino = "contato@afrobrasil.com.br"; // ALTERE para seu e-mail real
  $assunto = "Nova mensagem do site AfroBrasil";

  $conteudo = "Nome: $nome\n";
  $conteudo .= "Email: $email\n\n";
  $conteudo .= "Mensagem:\n$mensagem\n";

  $headers = "From: $nome <$email>";

  if (mail($destino, $assunto, $conteudo, $headers)) {
    echo "<p>Mensagem enviada com sucesso! Obrigado por entrar em contato.</p>";
  } else {
    echo "<p>Erro ao enviar mensagem. Tente novamente.</p>";
  }
} else {
  header("Location: contato.html");
}
?>
