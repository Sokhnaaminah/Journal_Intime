<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journal Intime</title>
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
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-success {
            background-color: #28a745;
        }
    </style>
</head>

<body>
    @extends('layout')

    @section('content')
        <div class="container">
            <h2>{{ $noteItem->title }}</h2>
            <div>
                <p>Description: {{ $noteItem->contenu }}</p>
                <p>Date: {{ $noteItem->date }}</p>
                <a class="btn btn-danger" href="{{ route('note.index') }}">Retour</a>

            </div>
        </div>
    @endsection
</body>

</html>
