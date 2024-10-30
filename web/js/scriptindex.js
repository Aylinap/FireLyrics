/*Cosas que falta implementar, borrar luego:
1. Boton de añadir cancion a playlist 
2. que las imagenes sean random tomadas de la bbdd para darle algo de dinamismo (listo) hecho en la consulta sql
3. link funcionales del footer
4. esta re fea la pagina xD
5. el img-fluid en las imagenes redondas no funciona
6. falta el slice para el grid. */

async function fetchArtistaID() {
    try {
        const response = await fetch('controller_artista.php');
        if (!response.ok) {
            throw new Error('Error en la red');
        }
        const data = await response.json();
        console.log(data);
        renderGridIndex(data); 
        renderArtist(data);
    } catch (error) {
        console.error('error en devolver en artistas:', error);
    }
}

async function fetchUltimasLetras() {
    try {
        const response = await fetch('controller_cancion_letra.php'); 
        if (!response.ok) {
            throw new Error('Error en la red al obtener letras');
        }
        const dataLetras = await response.json();
        console.log(dataLetras);
        renderTableIndex(dataLetras);

    } catch (error) {
        console.error('error en devolver en  letras:', error);
    }
}



function renderGridIndex(data) {
    const grid_container_principal = document.getElementById("grid_principal");
    grid_container_principal.innerHTML = ''; 

    const grid_container_secundario = document.createElement('div');
    grid_container_secundario.classList.add('grid_container_secundario', 'text-center');

    const numRows = Math.ceil(data.length / 2);

    for (let i = 0; i < numRows; i++) {
        const row = document.createElement('div');
        row.className = 'row';

        for (let j = 0; j < 2; j++) { 
            const index = i * 2 + j;
            if (index < data.length) { 
                const col_div = document.createElement('div');
                col_div.className = 'col-12 col-md-6 g-2';

                const img_grid = document.createElement('img');
                img_grid.src = `${data[index].img_url}`; 
                img_grid.alt = `Artista ${data[index].Nombre}`; 
                img_grid.className = 'img-fluid'; 

                col_div.appendChild(img_grid);
                row.appendChild(col_div);
            }
        }
        
        grid_container_secundario.appendChild(row); 
    }

    grid_container_principal.appendChild(grid_container_secundario);
}



// crear tabla contenido por artista
function renderTableIndex(letras) {
    const section_general = document.getElementById("container_letras_index");
    section_general.innerHTML = ''; 

    const title = document.createElement("h3");
    title.innerHTML = "Últimas Actualizaciones"; 
    section_general.appendChild(title); 

    const table_general = document.createElement("div");
    table_general.classList.add('table-responsive'); 

    const table = document.createElement("table");
    table.classList.add('table', 'table-hover');

    const thead = document.createElement("thead");
    thead.className = "thead-dark";

    const tr_head = document.createElement("tr");

    const thArtista = document.createElement("th");
    thArtista.setAttribute('scope', 'col');
    thArtista.innerHTML = 'Artista'; 

    const thCancion = document.createElement("th");
    thCancion.setAttribute('scope', 'col');
    thCancion.innerHTML = 'Canción'; 

    const thAlbum = document.createElement("th");
    thAlbum.setAttribute('scope', 'col');
    thAlbum.innerHTML = 'Álbum'; 

    const thAcciones = document.createElement("th");
    thAcciones.setAttribute('scope', 'col');
    thAcciones.innerHTML = 'Acciones'; 

    tr_head.appendChild(thArtista);
    tr_head.appendChild(thCancion);
    tr_head.appendChild(thAlbum);
    tr_head.appendChild(thAcciones);
    thead.appendChild(tr_head);
    table.appendChild(thead);

    const tbody = document.createElement("tbody");

    letras.slice(0,10).forEach(letra => {
        const tr = document.createElement("tr");

        const tdArtista = document.createElement("td");
        tdArtista.textContent = letra.artista_nombre;
        tr.appendChild(tdArtista);

        const tdCancion = document.createElement("td");
        tdCancion.textContent = letra.cancion_nombre; 
        tr.appendChild(tdCancion);

        const tdAlbum = document.createElement("td");
        tdAlbum.textContent = letra.Album;
        tr.appendChild(tdAlbum);

        const tdAcciones = document.createElement("td");

        // Boton para link youtube
        const btnYoutube = document.createElement("a");
        btnYoutube.href = letra.link_youtube; 
        btnYoutube.target = "_blank"; 
        btnYoutube.classList.add('btn', 'btn-danger', 'me-2'); 
        btnYoutube.innerHTML = '<i class="fab fa-youtube"></i>'; 

        //Boton agregar playlis
        const btnPlaylist = document.createElement("button");
        btnPlaylist.textContent = "Agregar a Playlist";
        btnPlaylist.classList.add('btn', 'btn-primary');
        btnPlaylist.onclick = function() {
            // Logica para agregar a la playlist pdoria ser redirigir o asi (falta arreglar)
            alert(`Canción ${letra.cancion_nombre} agregada a la playlist`);
        };

        const buttonContainer = document.createElement("div");
        buttonContainer.classList.add('d-flex', 'flex-row'); 
        buttonContainer.appendChild(btnYoutube);
        buttonContainer.appendChild(btnPlaylist);
        
        tdAcciones.appendChild(buttonContainer);
        tr.appendChild(tdAcciones);

        tbody.appendChild(tr);
    });

    table.appendChild(tbody);
    table_general.appendChild(table);
    section_general.appendChild(table_general);
}


