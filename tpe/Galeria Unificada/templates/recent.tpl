{include file="header.tpl"}
{include file="asideMenu.tpl"}
{include file="asideRegistro.tpl"}
{include file="main.tpl"}



<li class="recent content_centered" id="cosa">
    <hr class="divider">

    <h1 class="list__title">Obras Recientes</h1>
    <h2 class="list__subtitle price_box">
        <a href="artworks">
            Ver todas
        </a>
    </h2>

    <hr class="divider_transparent">

    <section class="recent__section">
        <ul id="js-recent_artwork" class="recent__list">

            {* let li = document.createElement("li"); *}
            {foreach from=$obras_s item=obra}
                
    
                <li>
                    <article class="card__container mouse_hover">
                    <a href= "details/{$obra->id}" class="a__card__style">
                        <img src="{$obra->imagen}" alt="{$obra->nombre} imagen" class="img__featured">
                        <article class="card__text">
                            <div class="card__name_price">
                                <h2>{$obra->nombre}</h2>
                                <div class="price_box">
                                    <h3>{$obra->autor}</h3>
                                </div>
                            </div>
    
                            {if $obra->id_categoria eq 1}
                                <h4> Pintura </h4>
                            {/if}
                            {if $obra->id_categoria eq 2}
                                <h4> Dibujo </h4>
                            {/if}
                            {if $obra->id_categoria eq 3}
                                <h4> Escultura </h4>
                            {/if}

                        </article>
                        </a>
                    </article>
                </li>
    
                <hr class="divider_transparent">
                </hr>
    
    
            {/foreach}


        </ul>
    </section>

</li>
</ul>

{include file="footer.tpl"}