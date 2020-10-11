{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Editar obra </h1>
<form action="addeditedartwork/{$obra->id}" method="post">
    <label>Nombre:</label>
    <input name="nombre" type="text" placeholder="{$obra->nombre}...">

    <label>Descripcion:</label>
    <input type="text" name="descripcion" placeholder="{$obra->descripcion}...">

    <label>Autor:</label>
    <input name="autor" type="text" placeholder="{$obra->autor}...">

    <label>Año:</label>
    <input name="anio" type="date" placeholder="{$obra->anio}...">

    <label>Imagen (link):</label>
    <input name="imagen" type="url" placeholder="Imagen...">

    <label>Categoría:</label>
    <select name="category">
        {foreach from=$categorias item=categoria}
            <option value="{$categoria->id}">{$categoria->nombre}</option>
        {/foreach}
    </select>

    <button type="submit">Terminar edición</button>
</form>

{include file="footer.tpl"}