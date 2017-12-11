<html lang="pt_BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= TITLE_SYS ?></title>
<!-- ARQUIVOS CSS -->
  <link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css">
  <link rel="stylesheet" href="<?= URL ?>public/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= URL ?>public/css/datatables.css">
  <script>var addr = '<?= URL ?>';</script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color:#303030;">
    <a class="navbar-brand" style="color:white;" href="<?= URL ?>Usuario/index"><?= $_SESSION[SESSION_LOGIN]->usu_nome ?></a>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
        <div class="" style="float:left; padding:19.5px 15px; height:60px; margin-left:5vw;">
          <ul class="list-inline">
            <li>
              <a href="<?= URL ?>Usuario/favoritos">Meus Favoritos</a>
            </li>
            <li>
              <a href="<?= URL ?>Usuario/filmes">Filmes</a>
            </li>
            <li>
              <a href="<?= URL ?>Usuario/atores">Atores</a>
            </li>
          </ul>
        </div>
        <div class="" style="padding:19.5px 15px; height:60px; float:right;">
          <a href="<?= URL ?>Login/logout">SAIR</a>
        </div>
      </nav>
      <div id="wrapper">
        <div class="container col-lg-12">
        <br />
        <br />
        <br />
