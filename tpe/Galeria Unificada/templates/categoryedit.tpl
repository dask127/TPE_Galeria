{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Editar categoría </h1>
<form action="addeditedcategory/{$categoria->id}" method="post">
    <label>Nombre:</label>
    <input name="nombre" type="text" placeholder="{$categoria->nombre}...">

    <button type="submit">Terminar edición</button>
</form>

{include file="footer.tpl"}