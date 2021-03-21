<p align="center"><img width="150" src="public/images/logo_telzir.png"></p>

<p align="center">

<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>




## Prévia da aplicação

<img src="https://ik.imagekit.io/lrrw3mrhils/screenshot_1_tlwsDRgcVY.png">



## Sobre

Telzir é um empresa especializada em chamadas telefonicas de loga distância e este sistema tem como objetivo trazer uma nova funcionalidades para os clientes telzir. Atualmente, nossos clientes são cobrados em uma taxa por minuto, essa taxa varia de acordo com a cidade de origem e destino para qual o cliente está ligando. Mas como sempre prezamos pela qualidade dos nossas serviços bem como a satisfação do nosso clientes, teremos as seguintes novidades.

- O cliente vai poder escolhe dentre planos de telefonia
- Cada plano dará ao cliente um determinado número de minutos grátis :D
- Para cada minuto excedente à esse número de minutos grátis, será cobrado um pequeno pequeno adicional de 10% sobre o valor convencional de minuto.


## Tecnologias usadas

- [Laravel](https://laravel.com/) -  Versão 5.7
- MySQL
- [JQuery](https://jquery.com/)
- PHP - Versão 7.2
- HTML
- CSS


## Pré requisitos

Esse projeto está previsto para ser executado em ambientes UNIX (Linux ou Mac), ficará como trabalho futuro a configuração em ambientes windows.

- Servidor web apache
```bash
$ sudo apt install apache2
```
- Banco de dados MySQL
```bash
$ sudo apt install mysql-server
```
- Composer (Gerenciador de componentes do PHP)
```bash
$ sudo apt install composer
```
- PHP e bibliotecas necessárias
```bash
sudo apt install php libapache2-mod-php php-mbstring php-xmlrpc php-soap php-gd php-xml php-cli php-zip php-bcmath php-tokenizer php-json php-pear
```


## Configuração de banco de dados

- Crie uma base de dados chamada "telzir" sendo com colação de utf_8_general_ci. (Caso esteja em algum interpretador de SQL pode usar o seguinte comando)

```sql
CREATE DATABASE telzir;
```

- Configure o seu arquivo .env localizado na raiz do projeto com as suas credenciais de banco de dados

<img src="https://ik.imagekit.io/lrrw3mrhils/screenshot_feZkTuSJhm.png">



- Pegue o arquivo chamado telzir.sql na raiz do projeto e rode em um terminal sql para persirtir alguns dados.



## Executando o projeto

- Dentro da raiz do projeto, execute o seguinte comando para puxar as dependências composer, caso necessite.

```bash
$ composer install
```

- Ainda dentro da raiz do projeto, execute o seguinte comando para iniciar o servidor da aplicação:

```bash
$ php artisan serve
```
- Esse comando irá abrir um servidor em localhost na porta 8000
- Caso você queria abrir em alguma porta de sua preferência execute o seguinte comando
```bash
$ php artisan serve --host localhost:porta
```


## Partes importantes

- O arquivo de controlador dessa aplicação está em app/Http/Controllers/WebController.php

- Já a view principal está em resources/views/web/index





## Testes
- O Laravel já vem por padrão equipado com o PHPUnit que é o componente para testes mais conhecido do PHP.
- Para esta aplicação foram feitos alguns testes unitários.
- Estes ficam localizados na pasta tests que fica na raiz do projeto, dentro de outra pasta chama Unit.

- No arquivo chamado CalcTest.php ficam alguns testes validando as funções que retornam os valores de COM PLANO ou SEM PLANO.



- Para rodar os testes execute o seguinte comando na raiz do projeto:
```bash
 $ ./vendor/bin/phpunit  
```


### Autor
---

<a href="github.com/jeffersonsevero">
 <img style="border-radius: 50%;" src="https://ik.imagekit.io/lrrw3mrhils/31740058_968598056636631_7264527737656705024_o_Xeor6hwAD.jpg" width="100px;" alt=""/>
 <br />
 <sub><b>Jefferson C. Severo</b></sub></a> <a href="" title="Rocketseat"></a>


Feito com ❤️ por Jefferson Severo 👋🏽 Entre em contato!

[![Linkedin Badge](https://img.shields.io/badge/-Jefferson-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/tgmarinho/)](https://www.linkedin.com/in/jefferson-severo-83760a152/) 
[![Gmail Badge](https://img.shields.io/badge/-jeffersonsevero08@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:tgmarinho@gmail.com)](mailto:jeffersonsevero08@gmail.com)


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
