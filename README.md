# Gestão Médica - Laravel

## Sobre o Projeto
Este projeto é uma aplicação web desenvolvida em Laravel para gerenciar médicos, pacientes e atendimentos.
O sistema permite o cadastro, consulta, atualização e exclusão dessas entidades

## Tecnologias Utilizadas
- Laravel 11
- PHP 8+
- MySQL 8+
- Docker e Docker Compose
- AdminLTE (Bootstrap)
- GitFlow para controle de versão

## Configuração do Ambiente

### 1. Clonar o repositório
```bash
  git clone https://github.com/matheusssousa/gestao-medica.git
  cd gestao-medica
```

### 2. Criar o arquivo de configuração `.env`
Copie o arquivo de exemplo e configure as variáveis de ambiente conforme necessidade:
```bash
  cp .env.example .env
```

### 3. Subir os contêineres Docker
```bash
  docker-compose up -d
```
Este comando iniciará os serviços da aplicação, incluindo MySQL, Laravel e Nginx.

### 4. Instalar as dependências
```bash
  docker-compose exec app composer install
```

### 5. Gerar a chave da aplicação
```bash
  docker-compose exec app php artisan key:generate
```

### 6. Executar as migrações e seeders
```bash
  docker-compose exec app php artisan migrate
```

### 7. Compilar os assets front-end
```bash
  docker-compose exec npm npm install
  docker-compose exec npm npm run dev
```

### 8. Acessar a aplicação
Acesse o sistema no navegador em:  
[http://localhost:8000](http://localhost:8000)