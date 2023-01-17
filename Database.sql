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
    moderator boolean not null default 0,
    primary key (id)
);

create table if not exists user_groups
(
    `user_id` char(36) not null,
    group_id char(36) not null,
    primary key (`user_id`, group_id)
);

create table if not exists events
(
    id char(36) not null,
    title varchar(256),
    event_date date not null,
    event_time time not null,
    event_description text,
    primary key (id)
);

create table if not exists event_groups
(
    event_id char(36) not null,
    group_id char(36) not null,
    primary key (event_id, group_id)
);

create table if not exists admins
(
    user_id char(36) not null,
    group_id char(36) not null,
    primary key (user_id, group_id)
);

create table if not exists comments
(
    id char(36) not null,
    comment_timestamp timestamp not null,
    content text not null,
    user_id char(36) not null,
    event_id char(36) not null,
    approved boolean not null default 0;
    primary key (id)
);
