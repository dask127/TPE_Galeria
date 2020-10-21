
{include file="headdeeply.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistro.tpl"}

<div class="card__container">
    {* darle estilo LATER *}
    <a href="home" class="detail_back">
        <h1>Volver</h1>
    </a>

    <article class="card__container">
        <div class="detail_layout">
            <img src="{$obra->imagen}" alt="{$obra->nombre} imagen" class="img__featured">
            <div class="detail_right">
                <article class="card__text">
                    <div class="card__name_price">
                        <h2>{$obra->nombre}</h2>
                        <div class="price_box">
                            <h3>{$obra->autor}</h3>
                        </div>
                    </div>

                        <h4> {$obra->nombre_category} </h4>

                    <h5>{$obra->anio} </h5>
                    <h6>{$obra->descripcion}</h6>

                </article>
            </div>
        </div>
</div>



{include file="footer.tpl"}