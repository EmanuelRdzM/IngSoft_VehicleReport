class BotonPersonalizado1 extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });

        const button = document.createElement('button');
        button.textContent = 'Button 1';
        button.style.backgroundColor = 'green';
        button.style.color = 'white';
        button.style.padding = '10px';
        button.style.border = 'none';
        button.style.cursor = 'pointer';

        button.addEventListener('click', () => {
            alert('Hola mundo!');
        });

        this.shadowRoot.appendChild(button);
    }
}

class ButtonChangeColor extends HTMLElement {
    constructor() {
        super();
        //Shadow DOM
        this.attachShadow({ mode: 'open' });

        // Propiedades inciales del boton
        const button = document.createElement('button');
        button.textContent = 'Change color';
        button.style.backgroundColor = 'blue';
        button.style.color = 'white';
        button.style.padding = '10px';
        button.style.border = 'none';
        button.style.cursor = 'pointer';

        // Event listener para cambiar el color
        button.addEventListener('click', () => {
            const colors = ['blue', 'red', 'green', 'orange', 'purple']; // Lista de colores
            const currentColor = button.style.backgroundColor;

            // Encuentra el índice del color actual en la lista
            const currentIndex = colors.indexOf(currentColor);

            // Calcula el índice del próximo color
            const nextIndex = (currentIndex + 1) % colors.length;

            // Establece el próximo color al botón
            button.style.backgroundColor = colors[nextIndex];
        });


        this.shadowRoot.appendChild(button);
    }
}

class ConfettiButton extends HTMLElement {
    constructor() {
        super();
        
        // shadow DOM del componente
        this.attachShadow({ mode: 'open' });

        // Crea el elemento del botón dentro del shadow DOM
        const button = document.createElement('button');
        button.textContent = '¡Confeti!';
        button.style.backgroundColor = 'purple';
        button.style.color = 'white';
        button.style.padding = '10px';
        button.style.border = 'none';
        button.style.cursor = 'pointer';

        // Agrega un event listener para hacer estallar el confeti cuando se hace clic en el botón
        button.addEventListener('click', () => {
            const confeti = document.createElement('div');
            confeti.classList.add('confeti');
            
            // Establece las coordenadas left y top de manera aleatoria
            confeti.style.left = `${Math.random() * window.innerWidth}px`;
            confeti.style.top = `${Math.random() * window.innerHeight}px`;
            
            document.body.appendChild(confeti);
            setTimeout(() => {
                confeti.remove(); // Elimina el confeti después de la animación
            }, 3000); // Duración de la animación (3 segundos)
        });

        // Agrega el botón al shadow DOM
        this.shadowRoot.appendChild(button);
    }
}


// Defininicion de lo botones

//Button with alert
customElements.define('boton-personalizado1', BotonPersonalizado1);

// Button to change the coloe
customElements.define('boton-personalizado2', ButtonChangeColor);

// Button Confetti
customElements.define('boton-confeti', ConfettiButton);
