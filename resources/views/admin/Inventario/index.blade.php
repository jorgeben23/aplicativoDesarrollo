@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    <h1>Inventario - Principal <i class="fas fa-cubes ml-2"></i> </h1>
@stop

@section('content')

<div class="alert alert-warning mt-4" role="alert">
  <b>Atención <i class="fas fa-exclamation-circle ml-1"></i></b> ... Tener en cuenta que este es un modulo de prueba de ingreso a almacén
</div>

<div class="card border-warning mb-3" style="max-width: auto;">

    <div class="row">
      <div class="col-md-6">
           <div class="card-header"><i class="fas fa-table mr-1"></i> <b>  Tablero de Productos </b> </div>
      </div>
      <div class="col-md-6 text-center" style="font-size: 17px;">
           <div class="card-header" >  <span id="addProduct" class="badge bg-success p-1" style="cursor: pointer;"> <i class="fas fa-plus-circle"></i> Producto </span></div>
      </div>
    </div>


 
  <div class="card-body">
   
    <table class="table table-striped table-hover " id="tablaProduct" >
    <caption>Lista de Productos</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio</th>
        <th scope="col">Categoria</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody id="tbody">
    
    </tbody>
  </table>



</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-cubes ml-2"></i> Registro Productos </h5>
      </div>
      <div class="modal-body">
        
        <form id="registrarProduct">

         <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Nombre :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nombreProduct" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Stock :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="StockProduct" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Precio :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="PrecioProduct" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Categoria :</label>
          <div class="col-sm-8">
              
              <select name="categoriaProduct" class="form-control" id="categoriaProduct">
                <option value="0" disabled>Seleccione Categoria</option>
                <option value="1" selected>Almacén</option>
                
              </select>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="cerrarMProduct" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-window-close"></i>  Cerrar </button>
        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
      </div>

    </form>

    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="editarModalProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-cubes ml-2"></i> Actualizar Productos </h5>
      </div>
      <div class="modal-body">
        
        <form id="actProduct">

         <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Nombre :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nombreProductEdit" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Stock :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="StockProductEdit" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Precio :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="PrecioProductEdit" required>
          </div>
        </div>

            <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-4 col-form-label">Categoria :</label>
          <div class="col-sm-8">
              
              <select name="categoriaProductEdit" class="form-control" id="categoriaProductEdit">
                <option value="0" disabled>Seleccione Categoria</option>
                <option value="1" selected>Almacén</option>
                
              </select>

          </div>


          <input type="hidden" id="idProduct">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="cerrarMProductAct" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-window-close"></i>  Cerrar </button>
        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Grabar</button>
      </div>

    </form>

    </div>
  </div>
</div>


@stop

@section('css')


@stop

@section('js')

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  <script src="{{ asset('js/Inventario/Inventario.js') }}"></script>
    
@stop