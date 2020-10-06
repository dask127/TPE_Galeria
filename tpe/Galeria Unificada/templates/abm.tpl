{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistro.tpl"}


<form action="addartwork" method="post">
<label>Nombre:</label>
<input name="nombre" type="text" placeholder="Nombre...">

<label>Descripcion:</label>
<input type="text" name="descripcion" placeholder="Descripción...">

<label>Autor:</label>
<input name="autor" type="text" placeholder="Autor...">

<label>Año:</label>
<input name="anio" type="date" placeholder="Año...">

<label>Imagen (link):</label>
<input name="imagen" type="url" placeholder="Imagen...">

    <label>Elija una categoría:</label>
    <select name="category">
        <option value="1">Pintura</option>
        <option value="2">Dibujo</option>
        <option value="3">Escultura</option>
    </select>
    <button type="submit">Agregar</button>
</form>


{include file="footer.tpl"}