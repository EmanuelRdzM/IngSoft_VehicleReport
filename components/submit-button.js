class SubmitButton extends HTMLElement {
    constructor() {
        super();

        // Crea un shadow DOM para el componente
        const shadow = this.attachShadow({ mode: 'open' });

        // Crea un botón dentro del shadow DOM
        const button = document.createElement('button');
        button.classList.add('submit-button');

        // Agrega un evento de clic al botón que llama al método personalizado
        button.addEventListener('click', () => {
            this.submitForm();
        });

        // Agrega el botón al shadow DOM
        shadow.appendChild(button);

        // Agrega estilos al shadow DOM
        const style = document.createElement('style');
        style.textContent = `
            .submit-button {
                background-color: #ff5733; /* Cambia el color de fondo a un tono llamativo */
                color: white;
                padding: 15px 30px; /* Aumenta el tamaño del botón */
                margin-top: 10px; /* Agrega espacio en la parte superior del botón */
                border: none;
                cursor: pointer;
                border-radius: 10px; /* Aumenta el radio de borde para un aspecto más suave */
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3); /* Aumenta la sombra */
                transition: background-color 0.3s, transform 0.2s; /* Agrega una transición de escala al hacer hover */
            }

            .submit-button:hover {
                background-color: #ff4500; /* Cambia el color de fondo al hacer hover */
                transform: scale(1.50); /* Aumenta el tamaño al hacer hover */
            }
        `;
        shadow.appendChild(style);
    }

    // Método personalizado para enviar el formulario
    submitForm() {
        const form = this.closest('form'); // Busca el formulario más cercano
        if (form) {
            form.submit(); // Envía el formulario
        }
    }

    // Observador de cambios en el atributo 'text' para actualizar el texto del botón
    static get observedAttributes() {
        return ['text'];
    }

    attributeChangedCallback(attrName, oldValue, newValue) {
        if (attrName === 'text') {
            this.shadowRoot.querySelector('.submit-button').textContent = newValue;
        }
    }
}

// Define el nuevo elemento personalizado
customElements.define('submit-button', SubmitButton);
