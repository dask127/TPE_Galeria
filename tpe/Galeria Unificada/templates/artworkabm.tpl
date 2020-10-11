{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Crear obra </h1>
<form action="addartwork" method="post">
    <label>Nombre:</label>
    <input name="nombre" type="text" placeholder="Nombre...">

    <label>Descripcion:</label>
    <input type="text" name="descripcion" placeholder="Descripción...">

    <label>Autor:</label>
    <input name="autor" type="text" placeholder="Autor...">

    <label>Año:</label>
    <input name="anio" type="date" placeholder="Año...">

    <label>Imagen (link):</label>
    <input name="imagen" type="url" placeholder="Imagen...">

    <label>Categoría:</label>
    <select name="category">
        {foreach from=$categorias item=categoria}
            <option value="{$categoria->id}">{$categoria->nombre}</option>
        {/foreach}
    </select>

    <button type="submit">Agregar</button>
</form>

<form action="search" method="post">
    <label>Filtrar por categoría:</label>
    <select name="category">
        {foreach from=$categorias item=categoria}
            <option value="{$categoria->id}">{$categoria->nombre}</option>
        {/foreach}
    </select>
    <button type="submit">Consultar</button>
</form>

<article class="artworks_container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$obras item=obra}
                <tr>
                    <td>
                        <h2>{$obra->nombre}</h2>
                    </td>
                    <td>
                        <h3>{$obra->autor}</h3>
                    </td>
    
                    <td>
                        {if $obra->id_categoria eq 1}
                            <h4> Pintura </h4>
                        {/if}
                        {if $obra->id_categoria eq 2}
                            <h4> Dibujo </h4>
                        {/if}
                        {if $obra->id_categoria eq 3}
                            <h4> Escultura </h4>
                        {/if}
                    </td>
                    <td>
                        <a href="details/{$obra->id}">Detalles</a>
                    </td>
                    <td>
                        <a href="artdelete/{$obra->id}">Borrar</a>
                    </td>
                    <td>
                        <a href="artedit/{$obra->id}">Editar</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>


    {* <script src="js/table_abm.js"></script> *}

    {include file="footer.tpl"}