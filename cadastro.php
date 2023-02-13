<?php

$nome = $_POST['nome'];
$whatsapp = $_POST['whatsapp'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$status = $_POST['email'];
$observacao = $_POST['observacao'];
require_once "config.php";
 
 
        $query = "INSERT INTO usuarios ( nome, whatsapp, telefone, email, status, observacao) VALUES ('$nome','$whatsapp', '$telefone','$email','$status','$observacao')";
        $insert = mysqli_query($connect,$query);
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='lista.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
   
?>