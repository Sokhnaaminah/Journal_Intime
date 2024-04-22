<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journal Intime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @extends('layout')

    @section('content')
        <div class="container-fluid py-5">
            <div class="row mx-5 px-5">
                <h1>Bienvenue sur votre journal intime</h1>

                <form action="{{ route('note.search') }}" method="post" class="d-flex my-4">
                    @csrf
                    <input type="text" class="form-control me-2" name="search" placeholder="Rechercher une note"
                        required>
                    <input type="submit" class="btn btn-outline-success" value="Rechercher">
                </form>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($notes->isEmpty())
                    <p>Aucune entrée trouvée.</p>
                @else
                    @foreach ($notes as $noteItem)
                        <div class="card my-3">
                            <a href="{{ route('note.show', $noteItem->id) }} " class="text-decoration-none">
                                <div class="card-header fs-3 fw-semibold">
                                    {{ $noteItem->titre }}
                                </div>
                            </a>
                            <div class="card-body w-100">
                                <h6 class="card-title"> Date: {{ $noteItem->date }} </h6>
                                <div class="d-flex justify-content-end grid gap-3">
                                    <a href="{{ route('note.edit', $noteItem->id) }}" class="btn btn-primary">Modifier</a>
                                    <div class="btn-group">
                                        <form action="{{ route('note.destroy', $noteItem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="my-3 ">
                    <a href="{{ route('note.create') }}" class="btn btn-success">Ajouter une note</a>
                </div>

            </div>
        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
