create table `boardgames` (
    id int auto_increment,
    name varchar(50) not null,
    in_print tinyint not null default 1,
    primary key (id)
);

create table `plays` (
    id int auto_increment,
    boardgame_id int not null,
    number_of_players int not null,
    played_at datetime not null,
    primary key (id)
);

create table `reviews` (
    id int auto_increment,
    boardgame_id int not null,
    score int not null,
    primary key (id)
);
