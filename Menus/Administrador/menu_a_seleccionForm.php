<html>
<head>
    <title>Seleccion de Productos</title>
    <link rel="stylesheet" href="taula.css">
</head>
<body style="background-color:#71C6E5;">
<h2>Read Form</h2>
<div>
    <?php
    error_reporting(0);
    //Conexion a la base de datos
    $db = new mysqli('10.100.66.106','script','script1','Licor_FM');
    $filtro = $_GET['filtro'];
    //Seleccionamos todo de la tabla inventario
    $sql = "SELECT * FROM inventario";
    $lqs = "SELECT * FROM inventario WHERE tipo = '$filtro'";
    echo $filtro;
    if (isset($filtro)){
        $select = $db->query($lqs);
    }else{
        $select = $db->query($sql);
    }
    //Escribimos el nombre de las columnas
    echo "<table>";
    echo "<td>Codi</td>";
    echo "<td>Nom</td>";
    echo "<td>Tipo</td>";
    echo "<td>Graduacio</td>";
    echo "<td>Preu</td>";
    echo "<td>Stock</td>";
    echo '<form name="inv" method="get">';
        foreach ($select as $value){
            echo "<tr>";
            echo "<td>" . $value["id"] . "</td>";
            echo "<td>" . $value["nombre"] . "</td>";
            echo "<td>" . $value["tipo"] . "</td>";
            echo "<td>" . $value["graduacion"] . "</td>";
            echo "<td>" . $value["precio"] . "</td>";
            echo "<td>" . $value["stock"] . "</td>";
            echo "<td>" . '<input type="text" name="qtty"/>' . '<input type="submit">' . "</td>";

      echo "</tr>";
    }
    foreach ($select as $row) {
            $taula = $row;
            $qtty = $_GET["qtty"];
    }
    echo "</table>";
    echo '</form>';
    echo $qtty;
    ?>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <p>Filtro :</p>
  <select name="filtro" size="5">


        <?php
        $db = new mysqli('10.100.66.106','script','script1','Licor_FM');
        $sql = "SELECT tipo FROM inventario group by tipo";
        $select = $db->query($sql);
        if($db -> connect_errno) {
        echo " maximum pur " . $db -> connect_error;
        exit();
        }
         foreach ($select as $value) {
             echo "<option>" . $value['tipo'] . "</option>";
         }
?>
</select>
<br>
<input type="submit">
</form>
<div>
    <?php
    echo "<table>";
  //  echo "<td>Codi</td>";
  //  echo "<td>Nom</td>";
  //  echo "<td>Tipo</td>";
  //  echo "<td>Preu</td>";
  //  echo "<td>Quantitat</td>";
  //  echo "<td>Import</td>";
        foreach ($row as $val){
            foreach ($val as $v){
                echo "<tr>";
                    echo "<td>" . $v[0] . "</td>";
                    echo "<td>" . $v[1] . "</td>";
                    echo "<td>" . $v[2] . "</td>";
                    echo "<td>" . $v[4] . "</td>";
                    echo "<td>" . $qtty . "</td>";
                    echo "<td>" . "</td>";
                echo "</tr>";
            }
        }
    echo "</table>";
    echo $v;
    ?>
</div>
<form action="menu_admin.php">
      <input type="submit" name="signup_submit" value="Inicio">
</form>
</body>
</html>
