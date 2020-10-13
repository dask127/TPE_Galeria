    <nav class="register_aside" id="js-aside_register">
        <section class="register_welcome">
            <h2>Bienvenido a CL Gallery!</h2>
            <h3>Por favor, regístrese:</h3>
        </section>

        <form action="register" method="post" class="register_aside_form">
            <div class="register_field">
                <span>Nombre:</span>
                <input type="text" name="username" required>
            </div>
            <div class="register_field">
                <span>Contraseña:</span>
                <input type="password" name="password" required>
            </div>
            <div class="register_field">
                <button id="js-register" type="submit" class="register_btn">Registrarse</button>
                <h4 class=" register_field_login">
                    <a href="loginscreen"> Ya estás registrado?
                        <span> click aquí
                        </span>
                    </a>
                </h4>
            </div>
        </form>
    </nav>