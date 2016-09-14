<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Postagens</title>
  </head>
  <body>
    <a href="blog/add_post"><button>Adicionar Postagem</button></a>
    <h2>Postagens</h2>
    <?php if($query):foreach($query as $post):?>
    <h4><a href="blog/post/<?php echo $post->id; ?>"><?php echo $post->titulo;?></a></h4>
    <?php echo $post->post;?>
    <br>
    <a href="blog/edit_post/<?php echo $post->id; ?>">Editar</a> | <a href="blog/delete_post/<?php echo $post->id; ?>"> Deletar </a>
    <?php endforeach; else:?>
    <h4>Nenhuma postagem encontrada!</h4>
    <?php endif;?>
  </body>
</html>