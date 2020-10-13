{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<div class="category_container">
    <h1> Crear categoría </h1>
    <form action="addcategory" method="post">

        <div class="input_container">

            <div class="input_block">
                <label>ID:</label>
                <input type="number" name="id" placeholder="ID...">
            </div>

            <div class="input_block">
                <label>Nombre:</label>
                <input name="nombre" type="text" placeholder="Nombre...">
            </div>

            <button class="register_btn_nomargin" type="submit">Agregar</button>
        </div>
    </form>
</div>


<article class="artworks_container">

    <table class="abm_table">
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
                        <h3>{$categoria->nombre}</h3>
                    </td>
                    <td class="abm_button register_btn">
                        <a href="categorydelete/{$categoria->id}">Borrar</a>
                    </td>
                    <td class="abm_button register_btn">
                        <a href="categoryedit/{$categoria->id}">Editar</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file="footer.tpl"}