<?php 
    include '../app/views/general/header.php'; 
?>

<div id="container-login" class="body-login">
    <div class="login-cuadro col-md-4">
        <h1 class="tittle">Iniciar Sesión</h1>
        <form action="index.php?controller=usuario&action=login" method="post">
            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-user"></i>
                    Usuario
                </label>
                <input type="text" class="form-control" placeholder="Usuario" name="username" >
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-lock"></i>
                    Contraseña
                </label>
                <input type="password" class="form-control" placeholder="Contraseña" name="password" >
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>
        <a href="#" class="link">¿No tienes cuenta? ¡Registrate aquí!</a>
    </div>
</div>


<?php include '../app/views/general/footer.php'; ?>
