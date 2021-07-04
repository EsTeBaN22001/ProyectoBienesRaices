document.addEventListener('DOMContentLoaded', function(){
    
    darkMode();
    
    eventListeners();
    
    // preloader();
})

function eventListeners(){
    // Event listener para el botón de menú para dispositivos móviles
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', function() {
        const navegacion = document.querySelector('.navegacion');
        navegacion.classList.toggle('mostrar');
    });

    // Muestra campos condicionales en el formulario de contacto
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto));
}

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    
    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })

    const btnDarkMode = document.querySelector('.dark-mode-boton');

    btnDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
    })
}

function preloader(){
    const contenedorCarga = document.getElementById('.contenedor-carga');

    contenedorCarga.classList.add('hidden');
}

function mostrarMetodoContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    contactoDiv.textContent = "Diste click";

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <label for="telefono">Número de teléfono</label>
            <input data-cy="input-telefono" type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <label>Elija la fecha y hora para la llamada</label>

            <label for="fecha">Fecha</label>
            <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">Email</label>
            <input data-cy="input-email" type="email" placeholder="Tu Email" id="email" name="contacto[email]" >
        `;
    }
}