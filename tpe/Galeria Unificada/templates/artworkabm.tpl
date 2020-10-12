{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Crear obra </h1>
<form action="addartwork" method="post">
    <div class="abm_artwork_container">

        <div class="input_block">
            <label>Nombre:</label>
            <input name="nombre" type="text" placeholder="Nombre...">
        </div>

        <div class="input_block">
            <label>Descripcion:</label>
            <input type="text" name="descripcion" placeholder="Descripción...">
        </div>

        <div class="input_block">
            <label>Autor:</label>
            <input name="autor" type="text" placeholder="Autor...">
        </div>

        <div class="input_block">
            <label>Año:</label>
            <input name="anio" type="date" placeholder="Año...">
        </div>

        <div class="input_block">
            <label>Imagen (link):</label>
            <input name="imagen" type="url" placeholder="Imagen...">
        </div>

        <div class="input_block">
            <label>Categoría:</label>
            <select name="category">
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria->id}">{$categoria->nombre}</option>
                {/foreach}
            </select>
        </div>
        <button class="register_btn_nomargin" type="submit">Agregar</button>
    </div>


    </div>
</form>

<form action="search" method="post">
    <div class="search_container">
        <label>Elija una categoría:</label>
        <div class="search_category">
            <select name="category">
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria->id}">{$categoria->nombre}</option>
                {/foreach}
            </select>
            <button class="register_btn_nomargin" type="submit">Consultar</button>
        </div>
    </div>
</form>

<article class="artworks_container">
    <table class="abm_table abm_table_artwork">
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
                    <td class="abm_button register_btn">
                        <a href="details/{$obra->id}">Detalles</a>
                    </td>
                    <td class="abm_button register_btn">
                        <a href="artdelete/{$obra->id}">Borrar</a>
                    </td>
                    <td class="abm_button register_btn">
                        <a href="artedit/{$obra->id}">Editar</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>


    {* <script src="js/table_abm.js"></script> *}

    {include file="footer.tpl"}