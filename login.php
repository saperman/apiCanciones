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
      function LogIn(){
        var passwordInput = document.getElementById("password");
        var userNameInput = document.getElementById("userName");
        if(passwordInput.value != "" && userNameInput.value != "")
        {
          var params = "password="+passwordInput.value+"&userName="+userNameInput.value;
          var ajax_url = "http://localhost:8888/UsuariosBueno/fuelphp/public/ControladorUser/login.json";
          var ajax_request = new XMLHttpRequest();
          
          ajax_request.onreadystatechange = function(){
            if (ajax_request.readyState == 4) {
              
              var response = JSON.parse(ajax_request.responseText); 
              window.localStorage.setItem('token', response.data);
            } else {
              // aun no esta listo
            }
          }
          ajax_request.open("POST", ajax_url, true);
          ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          //Enviamos la solicitud junto con los parámetros
          ajax_request.send(params);
        }else{
          console.log("Falta algun dato");
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
              <p class="text-center"> LOG IN</p>
            </div>
            <div class="col-xs-12">
              <div class="form-group">
                <label for="name">Nombre de usuario</label>
                <input type="name" class="form-control" id="userName">
                <label for="name">Password</label>
                <input type="name" class="form-control" id="password">
              </div>
              <button type="submit" class="btn btn-default" onclick="LogIn()">Log In</button>
            </div>
          </div>
    </div>
  </body>
</html>

