<?php
include_once 'web/vista/vista_header.php';
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">últimas actualizaciones</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
    </tbody>
</table>
<section class='d-flex justify-content-around'>

    <div class="d-flex flex-column align-items-center">
        <img src="web/img/fondonegro1.png" class="img-fluid rounded-circle imagen_circulo" alt="Imagen 1"
            style="width: 100px; height: 100px;">
        <h2>Artistax</h2>
    </div>
    <div class="d-flex flex-column align-items-center">
        <img src="web/img/logofondoblanco.png" class="img-fluid rounded-circle" alt="Imagen 2"
            style="width: 100px; height: 100px;">
        <h2>Artistax</h2>
    </div>
    <div class="d-flex flex-column align-items-center">
        <img src="web/img/portishead1.png" class="img-fluid rounded-circle" alt="Imagen 3"
            style="width: 100px; height: 100px;">
        <h2>Artistax</h2>
    </div>

</section>


<section id="final_index">
    <div class="card-group">
    </div>
</section>

<script>

async function fetchArtistaID() {
    fetch('web/vista/Artista.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la red');
            }
            return response.json();
        })
        .then(data => {
            // si quiero pasarle el id tiene que ser con php
            console.log(data);
        })
        .catch(error => {
            console.error('Hubo un problema con la petición:', error);
        });
    // renderGridIndex();

}

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
            console.error("No se encontraron artículos en la respuesta de la API.");
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        leerApiNoticias();
        fetchArtistaID();
    });
</script>


<?php
include_once 'web/vista/vista_Footer.php';
?>