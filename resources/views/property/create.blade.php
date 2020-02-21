@extends('property.master')

@section('content')
<div class="container my-3">
    <h1>Formulário de Cadastro : Imóveis</h1>
    <form method="post" action="<?=url('/imoveis/store');?>">
        <?=csrf_field();?> <!--Gera um input hidden com um token -->

        <div class="form-group">
            <label for="title">Título do Imóvel</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="rental_price">Valor de Locação</label>
            <input type="text" name="rental_price" id="rental_price" class="form-control">
        </div>

        <div class="form-group">
            <label for="sale_price">Valor de Venda</label>
            <input type="text" name="sale_price" id="sale_price" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Imóvel</button>
    </form>
</div>
@endsection
