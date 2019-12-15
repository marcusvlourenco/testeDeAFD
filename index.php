<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AFD - Trabalho</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .iframe{
            height:100%;
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }
        
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="descricao.php" target="iframe">
        <img src="arquivos/UEM-LFA.png" alt="logo" style="width:90px;">
      </a>
      <ul class="navbar-nav">
          <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <button type="button" class="btn btn-secondary">Descrição Formal</button>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="inserir.php" target="iframe">
                <button type="button" class="btn btn-primary">Inserir</button>
            </a>            
          </div>
        </li>
      </ul>
    </nav>
    
    
    
    <div class="container-fluid text-center">    
            <div class="row content">                
                <div class="col-sm-0 sidenav">
                   
                        
                </div>
                <div class="col-sm-12 text-left"> 
                
                    <div class="embed-responsive embed-responsive-4by3">
                        
                        <iframe class="embed-responsive iframe"  src="descricao.php"  name="iframe"></iframe>
                    </div>                   
                </div>
                <div class="col-sm-0 sidenav"> 
                                     
                </div>
            </div>
        </div>
        <footer class="container text-center">
            :)
        </footer>
    
    
    
    
  </body>
</html>
