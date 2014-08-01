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
                <p>
                    <?php
                    $telefones = $cliente->getTelefones();
                    foreach ($telefones as $telefone) {
                        echo "({$telefone->getDdd()}) {$telefone->getNumero1()}-{$telefone->getNumero2()}";
                        if ($telefone->getRamal() !== null) {
                            echo " : Ramal {$telefone->getRamal()}";
                        }
                        echo "<br />";
                    }
                    ?>
                </p>
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