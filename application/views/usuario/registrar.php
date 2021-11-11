<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Faça seu registro</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com//docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com//docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com//docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com//docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://getbootstrap.com//docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">

<p><?= $this->session->flashdata("msg"); ?></p>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Faça seu registro</h4>
	<form method="post" action="<?= base_url('usuario/registrar')?>">
	<div class="form-group input-group">
        <input name="nome" class="form-control" placeholder="Nome completo" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
        <input name="login" class="form-control" placeholder="Nome de usuário" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
        <input name="senha" class="form-control" placeholder="Senha" type="password">
    </div> <!-- form-group// -->
    
     <!-- form-group// -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Crie sua conta  </button>
    </div> <!-- form-group// -->      
    <p class="text-center"><?= anchor("usuario/login", "Já tem conta? Faça login");?></p>                                                                 
    </form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
</main>


    
  </body>
</html>
