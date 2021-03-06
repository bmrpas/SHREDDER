<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap</title>
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/starter-template.css', array('media' => 'screen')) }}
    <!--{{ HTML::style('assets/css/dashboard.css', array('media' => 'screen')) }}-->

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--{{ HTML::script('assets/js/ie-emulation-modes-warning.js') }}-->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--{{ HTML::script('assets/js/ie10-viewport-bug-workaround.js') }}    -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li> <a href="/">Listar</a> </li>
            <!--li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <!--h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p-->
          

          @yield('index')
          @yield('contenido')
          @yield('accion')
          @yield('status')
          




          

      <?php /* {{ Form::open(array('url' => 'foo/bar')) }}
            
           {{ Form::select('size', array('L' => 'Large', 'S' => 'Small')); }}


      {{ Form::close() }}
      
      */ ?>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{ HTML::script('assets/js/jquery.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/jquery-1.11.1.min.js') }}


  
  </body>
</html>