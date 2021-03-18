<p align="center"><img src="public/images/logo_telzir.png"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre

Telzir é um empresa especializada em chamadas telefonicas de loga distância e este sistema tem como objetivo trazer uma nova funcionalidades para os clientes telzir. Atualmente, nossos clientes são cobrados em uma taxa por minuto, essa taxa varia de acordo com a cidade de origem e destino para qual o cliente está ligando. Mas como sempre prezamos pela qualidade dos nossas serviços bem como a satisfação do nosso clientes, teremos as seguintes novidades.

- O cliente vai poder escolhe dentre planos de telefonia
- Cada plano dará ao cliente um determinado número de minutos grátis :D
- Para cada minuto excedente à esse número de minutos grátis, será cobrado um pequeno pequeno adicional de 10% sobre o valor convencional de minuto.
- Haverá um pequeno dashborad para o cadastro dos planos, minutos, e DDDs

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




## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
