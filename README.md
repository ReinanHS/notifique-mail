<p align="center">
  <img width="300" height="200" img src="https://thrivingmarriages-eszuskq0bptlfh8awbb.stackpathdns.com/wp-content/uploads/2017/03/gif-icons-menu-transition-animations-shake-new-mail.gif"/>
</p>

<p align="center">
  <a href="https://github.com/reinanhs" alt="MadeBy"><img src="https://img.shields.io/badge/made%20by-Reinan%20Gabriel-blue?style=for-the-badge" /></a>
  <a href="https://github.com/ReinanHS/notifique-mail/blob/master/README.md" alt="License"><img src="https://img.shields.io/badge/license-MIT-blue?style=for-the-badge" /></a>
  <a href="https://github.com/ReinanHS/notifique-mail"><img alt="GitHub top language" src="https://img.shields.io/github/languages/top/reinanhs/notifique-mail?style=for-the-badge"></a>
  <a href="https://github.com/ReinanHS/notifique-mail"><img alt="GitHub branch checks state" src="https://img.shields.io/github/checks-status/reinanhs/notifique-mail/main?logo=github&style=for-the-badge"></a>
  <a href="https://codecov.io/gh/ReinanHS/notifique-mail"><img alt="Codecov" src="https://img.shields.io/codecov/c/github/reinanhs/notifique-mail?logo=codecov&style=for-the-badge&token=9EXB4T4MWL"></a>
  
</p>

<p align="center">
    :droplet: Sistema em Laravel para notifique o usuário quando um e-mail chegar a sua caixa de entrada :droplet: 
</p>

<p align="center">
  :star: Colaboradores :star:
</p>
<p align="center">
  <a href="https://github.com/ReinanHS">
      <img width="84" height="84" src="https://github.com/reinanhs.png">
  </a>
</p>

# Notifique Mail

O objetivo deste programa é notificar o usuário quando um e-mail chega na caixa de entrada. O usuário pode ser notificado de várias maneiras, como por meio de um telefone celular, um aplicativo de desktop e assim por diante. Ao criar este projeto, espero permitir que os usuários sejam notificados quando receberem um novo e-mail. Ao usar este sistema, você pode receber notificações das seguintes maneiras:

- E-mail alternativo
- SMS

Além disso, futuramente será implementado o envio de notificações via:

- Whatsapp
- Ligação por telefone
- Push notification
- Telegram

<p align="center">
  <img src="https://user-images.githubusercontent.com/28494067/138643904-78fe3d87-c62d-4e1b-8062-389040d82b9a.png"/>
  <img src="https://user-images.githubusercontent.com/28494067/138642826-d82d3e9f-b286-406e-9440-4cc7c36f16bc.png"/>
</p>

# Instalando e atualizando as dependências

Clone o repositório no meu Github

`git clone https://github.com/ReinanHS/notifique-mail.git`

## Primeiros passos no Linux

Se você estiver desenvolvendo no Linux e o **Docker** já estiver instalado, você pode usar um comando de terminal simples para rodar esse projeto. Você deve executar o seguinte comando em seu terminal:

`composer install && ./vendor/bin/sail up`

Na primeira vez que você executa o comando Sail up, os contêineres de aplicativos do Sail serão construídos em sua máquina. Isso pode levar vários minutos. Não se preocupe, as tentativas subsequentes de iniciar o Sail serão muito mais rápidas.

## Primeiros passos no Windows

