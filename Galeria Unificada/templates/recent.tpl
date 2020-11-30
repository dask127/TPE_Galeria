{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}


{if $sesion neq null}
    {if $sesion eq 1}
        {include file="asideAdmin.tpl"}
    {else}
        {include file="asideUsuario.tpl"}
    {/if}
{else}
    {include file="asideRegistro.tpl"}
{/if}

{include file="main.tpl"}



<li class="recent content_centered">
    <hr class="divider">

    <h1 class="list__title">Obras</h1>

    <div class="feed_buttons">
        <button class="register_btn">
            <a href="artworks">
                Ver en tabla
            </a>
        </button>

        <button class="register_btn">
            <a href="feed/0">
                Ver en manera paginada
            </a>
        </button>
    </div>

    <hr class="divider_transparent">

    <section class="recent__section">
        <ul id="js-recent_artwork" class="recent__list">

            {foreach from=$obras_s item=obra}
    
    
                <li>
                    <article class="card__container mouse_hover">
                        <a href="details/{$obra->id}" class="a__card__style">
                            <img src="{$obra->imagen}" alt="{$obra->nombre} imagen" class="img__featured">
                            <article class="card__text">
                                <div class="card__name_price">
                                    <h2>{$obra->nombre}</h2>
                                    <div class="price_box">
                                        <h3>{$obra->autor}</h3>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </article>
                </li>
    
                <hr class="divider_transparent" />
    
    
    
            {/foreach}


        </ul>
    </section>



</li>
</ul>



{include file="footer.tpl"}