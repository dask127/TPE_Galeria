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

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$categorias item=categoria}
                <tr>
                    <td>
                        <h2>{$categoria->id}</h2>
                    </td>
                    <td>
                        <h3>{$categoria->nombre_category}</h3>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>


    {include file="footer.tpl"}