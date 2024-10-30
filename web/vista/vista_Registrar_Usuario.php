<?php
include_once 'vista/vista_header.php';
?>
<div class="register-container">
    <h2 class="text-center">Registro de Usuario</h2>
    <form id="registerForm" action=" " method="post" onsubmit="return validatePassword()">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="user" value="<?php echo htmlspecialchars($user ?? ''); ?>" placeholder="Ingresa tu nombre">
            <?php if (!empty($errors['user'])): ?>
                <small class="form-text text-danger"><?php echo $errors['user']; ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" placeholder="Ingresa tu correo electrónico">
            <?php if (!empty($errors['email'])): ?>
                <small class="form-text text-danger"><?php echo $errors['email']; ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="pass" placeholder="Ingresa tu contraseña">
            <?php if (!empty($errors['pass'])): ?>
                <small class="form-text text-danger"><?php echo $errors['pass']; ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_pass" placeholder="Confirma tu contraseña">
            <?php if (!empty($errors['confirm_pass'])): ?>
                <small class="form-text text-danger"><?php echo $errors['confirm_pass']; ?></small>
            <?php endif; ?>
            <small id="passwordError" class="form-text text-danger" style="display: none;">Las contraseñas no coinciden</small>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
    </form>
</div>

<script>
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    if (password !== confirmPassword) {
        document.getElementById("passwordError").style.display = "block";
        return false;
    } else {
        document.getElementById("passwordError").style.display = "none";
        return true;
    }
}
</script>
<?php
include_once 'vista/vista_Footer.php';
?>