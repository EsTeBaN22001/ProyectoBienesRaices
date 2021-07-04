// Autocompletado del código de cypress
/// <reference types="cypress" />

describe('Carga la página principal', ()=>{

    it('Prueba el header de la página principal', () =>{

        cy.visit('/')

        cy.get('[data-cy="heading-sitio"]').should('exist')
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de casas y departamentos exclusivos de lujo')
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices')
    });

    it('Prueba el bloque de los íconos principales', ()=>{

        cy.get('[data-cy="heading-nosotros"]').should('exist')
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2')

        // Selecciona los íconos
        cy.get('[data-cy="iconos-nosotros"]').should('exist')
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3)
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4)


    })

    it('Prueba la sección de propiedades', ()=>{
        // Selecciona los anuncios
        cy.get('[data-cy="anuncio"]').should('exist')
        cy.get('[data-cy="anuncio"]').should('have.length', 3)
        cy.get('[data-cy="anuncio"]').should('not.have.length', 4)

        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-naranja-block')
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver propiedad')

        // Probar el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click()
        cy.get('[data-cy="titulo-propiedad"]').should('exist')

        // cy.wait(1000)
        cy.go('back')

    })

    it('Prueba el routing hacia todas las propiedades', ()=>{
        // Propbar enlace hacia todas las propiedades
        cy.get('[data-cy="enlace-propiedades"]').should('exist')
        cy.get('[data-cy="enlace-propiedades"]').should('have.class', 'boton-verde')
        cy.get('[data-cy="enlace-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades')
        cy.get('[data-cy="enlace-propiedades"]').invoke('text').should('equal', 'Ver todas')
        cy.get('[data-cy="enlace-propiedades"]').click()
        cy.get('[data-cy="titulo-propiedades"]').should('exist')
        cy.get('[data-cy="titulo-propiedades"]').invoke('text').should('equal', 'Casas y departamentos en venta')
        cy.get('[data-cy="anuncio"]').should('exist')
        // cy.wait(1000)
        cy.go('back')
    })

    it('Prueba la sección de contacto', ()=>{
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Llena el formulario de contacto y un asesor se pondrá en contacto contigo en la brevedad');
        cy.get('[data-cy="imagen-contacto"]').find('a').should('exist')
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('text').should('equal', 'Contáctanos')
        cy.get('[data-cy="imagen-contacto"]').find('a').should('have.class', 'boton-naranja')
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href')
            .then(href =>{
                cy.visit(href)
            })
        cy.get('[data-cy="heading-contacto"]').should('exist')
        // cy.wait(1000)
        cy.visit('/')
    })

    it('Prueba los testimoniales y el blog', ()=>{

        cy.get('[data-cy="blog"]').should('exist')
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro blog')
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2)
        cy.get('[data-cy="blog"]').find('h4').should('exist')
        cy.get('[data-cy="blog"]').find('h4').should('have.length', 2)
        cy.get('[data-cy="blog"]').find('p').should('exist')
        cy.get('[data-cy="blog"]').find('p').should('have.length', 4)
        cy.get('[data-cy="blog"]').find('a').invoke('attr', 'href').should('equal', '/entrada')

        cy.get('[data-cy="testimoniales"]').should('exist')
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales')
        cy.get('[data-cy="testimoniales"]').find('blockquote').should('exist')
        cy.get('[data-cy="testimoniales"]').find('p').should('exist')
    })
})