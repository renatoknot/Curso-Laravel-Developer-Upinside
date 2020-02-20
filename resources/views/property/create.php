<h1>Formulário de Cadastro :: Imóveis</h1>
<form method="post" action="<?=url('/imoveis/store');?>">
     <?=csrf_field();?> <!--Gera um input hidden com um token -->

    <label for="title">Título do Imóvel</label>
    <input type="text" name="title" id="title"><br>

    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea><br>

    <label for="rental_price">Valor de Locação</label>
    <input type="text" name="rental_price" id="rental_price"><br>

    <label for="sale_price">Valor de Venda</label>
    <input type="text" name="sale_price" id="sale_price"><br>

    <button type="submit">Cadastrar Imóvel</button>
</form>
