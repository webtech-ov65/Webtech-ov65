create table if not exists groups
(
    id char(36) not null,
    name varchar(31) not null,
    primary key (id)
);

create table if not exists users
(
    id char(36) not null,
    name varchar(63) not null,
    email varchar(255) not null,
    password varchar(255) not null,
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
    title varchar(255),
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
    approved boolean not null default 0,
    primary key (id)
);

insert into groups (id, name) values
    ("85c48a26-4cab-4776-811e-8d74f67400c0", "Business Development"),
    ("77cbd797-4b4e-475b-b79c-e6d12a33b67b", "Customer Support"),
    ("3ddc6681-3ba0-49ef-b172-b6daf81e44c8", "Research & Development"),
    ("22d1f803-7043-4601-ba7d-4921df6539db", "Sales & Marketing");
