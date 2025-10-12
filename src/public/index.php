<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products SRP DEMO</title>
    <style>
        body {
            font-family: system-ui, Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #3a1fd3ff;
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin: 0.8rem 0 0.5rem;
            font-weight: bold;
            text-align: left;
        }
        input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }
        button {
            padding: 0.6rem 1.2rem;
            background-color: #3a1fd3ff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
            width: 100%;
        }
        button:hover {
            background-color: #2a0fa1ff;
        }
    </style>
</head>
<body>
    <form action="create.php" method="POST">
        <h1>Cadastro de Produto</h1>
        <label>Nome</label>
        <input name="name" required>
        <label>Preço</label>
        <input name="price" type="number" step="0.01" required>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
