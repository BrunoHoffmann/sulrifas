create table users(
	id bigint auto_increment primary key,
	name varchar(255) not null,
	email varchar(60) unique not null,
	email_verified_at timestamp,
	password varchar(255) not null,
	remember_token varchar(100),
	updated_at TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
  	created_at TIMESTAMP null
);

