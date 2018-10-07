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
    <!-- Lista de usuário -->
    <table>
        <tr>
            <h2>Usuarios</h2>
            <td>ID</td>
            <td>Nome completo</td>
            <td>Nome de acesso</td>
            <td>Senha</td>
            <td>Status</td>
            <td>Editar</td>
            <th>Desativar</th>
        </tr>
    </table>

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