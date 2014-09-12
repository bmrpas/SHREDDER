<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset= "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> 
		@section('titulo')
		Gestión de Localización de Información
		@show
	</title>

	<!-- CSS -->
	{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/bootstrap-theme.min.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/theme.css', array('media' => 'screen')) }}


</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">BMR</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Inicio</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                	@yield('consultar')
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Agregar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                	@yield('agregar')
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Editar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                	@yield('editar')
               </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eliminar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                	@yield('eliminar')
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </div>
  <div class="container">
  	@yield('contenido')
  </div>

    {{ HTML::script('assets/js/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/docs.min.js') }}

  
</body>

</html>