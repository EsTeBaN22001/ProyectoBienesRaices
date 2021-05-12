document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();

    preloader();


})

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', function() {
        const navegacion = document.querySelector('.navegacion');
        navegacion.classList.toggle('mostrar');
    });
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
    const contenedorCarga = document.querySelector('.contenedor-carga');

    contenedorCarga.classList.add('hidden');
}