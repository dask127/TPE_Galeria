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

<button>
    <a href="categories">Mostrar categorías</a>
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
                        <h3>{$categoria->nombre}</h3>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>


    {include file="footer.tpl"}