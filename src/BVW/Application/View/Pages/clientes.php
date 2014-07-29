<?php
use BVW\Cliente\PessoaFisica;
use BVW\Cliente\PessoaJuridica;
use BVW\Cliente\Endereco;

use BVW\Application\Router;

$fullRoute = Router::getFullRoute();
$routeParts = explode("/", $fullRoute);

$cliente = new PessoaFisica(1, "José", "da Silva", "256.749.886-92", "(31) 3222-1111");
$cliente->addEndereco(new Endereco("Rua dos Otoni", 88, null, "Santa Efigênia", "Belo Horizonte", "MG", "30150-270"))
        ->addEndereco(new Endereco("Rua Padre Rolim", 500, "Apto. 202", "São Lucas", "Belo Horizonte", "MG", "30130-090", true))
        ->setStars(3);

$clientesArr[] = $cliente;

$cliente = new PessoaFisica(3, "João", "da Silva", "432.127.612-88", "(31) 3222-2222");
$cliente->addEndereco(new Endereco("Av. Barbacena", 679, null, "Centro", "Belo Horizonte", "MG", "30190-130"));

$clientesArr[] = $cliente;

$cliente = new PessoaJuridica(2, "Centro de Diagnóstico São Camilo LTDA", "Corpus - Centro de Diagnósticos", "16.194.492/0001-33", "Helbert Augsten", "(35) 3427-6100");
$cliente->addEndereco(new Endereco("Av. Alfredo Custódio de Paula", "333", null, "Medicina", "Pouso Alegre", "MG", "37550-000", true))
        ->setStars(4);

$clientesArr[] = $cliente;

$cliente = new PessoaJuridica(4, "BVW Sistemas LTDA", "brunowerneck.com.br", "78.868.733/0001-30", "Bruno Werneck", "(31) 2511-0000");
$cliente->addEndereco(new Endereco("Av. Carandaí", "353", null, "Funcionários", "Belo Horizonte", "MG", "30130-060"))
        ->addEndereco(new Endereco("Av. Augusto de Lima", 1016, "Sala 15", "Barro Preto", "Belo Horizonte", "MG", "30190-003", true))
        ->setStars(5);

$clientesArr[] = $cliente;

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
                <?php if (!$cliente->isPJ()) { ?>
                <h3><?php echo "{$cliente->getNome()} {$cliente->getSobrenome()}"; ?></h3>
                <p><?php echo "{$cliente->getCpf()}"; ?></p>
                <?php } else { ?>
                <h3><?php echo "{$cliente->getRazaoSocial()}"; ?></h3>
                <p><?php echo "{$cliente->getCnpj()}"; ?></p>
                <p>Contato: <?php echo "{$cliente->getContato()}"; ?></p>
                <?php } ?>
                <p><?php echo $cliente->getTelefone(); ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h3>Endereço(s)</h3>
            <hr />
            <?php 
            $enderecos = $cliente->getEnderecos();
            foreach ($enderecos as $endereco) {
                echo "<p>";
                if ($endereco->isBillingAddress()) {
                    echo "<strong>Endereço de Cobrança</strong><br />";
                }
                echo $endereco->getLogradouro() . ", " . $endereco->getNumero();
                echo $endereco->getComplemento() ? " - " . $endereco->getComplemento() : null;
                echo "<br />";
                echo $endereco->getBairro() . " - " . $endereco->getCidade() . " - " . $endereco->getUf() . "<br />";
                echo $endereco->getCep();
                echo "</p><hr />";
            }
            ?>
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
                        <td>Classificação</td>
                        <td>Pessoa Jurídica</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
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