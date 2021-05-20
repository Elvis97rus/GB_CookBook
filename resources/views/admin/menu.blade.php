<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<div class="container">

    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('index') }}">На сайт</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.editRubrics') }}">Редактировать рубрики</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.editRecipes') }}">Редактировать рецепты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.editUsers') }}">Редактировать профили</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.moderationRecipes') }}">Модерация рецептов</a>
        </li>
    </ul>

</div>

<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
