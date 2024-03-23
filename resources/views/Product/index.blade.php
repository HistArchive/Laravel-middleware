@extends('../layout/template')

@section('title','CRUD EN LARAVEL')
@section('contenido')
@if ($errors->any() || session('error'))
    @php
        $errorUnoPorUno = '';
        foreach ($errors->all() as $error) {
            $errorUnoPorUno .= $error . ' ';  
        }
        $errorUnoPorUno .= session('error'); 
    @endphp

    <script>
        Swal.fire({
            title: "Tienes un poke-Mensaje!!!!!!!!!!!!!!!!!",
            text: "{{ $errorUnoPorUno }}",
            width: 600,
            padding: "1em",
            color: "#716add",
            background: "#fff",
            backdrop: `
                rgba(0,0,123,0.4)
                url("/imagenes/pika-con-k.gif")
                center top
                no-repeat
            `
        });
    </script>
@endif



<p><br>P R O D U C T O S</p>
<div class="buttons">
<button class="button is-success is-rounded BtnAgregar" data-toggle="modal" data-target="#modal-Agrproducto" ><i
class="fas fa-cart-plus"></i></button>
</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><abbr title="Position">ID</abbr></th>
                            <th>Nombre</th>
                            <th><abbr title="Played">Descripcion</abbr></th>
                            <th><abbr title="Won">Descripcion L.</abbr></th>
                            <th><abbr title="Drawn">Categoria</abbr></th>
                            <th><abbr title="Lost">Precio</abbr></th>
                            <th><abbr title="Goals for">Acciones</abbr></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->descriptionlong}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <button class="button is-info is-outlined BtnVer" data-toggle="modal" data-target="#modal-producto" data-producto-id="{{$product->id}}"><i class="fas fa-eye"></i></button>
                                <button class="button is-success is-outlined BtnEditar" data-toggle="modal" data-target="#modal-productoEdit" data-producto-id="{{$product->id}}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="button is-danger is-outlined" onclick='confirmarElim({{$product->id}})'><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

@endsection

@section('pagescripts')
$(document).ready(function () {

    $('.BtnVer').click(function () {
        var productoId = $(this).data('producto-id'); 
        var modal = $('#modal-producto');
       
        $.ajax({
            url: '{{ url('productos') }}/' + productoId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                
                modal.find('#idVer').val(response.id);
                modal.find('#NombreVer').val(response.name);
                modal.find('#DescVer').val(response.description);
                modal.find('#DLVer').val(response.descriptionlong);
                modal.find('#CateVer').val(response.category_id);
                modal.find('#precioVer').val(response.price);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('.BtnEditar').click(function () {
        var productoId = $(this).data('producto-id');
        var modal = $('#modal-productoEdit');
        $('#formEd').attr('action', '{{ url('productos') }}/' + productoId);
       
        $.ajax({
            url: '{{ url('productos') }}/' + productoId,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                
                modal.find('#idEd').val(response.id);
                modal.find('#NombreEd').val(response.name);
                modal.find('#DescEd').val(response.description);
                modal.find('#DLEd').val(response.descriptionlong);
                modal.find('#CateEd').val(response.category_id);
                modal.find('#precioEd').val(response.price);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    
});

function confirmarElim(productId) {
    if (confirm("Estás seguro de que deseas deshabilitar este producto?")) {
        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', "{{ url('productos') }}/" + productId);
        form.style.display = 'none';

        var token = document.createElement('input');
        token.setAttribute('type', 'hidden');
        token.setAttribute('name', '_token');
        token.setAttribute('value', "{{ csrf_token() }}");
        form.appendChild(token);

        var method = document.createElement('input');
        method.setAttribute('type', 'hidden');
        method.setAttribute('name', '_method');
        method.setAttribute('value', 'DELETE');
        form.appendChild(method);

        document.body.appendChild(form);

        form.submit();
    }
}
@endsection