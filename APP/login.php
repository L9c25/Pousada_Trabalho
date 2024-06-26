<?php
// Inicialize a sessão
session_start();

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página principal
if (isset($_SESSION["logado"]) && $_SESSION["logado"] === true) {
    header("location: index.php");
    exit;
}

// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";

// Defina variáveis e inicialize com valores vazios
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifique se o nome de usuário está vazio
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, insira o nome de usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Verifique se a senha está vazia
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira sua senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar credenciais
    if (empty($username_err) && empty($password_err)) {
        // Prepare uma declaração selecionada
        $sql = "SELECT id, username, senha FROM usuario WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Definir parâmetros
            $param_username = trim($_POST["username"]);

            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["senha"];
                        if (password_verify($password, $hashed_password)) {
                            // A senha está correta, então inicie uma nova sessão
                            session_start();

                            // Armazene dados em variáveis de sessão
                            $_SESSION["logado"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirecionar o usuário para a página principal
                            header("location: index.php");
                        } else {
                            // A senha não é válida, exibe uma mensagem de erro genérica
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else {
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
            // Fechar declaração
            unset($stmt);
        }
    }

    // Fechar conexão
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="assets\css\loginDesktop.css">
    <link rel="stylesheet" href="assets\css\loginmobile.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="box-form">
                <h2>Login</h2>
                <p>Por favor, preencha os campos para fazer o login.</p>
                <?php
                // exibe uma caixa indicando erro no login
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group my-1">
                        <label>Nome do usuário</label>
                        <input type="text" name="username"
                            class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $username; ?>">
                        <span class="invalid-feedback">
                            <?php echo $username_err; ?>
                        </span>
                    </div>
                    <div class="form-group my-2">
                        <label>Senha</label>
                        <input type="password" name="password"
                            class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback">
                            <?php echo $password_err; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary my-3" value="Entrar">
                    </div>
                    <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p>
                </form>
            </div>
        </div>
        <div id="background"></div>
    </main>
</body>
<script src="assets\bootstrap\js\bootstrap.bundle.min.js"></script>
<!-- Jquery -->
<script src="assets\js\jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('.alert').fadeOut(3000)
    })
</script>
</html>