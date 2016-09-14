<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Postagens</title>
  </head>
  <body>
    <a href="<?php echo site_url() ?>">Voltar</a>
    <hr>
    <h2><?php echo $post->titulo; ?></h2>
    <h5><?php echo $post->post; ?></h5>
    <img src="<?php echo site_url().$post->imagem; ?>" alt="">
  </body>
</html>