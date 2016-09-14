<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Editar Postagem</title>
</head>
 
<body>
  <a href="<?php echo site_url() ?>">Voltar</a>
  <hr>
  <h2>Editar post</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <?php echo form_open('blog/edit_post/'.$id);?>
  <p>Titulo:<br />
  <input type="text" name="titulo" value="<?php echo $post->titulo ?>" />
  </p>
  <p>Postagem:<br />
  <textarea name="post" rows="5" cols="50" style="resize:none;"><?php echo $post->post ?></textarea>
  </p>
  <p>Imagem:<br/>
  <input type="file" name="userfile" />
  </p>
  <input type="submit" value="Atualizar" />
  <?php echo form_close();?>
</body>
</html>