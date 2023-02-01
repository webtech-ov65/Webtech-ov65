create table if not exists groups
(
    id char(36) not null,
    name varchar(31) not null,
    primary key (id),
    unique (name)
);

create table if not exists users
(
    id char(36) not null,
    name varchar(63) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    is_accepted int(1) not null default 0,
    is_admin boolean not null default 0,
    primary key (id),
    unique (email)
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

create table if not exists comments
(
    id char(36) not null,
    comment_timestamp timestamp not null,
    content text not null,
    `user_id` char(36) not null,
    event_id char(36) not null,
    approved boolean not null default 0,
    primary key (id)
);

insert into groups
    (id,                                        name) values
    ("85c48a26-4cab-4776-811e-8d74f67400c0",    "Business Development"),
    ("77cbd797-4b4e-475b-b79c-e6d12a33b67b",    "Customer Support"),
    ("3ddc6681-3ba0-49ef-b172-b6daf81e44c8",    "Research & Development"),
    ("22d1f803-7043-4601-ba7d-4921df6539db",    "Sales & Marketing");

insert into users
    (id,                                        name,       email,                  password,                                                           is_accepted,    is_admin) values
    ("7e4140af-b7e7-4e4f-83b6-333d93476552",    "Admin",    "admin@openagenda.io",  "$2y$10$yBASk27KEyCbpP5TahXKG.WFJZxsgqbSHoPLmBZSFFliQ.DDj2LOu",     1,              true),
    ("cac6ac5e-4445-4dd7-b128-090d0547c031",    "Demo",     "demo@openagenda.io",   "$2y$10$tp5eFM0rq.FUFQSu.8jxq.W9J6YXH13ND4yER6u2azRXnq95WIIsu",     1,              false),
    ("e99040ca-b82f-4404-8253-f74e43abd0a2",    "John",     "john@openagenda.io",   "$2y$10$tp5eFM0rq.FUFQSu.8jxq.W9J6YXH13ND4yER6u2azRXnq95WIIsu",     0,              false),
    ("3e24a0fb-b897-47b4-9a28-f3509f154aea",    "Alice",    "alice@openagenda.io",  "$2y$10$tp5eFM0rq.FUFQSu.8jxq.W9J6YXH13ND4yER6u2azRXnq95WIIsu",     0,              false),
    ("4f9760af-18d4-4b49-bc01-9fac3aa9a86a",    "Bob",      "bob@openagenda.io",    "$2y$10$tp5eFM0rq.FUFQSu.8jxq.W9J6YXH13ND4yER6u2azRXnq95WIIsu",     -1,             false);
