
desafiopicpay

Repositorio para o desafio backend da PicPay.

Instruções para rodar:

Obs: password for sigkill: 2562525

1.

Abra o terminal dentro do diretório raiz do projeto (desafiopicpay-master/), use os comandos: $ sudo apt install curl

$ curl -sS https://getcomposer.org/installer | /opt/lampp/bin/php

$ /opt/lampp/bin/php composer.phar install

2.

No mesmo terminal criar .htaccess:

$ gedit .htaccess

Salve o arquivo com o seguinte conteúdo:

RewriteEngine On RewriteCond %{REQUEST_FILENAME} !-f RewriteRule ^ index.php [QSA,L]

3.

Ainda no mesmo terminal inicie o xampp:

$ sudo /opt/lampp/manager-linux-x64.run

Quando o xampp iniciar, na aba 'manage servers' clique em 'start all'.

4.

Abra outro terminal e copie o projeto para o diretório padrão do xampp:

$ sudo cp -a /home/sigkill/Desktop/desafiopicpay-master/ /opt/lampp/htdocs/

5.

No mesmo terminal do passo 4 use os comandos:

$ /opt/lampp/bin/mysql -u root

O prompt do mariadb deve aparecer, nele, rode o arquivo initdb.sql:

$ source /home/sigkill/Desktop/desafiopicpay-master/initdb.sql

O processo de importação do banco de dados deve iniciar e demorar alguns minutos.

6.

Teste a busca (demora alguns segundos)! No seu navegador acesse:

$ http://localhost/desafiopicpay-master/api/users?name=carlos
