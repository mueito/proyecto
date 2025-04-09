// Función para cerrar sesión
function cerrarSesion() {
    // Mostrar confirmación (opcional)
    if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
        // Redirigir al archivo logout.php (que destruirá la sesión)
        window.location.href = "logout.php";
    }
}

// Asignar la función a un botón (ejemplo: si tienes un botón con id="btnLogout")
document.addEventListener("DOMContentLoaded", function() {
    const btnLogout = document.getElementById("btnLogout");
    if (btnLogout) {
        btnLogout.addEventListener("click", cerrarSesion);
    }
});

// Opcional: Cerrar sesión automáticamente después de inactividad
let tiempoInactividad;
function reiniciarTemporizador() {
    clearTimeout(tiempoInactividad);
    tiempoInactividad = setTimeout(cerrarSesion, 1800000); // 30 minutos (en milisegundos)
}

// Reiniciar el temporizador con eventos de actividad (movimiento del mouse, teclas, etc.)
document.addEventListener("mousemove", reiniciarTemporizador);
document.addEventListener("keypress", reiniciarTemporizador);
reiniciarTemporizador(); // Iniciar el temporizador al cargar la página