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

<article class="artworks_container">
    {foreach from=$obras item=obra}
    
        <div>
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
        </div>
    
        <hr class="divider" />
    {/foreach}
</article>


<div class="feed_buttons">

    {* SMARTY toma el null como 0 y 0 como..null? wtf? *}

    {* Que pasa acá: cuando el offset de paginacion está en 3 , el $back_button vale 0, y smarty
    no sabe diferenciar entre 0 y null, por lo tanto no podria retroceder especificamente en ese caso. 
    Pero asi con "0.1" anda bien. no es lindo, pero se salta esa limitacion de SMARTY  *}
    {if $back_button neq 0.1}
        <button class="register_btn">
            <a href="feed/{$back_button}">
                Retroceder
            </a>
        </button>
    {/if}


    {* aca no tengo problemas ya que $next_button nunca va a ser 0 *}
    {if $next_button neq null}
        <button class="register_btn">
            <a href="feed/{$next_button}">
                Siguiente
            </a>
        </button>
    {/if}
</div>

{include file="footer.tpl"}