<?php
    include 'includes/header.php';
?>
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-6 mb-5">
          <img src="assets/img/gato_login.png" class="img-fluid" alt="Phone image" style="max-width: 65%; height: auto; ">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="crud\form_login.php" method="POST" style="background-color: #f; border: 1px solid #00569d; border-radius: 15px; padding: 20px; margin: 10px;">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <strong class="form-label" for="form1Example13" style="color:#00569d">Email:</strong>
              <input name="email" type="email" id="form1Example13" class="form-control form-control-lg" />
            </div>

            <!-- Senha input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <strong class="form-label" for="form1Example23" style="color:#00569d">Senha:</strong>
              <input name="senha" type="password" id="form1Example23" class="form-control form-control-lg" />
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3">Lembre-me</label>
              </div>
              <a href="cadastro.php">Não tem uma conta?</a>
            </div>

            <!-- Submit button -->
            <!-- <a href="dashboard_cliente.php" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="display: block; margin: 0 auto; width: 250px;">Entrar</a> -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg w-100">Entrar</button>
          </form>
        </div>
      </div>
    </div>
</section>
<?php
    include 'includes/footer.php';
?>
</body>
</html>
