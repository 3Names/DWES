/*const llista = document.getElementById('llista-plataformas');

// Funció per carregar categories
async function carregarPlataformas() {
    try {
        const response = await fetch('/api/plataformas');
        const plataformas = await response.json();

        llista.innerHTML = '';
        plataformas.forEach(cat => {
            const li = document.createElement('li');*/
//            li.textContent = cat.nombre; // 'name' és el nom del camp a la BD
//            llista.appendChild(li);
//        });
//    } catch (error) {
//        console.error("Error al carregar:", error);
//    }
//}
//
// Inicialització
//carregarPlataformas();

const llista = document.getElementById('llista-plataformas');
// nous elements
const input = document.getElementById('nom-plataforma');
const btn = document.getElementById('btn-afegir');

// Funció per carregar categories
async function carregarPlataformas() {
    try {
        const response = await fetch('/api/plataformas');
        const plataformas = await response.json();

        llista.innerHTML = '';
        plataformas.forEach(cat => {
            const li = document.createElement('li');
            li.textContent = cat.nombre; // 'name' és el nom del camp a la BD
            llista.appendChild(li);
        });
    } catch (error) {
        console.error("Error al carregar:", error);
    }
}

// Nova funció per afegir categoria
// Afegim una funció per l’event de clickar el botó del fomulari
// Farem una petició POST, enviant el texte del camp de text
btn.addEventListener('click', async () => {
    const name = input.value;

    await fetch('/api/plataformas', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ nombre: name })
    });

    input.value = '';
    carregarPlataformas(); // Actualitzem la llista immediatament
});

// Inicialització
carregarPlataformas();

setInterval(carregarPlataformas,10000);
