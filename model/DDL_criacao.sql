create database empresa0702;

use empresa0702;

create table funcionario 
(
	funcional int auto_increment primary key not null,
    cpf char(11) not null unique,
    nome varchar(40) not null,
    telefone char(15) null,
    endereco varchar(70) not null
);

set sql_safe_updates=1;

create table departamento (
nomeDepartamento varchar(45) not null,
codDepartamento int auto_increment not null,
constraint uqDepto unique (nomeDepartamento),
constraint primary key(codDepartamento)
);

	alter table funcionario add codDepartamento int not null;
    
    alter table funcionario add constraint fkfuncDepto
    foreign key (codDepartamento) references departamento (codDepartamento);

create table cargo 
(
	nomeCargo varchar(50) not null unique,
    codCargo int auto_increment not null primary key
    );
    
alter table funcionario add codCargo int not null;
alter table funcionario add constraint fkCargoFunc
foreign key (codCargo) references cargo (codCargo);

-- select * from departamento;
-- select * from cargo;
-- select * from funcionario;

-- drop database empresa0702;