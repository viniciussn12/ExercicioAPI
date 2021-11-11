<?= $this->session->flashdata('msg'); ?>

<?= form_open_multipart('usuario/uploadfoto'); ?>
    Nome: <input type="text" name="nome"><br/>
    Login: <input type="text" name="login"><br/>
    Senha: <input type="password" name="senha"><br/>
    <input type="file" name="foto_usuario"><br>
    <button type="submit">Upload</button>
<?= form_close(); ?>

<?php
    $usuario = $this->session->userdata("usuario");
    echo $usuario->foto;
?>

<img src="<?= base_url($usuario->foto)?>"/>

<?= img($usuario->foto) ?>


<a href="<?= base_url($usuario->foto)?>">Download</a>