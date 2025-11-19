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

<body>
    <main>
        <section>
            <div class="container_cliente">
                <!-- Seletor de Data -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="dataConsulta" class="form-label fw-bold">Selecione a data para visualizar as consultas:</label>
                        <input type="date" class="form-control" id="dataConsulta" name="data_consulta" style="max-width: 250px;">
                    </div>
                </div>
                <h1>Consultas do Dia</h1>
                <!-- tabela demonstrativa de como ficaria as consultas -->
                <table class="table table-striped table-hover"
                    style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 255, 0.1); overflow: hidden; border-collapse: collapse;">
                    <thead class="table" style="background-color:blue; color: white;">
                        <tr>
                            <!-- Cabeça da tabela -->
                            <th scope="col">ID</th>
                            <th scope="col">NOME CLIENTE</th>
                            <th scope="col">NOME ANIMAL</th>
                            <th scope="col">ESPÉCIE</th>
                            <th scope="col">RAÇA</th>
                            <th scope="col">IDADE</th>
                            <th scope="col">PESO</th>
                            <th scope="col">SEXO</th>
                            <th scope="col">PROCEDIMENTO</th>
                            <th scope="col">DATA</th>
                            <th scope="col">HORÁRIO</th>
                            <th scope="col">OBSERVAÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- dados da tabela -->
                            <td>1</td>
                            <td>Zé Felipe</td>
                            <td>Viginia</td>
                            <td>Cachorro</td>
                            <td>Labrador Retriever</td>
                            <td>5 anos</td>
                            <td>30kg</td>
                            <td>Fêmea</td>
                            <td>Consulta de Rotina</td>
                            <td>31/10/2025</td>
                            <td>10:00</td>
                            <td>Cão Bravo</td>
                        </tr>
                        <tr>
                            <!-- dados da tabela -->
                            <td>2</td>
                            <td>Maria Luiza</td>
                            <td>Luna</td>
                            <td>Cachorro</td>
                            <td>Shih Tzu</td>
                            <td>2 anos</td>
                            <td>3kg</td>
                            <td>Fêmea</td>
                            <td>Vacinação Anual</td>
                            <td>31/10/2025</td>
                            <td>15:00</td>
                            <td>Muito Agitado</td>
                        </tr>
                        <tr>
                            <!-- dados da tabela -->
                            <td>3</td>
                            <td>Fábio Santos</td>
                            <td>Thor</td>
                            <td>Cachorro</td>
                            <td>Bulldog Francês</td>
                            <td>10 anos</td>
                            <td>11 kg</td>
                            <td>Macho</td>
                            <td>Banho e Tosa</td>
                            <td>25/03/2024</td>
                            <td>16:00</td>
                            <td>Sensível ao calor extremo</td>
                        </tr>
                        <tr>
                            <!-- dados da tabela -->
                            <td>4</td>
                            <td>Lucas Oliveira</td>
                            <td>Max</td>
                            <td>Cachorro</td>
                            <td>Bulldog Francês</td>
                            <td>10 anos</td>
                            <td>11 kg</td>
                            <td>Macho</td>
                            <td>Banho e Tosa</td>
                            <td>25/03/2024</td>
                            <td>17:00</td>
                            <td>Sensível ao calor extremo</td>
                        </tr>
                        <tr>
                            <!-- dados da tabela -->
                            <td>5</td>
                            <td>Lucas Oliveira</td>
                            <td>Max</td>
                            <td>Cachorro</td>
                            <td>Bulldog Francês</td>
                            <td>10 anos</td>
                            <td>11 kg</td>
                            <td>Macho</td>
                            <td>Banho e Tosa</td>
                            <td>25/03/2024</td>
                            <td>18:00</td>
                            <td>Sensível ao calor extremo</td>
                        </tr>
                    </tbody>
                </table>
                <!-- botão que vai levar para o modal para reagendar a consulta -->
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#consultaModal" style="background-color: blue;">Reagendar Consulta</button>
                </div>
            </div>
            <!-- Modal para Cancelar/Reagendar Consulta -->
            <div class="modal fade" id="consultaModal" tabindex="-1" aria-labelledby="consultaModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: blue;">
                            <h5 class="modal-title" id="consultaModalLabel" style="color: white;">Gerenciar Consulta
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Informações da Consulta -->
                            <div class="mb-4">
                                <div class="mb-3">
                                    <!-- aqui aparece o nome do(a) cliente e também o horário da consulta, aqui o adm pode desmarcar/excluir  -->
                                    <select class="form-control" name="infoconsultas" required>
                                        <option value="" disabled selected>Selecione a data da Consulta</option>
                                        <option value="01">Nome Cliente: Evellyn, horário das 10:00</option>
                                        <option value="02">Nome Cliente: Evellyn, horário das 10:00</option>
                                        <option value="03">Nome Cliente: Evellyn, horário das 10:00</option>
                                    </select>
                                </div>
                            </div>

                            <!-- h5 com opções para serem escolhidas -->
                            <div class="border-top pt-4">
                                <h5 class="fw-bold mb-3">Selecione a opção desejada:</h5>

                                <!-- Reagendar Consulta -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title">Reagendar Consulta</h6>
                                        <!-- início do formulário de reagendamento -->
                                        <form action="reagendar_consulta.php" method="POST" class="mt-3">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="novaData" class="form-label">Nova Data</label>
                                                    <input type="date" class="form-control" id="novaData"
                                                        name="nova_data" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="novoHorario" class="form-label">Novo Horário</label>
                                                    <select class="form-control" id="novoHorario" name="novo_horario"
                                                        required>
                                                        <!-- opções de horários -->
                                                        <option value="" disabled selected>Selecione o horário</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="17:00">17:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-warning">Confirmar Reagendamento</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Opção 2: Cancelar Consulta -->
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title text-danger">Cancelar Consulta</h6>
                                        <form action="cancelar_consulta.php" method="POST" class="mt-3">
                                            <div class="mb-3">
                                                <label for="motivoCancelar" class="form-label">Motivo do Cancelamento</label>
                                                <textarea class="form-control" id="motivoCancelar" name="motivo"
                                                    rows="2" placeholder="Informe o motivo do cancelamento..."
                                                    required></textarea> <!-- caixa de texto -->
                                            </div>
                                            <button type="submit" class="btn btn-danger">Confirmar Cancelamento</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                style="background-color: blue;">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
    </main>
<?php
    include 'includes/footer.php'
?>