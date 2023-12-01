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
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Contacto</button>
        </div>
    </div>
</nav>





    <!----------CUERPO---------->

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="height: 500px;">
    <div class="carousel-item active">
      <img src="https://images.pexels.com/photos/2041540/pexels-photo-2041540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
 class="d-block w-100" alt="...">

    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/4156300/pexels-photo-4156300.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
 class="d-block w-100" alt="...">

    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/207662/pexels-photo-207662.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="...">

    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>







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







     <!--------Resultado de los datos insertados en contacto------->
     <?php
        if (isset($_GET['correo'])) {
          $correo = $_GET['correo'];
          $nombre = $_GET['nombre'];
          $asunto = $_GET['asunto'];
          $comentario = $_GET['comentario'];
    ?>

      <div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos Guardados</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              ¡La información se ha insertado correctamente en contactos!
              <br><b>Correo:</b> <?php echo $correo; ?>
              <br><b>Nombre:</b> <?php echo $nombre; ?>
              <br><b>Asunto:</b> <?php echo $asunto; ?>
              <br><b>Comentario:</b> <?php echo $comentario; ?>
            </div>

          </div>
        </div>
      </div>
    <?php
    }
    ?>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script> $(document).ready(function () { $('#ModalContact').modal('show'); });</script>
  </script><script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  </body>
</html>