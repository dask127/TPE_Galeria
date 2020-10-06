{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistro.tpl"}

<form action="search" method="post">
    <label>Elija una categoría:</label>
    <select name="category">
        <option value="1">Pintura</option>
        <option value="2">Dibujo</option>
        <option value="3">Escultura</option>
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
                </tr>
            {/foreach}
        </tbody>
    </table>


    {include file="footer.tpl"}