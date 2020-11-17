{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}

{if $sesion neq null}
    {if $sesion eq 1}
        {include file="asideAdmin.tpl"}
    {else}
        {include file="asideUsuario.tpl"}
    {/if}
{else}
    {include file="asideRegistro.tpl"}
{/if}

<form action="search" method="post">
    <div class="search_container">
        <label>Elija una categoría:</label>
        <div class="search_category">
            <select name="category">
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria->id}">{$categoria->nombre_category}</option>
                {/foreach}
            </select>
            <button class="register_btn_nomargin" type="submit">Consultar</button>
        </div>
    </div>
</form>

<button>
    <a class="register_btn_nomargin link_remover" href="categories">Mostrar categorías</a>
</button>

<article class="artworks_container">

    {if $obras neq null}

        <h1> Mostrando resultados para: {$tituloCategoria->nombre_category} </h1>
    
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Autor</th>
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
                        <td class="register_btn">
                            <a class="link_remover" href="details/{$obra->id}">Detalles</a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <h2 class="error"> No hay obras existentes para la búsqueda: {$tituloCategoria->nombre_category} </h2>
    {/if}



    {include file="footer.tpl"}