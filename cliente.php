<?php
session_start();
require_once __DIR__ . '/includes/conexao.php';

// Verifica login
if (!isset($_SESSION['usuario_id'], $_SESSION['usuario_email'])) {
    header('Location: ../index.php');
    exit;
}

// ADM selecionou uma data? Se não, usa a data de hoje
$dataSelecionada = $_GET['data'] ?? date('Y-m-d');

// Buscar consultas do dia que foram ACEITAS
$sql = "
    SELECT 
        c.ID_consulta,
        c.Data_consulta,
        c.Procedimento,
        c.Horario,
        c.Observacao,

        a.Nome AS animal_nome,
        a.Raca,
        a.Especie,
        a.Idade,
        a.Peso,
        a.Sexo,

        d.Nome AS dono_nome,
        d.Email,
        d.Telefone
    FROM consulta c
    JOIN animal a ON a.ID_Animal = c.ID_Animal
    JOIN dono_animal d ON a.idDono_animal = d.ID_Dono_animal
    WHERE c.Data_consulta = :data
      AND c.Status = 'Aceita'
    ORDER BY c.Horario
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':data', $dataSelecionada);
$stmt->execute();
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'includes/header_adm.php'; ?>

<main>
    <div class="container_cliente">

        <!-- Filtro de data -->
        <form method="GET">
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Selecione a data:</label>
                    <input type="date" name="data" class="form-control" value="<?= $dataSelecionada ?>" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <h1>Consultas Aceitas</h1>

        <!-- Tabela -->
        <?php if (count($consultas) > 0): ?>
        <table class="table table-striped table-hover"
               style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,255,0.1);">
            <thead class="table" style="background-color:blue;color:white;">
                <tr>
                    <th>ID</th>
                    <th>Dono</th>
                    <th>Animal</th>
                    <th>Espécie</th>
                    <th>Raça</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th>Sexo</th>
                    <th>Procedimento</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Observação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $c): ?>
                <tr>
                    <td><?= $c['ID_consulta'] ?></td>
                    <td><?= htmlspecialchars($c['dono_nome']) ?></td>
                    <td><?= htmlspecialchars($c['animal_nome']) ?></td>
                    <td><?= htmlspecialchars($c['Especie']) ?></td>
                    <td><?= htmlspecialchars($c['Raca']) ?></td>
                    <td><?= htmlspecialchars($c['Idade']) ?> anos</td>
                    <td><?= htmlspecialchars($c['Peso']) ?> kg</td>
                    <td><?= htmlspecialchars($c['Sexo']) ?></td>
                    <td><?= htmlspecialchars($c['Procedimento']) ?></td>
                    <td><?= date('d/m/Y', strtotime($c['Data_consulta'])) ?></td>
                    <td><?= htmlspecialchars($c['Horario']) ?></td>
                    <td><?= htmlspecialchars($c['Observacao']) ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalConsulta"
                                data-id="<?= $c['ID_consulta'] ?>"
                                data-horario="<?= $c['Horario'] ?>"
                                data-data="<?= $c['Data_consulta'] ?>"
                                data-dono="<?= $c['dono_nome'] ?>"
                                data-animal="<?= $c['animal_nome'] ?>">
                            Gerenciar
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php else: ?>
            <div class="alert alert-info">Nenhuma consulta aceita encontrada para esta data.</div>
        <?php endif; ?>

    </div>

    <!-- Modal Dinâmico -->
    <div class="modal fade" id="modalConsulta" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header" style="background:blue;">
                    <h5 class="modal-title" style="color:white;">Gerenciar Consulta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <h5 id="infoConsulta" class="fw-bold mb-3"></h5>

                    <!-- Reagendar -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Reagendar Consulta</h6>
                            <form action="reagendar_consulta.php" method="POST">
                                <input type="hidden" name="id_consulta" id="consultaId">

                                <label>Nova Data</label>
                                <input type="date" class="form-control mb-2" name="nova_data" required>

                                <label>Novo horário</label>
                                <select class="form-control mb-2" name="novo_horario" required>
                                    <option disabled selected>Selecione o horário</option>
                                    <option>08:00</option><option>09:00</option><option>10:00</option>
                                    <option>11:00</option><option>14:00</option><option>15:00</option>
                                    <option>16:00</option><option>17:00</option>
                                </select>

                                <button class="btn btn-warning">Confirmar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Cancelar -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-danger">Cancelar Consulta</h6>

                            <form action="cancelar_consulta.php" method="POST">
                                <input type="hidden" name="id_consulta" id="consultaIdCancel">

                                <label>Motivo do cancelamento:</label>
                                <textarea name="motivo" class="form-control" required></textarea>

                                <button class="btn btn-danger mt-2">Cancelar Consulta</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
// Preenche o modal dinamicamente
var modal = document.getElementById('modalConsulta');
modal.addEventListener('show.bs.modal', function (event) {
    var btn = event.relatedTarget;
    var id = btn.getAttribute('data-id');
    var horario = btn.getAttribute('data-horario');
    var data = btn.getAttribute('data-data');
    var dono = btn.getAttribute('data-dono');
    var animal = btn.getAttribute('data-animal');

    document.getElementById('consultaId').value = id;
    document.getElementById('consultaIdCancel').value = id;

    document.getElementById('infoConsulta').innerHTML =
        "<strong>Dono:</strong> " + dono + 
        " — <strong>Animal:</strong> " + animal + 
        " — <strong>Data:</strong> " + data + 
        " — <strong>Hora:</strong> " + horario;
});
</script>

<?php include 'includes/footer.php'; ?>
