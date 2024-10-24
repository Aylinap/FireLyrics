const botonBuscar = document.getElementById('botonBuscar');
botonBuscar.addEventListener('click', function () {
    const texto = document.getElementById('textoBuscar').value;
    console.log(texto);

    buscar(texto);
})

function buscar(texto) {
    const url = "https://musicbrainz.org/ws/2/recording/?query=recording:" + texto + "&fmt=json";
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data.recordings);
            mostrarCanciones(data.recordings);
        })
        .catch((error) => console.log(error));
}

function mostrarCanciones(canciones) {
    const listaCanciones = document.getElementById('listaCanciones');

    const listaClones = document.querySelectorAll('.clone');

    if (listaClones != null) {
        listaClones.forEach(element => {
            element.remove();
        })
    }

    canciones.forEach(element => {
        const card = document.getElementById('card');
        const cardClone = card.cloneNode(true);

        cardClone.classList.toggle('d-none');
        cardClone.classList.add('clone');

        const titulo = cardClone.querySelector('#tituloCancion');
        titulo.innerHTML = element.title;

        const id = cardClone.querySelector('#idCancion');
        id.innerHTML = element.id;

        const artista = cardClone.querySelector('#artistaCancion');
        artista.innerHTML = element['artist-credit'][0].name;

        const fecha = cardClone.querySelector('#fechaCancion');
        fecha.innerHTML = "(" + element.releases[0].date + ")";

        listaCanciones.appendChild(cardClone);
    });
}



// function dibujarCanciones(canciones) {
//     const listaCanciones = document.getElementById('listaCanciones');
//     let count = 0;

//     canciones.forEach(element => {
//         const cancion = document.createElement('div');
//         cancion.id = 'cancion_' + count;
//         cancion.setAttribute('data-idCancion', element.id);
//         cancion.setAttribute('data-idArtista', element['artist-credit'][0]['artist'].id);

//         const titulo = document.createElement('h5');
//         titulo.innerHTML = element.title;

//         cancion.appendChild(titulo);

//         const artista = document.createElement('p');
//         artista.innerHTML = element['artist-credit'][0].name;

//         cancion.appendChild(artista);

//         const botonAnadir = document.createElement('button');
//         botonAnadir.id = count;
//         botonAnadir.innerHTML = 'Añadir';
//         botonAnadir.addEventListener('click', function (e) {
//             guardarCancion('cancion_' + e.target.id);
//         })

//         cancion.appendChild(botonAnadir);

//         listaCanciones.appendChild(cancion);

//         count++;
//     })
// }


// function guardarCancion(id) {
//     const cancion = document.getElementById(id);
//     console.log(cancion);

//     let idMusicBrainz = cancion.getAttribute('data-id');
//     console.log(idMusicBrainz);

//     fetch('guardarCancion.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({id:idMusicBrainz})
//     })
//     .then(response => response.json())
//     .then(data => console.log(data))
//     .catch(error => console.log(error))
// }