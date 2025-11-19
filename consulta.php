<?php
include 'includes/header_cliente.php';
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
            <div class="container_consulta">
                <h1>Marque a Consulta do seu Pet</h1>
                <form action="inserir.php" method="POST">
                    <!-- Escolha do Pet (Pegar os Cadastrados, as informações abaixo estão desabilitadas pois serão preenchidas quando o pet for selecionado)-->
                    <div class="mb-3">
                        <select class="form-control" name="especie" required>
                            <option value="" disabled selected>Selecione o Pet</option>
                            <option value="pet1">Rex</option>
                            <option value="pet2">Luna</option>
                            <option value="pet3">Akira</option>
                        </select>
                    </div>
    
                    <!-- Espécie -->
                    <div class="mb-3">
                        <select class="form-control" name="especie" disabled>
                            <option value="" disabled selected>Espécie do pet</option>
                            <option value="Cachorro">Cachorro</option>
                            <option value="Gato">Gato</option>
                            <option value="Passaro">Pássaro/Ave</option>
                            <option value="Coelho">Coelho</option>
                            <option value="Rato">Hamster/Rato</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <!-- Raça -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="raca" placeholder="Raça do pet" disabled>
                    </div>

                    <!-- Idade -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="idade" placeholder="Idade do pet" disabled>
                    </div>

                    <!-- Peso -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="peso" placeholder="Peso" disabled>
                    </div>

                    <!-- Sexo -->
                    <div class="mb-3">
                        <select class="form-control" name="sexo" disabled>
                            <option value="" disabled selected>Sexo do pet</option>
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </select>
                    </div>

                    <!-- Procedimento -->
                    <div class="mb-3">
                        <select class="form-control" name="procedimento" required>
                            <option value="" disabled selected>Selecione o procedimento</option>
                            <option value="Vacinação">Vacinação</option>
                            <option value="Consulta geral">Consulta geral</option>
                            <option value="Tosse ou resfriado">Tosse ou resfriado</option>
                            <option value="Retorno">Retorno</option>
                            <option value="Banho">Banho e Tosa</option>
                            <option value="Exame">Exame</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <!-- Data -->
                    <div class="mb-3">
                        <input type="date" class="form-control" name="data" required>
                    </div>

                    <!-- Horário -->
                    <div class="mb-3">
                        <select class="form-control" name="procedimento" required>
                            <option value="" disabled selected>Selecione o horário</option>
                            <option value="09">09:00</option>
                            <option value="10">10:00</option>
                            <option value="11">11:00</option>
                            <option value="13">12:00</option>
                            <option value="14">14:00</option>
                            <option value="15">15:00</option>
                            <option value="16">16:00</option>
                            <option value="17">17:00</option>
                            <option value="18">18:00</option>
                        </select>
                    </div>

                    <!-- Campo Opcional -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="observacao"
                            placeholder="Observação (campo não obrigatório)">
                    </div>

                    <!-- Botões -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="dashboard_cliente.php" type="button" class="btn btn-warning">Voltar</a>
                </form>
            </div>
    </main>
<?php
 include 'includes/footer.php';
?>