

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamentos</title>
   <!-- <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap3.3.7.min.css">-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 
   <!-- Importando o jQuery -->
  
  <!-- Importando o js do bootstrap -->

</head>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> << Retornar</a>
</nav>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    #example_wrapper{
        padding: 15px
    }
    .fa-edit{
        color: orange
    }
    .navbar-brand{
        background-color: #343a40 !important;
        color: white !important;
        width: 100%
    }
.modal-dialog{
  max-width: 1200px !important;
}
.modal-content{
  overflow-y: scroll;
    max-height: 500px !important;

}
    </style>
<body>
<?php
    $id = '';
    include ('../config/painel.php');
    
        
        $consulta = Conexao::conectar()->prepare("SELECT id_dados_mov, usuario_mov,sala_origem,sala_destino, data_mov FROM app.dados_mov WHERE status_mov = 'pendente'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();
       
    ?>

    <!--Criação da Tabela-->
    <table id="example" class="table  table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Data do Pedido</th>
                <th>Sala de Origem</th>
                <th>Sala de Destino</th>
                <th id="confirmar" >Aprovar Transferencia</th>
            </tr>
        </thead>
        <tbody id="myTable">

            <?php 
           $idPedido = 0;
            foreach($consulta as $consulta){
              
               
                $id = $consulta['id_dados_mov']
                ?>
            <tr>
                <td class="id_dados_mov" style="display:none;" data-name=<?php echo $consulta ['id_dados_mov'];?>><?php echo $consulta ['id_dados_mov'];?></td>
                <td><?php echo $consulta ['usuario_mov'];?></td>
                <td><?php echo $consulta ['data_mov'];?></td>
                <td><?php echo $consulta ['sala_origem'];?></td>
                <td class="salaDestino"><?php echo $consulta ['sala_destino'];?></td>
                <td> <button type="button" class="btn btn-primary" name = "exampleModal" data-toggle="modal" data-target="#exampleModal" >Aprovar</button></td>
            </tr>
            <?php }?>
          </tbody>   
         
          
    </table>




    <!--*******************************************************************************************************************************-->
    <?php
        $consultaItem = Conexao::conectar()->prepare("SELECT dados_mov_id, patrimonio_id FROM app.item_mov  "); 
        $consultaItem->execute();
        $consultaItem = $consultaItem->fetchAll();
?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados da Movimentação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div class="row">
              <div class ="col">  
                <label for="recipient-name" class="col-form-label">Pedido:</label>
                <label  class="pedido" id="idDoPedido"></label>
              </div>
              <div class ="col">  
                <label for="recipient-name" class="col-form-label">Sala Origem:</label>
                <label id="salaOrigem" class="salaO"></label>
              </div>
               <div class ="col">    
                <label for="recipient-name" class="col-form-label">Sala Destino:</label>
                <label id="salaDestino" class="salaD"></label>
              </div> 
          
                       
              <div class ="col"> 
                <label for="recipient-name" class="col-form-label">Data:</label>
                <label id="dataMov" class="data"></label>
              </div> 
                <div class ="col"> 
                <label for="recipient-name" class="col-form-label">Usuário:</label>
                <label id="userMov" class="data"></label>
               </div>
            </div>  
            
            
            <!--
            <input type="text" class="form-control" id="recipient-name">
            -->
          
          </div>
          <div class="form-group">
          
          <!-- 
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea class="form-control" id="message-text"></textarea>
          -->
          <!--Criação da Tabela-->
          <table id="exampleModal" class="table  table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Patrimônio</th>
                <th>Descricao</th>
                <th>Marca</th>
                <th>Modelo</th>

              </tr>
            </thead>
            <tbody id='pedido'></tbody> 
         
    </table>
          
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <a href='../config/updateMov.php'> <button type="button" class="btn btn-danger"  >Movimentar</button></a>
      </div>
              </form>

    </div>
  </div>
</div>
  <script src="../lib/jquery/js/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16. 1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script>
var idPedido;
$('.btn-primary').click( function(){
      idPedido = $(this).closest('tr').find('td').data('name');
      salaDestino = $(this).closest('tr').find('.salaDestino').text();
      id_dados_mov = $(this).closest('tr').find('.id_dados_mov').text();

  
 $.ajax({
					url : "../config/confirmar_mov.php",
					type : "GET",
          dataType: 'json',
          data:{idPedido:idPedido, salaDestino:salaDestino,id_dados_mov:id_dados_mov},
				    success: function(data){
                for (var i in data) {
                   $('#exampleModal > tbody').append(
                  
                        '<tr><td>' + data[i].numero_patrimonio + '</td>' +
                          '<td>' + data[i].descricao + '</td>' +
                          '<td>' + data[i].marca + '</td>' +
                          '<td>' + data[i].modelo + '</td></tr>' 
                   
                   );
               document.getElementById("idDoPedido").innerHTML =  idPedido;
              document.getElementById("salaOrigem").innerHTML =  data[i].sala_origem;
               document.getElementById("salaDestino").innerHTML =  data[i].sala_destino;
               document.getElementById("dataMov").innerHTML =  data[i].data_mov;
               document.getElementById("userMov").innerHTML =  data[i].usuario_mov;

               
              console.log(data[i].numero_patrimonio);
            }
          },
        });
     });
           $(".btn-secondary").click(function (event) {
                  $("#pedido").empty();
            });
            
  </script>

</body>
</html>