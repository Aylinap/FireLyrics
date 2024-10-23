window.onload = function () {
    fetch(
        "https://musicbrainz.org/ws/2/recording/?query=recording:Alter%20Mann&fmt=json"
    )
        .then((response) => response.json())
        .then((data) => {
            data.recordings.forEach(element => {
                console.log(element);
            });
            dibujarCanciones(data.recordings);
        })
        .catch((error) => console.log(error));
}

function dibujarCanciones(canciones) {
    const listaCanciones = document.getElementById('listaCanciones');
    let count = 0;

    canciones.forEach(element => {
        const cancion = document.createElement('div');
        cancion.id = 'cancion_' + count;
        cancion.setAttribute('data-idCancion', element.id);
        cancion.setAttribute('data-idArtista', element['artist-credit'][0]['artist'].id);

        const titulo = document.createElement('h5');
        titulo.innerHTML = element.title;

        cancion.appendChild(titulo);

        const artista = document.createElement('p');
        artista.innerHTML = element['artist-credit'][0].name;

        cancion.appendChild(artista);

        const botonAnadir = document.createElement('button');
        botonAnadir.id = count;
        botonAnadir.innerHTML = 'Añadir';
        botonAnadir.addEventListener('click', function (e) {
            guardarCancion('cancion_' + e.target.id);
        })

        cancion.appendChild(botonAnadir);

        listaCanciones.appendChild(cancion);

        count++;
    })
}


function guardarCancion(id) {
    const cancion = document.getElementById(id);
    console.log(cancion);

    let idMusicBrainz = cancion.getAttribute('data-id');
    console.log(idMusicBrainz);

    fetch('guardarCancion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id:idMusicBrainz})
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
}