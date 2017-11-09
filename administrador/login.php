<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de Session</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="dist/js/site.min.js"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: white;
        color: #FF6400;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <img class="espacio-imagen center-block"  src="../investiga_files/headerlogoUAT.png" style="width: 40%;">
      <form class="form-signin" role="form" action="Procesar_login.php" method="POST">
        <h3 class="form-signin-heading" style="text-align: center;">Inicio de Sesión</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" autocomplete="off" style="color: black" />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" style="color: black"/>
          </div>
        </div>
        <button class="btn btn-lg btn-default btn-block" style="background-color: #373E4A; color: white" type="submit">Entrar</button>
      </form>

    </div>
 
  </body>
</html>
