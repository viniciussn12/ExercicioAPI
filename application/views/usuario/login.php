
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <meta name="google-signin-client_id" content="608934731128-i5mttgh99o0cpocje70l0bflh2sl7etc.apps.googleusercontent.com">
    <title>Faça login no sistema</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets/css/estilo.css')?>" rel="stylesheet">

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

  <p><?= $this->session->flashdata("msg") ?></p>   
  <form method="post" action="<?= base_url('usuario/autenticar')?>">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Faça login</h1>
    <label for="inputUsuario" class="visually-hidden">Usuário</label>
    <input type="text" name="login" id="inputUsuario" class="form-control" placeholder="Nome de usuário" required autofocus>
    <label for="inputSenha" class="visually-hidden">Senha</label>
    <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Acessar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
  </form>
  <p><?= anchor("usuario/novo", "Não possui cadastro?"); ?></p>
  <p><a href="#" id="suap-login-button">Login com SUAP</a></p>
  
  <input type="hidden" id="logado" value=<?= $this->session->userdata("usuario")?"S":"N"?>>
  <input type="hidden" id="logoff" value=<?= $this->session->flashdata("logoff_api")?"S":"N"?>>
  
  <div class="container">
  <div class="row">
    <div class="d-flex justify-content-center">
    <div class="g-signin2" data-onsuccess="loginGoogle"></div>
    </div>
  </div>
</div>

  
  

  
</main>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
    <script src="<?= base_url('assets/js/api_suap/client.js')?>"></script>
    <script src="<?= base_url('assets/js/api_suap/js.cookie.js')?>"></script>
    <script src="<?= base_url('assets/js/api_suap/settings.js')?>"></script>
    <script src="<?= base_url('assets/js/login.js') ?>"></script>
    

  </body>
</html>
