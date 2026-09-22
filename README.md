# 🌐 Sistema Poliglota (`projeto-dev-poliglota`)

<p align="center">
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-green?style=for-the-badge&logo=git&logoColor=white" alt="Status">
  <img src="https://img.shields.io/badge/Licen%C3%A7a-MIT-blue?style=for-the-badge&logo=opensourceinitiative&logoColor=white" alt="Licença">
  <img src="https://img.shields.io/badge/Vers%C3%A3o-1.0.0-lightgrey?style=for-the-badge&logo=semver&logoColor=white" alt="Versão">
  <img src="https://img.shields.io/badge/Instituição-EETEPA_IEEP-red?style=for-the-badge&logo=school&logoColor=white" alt="EETEPA IEEP">
</p>

---

## 📖 Resumo / Abstract

Este repositório contém a documentação técnica e o código-fonte do **Sistema Poliglota**, um projeto acadêmico colaborativo desenvolvido no âmbito da disciplina de Desenvolvimento de Sistemas na **EETEPA IEEP** (Ano Letivo: 2026), sob a tutela do Prof. **Mathaus Borges**. 

O objetivo principal desta pesquisa prática é demonstrar a **interoperabilidade heterogênea** entre diferentes ecossistemas de programação (*PHP 🐘, Java ☕ e Python 🐍*), utilizando um banco de dados relacional unificado (*MySQL 🐬*). Cada módulo tecnológico cumpre um papel específico no ciclo de vida do dado, desde a captação web até o processamento back-end e a geração analítica de relatórios.

---

## 📋 Sumário

