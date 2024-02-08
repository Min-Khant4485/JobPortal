drop database if exists job_portal;
create database if not exists job_portal;
use job_portal;
create table countries (
id int primary key auto_increment,
country_name varchar(100) not null
);

create table cities (
id int primary key auto_increment,
country_id int not null,
city_name varchar(50),
foreign key(country_id) references countries(id)
);

create table industries (
id int primary key auto_increment,
industry_name varchar(255) not null
);

create table commons (
id int primary key auto_increment,
details varchar(50) not null
);

create table uploads (
id int primary key auto_increment,
link_id int,
genre varchar(5) not null,
upload_url varchar(255) not null
);

create table users (
id int primary key auto_increment,
city_id int,
first_name varchar(50) not null,
middle_name    varchar(50),
last_name varchar(50) not null,
dob    date,
phone_no varchar(13) not null,
email varchar(50) not null,
password varchar(30) not null,
join_date date,
resign_date    date,
role int not null,
status int,
log    int,
percentage    int,
created_at timestamp,
updated_at timestamp,
foreign key(city_id) references cities(id)
);

create table experiences (
id int primary key auto_increment,
user_id    int,
exp_title varchar(30) not null,
work_at    varchar(100),
exp_details    varchar(255),
start_date date,
end_date date,
created_at timestamp,
updated_at timestamp,
foreign key(user_id) references users(id)
);

create table educations (
id int primary key auto_increment,
user_id    int,
acad_type int,
faculty    varchar(50),
acad_institue varchar(50),
start_date date,
end_date date,
created_at timestamp,
updated_at timestamp,
foreign key(user_id) references users(id)
);

create table skills (
id int primary key auto_increment,
user_id int,
skill_name    varchar(50),
created_at    timestamp,
updated_at    timestamp,
foreign key(user_id) references users(id)
);

create table employers (
id int primary key auto_increment,
city_id int not null,
industry_id int not null,
maincontact_name varchar(100) not null,
company_name varchar(100) not null,
company_description    varchar(255) not null,
num_of_employee    varchar(50) not null,
contact_no varchar(100) not null,
email varchar(50) not null,
password varchar(30) not null,
status int not null,
log    int not null,
created_at    timestamp,
updated_at    timestamp,
foreign key(city_id) references cities(id),
foreign key(industry_id) references industries(id)
);

create table job_posts(
id int primary key auto_increment,
employer_id int not null,
job_title varchar(30) not null,
description    varchar(255) not null,
requirement    varchar(255) not null,
currency int not null,
salary    int not null,
job_type int not null,
closing_date date not null,
job_status    int not null,
created_at    timestamp,
updated_at    timestamp,
foreign key(employer_id) references employers(id)
);

create table job_applications (
id int primary key auto_increment,
user_id int not null,
jobpost_id int not null,
appl_status    int not null,
created_at    timestamp,
updated_at    timestamp,
foreign key(user_id) references users(id),
foreign key(jobpost_id) references job_posts(id)
);

create table qr_codes (
id int primary key auto_increment,
user_id    int,
employer_id    int,
jobpost_id    int,
qr_code    int,
foreign key(user_id) references users(id),
foreign key(employer_id) references employers(id),
foreign key(jobpost_id) references job_posts(id)
);

create table payments (
id int primary key auto_increment,
employer_id    int not null,
payment_date date not null,
payment_method    int not null,
amount    decimal(10, 2) not null,
transaction_no varchar(50) not null,
created_at    timestamp,
updated_at    timestamp,
foreign key(employer_id) references employers(id)
);
