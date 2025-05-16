<?php require('layout/header.php'); ?>

<style>
    #box {
        width: 400px;
        margin: 30px auto;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 20px;
        box-shadow: 0 0 2px;
        background-color: rgb(239, 239, 239);
        text-align: center;
    }

    #links a {
        text-decoration: none;
        color: rgb(36, 149, 255);
        font-weight: bold;
    }

    .video {
        text-align: center;
    }
</style>
<div id="box">
    <h2>Acerca de</h2>
    <div>
        <h3>Nombre: Jeremy Reyes</h3>
        <h3>Foto</h3>
        <img src="images/Foto.jpg" height="200">
    </div>

    <div id="links">
        <h3>Links para chatear</h3>
        <a href="https://t.me/JeremyR32">Telegram</a>
        <a href="https://wa.me/18297310988">Whatsapp</a>
    </div>
</div>

<div class="video">
    <h2>Video que le recomiendo</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/dr24Tj6Eyas?si=9LFLSfKnBI69qMHu"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
    </iframe>

</div>


<?php require('layout/footer.php'); ?>