<?php
    include 'includes/header_cliente.php'
?>

<!-- Cabeçalho com imagem e frase de impacto -->
<header class="masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-1 lh-1 mb-3">Bem-vinda, Gabriela!</h1>
                    <p class="lead fw-normal text-muted mb-5">
                        Agora você está logado. Confira todas as novidades e produtos disponíveis.
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
                <h2 class="display-6 mb-4">Suas Consultas</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 255, 0.1); overflow: hidden; border-collapse: collapse;">
                        <thead class="table" style="background-color: #00569d;">
                            <tr>
                                <th scope="col" style="color: #fff;">Data</th>
                                <th scope="col" style="color: #fff;">Horário</th>
                                <th scope="col" style="color: #fff;">Procedimento</th>
                                <th scope="col" style="color: #fff;">Nome do Pet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/03/2024</td>
                                <td>10:00</td>
                                <td>Consulta de Rotina</td>
                                <td>Luna</td>
                            </tr>
                            <tr>
                                <td>20/09/2025</td>
                                <td>10:00</td>
                                <td>Vacinação Anual</td>
                                <td>Rex</td>
                            </tr>
                            <tr>
                                <td>25/03/2025</td>
                                <td>16:00</td>
                                <td>Banho e Tosa</td>
                                <td>Thor</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
