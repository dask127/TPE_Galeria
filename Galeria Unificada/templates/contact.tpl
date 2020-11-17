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

<div class="card__container">
    <h2>Contacto</h2>
    <p>
        Seguinos en facebook!
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta harum voluptatibus vel laudantium alias porro necessitatibus cumque, sequi a excepturi officia eum suscipit eveniet, dolore dolorum nihil minima omnis non?
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempore exercitationem, necessitatibus dolores expedita similique voluptas quas esse quae in voluptatem earum ipsum quod ipsam, repellendus aperiam corporis illo rem!
    </p>
</div>

{include file="footer.tpl"}