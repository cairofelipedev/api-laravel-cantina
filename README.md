# API Laravel - Cantina

## Pré-requisitos

1. **PHP**

2. **Composer**

3. **MySQL**

4. **Git**

### Instalação

1. Clone o repositório:

```bash
git clone https://github.com/cairofelipedev/api-laravel-cantina.git

```

2. Criar banco

3. Configure o .env com as credenciais do seu banco

4. Instalar dependências e migrate

```bash
composer install

```

ou

```bash
composer update

```

```bash
php artisan migrate

```

5. Iniciar Servidor

```bash
php artisan key:generate

php artisan jwt:secret

php artisan serve

```

6. Acesse a documentação da API em seu navegador e explore a API [text](http://localhost:8000/api/documentation)


7. Testes

```bash
php artisan test