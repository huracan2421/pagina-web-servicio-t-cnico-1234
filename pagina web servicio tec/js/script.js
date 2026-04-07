document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const status = document.getElementById('status');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();   // ← Esto evita que recargue la página

            const nombre = form.nombre.value.trim();

            status.textContent = "Enviando mensaje...";
            status.style.color = "#2563eb";
            status.style.display = "block";

            // Simulación de envío (puedes cambiarlo después por fetch a tu PHP)
            setTimeout(() => {
                status.innerHTML = `¡Gracias <strong>${nombre}</strong>!<br>Tu mensaje ha sido enviado con éxito.<br>Te contactaremos pronto.`;
                status.style.color = "#166534";
                status.style.backgroundColor = "#ecfdf5";
                status.style.border = "1px solid #86efac";
                status.style.padding = "18px";
                status.style.borderRadius = "12px";

                form.reset();   // Limpia el formulario
            }, 1400);
        });
    }
});