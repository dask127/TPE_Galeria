{include file="header.tpl"}
{include file="asideMenu.tpl"}
{* {include file="asideRegistro.tpl"} *}

<section class="register_welcome">
    <h2>Por favor, inicie sesión</h2>
</section>

<form action="login" method="post" class="register_aside_form">
    <div class="register_field">
        <span>Nombre:</span>
        <input type="text" name="username" required>
    </div>
    <div class="register_field">
        <span>Contraseña:</span>
        <input type="password" name="password" required>
    </div>
    <div class="register_field">
        <button id="js-register" type="submit" class="register_btn">Entrar</button>
    </div>
</form>

{include file="footer.tpl"}