function renderArtist(artists) {
    const section_artista = document.getElementById("container_last_update");
    section_artista.innerHTML = ''; 

    const title = document.createElement('h2');
    title.innerHTML = "Artistas Top";
    title.className = "text-center my-4"; 
    section_artista.appendChild(title);

    const artistRow = document.createElement('div');
    artistRow.className = 'd-flex justify-content-around flex-wrap';

    artists.slice(0,4).forEach(artist => {
        const artistDiv = document.createElement('div');
        artistDiv.className = 'd-flex flex-column align-items-center m-2';

        // Imagen del artista
        const img_artista = document.createElement('img');
        img_artista.setAttribute('src', artist.img_url);
        img_artista.classList.add('img-fluid', 'rounded-circle', 'imagen_circulo');
        img_artista.alt = artist.Nombre; 
        img_artista.style.width = '100px';
        img_artista.style.height = '100px';

        const titulo_artista = document.createElement('h5');
        titulo_artista.innerHTML = artist.Nombre; 

        artistDiv.appendChild(img_artista);
        artistDiv.appendChild(titulo_artista);

        artistRow.appendChild(artistDiv);
    });
    section_artista.appendChild(artistRow);
}




// leer api de noticias, muestra las 3 primeras y hace unas card bien chulas con bootstraps
async function leerApiNoticias() {
    const apiKey = '76a5d9ce0d261ea8c96322f09e5a0cfb';
    const categoria = 'artistas musica';
    const url_api = `https://gnews.io/api/v4/search?q=${categoria}&token=${apiKey}&lang=es`;

    try {
        const response = await fetch(url_api);
        if (!response.ok) {
            throw new Error(`Error en la respuesta: ${response.status}`);
        }
        const data = await response.json();
        console.log(data);
        renderFinalIndex(data); 
    } catch (error) {
        console.error('Error al leer la API de noticias:', error);
    }
}

function renderFinalIndex(data) {
    const final_section = document.getElementById('final_index').querySelector('.card-group');

    if (data && data.articles) {
        const articlesToDisplay = data.articles.slice(0, 3); 

        articlesToDisplay.forEach(article => {
            const div_card = document.createElement('div');
            div_card.classList.add('card');

            const img_final = document.createElement('img');
            img_final.setAttribute('src', article.image);
            img_final.alt = `Imagen de la noticia: ${article.title}`;
            img_final.classList.add('card-img-top');

            const div_body = document.createElement('div');
            div_body.classList.add('card-body');

            const titulo_noticias = document.createElement('h5');
            titulo_noticias.classList.add('card-title');
            titulo_noticias.textContent = article.title;
            
            const link = document.createElement('a');
            link.href = article.url;
            link.target = "_blank"; 
            link.textContent = article.title; 
            link.classList.add('text-decoration-none', 'text-dark');
            
            titulo_noticias.appendChild(link);

            const texto_noticias = document.createElement('p');
            texto_noticias.classList.add('card-text');
            texto_noticias.textContent = article.description || 'Descripción no disponible';
            
            div_body.appendChild(titulo_noticias);
            div_body.appendChild(texto_noticias);

            div_card.appendChild(img_final);
            div_card.appendChild(div_body);

            final_section.appendChild(div_card);
        });
    } else {
        console.error("No se encontraron articulos en la respuesta de la api");
    }
}

document.addEventListener('DOMContentLoaded', () => {
    leerApiNoticias();
    fetchArtistaID();
    fetchUltimasLetras();
});

