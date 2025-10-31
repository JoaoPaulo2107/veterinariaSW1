<?php
include 'includes/header_adm.php'
    ?>

<!-- Cabeçalho com imagem e frase de impacto -->
<header class="masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-1 lh-1 mb-3">Bem-vinda, Gabriela!</h1>
                    <p class="lead fw-normal text-muted mb-5">
                        Agora você está logado. Confira já suas consultas agendadas.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/img/menina.png" alt="Imagem de animais de estimação" class="img-fluid">
            </div>
        </div>
    </div>
</header>
<section class="py-5">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-12">
                <h2 class="display-6 mb-4">Consultas pendentes</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover"
                        style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 255, 0.1); overflow: hidden; border-collapse: collapse;">
                        <thead class="table" style="background-color: #00569d;">
                            <tr>
                                <th scope="col">NOME CLIENTE</th>
                                <th scope="col">ESPÉCIE</th>
                                <th scope="col">PROCEDIMENTO</th>
                                <th scope="col">DATA</th>
                                <th scope="col">HORÁRIO</th>
                                <th scope="col">iNFORMAÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">Zé Felipe</td>
                                <td>Cachorro</td>
                                <td>Consulta de Rotina</td>
                                <td>31/10/2025</td>
                                <td>10:00</td>
                                <td> <a href="#" class="btn btn-warning">Saiba mais</a></td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
</section>
<?php
include 'includes/footer.php';
?>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>