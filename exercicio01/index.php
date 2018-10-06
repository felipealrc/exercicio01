<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!--<style>
           table,td, th{
               border:1px solid black;
               border-collapse:collapse;
           }
           td,th{
               padding:10px;
           }
           th{
               text-align:left;
               background-color:black;
               color:white;
           }
           tr:nth-child(even){
               background-color:silver;
           }
           tr:nth-child(odd){
               background-color:white;
           }
    </style>-->

</head>

<body>
    <?php 
        $bdUser = 'root';
        $bdPasswd = 'phprs';
        $bdServer = 'cursophp_db_1';
        $bdName = 'tickets';
        $nome = $login = $status = $id = '';

        $conn = new mysqli($bdServer,$bdUser,$bdPasswd,$bdName);
        if($conn->connect_error){
            $die('Erro de conexão no DB'.$conn->connect_error);
        }
        if($_GET['id'] != ""){
            if(isset($_GET['enable'])){
                $status = ($_GET['enable'])? 0 : 1;
                $sql= "UPDATE usuario SET status = {$status} where id = {$_GET['id']}"; 
                $conn->query($sql);
            }
            elseif(isset($_GET['update'])){
                $sql= "SELECT * FROM usuario WHERE id = {$_GET['id']} LIMIT 1"; 
                $result = $conn->query($sql)->fetch_assoc();
                if(isset($result)) {
                    $nome = $result['nome'];
                    $login = $result['login'];
                    $status = $result['status'];
                    $id= $result['id'];
                }

            }
        }
        
        if($_POST['login'] != "" && $_POST['senha'] != "" && $_POST['status'] != "" && $_POST['nome'] != "")
        {
            if($_POST['id']!= ''){
                if(isset($_POST['senha'])){
                    $sql= "UPDATE usuario SET senha = {$_POST['senha']} where id = {$_GET['id']}"; 
                    $conn->query($sql);
                }
                else{
                    echo "<script>alert('senha não alterada');</script>";
                }
            }
            else{
                $sql = "INSERT INTO usuario (`nome`,`login`,`senha`,`status`) 
                VALUES('".$_POST['nome']."','".$_POST['login']."','".$_POST['senha']."',".$_POST['status'].")";
                    if(!$conn->query($sql)=== TRUE){
                    echo $conn->error.'<br>'.$sql;
                }
            }
        }
    ?>
    <h1>Usuário</h1>
    <p>Cadastrar</p>
    <form action="index.php" method="POST">
        <div class="form-group row">
            <div class="col-md-6">
                <input style="display:none" name="id" value=<?echo $id;?> ></label>
                <input name="nome" class="form-control" type="text" value="<?echo $nome;?>" placeholder="Nome Completo" />
                <input name="login" type="text" class="form-control" placeholder="Login" value="<?echo $login;?>" />
                <input name="senha" type="password" class="form-control" placeholder="Senha" />
                <label class="form-control">Ativo?</label>
                <select name="status" class="form-control" title="Ativo?">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
                <input type="submit" class="btn btn-primary" name="btnAddUser" value="Gravar Usuário" />
            </div>
        </div>
    </form>
    <div>
        <?php
            $sql = 'SELECT * FROM `usuario` ';
            $result = $conn->query($sql);
            if(!$result->num_rows){
                echo "<b>Sem usuários cadastrados</b>";
            }
            else{
            ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome Completo</th>
                    <th>Login</th>
                    <th>status</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?
                    while($row = $result->fetch_assoc()){
                        $status = ((bool) $row['status']? 'Ativo' : 'Inativo');
                        $lbl = ((bool) $row['status']? 'Desativar' : 'Ativar');
                        $code = '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['login'].'</td>
                                    <td>'.$status.'</td>
                                    <td><a href="index.php?id='.$row['id'].'&enable='.($row['status']).'"> '.$lbl.'</td>
                                    <td><a href="index.php?id='.$row['id'].'&update=TRUE"> alterar senha </td>
                                </tr>'; 
                       echo $code;
                    }?>
            </tbody>
        </table>
        <?php
            }
        ?>
    </div>

</body>
</html>