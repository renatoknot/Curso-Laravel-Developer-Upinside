@extends('property.master')

@section('content')

<h1>Formulário de Edição :: Imóveis</h1>

<? $property = $property[0];?>

<form method="post" action="<?=url('/imoveis/update', ['id' => $property->id]);?>">
     <?=csrf_field();?> <!--Gera um input hidden com um token -->
    <?=method_field('PUT');?> <!--Informando que é um metodo put-->


    <label for="title">Título do Imóvel</label>
    <input type="text" name="title" id="title" value="<?=$property->title;?>"><br>

    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10"><?=$property->description;?></textarea><br>

    <label for="rental_price">Valor de Locação</label>
    <input type="text" name="rental_price" id="rental_price" value="<?=$property->rental_price;?>"><br>

    <label for="sale_price">Valor de Venda</label>
    <input type="text" name="sale_price" id="sale_price" value="<?=$property->sale_price;?>"><br>

    <button type="submit">Editar Imóvel</button>
</form>
@endsection
