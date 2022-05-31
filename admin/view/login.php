
    
<main class="form-signin p-3">
    <form method="POST" action="login.php?accion=login">
        <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="correo" >
            <label for="floatingInput">Correo</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="contrasena">
            <label for="floatingPassword">Contrasena</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>

        <div class="text-center">
               <a href="login.php?accion=olvido">Perdi mi contraseña.</a> 
        </div>
    </form>
</main>