drop table if exists setting;
create table setting (
	settingId int auto_increment primary key,
	settingName varchar(100) not null default '',
	settingValue varchar(100) not null default '',
	index(settingName)
);

drop table if exists user;
create table user(
	userId int auto_increment primary key,
	username varchar(100) not null default '',
	password varchar(100) not null default '',
	displayName varchar(100) not null default '',
	admin int(1) not null default 0,
	index(username),
	index(password),
	index(admin)
);

drop table if exists team;
create table team (
	teamId int auto_increment primary key,
	teamName varchar(100) not null default '',
	index(teamName)
);

drop table if exists year;
create table year (
	yearId int auto_increment primary key,
	yearName varchar(10) not null default '',
	index(yearName)
);

drop table if exists week;
create table week (
	weekId int auto_increment primary key,
	yearId int not null default 0,
	weekName varchar(10) not null default '',
	index(yearId),
	index(weekName)
);

drop table if exists vote;
create table vote (
	voteId int auto_increment primary key,
	weekId int not null default 0,
	userId int not null default 0,
	teamId int not null default 0,
	ranking int not null default 0,
	index(weekId),
	index(userId),
	index(teamId),
	index(ranking)
);

drop table if exists ranking;
create table ranking (
	rankingId int auto_increment primary key,
	weekId int not null default 0,
	teamId int not null default 0,
	points int not null default 0,
	firstPlace int not null default 0,
	index(weekId),
	index(teamId),
	index(points),
	index(firstPlace)
);

drop table if exists rank_value;
create table rank_value (
	rankValueId int auto_increment primary key,
	ranking int not null default 0,
	value int not null default 0,
	index(ranking)
);
