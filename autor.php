<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Libreria</title>
    <link rel="icon" href="img/ico-book.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
function conectar() {
    $host = "localhost";
    $dbname = "dblibreria";
    $user = "root";
    $password = "";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        die("Problemas con la conexión: " . $e->getMessage());
    }
}

function ejecutarConsultaAutores() {
    $conexion = conectar();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $busqueda = $_POST["busqueda"];
        $consulta = "SELECT CONCAT(nombre, ' ', apellido) AS Autor, telefono, direccion, ciudad, estado, pais, cod_postal FROM autores
                     WHERE CONCAT(nombre, ' ', apellido) LIKE :busqueda";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
    } else {
        $consulta = "SELECT CONCAT(nombre, ' ', apellido) AS Autor, telefono, direccion, ciudad, estado, pais, cod_postal FROM autores";
        $stmt = $conexion->prepare($consulta);
    }

    try {
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros) > 0) {
            foreach ($registros as $reg) {
                echo "
                    <h3>" . $reg['Autor'] . "</h3> 
                    <div class=\"linea\">
                    <em class=\"izq\"> Tel. " . $reg['telefono'] . "</em> 
                    <em class=\"der\">" . $reg['pais'] . "</em> </div>   
                    
                    <p> <b class=\"b\">Dirección: </b> " . $reg['direccion'] .", ". $reg['ciudad'] .", ". $reg['estado'] .", ". $reg['cod_postal'] ."</p>  
                ";

                echo "<hr>";
            }
        } else {
            echo "<div class='div-selecciona'/>
                No se encontraron resultados!! 
              </div>";
        }
    } catch (PDOException $e) {
        die("Problemas en la consulta: " . $e->getMessage());
    } finally {
        $conexion = null;
    }
}

?>


     <!--------ENCABEZADO-------->
<nav class="navbar navbar-expand-sm navbar-light " id="mi-nav"> 
    <div class="d-flex mb-3 justify-content-around align-items-center">
        <div class="p-2">
            <a class="navbar-brand" href="index.php"> 
                <img src="img/logo-book.png" width="30" height="30"  class="d-inline-block align-text-bottom">
                <b class="titulo">Libreria</b> 
            </a>
        </div>
        <div class="p-2">
            <a class="nav-link" href="autor.php">Autores</a>
        </div>
        <div class="p-2">
            <a class="nav-link" href="titulo.php">Libros</a>
        </div>
        <div class="ms-auto p-2">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Contacto</button>
        </div>
    </div>
</nav>


    <!----------CUERPO---------->
<form method="post">
    <div class="input-group mb-3">
        <input type="text" name="busqueda" class="form-control" placeholder="Escribe el nombre del autor" aria-label="Escribe el nombre del autor" aria-describedby="button-addon2">
        <input type="submit" value="Buscar" class="btn btn-outline-secondary" id="button-addon2">
    </div>
</form>

    <!--Aqui llamo la funcion del php, que hace filtro por consulta y muestra datos-->
<?php ejecutarConsultaAutores(); ?>







<!--MODAL DE CONTACTO - formulario de contacto-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="insert.php" method="post">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="inputNombre4" class="form-label">Nombre*</label>
              <input type="text" class="form-control" id="inputNombre4" placeholder="Su nombre completo" name="nombre">
            </div>

            <div class="col-md-6">
              <label for="inputCorreo4" class="form-label">Correo*</label>
              <input type="correo" class="form-control" id="inputCorreo4" placeholder="fulanito@gmail.com" name="mail">
            </div>

            <div class="col-12">
              <label for="inputAsunto" class="form-label">Asunto*</label>
              <input type="text" class="form-control" id="inputAsunto" placeholder="Escribe el topico" name="asunto">
            </div>

            <div class="col-12">
              <label for="Textarea" class="form-label">Comentario*</label>
              <textarea class="form-control" id="Textarea" rows="3" name="comentario"></textarea>
            </div> 
          </div>
        </div>

        <div class="modal-footer">       
        <input type="submit"  class="btn btn-dark btn-secondary" value="Enviar">
        </div>
      </form>

    </div>
  </div>
</div>


    </script><script src="js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  </body>
 </html>