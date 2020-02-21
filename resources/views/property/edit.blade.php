@extends('property.master')

@section('content')
<div class="container my-3">
    <h1>Formulário de Edição : Imóveis</h1>

    <? $property = $property[0];?>

    <form method="post" action="<?=url('/imoveis/update', ['id' => $property->id]);?>">
        <?=csrf_field();?> <!--Gera um input hidden com um token -->
        <?=method_field('PUT');?> <!--Informando que é um metodo put-->

        <div class="form-group">
            <label for="title">Título do Imóvel</label>
            <input type="text" name="title" id="title" value="<?=$property->title;?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea  class="form-control" name="description" id="description" cols="30" rows="10"><?=$property->description;?></textarea>
        </div>
        <div class="form-group">
        <label for="rental_price">Valor de Locação</label>
        <input type="text" name="rental_price" id="rental_price" value="<?=$property->rental_price;?>" class="form-control">

        <div class="form-group">
            <label for="sale_price">Valor de Venda</label>
            <input type="text" name="sale_price" id="sale_price" value="<?=$property->sale_price;?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Editar Imóvel</button>
    </form>
</div>
@endsection
