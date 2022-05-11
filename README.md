<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"></a></p>
<h3 align="center">Sistema criado para gerenciar os serviços executados da empresa Auto Socorro Estrela como forma de estudo.</h3>

<p align="center">
<img src="http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge" width="200" >
</p>


## Sobre o projeto
Projeto CRUD realizado para fins de estudo criando um sistema
capaz de inserir dados de serviços vinculado prestados para seguradoras vinculando o motorista,
placa do caminhão que executou, seguradora que solicitou, e a empresa que fez a prestação

Registro de notas fiscais com data de emissão e previsão de pagamento


## Rodando o Projeto

1. Faça o clone desse repositório com o comando:

```
$ git clone git@github.com:lanng/autoSocorro.git
```

2. Acesse a pasta do projeto em seu terminal:

```
$ cd autoSocorro
```

3. Execute o comando para instalar todas as dependencias com o Composer.

```
$ composer install
```

4. Copie o arquivo .env.example para um novo chamado .env

```
$ cp .env.example .env
```

5. Mude as variáveis do banco de daods no .env:
    - **DB_DATABASE**: Banco que você deverá criar para o projeto.
    - **DB_USERNAME**: Seu usuário do MySQL.
    - **DB_PASSWORD**: Sua senha do MySQL.

```
DB_DATABASE=dev_system
DB_USERNAME=root
DB_PASSWORD=root
```

6. Rode a aplicação

```
$ php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
