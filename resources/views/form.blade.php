<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .form-container {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
            animation: shake 0.3s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .form-group.error input,
        .form-group.error textarea {
            border-color: #e74c3c;
        }

        .form-group.error .error-message {
            display: block;
        }

        .form-group.success input,
        .form-group.success textarea {
            border-color: #27ae60;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .submit-btn:active::before {
            width: 300px;
            height: 300px;
        }

        .success-message {
            background: #27ae60;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            display: none;
            animation: slideIn 0.5s;
        }

        .success-message.show {
            display: block;
        }

        .char-counter {
            text-align: right;
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }

        .icon {
            display: inline-block;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📧 Contáctanos</h1>
            <p>Nos encantaría saber de ti. Envíanos un mensaje.</p>
        </div>

        <div class="form-container">
            <form id="contactForm" novalidate>
                <div class="form-group">
                    <label for="email">
                        <span class="icon">✉️</span>Correo Electrónico
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="tu@ejemplo.com"
                        required
                    >
                    <div class="error-message">Por favor ingresa un correo válido</div>
                </div>

                <div class="form-group">
                    <label for="mensaje">
                        <span class="icon">💬</span>Mensaje
                    </label>
                    <textarea
                        id="mensaje"
                        name="mensaje"
                        placeholder="Escribe tu mensaje aquí..."
                        maxlength="500"
                        required
                    ></textarea>
                    <div class="char-counter">
                        <span id="charCount">0</span>/500 caracteres
                    </div>
                    <div class="error-message">El mensaje debe tener al menos 10 caracteres</div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    Enviar Mensaje
                </button>

                <div class="success-message" id="successMessage">
                    ✅ ¡Mensaje enviado correctamente! Te responderemos pronto.
                </div>
            </form>
        </div>
    </div>

    <script>
        const form = document.getElementById('contactForm');
        const emailInput = document.getElementById('email');
        const mensajeInput = document.getElementById('mensaje');
        const submitBtn = document.getElementById('submitBtn');
        const successMessage = document.getElementById('successMessage');
        const charCount = document.getElementById('charCount');

        // Contador de caracteres
        mensajeInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Validación en tiempo real
        emailInput.addEventListener('blur', function() {
            validateEmail();
        });

        mensajeInput.addEventListener('blur', function() {
            validateMensaje();
        });

        // Función para validar email
        function validateEmail() {
            const emailValue = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const formGroup = emailInput.parentElement;

            if (emailValue === '') {
                setError(formGroup, 'El correo es obligatorio');
                return false;
            } else if (!emailRegex.test(emailValue)) {
                setError(formGroup, 'Por favor ingresa un correo válido');
                return false;
            } else {
                setSuccess(formGroup);
                return true;
            }
        }

        // Función para validar mensaje
        function validateMensaje() {
            const mensajeValue = mensajeInput.value.trim();
            const formGroup = mensajeInput.parentElement;

            if (mensajeValue === '') {
                setError(formGroup, 'El mensaje es obligatorio');
                return false;
            } else if (mensajeValue.length < 10) {
                setError(formGroup, 'El mensaje debe tener al menos 10 caracteres');
                return false;
            } else {
                setSuccess(formGroup);
                return true;
            }
        }

        // Establecer error
        function setError(formGroup, message) {
            formGroup.classList.add('error');
            formGroup.classList.remove('success');
            const errorMessage = formGroup.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.textContent = message;
            }
        }

        // Establecer éxito
        function setSuccess(formGroup) {
            formGroup.classList.add('success');
            formGroup.classList.remove('error');
        }

        // Manejo del envío del formulario
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const isEmailValid = validateEmail();
            const isMensajeValid = validateMensaje();

            if (isEmailValid && isMensajeValid) {
                // Deshabilitar botón
                submitBtn.disabled = true;
                submitBtn.textContent = 'Enviando...';

                // Simular envío (aquí irían tus datos reales)
                setTimeout(() => {
                    // Mostrar mensaje de éxito
                    successMessage.classList.add('show');

                    // Resetear formulario
                    form.reset();
                    charCount.textContent = '0';

                    // Limpiar clases de validación
                    document.querySelectorAll('.form-group').forEach(group => {
                        group.classList.remove('success', 'error');
                    });

                    // Restaurar botón
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Enviar Mensaje';

                    // Ocultar mensaje de éxito después de 5 segundos
                    setTimeout(() => {
                        successMessage.classList.remove('show');
                    }, 5000);

                    // Aquí puedes agregar código para enviar los datos a un servidor
                    console.log('Email:', emailInput.value);
                    console.log('Mensaje:', mensajeInput.value);
                }, 1500);
            }
        });

        // Limpiar mensaje de éxito al empezar a escribir
        [emailInput, mensajeInput].forEach(input => {
            input.addEventListener('input', () => {
                successMessage.classList.remove('show');
            });
        });
    </script>
</body>
</html>
