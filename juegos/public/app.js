const llista = document.getElementById('llista-plataformas');

// Funció per carregar categories
async function carregarPlataformas() {
    try {
        const response = await fetch('/api/plataformas');
        const plataformas = await response.json();

        llista.innerHTML = '';
        plataformas.forEach(cat => {
            const li = document.createElement('li');
            li.textContent = cat.name; // 'name' és el nom del camp a la BD
            llista.appendChild(li);
        });
    } catch (error) {
        console.error("Error al carregar:", error);
    }
}

// Inicialització
carregarPlataformas();
