<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraDev: CRUD Imobi</title>
</head>
<body>
    <p><a href="<?= url('/imoveis');?>">Listar todos os imóveis</a> | <a href="<?= url('/imoveis/novo');?>">Cadastrar novo imóvel</a></p>
    @yield('content')
</body>
</html>
