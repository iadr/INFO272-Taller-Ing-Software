@extends('layouts.ppa')

@section('content')

    <div class="container">
      <div class="row justify-content-center">

        <div class="card col-md-6 bg-light">
          <div class="card-body">
            <h5 class="card-title">Nuevo proveedor</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <form class="needs-validation" action="{{route('GuardarNuevoProveedor')}}" method="POST" novalidate>
              {{csrf_field()}}

              <div class="form-group">
                
                <div class="col mb-3">
                  <label for="validationCustom01">Nombre del proveedor</label>
                  <input type="text" class="form-control" id="validationCustom01" name="nombre" value="" required>
                  <div class="invalid-feedback">
                    Ingrese un nombre válido
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="validationCustom01">Direccion del proveedor</label>
                  <input type="text" class="form-control" id="validationCustom01" name="direccion" value="" required>
                  <div class="invalid-feedback">
                    Ingrese una dirección válida
                  </div>
                </div>
                
                <div class="col mb-3">
                  <label for="validationCustom02">Representante</label>
                  <input type="text" class="form-control" id="validationCustom02" name="representante" value="" required>
                  <div class="invalid-feedback">
                    Ingrese un nombre válido
                  </div>
                </div>
                
                <div class="col mb-3">
                  <label for="validationCustom01">Teléfono</label>
                  <input type="text" class="form-control" id="validationCustom01" name="telefono" value="" required>
                  <div class="invalid-feedback">
                    Ingrese un teléfono válido
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="validationCustom01">Email</label>
                  <input type="text" class="form-control" id="validationCustom01" name="email" value="" required>
                  <div class="invalid-feedback">
                    Ingrese un email válido
                  </div>
                </div>

                <button class="btn btn-primary" type="submit">Crear proveedor</button>
              </div>
            </form>

          </div>
        </div>
      <div class="col-md-1">
    </div>
  </div>
</div>
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
