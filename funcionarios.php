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
<main>
    <section class="py-5">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-12">
                    <h2 class="display-6 mb-4">Funcionários</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover"
                            style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 255, 0.1); overflow: hidden; border-collapse: collapse;">
                            <thead class="table" style="background-color:blue; color: white;">
                                <tr>
                                    <!-- cabeçalho -->
                                    <th scope="col">NOME</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">DATA DE NASCIMENTO</th>
                                    <th scope="col">SEXO</th>
                                    <th scope="col">CRMV</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">ESPECIALIDADE</th>
                                    <th scope="col">EDITAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- dados -->
                                    <td>Evellyn dos Santos Furtado</td>
                                    <td>563.475.485-60</td>
                                    <td>25/09/2008</td>
                                    <td>Feminino</td>
                                    <td>11111</td>
                                    <td>evellynfurtado100@gmail.com</td>
                                    <td>118585-5855</td>
                                    <td>Banho e Tosa</td>
                                    <td>
                                        <!-- botão para ir ao modal de editar funcionário -->
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditarModal">Editar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- dados -->
                                    <td>Evellyn dos Santos Furtado</td>
                                    <td>563.475.485-60</td>
                                    <td>25/09/2008</td>
                                    <td>Feminino</td>
                                    <td>11111</td>
                                    <td>evellynfurtado100@gmail.com</td>
                                    <td>118585-5855</td>
                                    <td>Banho e Tosa</td>
                                    <td>
                                        <!-- botão para ir ao modal de editar funcionário -->
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditarModal">Editar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- dados -->
                                    <td>Evellyn dos Santos Furtado</td>
                                    <td>563.475.485-60</td>
                                    <td>25/09/2008</td>
                                    <td>Feminino</td>
                                    <td>11111</td>
                                    <td>evellynfurtado100@gmail.com</td>
                                    <td>118585-5855</td>
                                    <td>Banho e Tosa</td>
                                    <td>
                                         <!-- botão para ir ao modal de editar funcionário -->
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditarModal">Editar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoModal" style="background-color: blue;">Cadastrar Funcionário</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Cadastro-->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color:blue">
                    <h5 class="modal-title" id="infoModalLabel" style="color:white;">Cadastrar Funcionário</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORMULÁRIO PARA CADASTRAR O FUNCIONÁRIO -->
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" placeholder="Digite o nome completo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" placeholder="000.000.000-00">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sexo</label>
                                <select class="form-control">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CRMV</label>
                                <input type="number" class="form-control" placeholder="000000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="xxxxxxxgmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="number" class="form-control" placeholder="00000-0000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Especialidade</label>
                                <input type="text" class="form-control" placeholder="Veterinario..">
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    style="background-color:blue;">Cancelar</button>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color:blue">
                    <h5 class="modal-title" id="iModalLabel" style="color:white;">Editar dados do Funcionário</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORMULÁRIO PARA EDITAR DADOS  DO FUNCIONÁRIO -->
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" placeholder="Digite o nome completo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" placeholder="000.000.000-00">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sexo</label>
                                <select class="form-control">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CRMV</label>
                                <input type="number" class="form-control" placeholder="000000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="xxxxxxxgmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="number" class="form-control" placeholder="00000-0000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Especialidade</label>
                                <input type="text" class="form-control" placeholder="Veterinario..">
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Atualizar</button>
                <button type="button" class="btn btn-success" style="background-color:red">Excluir</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:blue;">Cancelar</button>
            </div>
        </div>
    </div>
    </div>
</main>

<?php
include 'includes/footer.php';
?>