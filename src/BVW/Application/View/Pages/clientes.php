<?php
use BVW\Cliente\Cliente;
use BVW\Application\Router;

$fullRoute = Router::getFullRoute();
$routeParts = explode("/", $fullRoute);

$clientesArr[] = new Cliente(1, "José", "da Silva", "111.111.111-11", "Rua Hum", 1, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-1111");
$clientesArr[] = new Cliente(2, "João", "da Silva", "222.222.222.22", "Rua Dois", 2, "Apto. 202", "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-2222");
$clientesArr[] = new Cliente(3, "Joaquim", "da Silva", "333.333.333-33", "Rua Hum", 3, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-3333");
$clientesArr[] = new Cliente(4, "Pedro", "da Silva", "444.444.444-44", "Rua Dois", 4, null, "Centro", "Pouso Alegre", "MG", "37550-000", "(35) 3421-4444");
$clientesArr[] = new Cliente(5, "Antônio", "da Silva", "555.555.555-55", "Rua Três", 5, null, "Centro", "Pouso Alegre", "MG", "37550-000", "(35) 3423-5555");
$clientesArr[] = new Cliente(6, "Flávio", "da Silva", "666.666.666-66", "Rua Quatro", 6, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-6666");
$clientesArr[] = new Cliente(7, "José", "da Silva", "777.777.777-77", "Rua Hum", 7, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-7777");
$clientesArr[] = new Cliente(8, "José", "da Silva", "888.888.888-88", "Rua Dois", 8, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-8888");
$clientesArr[] = new Cliente(9, "José", "da Silva", "999.999.999-99", "Rua Nove", 9, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-9999");
$clientesArr[] = new Cliente(10, "José", "da Silva", "000.000.000-00", "Rua Hum", 10, null, "Centro", "Belo Horizonte", "MG", "30130-000", "(31) 3222-0000");

if (isset($routeParts[1])) {
    if (!isset($clientesArr[$routeParts[1]])) {
        ?>                          

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h3>Cliente Não Encontrado!</h3>
            </div>
        </div>
    </div>
</div>

<?php
    } else {
    $cliente = $clientesArr[$routeParts[1]];
    ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h3><?php echo "{$cliente->getNome()} {$cliente->getSobrenome()}"; ?></h3>
                <p><?php echo "{$cliente->getCpf()}"; ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p>
                <?php echo "{$cliente->getLogradouro()}, {$cliente->getNumero()}"; 
                echo $cliente->getComplemento() ? $cliente->getComplemento() : null; ?><br />
                <?php echo "{$cliente->getBairro()} - {$cliente->getCidade()} - {$cliente->getUf()}"; ?><br />
                <?php echo "{$cliente->getCep()}"; ?>
            </p>
            <p><?php echo "{$cliente->getTelefone()}"; ?></p>
            <button class="btn btn-danger" type="button" role='ClientsList'>Voltar</button>
                </div>
    </div>
</div>

<?php
    }
} else {
    
?>

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
                        <td>Cidade</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($clientesArr as $key => $cliente) {
                        echo "<tr>";                      
                        echo "<td>{$cliente->getId()}</td>";  
                        echo "<td>{$cliente->getNome()} {$cliente->getSobrenome()}</td>";  
                        echo "<td>{$cliente->getCidade()}</td>";  
                        echo "<td><button type='button' class='btn btn-info' value='{$key}' role='ClientDetail'><i class='fa fa-eye'></i> Detalhes</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-danger" type="button" role='BackButton'>Voltar</button>
        </div>
    </div>
</div>

<?php
    }