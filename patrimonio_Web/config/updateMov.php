<?php
        require_once('conexao.php');
       
session_start();

         $id_Mov       =  $_SESSION['patrimonio_id'];
         $updateSala   =  $_SESSION['salaDestino'];     
         $id_Dados_Mov =  $_SESSION['id_dados_mov'];
    
         foreach($id_Mov  as $key=>$item){
    $id_Mov = $item['patrimonio_id'].'<br>';       
        $update = Conexao::conectar()->prepare("UPDATE app.patrimonio_old
		            SET id_localizacao = $updateSala  WHERE id = :id_Mov");
         //$update->bindparam(':updateSala', $updateSala[$item]);
         $update->bindparam(':id_Mov', intval($id_Mov));
         $update->execute();
      
         
    }
        
         
         $updateStatus = Conexao::conectar()->prepare("UPDATE app.dados_mov  SET  status_mov = 'concluido' 
          WHERE id_dados_mov = :id_Dados_Mov  ");
         $updateStatus->execute(array(':id_Dados_Mov' => intval($id_Dados_Mov)));

        echo  "<script>alert('Itens Movimentado com Sucesso!');
            window.location.replace('../pages/main.php');
        
        </script>";
        
   ?>