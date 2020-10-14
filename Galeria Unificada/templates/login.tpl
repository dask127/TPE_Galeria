{include file="head.tpl"}
{include file="header.tpl"}
{include file="asideMenu.tpl"}


<section class="login_welcome">
    <h2>Por favor, inicie sesión</h2>
    <h3 class="login_error">{$error}</h3>
</section>

<form action="login" method="post" class="register_aside_form">
    <div class="login_container">
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
    </div>
</form>

{include file="footer.tpl"}