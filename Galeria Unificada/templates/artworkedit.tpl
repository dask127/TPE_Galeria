{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideAdmin.tpl"}

<h1> Editar obra </h1>

<div class="abm_edit_container">
    <form action="addeditedartwork/{$obra->id}" method="post">

        <div class="abm_edit_row">

            <div class="input_block">
                <label>Nombre:</label>
                <input name="nombre" type="text" value="{$obra->nombre}">
            </div>

            <div class="input_block">
                <label>Descripcion:</label>
                <input type="text" name="descripcion" value="{$obra->descripcion}">
            </div>
        </div>

        <div class="abm_edit_row">

            <div class="input_block">
                <label>Autor:</label>
                <input name="autor" type="text" value="{$obra->autor}">
            </div>

            <div class="input_block">
                <label>Año:</label>
                <input name="anio" type="date" value="{$obra->anio}">
            </div>
        </div>

        <div class="abm_edit_row">

            <div class="input_block">

                <label>Imagen (link):</label>
                <input name="imagen" type="url" value="{$obra->imagen}">
            </div>

            <div class="input_block">
                <label>Categoría:</label>
                <select name="category">
                    {foreach from=$categorias item=categoria}
                        <option value="{$categoria->id}">{$categoria->nombre_category}</option>
                    {/foreach}
                </select>

            </div>
        </div>

        <button class="register_btn_nomargin" type="submit">Terminar edición</button>
    </form>
</div>

{include file="footer.tpl"}