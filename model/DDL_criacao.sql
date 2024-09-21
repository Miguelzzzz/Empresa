create database empresa0702;

use empresa0702;

create table funcionario 
(
    funcional int auto_increment primary key not null,
    cpf char(11) not null unique,
    nome varchar(40) not null,
    telefone char(15) null,
    endereco varchar(70) not null,
    img varchar(100) not null,
    acesso boolean not null,
    created_at datetime not null
);

set sql_safe_updates=1;

create table departamento (
    nomeDepartamento varchar(45) not null,
    codDepartamento int auto_increment not null,
    created_at datetime not null,
    constraint uqDepto unique (nomeDepartamento),
    constraint primary key(codDepartamento)
);

-- Correção: Adicionar uma vírgula após o foreign key e ajustar as constraints.
alter table funcionario add codDepartamento int not null;
alter table funcionario add constraint fk_funcionario_departamento
    foreign key (codDepartamento) references departamento (codDepartamento);

create table cargo 
(
    nomeCargo varchar(50) not null unique,
    salario decimal(8, 2) not null,
    created_at datetime not null,
    codCargo int auto_increment not null primary key
);

create table login (
    funcional int not null primary key,
    senha varchar(255) not null, -- aumentei para comportar o hash
    foreign key (funcional) references funcionario (funcional) on delete cascade
);

-- Correção: Adicionar uma vírgula após o foreign key e ajustar as constraints.
alter table funcionario add codCargo int not null;
alter table funcionario add constraint fk_funcionario_cargo
foreign key (codCargo) references cargo (codCargo);


-- select * from departamento;
-- select * from cargo;
-- select * from funcionario;

-- Administrador do sistema "vidamansa"

insert into `cargo`(`nomeCargo`, `salario`, `created_at`)
values ("Patrão","9000.00", "2024-09-20 09:32:00");

insert into `departamento`(`nomeDepartamento`, `created_at`)
values ("Administração", "2024-09-20 09:32:00");

insert into `funcionario`(`funcional`, `cpf`, `nome`, `telefone`, `endereco`, `img`, `acesso`, `created_at`, `codDepartamento`, `codCargo`)
values ("1","12345678910","Jorge","11887663456","franco da rocha","view/img/jorgeAdmin.jpg","1","2024-09-20 09:32:00","1","1");

insert into `login`(`funcional`, `senha`)
values ("1", "$2y$10$CeBn6d358WmIeDqjyVUv8ew2o.3ocm3RycCWYAMmYwFNu2fm5B9S.");

-- drop database empresa0702;
