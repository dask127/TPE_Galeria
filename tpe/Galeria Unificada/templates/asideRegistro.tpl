       <nav class="register_aside" id="js-aside_register">
            <!-- sacar el hidden despues de programar el js -->
            <section class="register_welcome">
                <h2>Bienvenido a CL Gallery!</h2>
                <h3>Por favor, regístrese:</h3>
            </section>
            <form class="register_aside_form">
                <div class="register_field">
                    <span>Correo electrónico:</span>
                    <input type="email" required>
                </div>
                <div class="register_field">
                    <span>Contraseña:</span>
                    <input type="password" required>
                </div>
                <div class="register_field">
                    <span>Confirmar contraseña:</span>
                    <input type="password" required>
                </div>
                <div class="register_field">
                    <span id="js-captcha_output" class="captcha">3522</span>
                    <span>Escriba el captcha de arriba:</span>
                    <input type="text" id="js_captcha_input" required>
                    <button id="js-register" class="register_btn">Registrarse</button>
                </div>
                <span class="notificator" id="error_displayer"></span>
            </form>
        </nav>