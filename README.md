# events-creator

Esse foi o projeto final da minha matéria de desemvolvimento web.

Básicamente o trabalho proposto era a construção de um sistema web que utilizasse HTML, CSS, JavaScript, Php e um banco de dados relacional, podendo ser utilizado MySQL, que é ensinado nas aulas de banco de dados, ou qualquer outro. Nesse projeto foi utilizado o PostgreSQL.

Como um requisito era a criação de um usuário e a possíbilidade de logar como esse usuário.

Esse projeto funciona da seguinte maneira:

Ao acessar o site, é verificado se o usuário está logado no sistema. 

Caso o usuário não esteja logado, ele é direcionado para a página de login, onde pode fazer login em sua conta ou acessar a página de criação de usuário.

No caso de login, é verificada a existência do usuário no banco de dados, e a conferência se a senha inserida está correta. Caso esteja tudo certo, o acesso é permitido e é criado um cookie com o login do usuário.

Para deslogar da conta, basta acessar essa opção, onde o cookie é destruído e o usuário volta para a página de login.

Na criação do usuário é verificada a existência do usuário no banco de dados (A partir do email inserido). Caso não exista, é criado o usuário e criado o cookie de login.

Após a criação do cookie, o usuário é enviado para a página principal do sistema. Onde é verificado no banco de dados os eventos criadas pelo usuário, e essas são mostradas para o mesmo.

Para a criação de eventos. existe um botão no lado direito da página, onde quando clicado, mostra um forms com os dados necessários para o evento.

Uma vez confirmada a criação, o evento é inserido no banco e a página é recarregada, mostrando o novo evento já presente.

Claro que todo evento pode também ser apagado.
