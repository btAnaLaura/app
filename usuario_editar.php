<?php
// Incluir arquivo de configuração
require_once "config.php";
require_once "menu.html";


if ($_GET['id']){
    $sql = "SELECT * FROM usuarios where id = '".$_GET['id']."';";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $_u_usuarios_id = $row['ID'];
                $_u_usuarios_nome = $row['nome'];
                $_u_usuarios_status = $row['status'];
                $_u_usuarios_whatsapp = $row['whatsapp'];
                $_u_usuarios_telefone = $row['telefone'];
                $_u_usuarios_email = $row['email'];
            }
        }
    }
} 
 
?>
 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.scss">

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<?
 
 if ($_GET['id']){
    $a = 'u';
    $texto = 'Editar';
}else{
    $a = 'i';
    $texto = 'Criar';
}

require_once "dados.php";



    // Fechar conexão com banco
    mysqli_close($connect);

?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><?=$texto;?> Registro</h2>
                    </div>
                    <p>Preencha os campos com os dados novos </p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?=$_GET['id']?>" method="post">
                   <div class="row">
                    <div class="col-md-3"> 
                         <label>Nome</label>
                            <input type="text" name="<?=$a;?>_usuarios_nome" class="form-control" value="<?=$_u_usuarios_nome;?>" placeholder="Preencha seu nome"  required oninvalid="this.setCustomValidity('Campo nome obrigatório')" onchange="try{setCustomValidity('')}catch(e){}">
                      </div>
                    <div class="col-md-3">
                           <label>Whatsapp</label>
                            <input type="number" name="<?=$a;?>_usuarios_whatsapp" class="form-control" value="<?=$_u_usuarios_whatsapp;?>" placeholder="Preencha seu whatsapp"  required oninvalid="this.setCustomValidity('Campo whatsapp obrigatório')" onchange="try{setCustomValidity('')}catch(e){}">
                            </div>
                    <div class="col-md-3">
                    <label>Email</label>
                            <input type="text" name="<?=$a;?>_usuarios_email" class="form-control" value="<?=$_u_usuarios_email;?>" placeholder="Preencha seu Email"  required oninvalid="this.setCustomValidity('Campo email obrigatório')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                  <div class="col-md-3">
                    <label>Telefone</label>
                            <input type="number" name="<?=$a;?>_usuarios_telefone" class="form-control" value="<?=$_u_usuarios_telefone;?>" placeholder="Preencha seu telefone"  required oninvalid="this.setCustomValidity('Campo telefone obrigatório')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                   </div>
                     <div class="row">
                     
                        <div class="col-md-3">
                               <div class="form-group">
                           <label   for="status">Status do cadastro:</label>
                            <select name="<?=$a;?>_usuarios_status" id="status" value="<?=$_u_usuarios_status;?>">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                            <option value="Incompleto">Incompleto</option>
                            </select>  
                        </div> 
                        </div>
                        <div class="col-md-6">
                        <label>Adicionais:</label> <textarea class="form-control" name="<?=$a;?>_usuarios_observacao" value="<?=$_u_usuarios_observacao;?>" id="observacao" rows="3"></textarea><br>
                        </div>
                    
                        </div>
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

    <div id="footer"></div>
</body>

</html>
<style>
    #formulario {
        margin: 50px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 2rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--bs-body-color);
        background-color: var(--bs-form-control-bg);
        background-clip: padding-box;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        border-color: rgb(243, 241, 241) !important;
    }

    label {
        color: rgb(24, 19, 114);
        font-size: 1.75rem;
    }

    select {
        width: 250px;
        height: 30px;
        font-size: 17px;
        background-color: var(--bs-form-control-bg);
        padding-left: 75px;
        border-color: rgb(228, 228, 228) !important;
        border-radius: 0.375rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        background-clip: padding-box;

    }

    #observacao {
        height: 150px;

    }
    #cadastrar{
        margin-top: 148px;
    }
</body>
</html>
