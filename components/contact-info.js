class ContactForm extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    // Cargar el template desde el archivo externo
    fetch('templates/contact-template.html')
      .then(response => response.text())
      .then(template => {
        this.innerHTML = template;
        this.querySelector('#contactForm').addEventListener('submit', this.onSubmit.bind(this));
      });
  }

  onSubmit(event) {
    // El evento 'submit' ya no necesita prevenirse, ya que el formulario se enviará al archivo PHP definido en el atributo 'action' del formulario.
    // Puedes agregar aquí cualquier otro código que desees ejecutar antes o después del envío del formulario.
  }
}

// Registra el elemento personalizado
customElements.define('contact-form', ContactForm);