<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link href="./assets/css/index.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>Document</title>
</head>



<?php
require_once('.\database\sql\conection-db.php');

$database = new Database();
$con = $database->conecta_mysql();

if (!$con) {
    echo "Nao consegui conectar ao banco de dados!";
}
?>

<body>

    <div class="container">
        <h1>PHP - TODO LIST</h1>
        <div class="form">
            <form action="index.php" method="get" target="">
                <input type="text" placeholder="Nome" name="name">
                <input type="text" placeholder="Descricao" name="description">
                <button type="submit" class="adicionar">Adicionar </button>
            </form>
        </div>
        <?php
            if ($_GET) {
                $name = $_GET['name'];
                $description = $_GET['description'];
                if ($name && $description) {
                    $sql = "insert into list (description,name) values('$description','$name')";
                    mysqli_query($con, $sql);
                } else {
                    echo "<p style='color:red;'>Informacoes nao podem estar vazias! </p>";
                }


            }
            ?>
        <div class="list">
            <ul>

                <?php
                $result = mysqli_query($con, "SELECT id, name,description FROM list ");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li> <input type='checkbox' checked>$row[name]</li>";
                    }
                } else {
                    echo "<p>Ainda nao ha dados do banco!</p>";
                }
                ?>
            </ul>
        </div>
    </div>


    <div class="container">
        <p> Made By Bruno </p>
    </div>
</body>

</html>