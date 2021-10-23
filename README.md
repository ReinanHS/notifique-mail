<p align="center">
  <img width="300" height="200" img src="https://thrivingmarriages-eszuskq0bptlfh8awbb.stackpathdns.com/wp-content/uploads/2017/03/gif-icons-menu-transition-animations-shake-new-mail.gif"/>
</p>

<p align="center">
    <a href="https://github.com/reinanhs" alt="MadeBy">
        <img src="https://img.shields.io/badge/made%20by-Reinan%20Gabriel-blue" /></a>
    <a href="https://github.com/reinanhs/gerenciar-veiculos/blob/master/README.md" alt="License">
        <img src="https://img.shields.io/badge/license-MIT-blue" /></a>
</p>

<p align="center">
    :droplet: Sistema em Laravel para notifique o usuário quando um e-mail chegar a sua caixa de entrada :droplet: 
</p>

<p align="center">
  :star: Contributor :star:
</p>
<p align="center">
  <a href="https://github.com/ReinanHS">
      <img width="50" height="50" src="https://github.com/reinanhs.png">
  </a>
</p>

# Notifique Mail

O objetivo deste programa é notificar o usuário quando um e-mail chega na caixa de entrada. O usuário pode ser notificado de várias maneiras, como por meio de um telefone celular, um aplicativo de desktop e assim por diante. Ao criar este projeto, espero permitir que os usuários sejam notificados quando receberem um novo e-mail. Ao usar este sistema, você pode receber notificações das seguintes maneiras:

- E-mail alternativo
- SMS
- Push notification
- Telegram

Além disso, futuramente será implementado o envio de notificações via:

- Whatsapp
- Ligação por telefone

<p align="center">
  <img src="https://camo.githubusercontent.com/2ad3355b74b639da9248dea8a0dc3c866e9552f06192c9e5fca2e200f3e21028/68747470733a2f2f74656c656772612e70682f66696c652f3439633735373166303638373239343866623062632e706e67"/>
</p>

# Instalando e atualizando as dependências

Clone o repositório no meu Github

`git clone https://github.com/ReinanHS/notifique-mail.git`

## Primeiros passos no Linux

Se você estiver desenvolvendo no Linux e o **Docker** já estiver instalado, você pode usar um comando de terminal simples para rodar esse projeto. Você deve executar o seguinte comando em seu terminal:

`./vendor/bin/sail up`

Na primeira vez que você executa o comando Sail up, os contêineres de aplicativos do Sail serão construídos em sua máquina. Isso pode levar vários minutos. Não se preocupe, as tentativas subsequentes de iniciar o Sail serão muito mais rápidas.

## Primeiros passos no Windows

Antes de iniciar o aplicativo em sua máquina Windows, certifique-se de instalar o [Docker Desktop](https://www.docker.com/products/docker-desktop). Em seguida, você deve garantir que o Subsistema Windows para Linux 2 (WSL2) esteja instalado e ativado. O WSL é um recurso opcional disponível no Windows 10 (a partir da versão 1607) que te permite executar binários e scripts em Linux diretamente no Windows, traduzindo as instruções enviadas para o sistema (as chamadas de sistema ou system calls) para uma instrução válida para o kernel do Windows. 

Você pode navegar até o diretório do aplicativo e iniciar o Laravel Sail. O Laravel Sail fornece uma interface de linha de comando simples para interagir com a configuração padrão do Docker do Laravel:

`./vendor/bin/sail up`

Depois que os contêineres do **Docker** forem iniciados, você pode acessar o aplicativo em seu navegador da web em: [http://localhost](http://localhost)

# Tecnologias Utilizadas

- [Laravel 8](https://laravel.com/)
- [Jetstream](https://jetstream.laravel.com/2.x/introduction.html) com [Inertia.js](https://inertiajs.com/) + [Vue](https://vuejs.org/)
- [TailwindCSS](https://tailwindcss.com/)
- [Laravel WebSockets](https://github.com/beyondcode/laravel-websockets)
- [Laravel Echo](https://laravel.com/docs/8.x/broadcasting#client-side-installation)
- [Docker](https://www.docker.com/)
- [Migrations e Models](https://laravel.com/docs/8.x/migrations)
- [Controller](https://laravel.com/docs/8.x/controllers#introduction), [Broadcast](https://laravel.com/docs/8.x/broadcasting) e [Events](https://laravel.com/docs/8.x/events#introduction)
- [Vue.js](https://vuejs.org/)
  - [Vuex](https://vuex.vuejs.org/)
  - [Vuex-persistedstate](https://www.npmjs.com/package/vuex-persistedstate)

# Testes unitários

Você pode executar os testes PHPUnit executando o comando phpunit:

`./vendor/bin/phpunit`

O [Teste Unitário](https://www.devmedia.com.br/teste-unitario-com-phpunit/41231) é a primeira abordagem em matéria de confecção de testes mais robustos e confiáveis, a técnica consiste em testar as menores unidades possíveis de código da aplicação em cenários isoladamente em um projeto separado da aplicação principal, o que permite a manutenção e a escalabilidade dos testes em conjunto com a aplicação.

# Changelog

- [x] Iniciar o projeto

# Licença

O Notifique Mail é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

