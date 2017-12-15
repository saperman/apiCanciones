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

    <title>Usuarios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
      function borrarUser(id){
        var params = "id="+id;
        var ajax_url = "http://localhost:8888/UsuariosBueno/fuelphp/public/ControladorUser/delete.json";
        var ajax_request = new XMLHttpRequest();

        ajax_request.onreadystatechange = function(){
          if (ajax_request.readyState == 4) {

            var response = JSON.parse(ajax_request.responseText);
            console.log(response.data);
            // window.location.reload();
          } else {
            // aun no esta listo
            }
        }
        ajax_request.open("POST", ajax_url, true);
        ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Enviamos la solicitud junto con los parámetros
        ajax_request.send(params);
      }
      function getUsers(){
        var tabla = document.getElementById("tableBody");
        var ajax_url = "http://localhost:8888/UsuariosBueno/fuelphp/public/ControladorUser/users.json";
        var ajax_request = new XMLHttpRequest();

        ajax_request.onreadystatechange = function(){
          if (ajax_request.readyState == 4) {
            var response = JSON.parse(ajax_request.responseText);
            console.log(response.data);
            if(response.data){
               var users = response.data
              for(var user in users){
                var fila = '<tr><td>'+users[user].id+"</td><td>"+users[user].userName+'</td><td><button class="btn btn-default" onclick="borrarUser('+users[user].id+')">Borrar Usuario</button></td></tr>';
                    tabla.innerHTML += fila;
              }
            }
          }
        }
        ajax_request.open("GET", ajax_url, true);
        ajax_request.setRequestHeader('Authorization', window.localStorage.getItem('token'));
        ajax_request.send();
      }
      function closeSession(){

        window.localStorage.setItem('token', "");
        window.location.assign("http://localhost:8888/UsuariosBueno/");
      }
    </script>
  </head>

  <body onload="getUsers();">
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
      <div class="container col-xs-6">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Firstname</th>
            </tr>
          </thead> 
          <tbody id= "tableBody">
               <!-- <?php 
               //include 'peticionesCurl.php';
               //$peticion = new peticionesCurl(1); 
               ?> -->
          </tbody>
        </table>
      </div>
      <div class="container col-xs-6">
      <div class="col-md-6" style="min-height: 60px">
        <button class="btn btn-default btn-center" onclick="closeSession()"> Cerrar Sesión</button>
      </div>
    </div>
    <div class="col-xs-12">

    </div>
    </div>
  </body>
</html>

