class CustomCounter extends HTMLElement {
    constructor() {
        super();

        // Crear una sombra para el elemento y adjuntar el template
        const shadow = this.attachShadow({ mode: 'open' });
        const template = document.querySelector('#custom-counter-template').content.cloneNode(true);
        shadow.appendChild(template);

        // Obtener elementos del Shadow DOM
        const incrementButton = shadow.querySelector('#incrementButton');
        const decrementButton = shadow.querySelector('#decrementButton');
        const counterValue = shadow.querySelector('#counterValue');

        let count = 0;

        // Incrementar el contador
        incrementButton.addEventListener('click', () => {
            count++;
            counterValue.textContent = count;
        });

        // Decrementar el contador
        decrementButton.addEventListener('click', () => {
            count--;
            counterValue.textContent = count;
        });
    }
}

// Registrar el nuevo elemento personalizado
customElements.define('custom-counter', CustomCounter);