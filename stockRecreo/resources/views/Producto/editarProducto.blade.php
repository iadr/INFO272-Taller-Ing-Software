@extends('layouts.ppa')

@section('content')
@foreach($resultado as $res)
    <!-- <ul>
      <li>id, {{$res->id}}</li>
      <li>codigo, {{$res->codigo}}</li>
      <li>nombre, {{$res->nombre}}</li>
      <li>categoria, {{$res->categoria}}</li>
      <li>precio, {{$res->precio}}</li>
      <li>stock, {{$res->stock}}</li>
    </ul> -->
    <div class="container">
      <div class="row justify-content-center">

        <div class="card col-md-6 bg-light">
          <div class="card-body">
            <h5 class="card-title">Editar Producto</h5>
            <h6 class="card-subtitle mb-2 text-muted"> Código {{$res->codigo}}</h6>
            <form class="needs-validation" action="{{route('GuardarEdicion')}}" method="POST" novalidate>
              {{csrf_field()}}
              <input type="hidden" name="idProducto" value="{{$res->id}}">
              <div class="form-group">
                <div class="col mb-3">
                  <label for="validationCustom01">Nombre del Producto</label>
                  <input type="text" class="form-control" id="validationCustom01" name="nombre" value="{{$res->nombre}}" required>
                  <div class="invalid-feedback">
                    Ingrese un nombre válido
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom02">Categoría</label>
                  <!-- <input type="text" class="form-control" id="validationCustom02" name="categoria" value="{{$res->categoria}}" required> -->
                  <select class="custom-select" id="validationCustom02" name="categoria" required>
                  <?php
                    $categorias = array('juegos de mesa','cartas','puzzles','coleccionables','didacticos','magia','circo','exterior','otros');
                    foreach ($categorias as $cat) {
                      if ($cat != $res->categoria) {
                        echo '<option value="'.$cat.'">'.$cat.'</option>';
                      } else {
                        echo '<option value="'.$cat.'" selected>'.$cat.'</option>';
                      }
                    }
                  ?>
                </select>
                  <div class="invalid-feedback">
                    Por favor, seleccione una categoría
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustomUsername">Precio</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">$</span>
                    </div>
                    <input type="number" class="form-control" id="validationCustomUsername" min="100" max="999999" name="precio" value="{{$res->precio}}" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Ingrese un precio válido.
                    </div>
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom03">Stock</label>
                  <input type="number" class="form-control" id="validationCustom03" min="1" max="1000" name="stock" value="{{$res->stock}}" required>
                  <div class="invalid-feedback">
                    Por favor, ingrese un stock válido.
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
            </form>

          </div>
        </div>
      <div class="col-md-1">
    </div>
  </div>
</div>


@endforeach

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
