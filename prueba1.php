<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="max-width: 80%; margin: auto;">
        <div class="row my-4 p-4 border rounded" style="width: 100%;">
            <div class="col-md-4">
                <img id="artist-photo" src="webLetras/public/img/logofondonegro.png" alt="Foto del Artista" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h1 id="artist-name">Nombre del Artista</h1>
                <ul id="artist-info" class="list-unstyled"></ul>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <h2>Lista de Canciones</h2>
                <ul id="song-list" class="list-group"></ul>
            </div>
        </div>
    </div>

    <script>
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

    const genreItem = document.createElement("li");
    genreItem.textContent = "Género: ";

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
    </script>
</body>

</html>