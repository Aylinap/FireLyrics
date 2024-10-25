const botonBuscar = document.getElementById('botonBuscar');
botonBuscar.addEventListener('click', function () {
    const texto = document.getElementById('textoBuscar').value;
    console.log(texto);
    API_buscarNombre(texto);
})

function API_buscarNombre(texto) {
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