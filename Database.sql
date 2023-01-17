create table if not exists groups
(
    id char(36) not null,
    name varchar(32) not null,
    primary key (id)
);

create table if not exists users
(
    id char(36) not null,
    first_name varchar(32) not null,
    last_name varchar(32) not null,
    email varchar(256) not null,
    password varchar(512) not null,
    primary key (id)
);

create table if not exists user_groups
(
    `user_id` char(36) not null,
    group_id char(36) not null,
    primary key (`user_id`, group_id)
);