- [1. Introdução e Contextualização](#-1-introdução-e-contextualização)
- [2. Arquitetura do Sistema](#-2-arquitetura-do-sistema)
- [3. Tecnologias Empregadas](#-3-tecnologias-empregadas)
- [4. Funcionalidades e Requisitos](#-4-funcionalidades-e-requisitos)
- [5. Pré-requisitos de Ambiente](#-5-pré-requisitos-de-ambiente)
- [6. Guia de Instalação e Configuração](#-6-guia-de-instalação-e-configuração)
- [7. Manual de Execução](#-7-manual-de-execução)
- [8. Contribuição](#-8-contribuição)
- [9. Licenciamento](#-9-licenciamento)

---

## 🏛️ 1. Introdução e Contextualização

No cenário moderno de desenvolvimento de software, a integração de microsserviços e linguagens heterogêneas é uma prática essencial. O **Sistema Poliglota** simula um ambiente corporativo simplificado onde múltiplos módulos tecnológicos operam concorrentemente sobre a mesma base de dados.

O fluxo operacional padrão obedece à seguinte hierarquia funcional:
1. **[PHP 🐘]** Atua na interface de cadastro, coletando dados de entrada via protocolo HTTP e inserindo novos registros no banco de dados com o status de `Pendente`.
2. **[Java ☕]** Atua como um processo de *daemon/batch*, varrendo registros pendentes, aplicando regras de negócio (normalização de strings para caixa alta) e gerando identificadores únicos de matrícula (`MAT-100X`).
3. **[Python 🐍]** Atua no subsistema de Business Intelligence (BI) e auditoria, realizando consultas estruturadas para a geração de relatórios gerenciais consolidados.

---

## 📐 2. Arquitetura do Sistema

A topologia do sistema baseia-se em um modelo centralizado em banco de dados relacional, onde as linguagens se comunicam de forma desacoplada através do subsistema SGBD:

```text
       ┌──────────────┐
       │   PHP 🐘     │ ──(Cadastra Aluno)──┐
       └──────────────┘                     ▼
                                    ┌──────────────┐
       ┌──────────────┐             │    MySQL     │
       │   Java ☕    │ ◄─(Processa)┤  (SGBD Central)│
       └──────────────┘             └──────────────┘
                                            ▲
       ┌──────────────┐                     │
       │  Python 🐍   │ ──(Gera Relatório)──┘
       └──────────────┘
```

---

## 💻 3. Tecnologias Empregadas

As ferramentas e bibliotecas acadêmicas utilizadas no desenvolvimento encontram-se descritas abaixo:

| Camada / Domínio | Tecnologia / Ferramenta | Ícone / Símbolo | Descrição Técnica |
| :--- | :--- | :--- | :--- |
| **Interface Web** | PHP 8 | 🐘 | Linguagem de script para o front/back de cadastro via PDO. |
| **Processamento Batch** | Java | ☕ | Linguagem orientada a objetos para consolidação de regras de negócio via JDBC. |
| **Análise e Relatórios** | Python 3.10+ | 🐍 | Linguagem interpretada para sumarização de dados via `mysql-connector`. |
| **Persistência** | MySQL / XAMPP | 🐬 | Sistema de Gerenciamento de Banco de Dados Relacional (SGBD). |
| **Estilização** | TailwindCSS | 🎨 | Framework CSS utilitário para design responsivo. |
| **Controle de Versão** | Git & GitHub | 🐙 | Versionamento de código e hospedagem de repositório. |

---

## ✨ 4. Funcionalidades e Requisitos

- [x] **Módulo de Cadastro Web (PHP 🐘):** Interface amigável para submissão de dados acadêmicos.
- [x] **Módulo de Processamento Automático (Java ☕):** Conversão semântica de nomes para maiúsculo e atribuição de chaves de matrícula.
- [x] **Módulo de Relatório Gerencial (Python 🐍):** Extração formatada de métricas e listagem de acadêmicos cadastrados.
- [ ] **Painel Analítico de Estatísticas (Dashboard):** Visualização gráfica em tempo real *(Planejado para v1.1)*.

---

## ⚙️ 5. Pré-requisitos de Ambiente

Para a execução correta deste projeto em ambiente de desenvolvimento local, certifique-se de possuir as seguintes ferramentas instaladas:
* **Ambiente Servidor:** [XAMPP](https://www.apachefriends.org/pt_br/index.html) (Apache & MySQL ativados).
* **Interpretador PHP:** PHP versão 8.0 ou superior (com a extensão `pdo_mysql` habilitada no `php.ini`).
* **Ambiente Java:** Java Development Kit (JDK) instalado, contendo o driver conector `mysql-connector-j.jar` configurado no *classpath*.
* **Interpretador Python:** Python versão 3.10 ou superior, com o pacote conector instalado via terminal:
  ```bash
  pip install mysql-connector-python
  ```

---

## 🚀 6. Guia de Instalação e Configuração

Clone o repositório oficial para o seu ambiente local utilizando o Git:

```bash
git clone https://github.com/[seu-usuario]/projeto-dev-poliglota.git
cd projeto-dev-poliglota
```

---

## 🖥️ 7. Manual de Execução

Siga a sequência abaixo para testar a interoperabilidade completa do sistema:

### Passo 1: Inicialização dos Serviços
Inicie os módulos **Apache** e **MySQL** através do painel de controle do **XAMPP 🛠️**.

### Passo 2: Configuração do Banco de Dados
Acesse o seu gerenciador de banco de dados (`phpMyAdmin`) ou utilize a linha de comando do MySQL para executar o seguinte script DDL/DML:

```sql
CREATE DATABASE IF NOT EXISTS sistema_poliglota;
USE sistema_poliglota;

CREATE TABLE IF NOT EXISTS alunos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  curso VARCHAR(50) NOT NULL,
  matricula VARCHAR(20) DEFAULT 'Pendente'
);
```

### Passo 3: Execução do Módulo PHP 🐘
1. Mova ou clone a pasta do projeto para o diretório raiz do seu servidor web local (ex: `htdocs` no XAMPP).
2. Abra o navegador web e acesse a interface de cadastro:
   ```url
   http://localhost/projeto-dev-poliglota/index.php
   ```
3. Cadastre um novo aluno. O registro será gravado com o status de matrícula `Pendente`.

### Passo 4: Execução do Módulo Java ☕
Compile e execute o processador batch em Java para atualizar os registros pendentes:

```bash
javac -cp .;mysql-connector-j.jar Processador.java
java -cp .;mysql-connector-j.jar Processador
```

### Passo 5: Execução do Módulo Python 🐍
Execute o script de relatórios para auditar e visualizar o resultado consolidado no terminal:

```bash
python relatorio.py
```

---

## 🤝 8. Contribuição

Contribuições acadêmicas, correções de bugs e melhorias arquiteturais são altamente bem-vindas!
1. Faça um *Fork* do projeto (`https://github.com/[seu-usuario]/projeto-dev-poliglota/fork`).
2. Crie uma Branch para a sua funcionalidade (`git checkout -b feature/NovaFuncionalidade`).
3. Realize o *Commit* das alterações (`git commit -m 'Adiciona nova funcionalidade X'`).
4. Faça o *Push* para a Branch (`git push origin feature/NovaFuncionalidade`).
5. Abra um *Pull Request* detalhado.

---

## 📄 9. Licenciamento

Este projeto é distribuído sob os termos da licença **MIT**. Consulte o arquivo [LICENSE](LICENSE) para obter mais detalhes.

---

<p align="center">
  Feito com 💜 e dedicação pela <b>Equipe Projeto Dev Poliglota</b><br>
  <b>EETEPA IEEP • Ano Letivo de 2026</b>
</p>
