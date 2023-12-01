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
            $conexion = mysqli_connect("localhost", "root", "", "dblibreria") or die("Problemas con la conexión");
            return $conexion;
        }

        function ejecutarConsultaTitulos() {
            $conexion = conectar();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $busqueda = $_POST["busqueda"];
                $consultat = "SELECT titulos.titulo, titulos.tipo, CONCAT(autores.nombre, ' ', autores.apellido) AS Autor, titulos.id_pub, titulos.precio, titulos.avance, titulos.total_ventas, titulos.notas, titulos.fecha_pub, titulos.contrato, titulo_autor.ord_au, titulo_autor.derechos FROM autores 
                                JOIN titulo_autor ON autores.id_autor = titulo_autor.id_autor 
                                JOIN titulos ON titulo_autor.id_titulo = titulos.id_titulo
                                WHERE titulos.titulo LIKE '%$busqueda%'";                         
                
            } else {
                $consultat = "SELECT titulos.titulo, titulos.tipo, CONCAT(autores.nombre, ' ', autores.apellido) AS Autor, titulos.id_pub, titulos.precio, titulos.avance, titulos.total_ventas, titulos.notas, titulos.fecha_pub, titulos.contrato, titulo_autor.ord_au, titulo_autor.derechos FROM autores 
                JOIN titulo_autor ON autores.id_autor = titulo_autor.id_autor 
                JOIN titulos ON titulo_autor.id_titulo = titulos.id_titulo; ";
            }
            
            $registros = mysqli_query($conexion, $consultat)or die("Problemas en el select:" . mysqli_error($conexion));
            if (mysqli_num_rows($registros) > 0) {
                while ($reg = mysqli_fetch_array($registros)) {
                    echo "
                        <h3>" . $reg['titulo'] . "</h3> 
                        <div class=\"linea\">
                        <em class=\"izq\">" . $reg['tipo'] . "</em> 
                        <em class=\"der\">" . $reg['fecha_pub'] . "</em> </div>
                        <b>Por " . $reg['Autor'] . "</b>                  
                        <p>" . $reg['notas'] . "</p>   
                        <p> <b class=\"b\">ID publicación: </b> " . $reg['id_pub'] .", 
                        <b class=\"b\">Precio: </b> $". $reg['precio'] .", 
                        <b class=\"b\">Avance: </b> ". $reg['avance'] .", 
                        <b class=\"b\">Ventas: </b> ". $reg['total_ventas'] .", 
                        <b class=\"b\">Contrato: </b> ". $reg['contrato'] ."</p>  
             
                    ";
                    echo "<hr>";
                }
            } else {
                echo "<div class='div-selecciona'/>
                No se encontraron resultados!! 
              </div>";
            }          
            
            mysqli_close($conexion);
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
        <input type="text" name="busqueda" class="form-control" placeholder="Escribe el nombre del libro" aria-label="Escribe el nombre del libro" aria-describedby="button-addon2">
        <input type="submit" value="Buscar" class="btn btn-outline-secondary" id="button-addon2">
    </div>
</form>

    <!--Aqui llamo la funcion del php, que hace filtro por consulta y muestra datos-->
    <?php ejecutarConsultaTitulos();?>







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