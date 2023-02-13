<?
//configuração da pasta de upload
$uploaddir = './uploads/';
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $virgula = '';
    foreach($_POST as $key => $value){

        
        $dados = explode("_",$key);

        $_acao = $dados[0];
        $_tabela =  $dados[1];
        $sql_chave_insert .= $virgula.$dados[2];
        $sql_valor_insert .= $virgula."'".$value."'";

        $sql_chavevalor_update .= $virgula.$dados[2]." = '".$value."' ";

        $virgula = ', ';
    } 


    if($_acao == 'i'){
        $sql = "INSERT into ".$_tabela." ( ".$sql_chave_insert.") values ( ".$sql_valor_insert.");";
    }elseif($_acao == 'u'){
        $sql = "update ".$_tabela." set  ".$sql_chavevalor_update." where id = ".$_GET['id']." ;";     
    }


    if (mysqli_query($connect, $sql)) {
        echo "Inserido/atualizado com sucesso " ;
        if($_acao == 'i'){
            $last_id = mysqli_insert_id($connect);
        }
        echo "novo registro criado com sucesso, ultimo id é ".$last_id;

    

         header("location: lista.html");
    } else {
            echo "Erro na insercao: " . $sql . "<br>" . mysqli_error($connect);
    }
}
 
       
?>