Antes de iniciar o aplicativo em sua máquina Windows, certifique-se de instalar o [Docker Desktop](https://www.docker.com/products/docker-desktop). Em seguida, você deve garantir que o Subsistema Windows para Linux 2 (WSL2) esteja instalado e ativado. O WSL é um recurso opcional disponível no Windows 10 (a partir da versão 1607) que te permite executar binários e scripts em Linux diretamente no Windows, traduzindo as instruções enviadas para o sistema (as chamadas de sistema ou system calls) para uma instrução válida para o kernel do Windows. 

Você pode navegar até o diretório do aplicativo e iniciar o Laravel Sail. O Laravel Sail fornece uma interface de linha de comando simples para interagir com a configuração padrão do Docker do Laravel:

`composer install && ./vendor/bin/sail up`

Depois que os contêineres do **Docker** forem iniciados, você pode acessar o aplicativo em seu navegador da web em: [http://localhost](http://localhost)

# Tecnologias Utilizadas

- [Laravel 8](https://laravel.com/)
- [Jetstream](https://jetstream.laravel.com/2.x/introduction.html) com [Inertia.js](https://inertiajs.com/) + [Vue](https://vuejs.org/)
- [TailwindCSS](https://tailwindcss.com/)
- [Docker](https://www.docker.com/)
- [Migrations e Models](https://laravel.com/docs/8.x/migrations)
- [Controller](https://laravel.com/docs/8.x/controllers#introduction), [Broadcast](https://laravel.com/docs/8.x/broadcasting) e [Events](https://laravel.com/docs/8.x/events#introduction)
- [Vue.js](https://vuejs.org/)

# Ferramentas de qualidade de código

Muitas das vezes os atrasos gerados no desenvolvimento se dão pela identificação tardia de falhas de segurança, o que faz com que o trabalho tenha que retroceder muito. Ter uma análise em tempo real possibilita identificar os problemas durante a fase de desenvolvimento, evitando ter que alterar muito o algoritmo para reparar essa falha.

## PHPUnit - Testes unitários

Você pode executar os testes PHPUnit executando o comando phpunit:

`sail php ./vendor/bin/phpunit`

O [Teste Unitário](https://www.devmedia.com.br/teste-unitario-com-phpunit/41231) é a primeira abordagem em matéria de confecção de testes mais robustos e confiáveis, a técnica consiste em testar as menores unidades possíveis de código da aplicação em cenários isoladamente em um projeto separado da aplicação principal, o que permite a manutenção e a escalabilidade dos testes em conjunto com a aplicação.

## PHP-CS-Fixer

O [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) corrige todo o estilo do seu código, quebras, espaços, estilo de declarações etc. É possível definir para que ele siga as PSR-1 e PSR-2, por exemplo. Não obstante, já estão desenvolvendo suporte nele para o mais novo padrão de estilo de código, o PSR-12. E para rodar as correções usando: 

`sail composer fix-style`

## PHP Insights

Ferramenta para análise da qualidade do código. Ele divide a análise em quatro categorias: código, complexidade (complexidade ciclomática etc), arquitetura (tamanho de métodos e classes, entre outras análises) e estilo de código (formatação, padronização).

<p align="center">
  <img src="https://raw.githubusercontent.com/nunomaduro/phpinsights/master/art/preview.png" width="882" alt="PHP Insights Preview">
</p>

Para verificar o resultado você pode executar o comando:

`sail php ./vendor/bin/phpinsights`

# Pipeline de CI/CD

Um pipeline de CI/CD consiste em uma série de etapas a serem realizadas para a disponibilização de uma nova versão de um software. Os pipelines de integração e entrega contínuas (CI/CD) são uma prática que tem como objetivo acelerar a disponibilização de softwares, adotando a abordagem de DevOps.

<p align="center">
  <img src="https://raw.githubusercontent.com/ohdearapp/gitlab-ci-pipeline-for-laravel/master/pipeline.png" width="882" alt="Pipeline">
</p>

O projeto usa GitHub Actions para ajudar a automatizar o fluxo de trabalho de desenvolvimento de software de dentro do GitHub. O fluxo de trabalho é implementado no mesmo local onde o código está armazenado e as solicitações pull e os problemas são processados de forma colaborativa. Você pode ver essas implementações em [actions](https://github.com/ReinanHS/notifique-mail/actions/).

# Change log!

- [x] Iniciar o projeto
- [x] Envio de SMS 

# Twilio SMS

Twilio é a plataforma líder de comunicação em nuvem que simplifica e facilita o contato com seus clientes em qualquer lugar. No servidor de demonstração só será possível enviar mensagem para o meu número de telefone porque estou usando uma versão gratuita dessa API.

<p align="center">
  <img src="https://user-images.githubusercontent.com/28494067/138644677-5570c3f8-ad38-468a-b990-943deaddda70.jpeg" height="40%">
</p>


# Licença

O Notifique Mail é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

