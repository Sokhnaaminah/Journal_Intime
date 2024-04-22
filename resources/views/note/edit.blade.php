<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #1c7227;
            background-color: #dbf8d7;
            border-color: #cbf5c6;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="date"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @extends('layout')

    @section('content')
        <div class="container">
            <h2>Modifier une entrée dans le journal intime</h2>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('note.update', $note->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ $note->date }}" required><br>
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" value="{{ $note->titre }}" required><br>
                <label for="contenu">Contenu:</label>
                <textarea id="contenu" name="contenu" required>{{ $note->contenu }}</textarea><br><br>
                <button type="submit">Modifier</button>
            </form>
        </div>
    @endsection


</body>

</html>
