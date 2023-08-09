# Lista de Tarefas - PHP com MySql e MVC
> Status do Projeto: Concluido :heavy_check_mark:

Esse é uma aplicação web de Lista de Tarefas desenvolvida por mim. Abaixo irei explicar todo o processo e considerações sobre a aplicação.
##
### 📝 Sobre o App
É uma aplicação simples que consiste no usuário fazer seu cadastro e em seguida seu login. Feito isso, ele será direcionado para a página principal da plataforma, que contém um box, onde é possível cadastrar novas tarefa, verificar tarefas pendentes e concluídas, editar e exclui-lás.

##
### 🔸 Como foi feito
Para realizar esse App, utilizei CSS e Javascript para a parte do Front-End, PHP para o Back-End, MySQL como banco de dados e MVC como Arquitetura de Projeto.

##
### 🔧 Por trás das engranagens
Para facilitar o entendimento, irei desmembrar em partes como funciona o App

##### 👤 Login e Cadastro
Na página inicial, o usuário deve fazer o login para acessar o app, para o isso o sistema busca no banco de dados se há usuário com aquele e-mail e senha, caso não, ele continuará na página e será exibida uma mensagem para que ele faça um cadastro, se o login estiver no banco de dados, ele irá para a primeira página dentro da plataforma.

Para fazer o cadastro, o usuário deve informar nome, e-mail e senha. Ao cadastrar, esses dados serão gravados no mesmo banco de dados que o sistema de login busca para fazer a autenticação.

##### ✏️ Tarefas
Ao cadastrar uma nova tarefa, essa será enviada para o banco de dados juntamente com o id do usuário logado nessa sessão, assim cada tarefa será ligada com um usuário. 

Para excluir uma tarefa, o sistema recupera o id daquela tarefa, busca no banco de dados e exclui ela. Somente tarefas que o próprio usuário cadastrou poderão ser excluidas.

Para editar uma tarefa, nós recuperamos os dados daquela determinada tarefa, abrimos um campo de edição através de Javascript e ao enviar, o valor é alterado no banco de dados.

Para mostrar na tela, quais tarefas pertencem ao usuário, usamos uma busca no banco de dados que recuperar tarefas com id do usuário cadastrada igual ao id do usuário da sessão. 

A aba 'Todas', mostra todas as tarefas com qualquer status.

A aba 'Pendentes', recupera apenas tarefas cujo o status é pendente.

A aba 'Concluidos', somente tarefas já concluídas.

Para realizar essa busca, todas as tarefas são cadastradas inicialmente com o status pendente, ao marcar o checkbox, o valor da tarefa é alterado para concluido, informações essas que são cadastras junto ao banco de dados.

##### ⚙️ MVC
Para que tudo isso fosse viabilizado, foi utilizado o sistema de rotas, onde cada rota informada realiza alguma ação.

No Back-End, essas rotas fazem todo o trabalho de criação de objetos, sejam de Tarefas ou de Usuarios, buscam as funções de cada requisição, realiza conexão com banco de dados e realiza também autenticação de usuário.

##### ⚠️ Informações Extras
Importante ressaltar que esse além de todos mecanismos citados acima, também foi utilizado Orientação à Objetos para construir as funções e os objetos.

Para acelerar o processo e poder focar no Back-End, a parte visual da plataforma, utilizei protótipos que já tinha de projetos anteriores.

### ✨ Considerações
Foi um projeto bastante desafiador para mim, uma vez que fiz praticamente tudo do zero, apenas olhando projetos anteriores e tentando reproduzir o que já havia feito antes, e isso me possibilitou entender muitas coisas sobre o conteúdo de programação, como o próprio sistema de rotas, mas principalmente operações CRUD.

## 
⌨ com 🤍 por [Gustavo Henrique](https://github.com/1910gstv)




