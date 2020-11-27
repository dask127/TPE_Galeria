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

<h1> Editar categoría </h1>

<div class="abm_edit_container">

    <form action="addeditedcategory/{$categoria->id}" method="post">
        <div class="abm_edit_row">

            <div class="input_block">
                <label>Nombre:</label>
                <input name="nombre" type="text" value="{$categoria->nombre_category}">
            </div>
        </div>

        <button class="register_btn_nomargin" type="submit">Terminar edición</button>
    </form>
</div>

{include file="footer.tpl"}