class ShowInfoButton extends HTMLElement {
    constructor() {
        super();

        this.attachShadow({ mode: 'open' });
        const buttonId = this.getAttribute('id') || 'button-id';
        const buttonText = this.getAttribute('text') || 'Mostrar Info'; // Obtener el texto personalizado

        this.shadowRoot.innerHTML = `
            <style>
                /* Estilo personalizado para el componente */
                div {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start; /* Alinea el botón a la izquierda */
                    justify-content: flex-start; /* Alinea el botón en la parte superior */
                    height: 100%;
                }

                button.show-button {
                    background-color: #3498db; /* Cambiar el fondo a un azul claro */
                    color: white;
                    border: 2px solid #3498db;
                    border-radius: 10px;
                    cursor: pointer;
                    font-size: 18px;
                    transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
                    box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.2);
                    margin-top: 10px; /* Agrega un margen superior para separarlo del borde superior */
                    margin-left: 50px; /* Agrega un margen izquierdo para separarlo del borde izquierdo */
                }

                button.show-button:hover {
                    background-color: #2980b9;
                    color: white;
                }

                slot {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: #333; /* Cambiar el fondo a un color oscuro */
                    color: white;
                    padding: 20px;
                    display: none;
                    z-index: 1000;
                    border-radius: 5px;
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4); /* Agregar sombras en los bordes */
                }

                button.close-button {
                    background-color: red;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 50%;
                    cursor: pointer;
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    font-size: 20px;
                    transition: background-color 0.3s;
                }

                button.close-button:hover {
                    background-color: #c0392b;
                }
            </style>
            <div>
                <button class="show-button" id="${buttonId}">${buttonText}</button> <!-- Usar el texto personalizado -->
                <slot></slot>
            </div>
        `; //cierre del content HTML

        const showButton = this.shadowRoot.querySelector('.show-button');
        const slot = this.shadowRoot.querySelector('slot');

        showButton.addEventListener('click', () => {
            slot.style.display = slot.style.display === 'none' ? 'block' : 'none';
        });

        const closeButton = this.shadowRoot.querySelector('.close-button');

        closeButton.addEventListener('click', () => {
            slot.style.display = 'none';
        });
    }
}

customElements.define('show-info-btn', ShowInfoButton);

