/// <reference types="cypress" />

describe('Prueba el formulario de contacto', ()=>{
    it('Prueba la página de contacto y el envio de emails', ()=>{
        cy.visit('/contacto')

        cy.get('[data-cy="heading-contacto"]').should('exist')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de contacto')

        cy.get('[data-cy="heading-formulario"]').should('exist')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el formulario de contacto')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llene el formulario formulario')

        cy.get('[data-cy="formulario-contacto"]').should('exist')
    })

    it('Llena los campos del formulario', ()=>{
        cy.get('[data-cy="input-nombre"]').should('exist')
        cy.get('[data-cy="input-nombre"]').type('Esteban')

        cy.get('[data-cy="input-mensaje"]').should('exist')
        cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa.')

        cy.get('[data-cy="input-opciones"]').should('exist')
        cy.get('[data-cy="input-opciones"]').select('Compra')

        cy.get('[data-cy="input-precio"]').should('exist')
        cy.get('[data-cy="input-precio"]').type(1000000)

        cy.get('[data-cy="forma-contacto"]').eq(1).check()
        cy.get('[data-cy="input-email"]').should('exist')
        cy.get('[data-cy="input-email"]').type('esteban1.redon2@gmail.com')
        cy.wait(3000)

        cy.get('[data-cy="forma-contacto"]').should('exist')
        cy.get('[data-cy="forma-contacto"]').eq(0).check()
        cy.get('[data-cy="input-telefono"]').should('exist')
        cy.get('[data-cy="input-telefono"]').type('2345671235')
        cy.get('[data-cy="input-fecha"]').should('exist')
        cy.get('[data-cy="input-fecha"]').type('2021-07-12')
        cy.get('[data-cy="input-hora"]').should('exist')
        cy.get('[data-cy="input-hora"]').type('18:40')

        cy.get('[data-cy="formulario-contacto"]').submit();

        cy.get('[data-cy="alerta-envio-formulario"]').should('exist')
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje enviado correctamente')
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito')
        cy.get('[data-cy="alerta-envio-formulario"]').should('not.have.class', 'error')
        cy.get('[data-cy="alerta-envio-formulario"]').should('not.have.class', 'actualizado')

    })
})