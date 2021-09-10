<?php
session_start();

    if (!isset($_SESSION['login']))
    {
        header("Location:../index.php");
    }
    
    
?>
<?php
include ('../config/painel.php');

$sql = Conexao::conectar()->prepare("SELECT * FROM app.dados_mov WHERE status_mov = 'pendente'");
			$sql->execute();
      $sql = $sql->fetch();
   
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Patrimônio Web CRBE</title>
  <link href="../lib/font-awesome/css/all.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../css/simple-sidebar.css" type="text/css">
</head>
<style>

 @keyframes fa-exclamation-triangle {
     0% { opacity: 1; }
     50% { opacity: 0.5; }
     100% { opacity: 0; }
 }
.fa-exclamation-triangle {
  
   animation: fa-exclamation-triangle .90s linear infinite;
}
</style>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Patrimônio WEB</div>
      <div class="list-group list-group-flush">
        <a href="cadastrar.php" class="list-group-item list-group-item-action bg-light" >Cadastrar Equipamentos</a>
        <a href="editar.php" class="list-group-item list-group-item-action bg-light" > Editar Equipamentos</a>
        <a href="consultar.php" class="list-group-item list-group-item-action bg-light">Consultar Equipamentos</a>
        <a href="movimentacao.php" class="list-group-item list-group-item-action bg-light">Movimentar Patrimônio</a>
        <a href="updateTransferencia.php" class="list-group-item list-group-item-action bg-light">Aprovar Movimentação
  <?php
	if($sql  == '')
      echo '<i class="fas fa-exclamation-triangle" style="display:none"></i>';
				//echo ' <i class="fas fa-exclamation-triangle"></i>';
			else
				echo '<i class="fas fa-exclamation-triangle" ></i>';
?>
      </a>

       
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a id="menu-toggle" href="#" ><i class="fa fa-bars fa-2x pt-2"></i></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               <?php echo $_SESSION['uname']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <main id="painel">

          </main>
      </div>
      
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->



  <script src="../lib/jquery/js/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
     function changePage(page) {
        let painel = $("#painel");
        painel.empty();
        painel.load(page + ".php");
      }
  </script>

</body>

</html>