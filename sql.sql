CREATE TABLE userlist(
    id int(11) not null auto_increment,
    name varchar(30) not null unique,
    pass varchar(10) not null,
    email varchar(50) not null,
    url varchar(70) not null,
    primary key(id)
)