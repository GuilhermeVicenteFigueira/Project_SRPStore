# 🚀 Project_SRPStore

Sistema de Cadastro e Listagem de Produtos desenvolvido em PHP puro, aplicando SRP, PSR-4 e separação de camadas, com persistência em arquivo JSON (sem banco de dados)


![Estrelas](https://img.shields.io/github/stars/GuilhermeVicenteFigueira/Project_SRPStore.svg)
![Forks](https://img.shields.io/github/forks/GuilhermeVicenteFigueira/Project_SRPStore.svg)

## 📋 Tabela de Conteúdos

- [📖 Visão Geral](#-visão-geral)
- [💻 Tecnologias](#-tecnologias)
- [🚀 Instalação](#-instalação)
- [📝 Como Usar](#-como-usar)
- [✨ Funcionalidades](#-funcionalidades)
- [📄 Licença](#-licença)
- [👨‍💻 Autor](#-autor)

## 📖 Visão Geral

Este repositório contém o código-fonte para Project_SRPStore. 


## 💻 Tecnologias

- **PHP**

## 🚀 Instalação

```bash
# Clone o repositório
git clone https://github.com/GuilhermeVicenteFigueira/Project_SRPStore.git

# Entre no diretório do repositório e coloque dentro do httdocs da pasta xamp

```

## 📝 Como Usar

```bash
# Execute o xamp e entre no localhost:http://localhost/products-srp-demo/public/.

```

## ✨ Funcionalidades

- ✅ cadastra produtos
- ✅ Lista Usuarios 


``
## Casos de teste
  -  Caso 1: name="Teclado", price=120.50 →Cadastro produto Valido->HTTP 201  caso nao ocorra nenhum erro
  -  Caso 2: name="T", price=50  Create inválido (nome curto) → HTTP 422 e mensagem de validação.
  -  Caso 3: name="Mouse", price=-10  Create inválido (preço negativo) → HTTP 422.
  -  Caso 4: Lista vazia: sem produtos no arquivo List vazio → mensagem de vazio.
  -  Caso 5: – Múltiplos cadastros: cadastrar 3 produtos e verificar ordem/IDs List com itens → tabela com os dados corretos.
``
Este projeto está licenciado sob a licença não especificada.

## 👨‍💻 Autor

- [GuilhermeVicenteFigueira RA:](https://github.com/GuilhermeVicenteFigueira) 
  [João Pedro Messias da Silva RA: 199372](https://github.com/jpmsilvamessias)
---




