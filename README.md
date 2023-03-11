# Controle-Estoque
Sistema simples de controle de estoque

Para utiliza-lo, você precisa incluir o aquivo "Controle-Estoque.sql" no Banco de Dados,
colocar a pasta "Controle-Estoque" na pasta do servidor, abrir o servidor local.

Assim que tiver tudo certo só entrar no localhost.

Na primeira Aba vai ter o sistema, tem as Opçoes:Adicionar Produto, Importar Planilha.CSV
e Fazer Pedidos, e tem 2 tabelas, Produtos em estoque e Produtos proximos do vencimento
(menos de 2 meses).

Nessa primeira tabela vai aparecer todos os produtos cadastrados com Codigo, Descrição,
Valor, Estoque e Validade. Tem a opção filtrar, deletar produto, editar produto e tem
uma parte em amarelo que vai mostrar se tiver produtos com menos de 3 meses de validade.
Ja na segunda tabela basicamente a mesma coisa só que so vai ter produtos com menos de 2
meses de validade.

Ja nas opçoes acima temos:

Adicionar Produto: Que basicamente voce vai adicionar o produto, e se tiver com menos
de 2 meses vai para tabala de baixo, e se não tiver vai para tabela de cima.

Importar Planilha.CSV: Você ira importar uma planila CSV que vai estar dentro da pasta,
e basicamente vai incluir os itens na planilha fazendo a separação.

Fazer Pedido: Nessa aba você ira colocar o nome do produto, o valor de custo dele e a
quantidade, e vai inserindo a quantidade que você quer, quando terminar você finaliza
o pedido, ai vai aparecer outra Aba para você colocar os dados do cliente, ai quando
finalizar ira gerar um PDF com os dados dos cliente e o itens.

O sistema é isso, bem simples.

Foi utilizado HTML, CSS, BOOTSTRAP, PHP e SQL.

Desenvolvido por João Vitor Neves Marques
Linkedin: www.linkedin.com/in/jo%C3%A3o-vitor-neves-marques-79b20b232/


