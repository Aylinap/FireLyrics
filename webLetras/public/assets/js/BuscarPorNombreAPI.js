window.onload = function () {
    const botonBuscar = document.getElementById('botonBuscar');
    botonBuscar.addEventListener('click', function () {
        const texto = document.getElementById('textoBuscar').value;
        API_buscarNombre(texto);
    })

    function API_buscarNombre(texto) {
        const url = "https://musicbrainz.org/ws/2/recording/?query=recording:" + texto + "&fmt=json";
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                mostrarCanciones(data.recordings);
                console.log(data.recordings);
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

        let count = 0;
        canciones.forEach(element => {
            const titulo = element.title;
            const idmbCancion = element.id;
            const artista = element['artist-credit'][0].name;
            const idmbArtista = element['artist-credit'][0].artist.id;
            const fecha = element.releases[0].date;


            const card = document.getElementById('card');
            const cardClone = card.cloneNode(true);

            cardClone.classList.toggle('d-none');
            cardClone.classList.add('clone');
            cardClone.classList.add('cancion_' + count);

            const card_Titulo = cardClone.querySelector('#tituloCancion');
            card_Titulo.innerHTML = titulo;

            const card_idmbCancion = cardClone.querySelector('#idmbCancion');
            card_idmbCancion.innerHTML = idmbCancion;

            const card_idmbArtista = cardClone.querySelector('#idmbArtista');
            card_idmbArtista.innerHTML = idmbArtista;

            const card_artista = cardClone.querySelector('#artistaCancion');
            card_artista.innerHTML = artista;

            const card_fecha = cardClone.querySelector('#fechaCancion');
            card_fecha.innerHTML = "(" + fecha + ")";

            const boton = cardClone.querySelector('#botonAnadir');
            boton.addEventListener('click', function () {
                fetch('index.php?controller=cancion&action=add', {
                    method: 'POST',
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        titulo, idmbCancion, artista, idmbArtista, fecha
                    })
                })
                    .then(response => response.json())
                    .then(data => console.log(data));
            });
            listaCanciones.appendChild(cardClone);
            count++;

        });
    }
}
