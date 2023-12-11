<div class="menu">
    <form action="./" method="post">
    <?= csrf_field() ?>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="nivel">Liga:</label>
        <select id="nivel" name="nivel">
            <?php foreach ($ligas as $a) {
            
            ?>
            <option value="<?=  $a['idLiga'];?>"><?= $a['nombreLiga']?></option>
           <?php }?>
        </select>

        <input type="submit" value="Crear" name="createPlayer">
    </form> 
</div>
<section>
    <?php foreach ($jugadores as $j) { ?>
        <div class="player-card">
            <img class="player-image" src="./img/<?= $j['imagen'];?>" alt="<?= $j['nombre'] ?? "prueba.jpg" ?>">
            <div class="player-details">
                <div class="player-name">
                    <?php echo $j['nombre'] ?>
                </div>
                <div class="league-info">
                    <img class="league-image" src="./imgLiga/<?= $j['imagenLiga'];?>">
                    <span>
                    <?php echo $j['nombreLiga'] ?>

                    </span>
                </div>
            </div>
            <div class="action-buttons">
                <a href="./del/<?= $j['id'];?>">Borrar</a>
                <button>Editar</button>
            </div>
        </div>
    <?php } ?>
</section>
</body>

</html>