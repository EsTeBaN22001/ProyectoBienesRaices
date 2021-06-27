<fieldset>
    <legend>Información general</legend>

    <label for="nombre">Nombre:</label>
    <input 
        type="text" 
        id="nombre" 
        name="vendedor[nombre]" 
        placeholder="Nombre del vendedor" 
        value="<?php echo san($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input 
        type="text" 
        id="apellido" 
        name="vendedor[apellido]" 
        placeholder="Apellido del vendedor" 
        value="<?php echo san($vendedor->apellido); ?>">

    <label for="telefono">Telefono:</label>
    <input 
        type="text"
        id="telefono"
        name="vendedor[telefono]"
        placeholder="Telefono del vendedor"
        value="<?php echo san($vendedor->telefono); ?>">
</fieldset>