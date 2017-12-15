<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>LOG IN USUARIOS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
      function Autenticar(){
        if(localStorage.getItem('token') != null){
          var ajax_url = "http://localhost:8888/UsuariosBueno/fuelphp/public/ControladorUser/authenticate.json";
          var ajax_request = new XMLHttpRequest();
         
          ajax_request.onreadystatechange = function(){
            if (ajax_request.readyState == 4) {
              var response = JSON.parse(ajax_request.responseText);
              console.log(response);
            } else {
              // aun no esta listo
            }
          }
          ajax_request.open("POST", ajax_url, true);
          ajax_request.setRequestHeader("Authentication", localStorage.getItem('token'));
          //Enviamos la solicitud junto con los parámetros
          ajax_request.send();
        }else{
          console.log("no hay registro de login");
        }
    }
      
    </script>
    
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Usuarios</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" style="min-height: 50px">
    </div>
    
    <div class="col-xs-12">
      <div class="container col-xs-12">
        <div class="col-md-pull-12" style="min-height: 60px">
          <p class="text-center"> Autenticacion </p>
        </div>
        <div class="col-xs-12">
        <div class="form-group">
          <div class="col-xs-12">
            <p class="text-center" id="textoAutenticacion"> Pulsa para autenticar </p>
          </div>
          <div class="col-xs-12">
            <button class="btn btn-default" onclick="Autenticar()"> Autenticar </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

