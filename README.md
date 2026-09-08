# Trabalho Primeiro bimestre de Laravel: 


## Checklist antes do Pull Request:

1. Configure a conexão do banco de dados para mysql
2. Configure a linguagem do projeto para pt_BR
3. Criar duas entidades com base na última aula: o que criar:
- Crie uma entidade chamada Product referente a um produto vendido com as
atributos nome, preço, unidade de medida, utilizando migration, esta entidade terá seus itens de composição na entidade abaixo;
- Crie uma entidade chamada ProductItens com os atributos quantidade, cor, valor
- Crie e relacione esta entidade com a Product , utilizando migrations:
- Crie o model Product e adicione os atributos:
- Crie o model ProductItens e adicione atributos;
- Crie o controller ProductController;
- Crie o controller ProductItensController;
- Crie uma rota que liste todos produtos juntamente com uma página que liste os
produtos e os itens.
- A rota criada deve utilizar a classe de controller.
4. Entrega:
- DATA DE ENTREGA 16/09/2026
- Abra um PR no repositório acima com seu nome no título.


## Controle do checklist:

### Conexão com o banco de dados:
- Conexão com banco de dados MySQL criada. Utilizando docker-compose criando um container do banco e utilizando os environments em um .env local.
### Configuração do idioma dentro do projeto:
- Configurado a linguagem para pt-BR de duas formas:
    - Dentro do arquivo config/app.php alterado a linha 85 de 'locale' => 'en' para 'locale' => 'pt-BR'
    - Através do composer segui o passo a passo abaixo:
        - Baixei os arquivos de tradução:
        >  composer require laravel-lang/common --dev
        - Em seguida adicionei o idioma com o comando artisan:
        > php artisan lang:add pt-BR
### Criação das entidades:
- Criação das duas entidades separadas com os comandos:
    - > php artisan make:model Product
    - > php artisan make:model ProductItem
- Criação da migrations com os comandos
    - > php artisan make:migration create_table_product
    - > php artisan make:migration create_table_productItem
- Assim que alterado os arquivos criados, utilizei o comando abaixo para que as migration atualizassem o banco de dados:
> php artisan migrate

#### Observações sobre essa parte:
> Ao fazer na ordem acima tive alguns imprevistos. Fora a conexão com o banco de dados que tive ajustar (porém era algo entre projeto -> MysqlServer), tive que reoganizar as migrations e a models que retornavam erros SQL (Tabela já existe, erro em relacionamento de chave estrangeira), logo uma proxima, devo escutar as migrations primeiro e as models após e sempre criar a migration da tabela "pai primeiro".
