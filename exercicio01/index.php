<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Cadastro de usuários</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td, th {
            padding: 10px;
            
        }
        

       

        tr:nth-child(odd) {
            background-color: white;
        }
    </style>
</head>
<body>


    <!-- formulário de cadastro de usuário -->
    <h2>Cadastro de usuário</h2>

<form action = "index.php" method = "post">
    <table>
        <tr>
            <td>
                <label>Nome Completo</label>
                <input type="text" name="nome" />

            </td>
        </tr>
        <tr>
            <td>
                <label>E-mail</label>
                <input type="text" name="login" />
            </td>
        </tr>

        <tr>
            <td>

                <label>Senha</label>
                <input type="text" name="senha" />

            </td>
        </tr>

        <tr>
            <td>

                <input type="submit" name="botao_cadastrar" value="Cadastrar" />
            </td>
        </tr>

    </table>
</form>    

    <?php
            $servidor="cursophp_db_1";
            $usuario="root";
            $senha="phprs";
            $banco="tickets";

            $conn= new mysqli ($servidor, $usuario,$senha,$banco);

        if($conn->connect_error){
            die("Falha de conexão: " . $conn->connect_error);
        }    

       
        

        // Função de DESATIVAR usuário
        if(($_GET["id"]!="") && (isset($_GET["status"]))){
            $sql = "UPDATE `usuario` SET `status` = ".($_GET["status"]== 1? "0" : "1")." WHERE `usuario`.`id` = ".$_GET["id"];
            if($conn->query($sql)===TRUE){
                echo "Status alterado com sucesso!";
            }else{
                echo "Ocorreu um erro" .$sql. "<br/>".$conn->error;
            }    
        }

        if(($_POST["nome"] != "")&& ($_POST["login"] != "")&&($_POST["senha"] != "")){
         //cripto senha
        
        $criptografada = md5($_POST["senha"]);
       
            $sql = "INSERT INTO `usuario`(`nome`,`login`,`senha`,`status`) VALUES ('".($_POST ["nome"])."','".($_POST ["login"])."','".$criptografada."',0)";
            if($conn->query($sql)===TRUE){
                echo"Usuário Cadastrado!";
            }else{
                echo"ocorreu um erro: " .$sql. "<br/>".$conn->error;
            }

        }


    ?>   


   <!-- Lista de usuário -->
    <?php
        //Função LISTAR usuário
        $sql = "SELECT * FROM `usuario`";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
        <h2>Usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome completo</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Status</th>
                <th>Desativar</th>
            </tr> 
        <?php
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row["id"]."</td>";
                echo "<td>". utf8_decode($row["nome"])."</td>";
                echo "<td>". utf8_decode($row["login"])."</td>";
                echo "<td>". utf8_decode($row["senha"])."</td>";
                echo "<td>".($row["status"]=='0'? "Desativado":"Ativo")."</td>";
                echo "<td><a href='index.php?id={$row["id"]}&status={$row["status"]}'>".($row["status"]=='0'? "Ativar":"Desativar")."</a></td>";
            }
        ?>
        </table>
        <?php
            }else{
                echo "Nenhum registro";
            }
            $conn->close();
        ?>


    <!-- Edição de usuário -->
    <table>
        <h2> Editar usuário</h2>
        <tr>
            <td>
                <label>Nome Completo: </label>
                <label>Franciele Castilho</label>
            </td>
        </tr>
        <tr>
            <td>
                <label>E-mail: </label>
                <label>francielecasteves@gmail.com</label>
            </td>
        </tr>

        <tr>
            <td>

                <label>Senha</label>
                <input type="text" name="senha_editar" />

            </td>
        </tr>

        <tr>
            <td>

                <input type="submit" name="botao_editar" value="Salvar" />
            </td>
        </tr>
    </table>

</body>
</html>