{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}

{if $sesion}
    {include file="asideRegistrado.tpl"}
{else}
    {include file="asideRegistro.tpl"}
{/if}

<div class="card__container">
    <h2>About Us</h2>
    <p>
        Somos CL Galery, una galería virtual de arte.
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta harum voluptatibus vel laudantium alias porro necessitatibus cumque, sequi a excepturi officia eum suscipit eveniet, dolore dolorum nihil minima omnis non?
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempore exercitationem, necessitatibus dolores expedita similique voluptas quas esse quae in voluptatem earum ipsum quod ipsam, repellendus aperiam corporis illo rem!
    </p>
</div>

{include file="footer.tpl"}