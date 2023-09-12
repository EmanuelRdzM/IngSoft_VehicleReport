// Define la clase del web component 'info-card'
class InfoCard extends HTMLElement {
    constructor() {
      super();
  
      // Crea un Shadow DOM para el componente
      this.attachShadow({ mode: 'open' });
  
      // Define el contenido inicial del Shadow DOM
      this.shadowRoot.innerHTML = `
        <style>
          :host {
            display: inline-block;
            position: relative;
          }
  
          img {
            width: 70%;
            max-height: 70%;
          }
  
          div {
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px;
            text-align: center;
            font-size: 10px;
          }
        </style>
        <slot></slot>
        <div><slot name="message">Message</slot></div>
      `;
    }
  
    connectedCallback() {
      // Agrega un evento para mostrar el mensaje al pasar el cursor sobre la tarjeta
      this.addEventListener('mouseenter', () => {
        const messageDiv = this.shadowRoot.querySelector('div');
        messageDiv.style.display = 'block';
      });
  
      // Agrega un evento para ocultar el mensaje al quitar el cursor de la tarjeta
      this.addEventListener('mouseleave', () => {
        const messageDiv = this.shadowRoot.querySelector('div');
        messageDiv.style.display = 'none';
      });
    }
  }
  
  // Registra el web component 'info-card'
  customElements.define('info-card', InfoCard);
  