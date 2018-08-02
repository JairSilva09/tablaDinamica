<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="librerias/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="librerias/alertify/css/alertify.css">
    <link rel="stylesheet" href="librerias/alertify/css/themes/default.css">
    <script src="js/jquery.js"></script>
    <title>Tablas dinamicas</title>
  </head>
  <body>    
    <div class="container">
       <h1>Tabla dinámica</h1>
       <div class="row">
        <div class="col-sm-4">
          <div id="buscador" class="mb-3">                        
          </div>
        </div>
      </div>           
      <div class="row">
        <div class="col-sm-12">                
          <div id="tabla"></div>                                           
        </div>
      </div>                 
      <div id="pieTabla"></div>
    </div>
    <!-- modal para registros nuevos-->    
    <div class="modal fade" id="modalNuevos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nuevo registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="codigo">Código</label>
            <input type="text" id="codigo" class="form-control input-sm">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" class="form-control input-sm">
            <label for="departamento">Departamento</label>
            <input type="text" id="departamento" class="form-control input-sm">
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-primary" id="guardarNuevo">Agregar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal para editar registros-->    
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <label for="codigo">Código</label>
            <input type="text" id="codigo-up" class="form-control input-sm">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre-up" class="form-control input-sm">
            <label for="departamento">Departamento</label>
            <input type="text" id="departamento-up" class="form-control input-sm">
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-warning" id="actualizar">Editar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal para eliminar registros-->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Está seguro de querer eliminar el producto <span id="nomProducto"></span>?</p>
            </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-danger eliminar">Eliminar</button>
          </div>
        </div>
      </div>
    </div>     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->   
  
    <script src="librerias/alertify/alertify.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
   <script src="js/main.js"></script>
  </body>
</html>