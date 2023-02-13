 
<?php
// Incluir arquivo de configuração
require_once "config.php";

// Tenta selecionar a execução da consulta
$sql = "SELECT * FROM usuarios";
if($result = mysqli_query($connect, $sql)){
   
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-bordered table-striped' style = 'margin-left: 20px;'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Whatsapp</th>";
                    echo "<th>Telefone</th>";
                    echo "<th>Email</th>";
                    echo "<th>Status</th>";
                    echo "<th>Adicionais</th>";
                    echo "<th>Ação</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr id='linha" . $row['ID'] . "'>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['whatsapp'] . "</td>";
                    echo "<td>" . $row['telefone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['observacao'] . "</td>";
                    echo "<td>";
                        echo "<a href='usuario_visualizar.php?read=y&id=". $row['ID'] ."' title='Ver Registro' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'style='color:#0D4970 '></span></a>";
                        echo "<a href='usuario_editar.php?id=". $row['ID'] ."' title='Editar Registro' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil' style='color:#0D4970 '></span></a>";
                        echo "<a href='#' onclick='deletaRegistro(". $row['ID'] .")' title='Excluir Registro' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'style='color:#0D4970 ; '></span></a>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Conjunto de resultados
        mysqli_free_result($result);
    } else{
        echo "<p class='lead'><em>Registros não encontrados.</em></p>";
    }
} else{
    echo "ERROR: Não há tabela  $sql. " . mysqli_error($connect);
}

// Fecha conexão
mysqli_close($connect);
?>
<script>
function deletaRegistro(id)
{
    $.ajax(
    {
        type: "POST",
        url: "_ajaxdelete.php?ID="+id,
        dataType: "html",
        success: function(result)
        {
            //estudar SELECTOR de jquery
            console.log("result:"+ result);
            if(result == "Ok"){
                $("#linha"+id).hide();
                alert("Registro excluido com sucesso!");
                window.location.reload();
            } 
            else alert("Erro ao excluir registro: "  + result);
        }
    });
}
</script>
<style>
    .table{
        max-width: 95%;
    }
</style>