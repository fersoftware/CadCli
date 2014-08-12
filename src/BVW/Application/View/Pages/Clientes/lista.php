<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h3>Lista de Clientes</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id='ClientsTable' class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Classificação</td>
                        <td>Pessoa Jurídica</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (false !== $clientesArr) {
                        foreach ($clientesArr as $key => $cliente) {
                            echo "<tr>";
                            echo "<td>{$cliente->getId()}</td>";
                            if (!$cliente->isPJ()) {
                                echo "<td>{$cliente->getNome()} {$cliente->getSobrenome()}</td>";
                            } else {
                                echo "<td>{$cliente->getRazaoSocial()}</td>";
                            }
                            echo "<td>";
                            for ($i = 1; $i <= $cliente->getStars(); $i++) {
                                echo '<img src="/library/images/star.png" />';
                            }
                            echo '<i class="no-show">' . $i . '</i>';
                            echo "</td>";
                            if (!$cliente->isPJ()) {
                                echo '<td><img src="/library/images/cross.png" /><i class="no-show">0</i></td>';
                            } else {
                                echo '<td><img src="/library/images/tick.png" /><i class="no-show">1</i></td>';
                            }
                            echo "<td><button type='button' class='btn btn-info' value='{$cliente->getId()}' role='ClientDetail'><i class='fa fa-eye'></i> Detalhes</button></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-danger" type="button" role='BackButton'>Voltar</button>
        </div>
    </div>
</div>