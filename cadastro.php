

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            background-color: #050b18;

            background-image: radial-gradient(
            circle,
            #168cff 1px,
            transparent 1px
    );

            background-size: 40px 40px;
    }

        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        main {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-top: 0;
            margin-bottom: 30px;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #555555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
}
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <br>

            <label for="celular">Celular:</label>
            <input type="tel" name="celular" required>
            <br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
            <input type="submit" value="Cadastrar">
            
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = simplexml_load_file("usuarios.xml");
    $novo = $usuario->addChild("usuario");
    $novo->addChild("nome", $_POST["nome"]);
    $novo->addChild("celular", $_POST['celular']);
    $novo->addChild("email", $_POST["email"]);
    $novo->addChild("senha", md5($_POST["senha"]));
    $usuario->asXML("usuarios.xml");
    echo"<p class='success'>Usuário cadastrado com sucesso!</p>
    <script>
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 2000);
        </script>";
}
?>
        </form>
    </main>
    
</body>
</html>
