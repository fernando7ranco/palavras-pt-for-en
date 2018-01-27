# simples sistema de palavras em português para o inglês com significado - Laravel

## Introdução

Esboço de um sistema de palavras em português para o inglês com significado.


## Ações disponiveis

CRUD de usuário com 2 niveis diferentes de acesso(Admin, usuario)

CRUD de palavra, tradução e significado , controle de usuarios e palavras pelo admin

Registro de cadastro com Facebook Google+, função de curti palvras quando o usuario estiver logado

Recuperação de senha, envio de email de recuperação de senha

Para envio de email, substitua os seguintes itens no arquivo .env :

	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=465
	MAIL_USERNAME=SEU_EMAIl
	MAIL_PASSWORD=SUA_SENHA
	MAIL_ENCRYPTION=ssl
  
  
## Instalação
Fazer upload do arquivo sql com as tabelas configuradas em seu banco de dados
abrir o arquivo .env e substituir as linhas : DB_DATABASE=SUA_BASE_DE_DADOS /// DB_USERNAME=SEU_NOME_DE_USUARIO /// DB_PASSWORD=SUA_SENHA
