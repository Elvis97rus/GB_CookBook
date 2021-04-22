<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">На сайт</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.editRubrics') }}">Редактировать рубрики</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.editRecipes') }}">Редактировать рецепты</a></li>
        <li class="breadcrumb-item"><a href="#">Редактировать профили</a></li>
    </ol>
</nav>

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
