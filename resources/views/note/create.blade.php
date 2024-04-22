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

        .form-group {
            margin-bottom: 20px;
        }

        label {
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
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .btn {
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

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @extends('layout')

    @section('content')
        <div class="container">
            <h2>Créer une nouvelle note</h2>

            <form action="{{ route('note.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="titre">Titre:</label>
                    <input type="text" name="titre" required>
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu:</label>
                    <textarea name="contenu" required></textarea>
                </div>
                <button type="submit" class="btn">Créer la note</button>
            </form>
        </div>
    @endsection
</body>

</html>
