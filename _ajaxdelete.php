<?
if(isset($_GET["ID"]) && !empty($_GET["ID"])){
    //Instancia conexão
    require_once "config.php";
    $id = $_GET["ID"];
    // Prepare a delete statement
    $sql = "DELETE FROM usuarios WHERE ID = ".$id." ;";  
    
    if (mysqli_query($connect, $sql)) {
      
        echo "Ok";

 
    } else {
            echo "Erro na exclusao: " . $sql . "<br>" . mysqli_error($connect);
    }

    // Fecha conexão
    mysqli_close($connect);
}

?>