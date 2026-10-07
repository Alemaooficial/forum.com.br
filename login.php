<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $usuarios = simplexml_load_file("usuarios.xml");
    foreach ($usuarios->usuario as $u) {
        if ($u->email === $_POST['email'] && $u->senha == md5($_POST['senha'])) {
            $_SESSION['usuario'] = (string) $u->email;
            echo "Login realizado com sucesso! <a href='criar_topico.php'>Criar tópico</a>";
            exit;
        }
    }
    echo "Login inválido!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form {
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <select>
            <form method="POST">
                <label  for="email">Email:</label>
                <input type="email" name="email" required>
                <br>
                
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                <button type="submit">Login</button>

                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<p>Bem-vindo, " . $_SESSION['usuario'] . "!</p>";
                    } else {
                        echo "<p>Faça login para acessar o fórum.</p>";
                    }
                    ?>
            </form>
        </select>
    </main>
    
</body>
</html>