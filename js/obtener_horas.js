function generarHorarios() {
    const horaInicio = document.getElementById('horaInicio').value;
    const horaFin = document.getElementById('horaFin').value;
    const horariosGenerados = document.getElementById('horariosGenerados');
    horariosGenerados.innerHTML = '';

    const tiempoInicio = new Date(`2000-01-01T${horaInicio}:00Z`);
    const tiempoFin = new Date(`2000-01-01T${horaFin}:00Z`);

    while (tiempoInicio < tiempoFin) {
        const hora = tiempoInicio.getHours().toString().padStart(2, '0');
        const minutos = tiempoInicio.getMinutes().toString().padStart(2, '0');
        const horario = `${hora}:${minutos}`;
        const option = document.createElement('option');
        option.value = horario;
        horariosGenerados.appendChild(option);

        // Incrementa el tiempo en 30 minutos
        tiempoInicio.setMinutes(tiempoInicio.getMinutes() + 30);
    }
    
    // Ahora puedes enviar estos horarios a tu servidor para guardarlos en la base de datos mediante una solicitud HTTP (AJAX).
    // Dependiendo de tu backend, deberás implementar la lógica para guardar los horarios en la base de datos.
}