# Carrinho

Um sistema de carrinho simples feito em PHP 7, Laravel 5, MySQL, Boostrap3 e AngularJS.

## Configurações

Instruções das configurações básicas para rodar o projeto localmente. Você provavelmente irá modificar estas configurações futuramente.

### Pré-requisitos

* PHP7
* Mysql 5.6
* Servidor web (Apache, nginx, etc..)
* Composer
* Bower

### Instalação

Para executar este projeto localmente você irá precisar instalar e configurar:

```
* [Apache](https://httpd.apache.org/download.cgi)
* [PHP 7] (http://php.net/downloads.php)
* [MySQL] (https://dev.mysql.com/downloads/) Community Edition
```

Se estiver no Linux, siga os passos deste link:

https://www.digitalocean.com/community/tutorials/como-instalar-a-pilha-linux-apache-mysql-php-lamp-no-ubuntu-16-04-pt

Por questões de praticidade, recomendo que utilize o XAMPP, que já traz o pacote de aplicações necessárias:

* [XAMPP] (https://www.apachefriends.org/pt_br/index.html)

Com o projeto baixado (via zip ou via git [vide documentação do github]) e o Apache já configurado:

Windows - (https://br.ccm.net/faq/10828-configurar-o-apache-e-o-windows-para-criar-um-host-virtual)

Linux - (https://wiki.locaweb.com.br/pt-br/Apache:_instala%C3%A7%C3%A3o_e_configura%C3%A7%C3%A3o_em_servidores_Linux_Ubuntu)

Instale o Composer:

* [Composer] (https://getcomposer.org/)

Passo a passo:

* Windows - https://www.phpmaranhao.com.br/tag/composer-no-windows/

* Linux - https://wiki.locaweb.com.br/pt-br/Apache:_instala%C3%A7%C3%A3o_e_configura%C3%A7%C3%A3o_em_servidores_Linux_Ubuntu

e também o Bower:

* [Bower] (https://bower.io/)

Passo a passo:

* Windows/Linux - https://www.npmjs.com/package/bower

* Windows - https://josemmsimo.wordpress.com/2016/06/20/installing-bower-on-windows-10/

Certifique-se de que o bower está funcionando com o seguinte comando via terminal:
```
bower --version
```

E também o composer com o comando abaixo:
```
composer --version
```

Navegue até a pasta do projeto e dê o seguinte comando:
```
composer install
```

e em seguida execute:
```
bower install
```

Agora verifique se o Laravel está presente:
```
php artisan --version
```

Com o laravel presente o projeto está quase pronto, execute o comando:
```
php artisan key:generate
```

Duplique o arquivo .env.example e o nomeie apenas de .env, configure os campos indicados abaixo:
```
APP_NAME=Carrinho
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carrinho
DB_USERNAME=root
DB_PASSWORD=
```
**OBSERVAÇÃO: Configuração apenas para teste, o banco de dados deve ter senha.**

Configure também os arquivos da pasta config (app.php e database.php) para que reflitam as configurações do .env

Finalmente, suba os serviços (Apache, MySQL, etc..) e importe ao MySQL o arquivo que está na raiz (cart.sql), as queries irão criar o banco, as tabelas
e alimentar com dados.

## Testando

Com os serviços configurados e rodando e o banco 'carrinho' já presente no MySQL, basta digitar na url:

```
 http://localhost
```

## Observações

* Se não conseguiu rodar o projeto, informe o problema em "Issues", o feedback ajuda a melhorar este README
* Existem diversas áreas de melhorias possíveis: sistema de cacheamento, search engine, implementar o MVC, substituir o AngularJS por algo mais recente, etc..
* **Não recomendado para uso em Produção, apenas estudo**
