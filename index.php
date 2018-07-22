<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Testando conexao</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <pre>
        <?php     
            require_once 'HoneyMYSQL.php';
            $honey = new HoneyMYSQL();
            $result = $honey->select_all('usuario',array('login'),array('brunao'));
            echo count($result);
            
            for ($i=0; $i < count($result); $i++) { 
                echo '<br/><b>Login: '.$result[$i]['login'].'<br/>Senha: '.$result[$i]['senha'].'</b><br/>';
            }
            
            
        ?>
    </pre>
</body>
</html>