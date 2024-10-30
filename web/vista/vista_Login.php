<?php
include_once 'vista/vista_header.php';
?>
    <div id="container-login" class="body-login">
    <div class="login-cuadro col-md-4">
        <h1 class="tittle">Iniciar Sesión</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-user"></i>
                    Usuario
                </label>
                <input type="text" class="form-control" placeholder="Usuario" name="user" >
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <i class="fa-solid fa-lock"></i>
                    Contraseña
                </label>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" >
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>
        <a href="#" class="link">¿No tienes cuenta? ¡Registrate aquí!</a>
    </div>
</div>
<?php 
include_once 'vista/vista_Footer.php';
?>
