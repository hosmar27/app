CREATE DATABASE trailermarine;
USE trailermarine;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(90) NOT NULL,
    email VARCHAR(90) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    admin VARCHAR(1) NOT NULL
);

CREATE TABLE pacotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    valor VARCHAR(11),
    descricao VARCHAR(255) NOT NULL,
    imagem MEDIUMBLOB
);

CREATE TABLE pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    pacote_id INT NOT NULL,
    adicionais VARCHAR(90) NOT NULL,
    valor_adicionais decimal(11) NOT NULL,
    status VARCHAR(20),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
    FOREIGN KEY (pacote_id) REFERENCES Pacotes(id)
);

CREATE TABLE pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    nome VARCHAR(55) NOT NULL,
    email VARCHAR(55) NOT NULL,
    rua VARCHAR(55) NOT NULL,
    numero VARCHAR(10),
    complemento VARCHAR(55),
    cidade VARCHAR(30) NOT NULL,
    estado VARCHAR(30) NOT NULL,
    cep VARCHAR(20) NOT NULL,
    numero_cartao VARCHAR(16) NOT NULL,
    nome_cartao VARCHAR(25) NOT NULL,
    data_cartao VARCHAR(5),
    cvv VARCHAR(3) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id)
);

-- Primeiro, verifique se o banco de dados 'trailermarine' está selecionado
USE trailermarine;

-- Insira os registros na tabela 'usuario'
INSERT INTO usuario (nome, email, cpf, admin) VALUES
    ('Henrique Osmar Adelino', 'henrique@email.com', '52542354323', 's'),
    ('Neymar Da Silva Santos Junior', 'ney@email.com', '00000000001', 'n'),
    ('João Vitor Ferreira', 'joao@email.com', '23565463423', 's'),
    ('Tom Cruise Mapother IV', 'tom@email.com', '15323467375', 'n'),
    ('Camila Selhorst Fernandes', 'camila@email.com', '63514465743', 's');

-- Insira os registros na tabela 'pacotes'
INSERT INTO pacotes (nome, valor, descricao) VALUES
    ('Pacote Barbados', '40000', 'Descubra a beleza escondida das profundezas com nosso pacote de viagem submarino para Barbados. Explore as águas cristalinas do Caribe enquanto desliza suavemente pelas ondas subaquáticas. Observe a vida marinha exótica e vibrante através das janelas panorâmicas do nosso submarino de última geração.'),
    ('Pacote Titanic', '25000', 'Embarque em uma jornada emocionante para explorar a história lendária do Titanic. Nosso pacote de viagem ao Titanic oferece uma experiência única e fascinante. Você terá a oportunidade de mergulhar nas profundezas do Oceano Atlântico e testemunhar a majestade e o mistério do lendário navio naufragado.'),
    ('Pacote Rio Cachoeira', '12000', 'Descubra a serenidade e a beleza natural do Rio Cachoeira com nosso pacote de viagem. Situado em meio a exuberante vegetação, o Rio Cachoeira oferece uma experiência única de tranquilidade e aventura. Desfrute de um passeio de barco pelas águas calmas e cristalinas, cercado pela paisagem deslumbrante.'),
    ('Pacote Itapocu', '15000', 'Embarque em uma jornada para descobrir os encantos de Itapocu, em Araquari, Santa Catarina. Situado em meio à deslumbrante natureza, este destino oferece uma combinação perfeita de praias intocadas, paisagens deslumbrantes e uma rica herança cultural.'),
    ('Pacote Pansea', '30000', 'Anse Chastanet é conhecida por sua visibilidade excepcionalmente clara e suas águas tranquilas. A temperatura agradável durante todo o ano e as condições favoráveis criam um ambiente perfeito para explorar o mundo subaquático. Mergulhadores de todos os níveis de experiência encontrarão uma variedade de opções de mergulho, desde recifes rasos até paredões profundos.');

-- Insira os registros na tabela 'pedido' correspondendo aos 'usuario_id' existentes na tabela 'usuario'
INSERT INTO pedido (usuario_id, pacote_id, adicionais, valor_adicionais, status) VALUES
    (1, 1, 'comida', '200', 'Em andamento'),
    (2, 2, 'bebida', '350', 'Em andamento'),
    (3, 3, 'roupas de cama', '100', 'Em andamento'),
    (4, 4, 'itens de higiene', '100', 'Em andamento');

-- Insira os registros na tabela 'pagamento' correspondendo aos 'pedido_id' existentes na tabela 'pedido'
INSERT INTO pagamento (pedido_id, nome, email, rua, numero, complemento, cidade, estado, cep, numero_cartao, nome_cartao, data_cartao, cvv) VALUES
    (1, 'Henrique Osmar Adelino', 'henrique@email.com', 'Rua Monsenhor Gercino', '346', 'Apto 1', 'Joinville', 'Santa Catarina', '12345-678', '1234567890123456', 'FULANO DE TAL', '12/25', '123'),
    (2, 'Neymar Da Silva Santos Junior', 'ney@email.com', 'Rua Copacabana', '456', 'Apto 2', 'Cidade B', 'Estado B', '23456-789', '2345678901234567', 'CICLANO DA SILVA', '12/26', '456');