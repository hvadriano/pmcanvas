
CREATE TABLE tbl_questao (
id INT UNSIGNED not null AUTO_INCREMENT,
descricao VARCHAR(255),
nome VARCHAR(60),
PRIMARY KEY (id)
);

CREATE TABLE tbl_tipo_custo (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
nome VARCHAR(60),
PRIMARY KEY(id)
);

CREATE TABLE tbl_area (
id INT UNSIGNED not null AUTO_INCREMENT,
imagem VARCHAR(60),
titulo VARCHAR(60),
questao_fk INT UNSIGNED not null,
FOREIGN KEY(questao_fk) REFERENCES tbl_questao(id),
area_saida_fk BIGINT,
area_entrada_fk BIGINT,
descricao VARCHAR(255),
PRIMARY KEY(id)
);

CREATE TABLE tbl_card (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
area_fk INT UNSIGNED not null,
FOREIGN KEY(area_fk) REFERENCES tbl_area (id),
post VARCHAR(255),
autor VARCHAR(60),
descricao VARCHAR(255),
url VARCHAR(100),
cor VARCHAR(10),
PRIMARY KEY(id)
);

CREATE TABLE tbl_documento (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
caminho VARCHAR(100),
nome VARCHAR(60),
url VARCHAR(100),
descricao VARCHAR(255),
PRIMARY KEY(id)
);

CREATE TABLE tbl_documento_card (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
documento_fk BIGINT UNSIGNED not null,
card_fk BIGINT UNSIGNED not null,
FOREIGN KEY(documento_fk) REFERENCES tbl_documento (id),
FOREIGN KEY(card_fk) REFERENCES tbl_card (id),
PRIMARY KEY(id)
);

CREATE TABLE tbl_link (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
card_de BIGINT UNSIGNED not null,
card_para BIGINT UNSIGNED not null,
FOREIGN KEY(card_de) REFERENCES tbl_card (id),
FOREIGN KEY(card_para) REFERENCES tbl_card (id),
PRIMARY KEY(id)
);

CREATE TABLE tbl_entrega (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
nome VARCHAR(60),
relevancia smallint(1),
card_fk BIGINT UNSIGNED not null,
FOREIGN KEY(card_fk) REFERENCES tbl_card (id),
PRIMARY KEY(id)
);

CREATE TABLE tbl_custo (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
valor double,
entrega_fk BIGINT UNSIGNED not null,
tipo_custo_fk INT UNSIGNED not null,
FOREIGN KEY(entrega_fk) REFERENCES tbl_entrega (id),
FOREIGN KEY(tipo_custo_fk) REFERENCES tbl_tipo_custo (id),
PRIMARY KEY(id)
);

CREATE TABLE tbl_prazo (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
entrega_fk BIGINT UNSIGNED not null,
FOREIGN KEY(entrega_fk) REFERENCES tbl_entrega (id),
data_inicio TIMESTAMP not null,
data_fim TIMESTAMP not null,
PRIMARY KEY(id)
);

-- insert ------
insert into tbl_questao (nome) values ('Por Que?');
insert into tbl_questao (nome) values ('O Que?');
insert into tbl_questao (nome) values ('Quem?');
insert into tbl_questao (nome) values ('Como?');
insert into tbl_questao (nome) values ('Quando e Quanto?');
-- -----------

INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Justificativas',1,2,null);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Objetivos SMART',1,3,1);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Benef&iacute;cios',1,4,2);

INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Produto',2,5,3);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Requisitos',2,6,4);

INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Stakeholders',3,7,5);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Equipe',3,8,6);

INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Premissas',4,9,7);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Grupos de Entregas',4,10,8);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Restri&ccedil;&otilde;es',4,11,9);

INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Riscos',5,12,10);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Linha do Tempo',5,13,11);
INSERT INTO `tbl_area`(`titulo`, `questao_fk`, `area_saida_fk`, `area_entrada_fk`) VALUES ('Custos',5,null,12);
-- ----------

INSERT INTO `tbl_tipo_custo`(`nome`) VALUES ('Equipamentos');
INSERT INTO `tbl_tipo_custo`(`nome`) VALUES ('Consultoria');
INSERT INTO `tbl_tipo_custo`(`nome`) VALUES ('Aloca&ccedil&atilde;o');
-- ----------

INSERT INTO `tbl_card`(`area_fk`, `post`, `autor`, `cor`) VALUES (4,'Portal Agregador de Campanhas para Institui&ccedil;&otilde;es Sociais','Adriano Vieira','#0000FF');
INSERT INTO `tbl_card`(`area_fk`, `post`, `autor`, `cor`) VALUES (9,'Aplicação Web','Adriano Vieira','#0000FF');
-- ----------

INSERT INTO `tbl_documento`(`nome`, `url`, `descricao`) VALUES ('Briefing do layout','https://pt.scribd.com/doc/38813707/Briefing-Para-Criacao-de-Layout-Para-Website','Briefing do layout da aplica&ccedil;&atilde;o e interface do usu&aacute;rio final.')
INSERT INTO `tbl_documento_card`(`documento_fk`, `card_fk`) VALUES (1,1);
-- ----------

INSERT INTO `tbl_link`(`card_de`, `card_para`) VALUES (2,1);



CREATE TABLE tbl_projeto (
id BIGINT UNSIGNED not null AUTO_INCREMENT,
nome VARCHAR(60),
picth VARCHAR(255),
link_publico VARCHAR(255),
ativo smallint(1) default 1,
usuario_fk int(10) UNSIGNED not null REFERENCES tbl_usuario (id),
PRIMARY KEY(id)
);

INSERT INTO `pmcanvas`.`tbl_projeto` (`id`, `nome`, `picth`, `link_publico`, `ativo`, `usuario_fk`) VALUES (NULL, 'Projeto 1', 'opa', NULL, '1', '1');
