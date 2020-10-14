{include file="headdeeply.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Editar categoría </h1>

<div class="abm_edit_container">

    <form action="addeditedcategory/{$categoria->id}" method="post">
        <div class="abm_edit_row">

            <div class="input_block">
                <label>Nombre:</label>
                <input name="nombre" type="text" value="{$categoria->nombre}">
            </div>
        </div>
        
        <button class="register_btn_nomargin" type="submit">Terminar edición</button>
    </form>
</div>

{include file="footer.tpl"}