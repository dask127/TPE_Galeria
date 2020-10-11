{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistrado.tpl"}

<h1> Crear categoría </h1>
<form action="addcategory" method="post">

    <label>ID:</label>
    <input type="number" name="id" placeholder="ID...">

    <label>Nombre:</label>
    <input name="nombre" type="text" placeholder="Nombre...">

    <button type="submit">Agregar</button>
</form>


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
                        <h3>{$categoria->nombre}</h3>
                    </td>
                    <td>
                        <a href="categorydelete/{$categoria->id}">Borrar</a>
                    </td>
                    <td>
                        <a href="categoryedit/{$categoria->id}">Editar</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file="footer.tpl"}