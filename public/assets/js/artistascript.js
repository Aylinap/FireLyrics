 // Obtener el ID del artista desde la URL
            // const urlParams = new URLSearchParams(window.location.search);
            // const artistId = urlParams.get('id');

            // if (!artistId) {
            //     alert("No se proporciono un ID de artista en la URL.");
            //     return;
            // }

function getArtistaID() {
    const artistId = "13655113-cd16-4b43-9dca-cadbbf26ee05";
    
    // con tags
    fetch(`https://musicbrainz.org/ws/2/artist/${artistId}?inc=releases+tags&fmt=json&limit=100`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            renderArtista(data);
        })
        .catch(error => {
            console.error("Error al obtener la información del artista:", error);
            
        });
}

function renderArtista(data) {
    document.getElementById("artist-name").textContent = data.name;

    const artistInfoList = document.getElementById("artist-info");
    
    // País
    const countryItem = document.createElement("li");
    countryItem.textContent = "País: " + (data.area ? data.area.name : "No disponible");
    artistInfoList.appendChild(countryItem);

    // Géneros
    const genreItem = document.createElement("li");
    genreItem.textContent = "Género: ";

    // Filtrando y mostrando los géneros si están disponibles
    const genres = data.tags ? data.tags.map(tag => tag.name).join(", ") : "No disponible";
    genreItem.textContent += genres;
    artistInfoList.appendChild(genreItem);

    // Año de formación o naciomiento
    const yearFormedItem = document.createElement("li");
    const year = data["life-span"] && data["life-span"].begin ? data["life-span"].begin.split('-')[0] : "No disponible";
    yearFormedItem.textContent = "Año de formación: " + year;
    artistInfoList.appendChild(yearFormedItem);

    // Lista de canciones
    const songList = document.getElementById("song-list");
    if (data.releases && data.releases.length > 0) {
        data.releases.forEach(release => {
            const li = document.createElement("li");
            li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
            li.textContent = release.title;
            const addButton = document.createElement("button");
            addButton.classList.add("btn", "btn-primary", "btn-sm");
            addButton.textContent = "Agregar a la playlist";
            addButton.onclick = function() {
                alert(`Agregado "${release.title}" a la playlist`);
            };

            li.appendChild(addButton);
            songList.appendChild(li);
        });
    } else {
        const li = document.createElement("li");
        li.classList.add("list-group-item");
        li.textContent = "No se encontraron lanzamientos para este artista.";
        songList.appendChild(li);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    getArtistaID();
});






