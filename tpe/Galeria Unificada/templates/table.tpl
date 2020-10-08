

<form action="abm" method="post" class="form_abm">
    <label>Elija una categoría:</label>
    <select name="category" id="select_abm">
        <option value="1">Pintura</option>
        <option value="2">Dibujo</option>
        <option value="3">Escultura</option>
    </select>
    <button id="btn_abm" type="submit">Consultar</button>
</form>


<article class="artworks_container">

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Categoria</th>
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
    
                    <td>
                        {if $obra->id_categoria eq 1}
                            <h4> Pintura </h4>
                        {/if}
                        {if $obra->id_categoria eq 2}
                            <h4> Dibujo </h4>
                        {/if}
                        {if $obra->id_categoria eq 3}
                            <h4> Escultura </h4>
                        {/if}
                    </td>
                    <td>
                        <a href="details/{$obra->id}">Detalles</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>


            <script src="js/table_abm.js"></script>
