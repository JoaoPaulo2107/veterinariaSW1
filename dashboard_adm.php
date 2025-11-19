<?php
include 'includes/header_adm.php';
session_start();

// Verifica se usuário está logado
if (!isset($_SESSION['usuario_id'], $_SESSION['usuario_email'])) {
    // não logado
    header('Location: index.php'); // ajuste caminho para sua página de login
    exit;
}

// opcional: usuario logado. Pode usar $_SESSION['usuario_nome'] etc.
?>

<!-- Cabeçalho com imagem e frase -->
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

<main>
    <section class="py-5">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-12">
                    <h2 class="display-6 mb-4">Consultas Pendentes</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"
                            style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 255, 0.1); overflow: hidden; border-collapse: collapse;">
                            <thead class="table" style="background-color:blue;; color: white;">
                                <tr>
                                    <!-- cabeçalho da tabela -->
                                    <th scope="col">NOME CLIENTE</th>
                                    <th scope="col">ESPÉCIE</th>
                                    <th scope="col">PROCEDIMENTO</th>
                                    <th scope="col">DATA</th>
                                    <th scope="col">HORÁRIO</th>
                                    <th scope="col">INFORMAÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- dados -->
                                    <td>Zé Felipe</td>
                                    <td>Cachorro</td>
                                    <td>Consulta de Rotina</td>
                                    <td>31/10/2025</td>
                                    <td>10:00</td>
                                    <td>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#infoModal">
                                            Saiba mais
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <!-- Modal com informações do Pet -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 90%; max-height: 90vh;">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:blue">
                        <h5 class="modal-title" id="infoModalLabel" style="color:white;">Informações do Pet</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <!-- cabeçalho da tabela -->
                                        <th style="background-color:blue;" scope="col">ID</th>
                                        <th style="background-color:blue;" scope="col">Nome Pet</th>
                                        <th style="background-color:blue;" scope="col">Dono</th>
                                        <th style="background-color:blue;" scope="col">Espécie</th>
                                        <th style="background-color:blue;" scope="col">Raça</th>
                                        <th style="background-color:blue;" scope="col">Idade</th>
                                        <th style="background-color:blue;" scope="col">Peso</th>
                                        <th style="background-color:blue;" scope="col">Sexo</th>
                                        <th style="background-color:blue;" scope="col">Procedimento</th>
                                        <th style="background-color:blue;" scope="col">Data</th>
                                        <th style="background-color:blue;" scope="col">Horário</th>
                                        <th style="background-color:blue;" scope="col">Observações</th>
                                        <th style="background-color:blue;" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- dados -->
                                        <td>1</td>
                                        <td>Zé Felipe</td>
                                        <td>Virginia</td>
                                        <td>Cachorro</td>
                                        <td>Labrador Retriever</td>
                                        <td>5 anos</td>
                                        <td>30kg</td>
                                        <td>Fêmea</td>
                                        <td>Consulta de Rotina</td>
                                        <td>31/10/2025</td>
                                        <td>10:00</td>
                                        <td>Cão Bravo</td>
                                        <td>
                                            <!-- botão para o adm aceitar ou recusar a consulta -->
                                            <div class="d-flex gap-1">
                                                <button type="button" class="btn btn-success btn-sm">Aceitar</button>
                                                <button type="button" class="btn btn-danger btn-sm">Recusar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="background-color:blue;">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php
include 'includes/footer.php';
?>