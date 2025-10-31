<?php
    include 'includes/header_cliente.php';
?>
<body>
<div class="container_consulta">
    <h1>Marque a Consulta do seu Pet</h1>
    <form action="inserir.php" method="POST">
        <!-- Nome do Pet -->
        <div class="mb-3">
            <input type="text" class="form-control" name="pet" placeholder="Digite o nome do pet" required>
        </div>

        <!-- Espécie -->
        <div class="mb-3">
            <select class="form-control" name="especie" required>
                <option value="" disabled selected>Selecione a espécie do pet</option>
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
            <input type="text" class="form-control" name="raca" placeholder="Digite a raça do pet" required>
        </div>

        <!-- Idade -->
        <div class="mb-3">
            <input type="text" class="form-control" name="idade" placeholder="Digite a idade do pet" required>
        </div>

        <!-- Peso -->
        <div class="mb-3">
            <input type="text" class="form-control" name="peso" placeholder="Digite o peso" required>
        </div>

        <!-- Sexo -->
        <div class="mb-3">
            <select class="form-control" name="sexo" required>
                <option value="" disabled selected>Selecione o sexo do pet</option>
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
            <input type="text" class="form-control" name="observacao" placeholder="Observação (campo não obrigatório)">
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="dashboard_cliente.php" type="button" class="btn btn-warning">Voltar</a>
    </form>
</div>

<?php
    include 'includes/footer.php';
?>