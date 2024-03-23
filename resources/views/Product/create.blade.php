<div class="modal" id="modal-producto" tabindex="-1" role="dialog" aria-labelledby="agregarProducto" aria-hidden="true">
<div class="modal-background"></div>
<div class="modal-content">
    <form action = "{(url('Product/.$products->$id)}'" method="post">
        @method("PUT")
        @csrf
<div class="container" >
    <div class="notification is-primary" style="background-color:lightgreen">
        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                <input class="input" type="text" value="{{$products->name}}">
            </div>
        </div>
        <div class="field">
            <label class="label">Descripcion</label>
            <div class="control">
                <input class="input" type="text" value="{{$products->description}}" >
            </div>
        </div>
        <div class="field">
            <label class="label">Descripcion Larga</label>
            <div class="control">
                <input class="input" type="text" value="{{$products->descriptionlong}}" >
            </div>
        </div>
         <div class="control">
         <label class="label">Categoría</label>
            <div class="control">
            <div class="select">
                <select>
                
                @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                </select>
            </div>
            </div>     
            
            <div class="field">
            <label class="label">Precio</label>
            <div class="control">
                <input class="input" type="text" value="{{$products->price}}" >
            </div>
    </div>
</div>
</div>

<button class="modal-close is-large" aria-label="close"></button>
</div>

</html>
