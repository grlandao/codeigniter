<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Adicionar Postagem</title>
  </head>
 
<body>
  <a href="<?php echo site_url() ?>">Voltar</a><hr>
  <h2>Adicionar novo POST</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <?php echo form_open_multipart('blog/add_post');?>
  <p>Titulo:<br />
  <input type="text" name="titulo" />
  </p>
  <p>Postagem:<br />
  <textarea name="post" rows="5" cols="50" style="resize:none;"></textarea
>  </p>
  <p>Imagem:<br/>
  <input type="file" name="userfile" />
  </p>
  <input type="submit" value="Postar" />
  <?php echo form_close();?>
</body>
</html>