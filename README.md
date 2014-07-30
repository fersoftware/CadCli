# Cadastro de Clientes

### POO
Aplicação desenvolvida utilizando técnicas de Programação Orientada a Objetos.


## Instruções

### Instalação
```
git clone https://github.com/brunowerneck/CadCli.git cadcli
```

### Execução
Para executar o sistema, você pode utilizar tanto o **servidor embutido do PHP 5.4+** quanto o **virtual host do Apache 2.4**.

### Servidor embutido do PHP 5.4+
```
cd cadcli
php -S 0.0.0.0:8000 -t public_html/
```

### Virtualhost do Apache 2.4
```
<Virtualhost *:80>
  DocumentRoot "/caminho/do/seu/public_html"
  Servername nome.do.servidor
  <Directory "/caminho/do/seu/public_html/">
    AllowOverride All
    Options All
    Require all granted
  </Directory>
</Virtualhost>
```

## Utilização
Você pode ordenar a tabela de clientes clicando nos títulos disponíveis (ID, Nome, Classificação e PJ)