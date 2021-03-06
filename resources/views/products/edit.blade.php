<h1>Редактирование товара</h1>

@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif


<form action="/products/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <label>
        Название товара
        <input type="text" name="name" value="{{$product->name}}">
    </label>
    <br>

    <input type="hidden" name="category_id" id="category_id" value="{{$product->category_id}}">

    <label>
        Категория
        <select name="category_name" id="categories" onchange="catChange(this)">
            <option value="">-Выберите категорию-</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if ($category->id==$product->category_id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
    </label>
    <br>

    <label>
        Цена
        <input type="text" name="price" value="{{$product->price}}">
    </label>
    <br>

    <label>
        Описание<br>
        <textarea rows="7" cols="50" name="description">{{$product->description}}</textarea>
    </label>
    <br>


    <label>
        Изображение
        <input type="file" name="image">
    </label>
    <br>


    <input type="submit">

</form>


<br>
<br>
<a href="/products">Товары >></a>
<br>
<br>
<a href="/home">Dashboard >></a>



<script>
    function catChange(select) {
        var catInput = document.getElementById('category_id');
        catInput.value = select.value;
    }
</script>