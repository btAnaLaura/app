<?php
// Incluir arquivo de configuração
require_once "config.php";
require_once "menu.html";


if ($_GET['id']){
    $sql = "SELECT * FROM usuarios where id = '".$_GET['id']."';";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<table class='table table-bordered table-striped' id='tabela' >";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Id</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Whatsapp</th>";
                            echo "<th>Telefone</th>";
                            echo "<th>Email</th>";
                            echo "<th>Status</th>";
                            echo "<th>Adicionais</th>";
                        
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    
                        echo "<tr id='linha" . $row['ID'] . "'>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['whatsapp'] . "</td>";
                            echo "<td>" . $row['telefone'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['observacao'] . "</td>";
                          
                        echo "</tr>";
                    
                    echo "</tbody>";                            
                echo "</table>";
                
                echo "<div style='margin-left: 20px';> <a href='lista.html' class='btn btn-default'>Voltar</a></div>";
                } 
            }else{
                    echo "<p class='lead'><em>Registros não encontrados.</em></p>";
                }
    }else{
        echo "ERROR: Não há tabela  $sql. " . mysqli_error($connect);
    } 
            
    } 


    // Fechar conexão com banco
    mysqli_close($connect);
    
    

?>

<style>
     #tabela {
        margin: 20px;
        max-width: 1500px !important;
    }
</style>