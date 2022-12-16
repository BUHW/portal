CREATE TABLE cadastro_clientes( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `situacao` varchar  (20)   NOT NULL  , 
      `numero_klgama` int   NOT NULL  , 
      `razao_social` varchar  (255)   NOT NULL  , 
      `cnpj_cpf` varchar  (18)   NOT NULL  , 
      `area_atuacao` varchar  (255)   , 
      `cep` varchar  (9)   , 
      `estado` varchar  (255)   , 
      `cidade` varchar  (255)   , 
      `bairro` varchar  (255)   , 
      `rua` varchar  (255)   , 
      `num` int   , 
      `complemento` varchar  (255)   , 
      `representante` varchar  (255)   , 
      `cpf_rep` int   , 
      `dt_nasci` date   , 
      `documentos_gd` text   ,
      `data_inclusao` datetime   NOT NULL  ,
      
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE contato_cliente( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `cadastro_clientes_id` int   NOT NULL  , 
      `nome_contato` varchar  (255)   NOT NULL  , 
      `depto_contato` varchar  (255)   NOT NULL  , 
      `fone_contato` varchar  (25)   , 
      `email_contato` varchar  (255)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

  ALTER TABLE contato_cliente ADD CONSTRAINT fk_contato_cliente_1 FOREIGN KEY (cadastro_clientes_id) references cadastro_clientes(id); 

CREATE TABLE senhas_acessos( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `cadastro_clientes_id` int   NOT NULL  , 
      `orgao` varchar  (255)   , 
      `usuario_orgao` varchar  (255)   , 
      `senha_orgao` varchar  (255)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

CREATE TABLE cadastro_area_de_atuacao( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `area_atuacao` varchar  (255)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

 CREATE TABLE cadastro_orgaos( 
      `id`  INT  AUTO_INCREMENT    NOT NULL  , 
      `orgaos` varchar  (255)   , 
 PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

   
INSERT INTO cadastro_area_de_atuacao (id,area_atuacao) VALUES (1,'Textil'); 

INSERT INTO cadastro_area_de_atuacao (id,area_atuacao) VALUES (2,'Metalúrgica'); 

INSERT INTO cadastro_orgaos (id,orgaos) VALUES (1,'Sinfat'); 

INSERT INTO cadastro_orgaos (id,orgaos) VALUES (2,'Ibama'); 

INSERT INTO cadastro_orgaos (id,orgaos) VALUES (3,'Fatma'); 