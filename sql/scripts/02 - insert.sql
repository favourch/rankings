insert into `setting`(settingName, settingValue) values('Ranked Teams', '25');

insert into `user`(username, password, displayName, admin) values('jonskinny12', md5('theoffspring'), 'Jon', 1);

load data local infile '<<<SCRIPT_PATH>>>team.txt' into table team (teamName);

insert into `rank_value`(ranking, value) values(1, 25);
insert into `rank_value`(ranking, value) values(2, 24);
insert into `rank_value`(ranking, value) values(3, 23);
insert into `rank_value`(ranking, value) values(4, 22);
insert into `rank_value`(ranking, value) values(5, 21);
insert into `rank_value`(ranking, value) values(6, 20);
insert into `rank_value`(ranking, value) values(7, 19);
insert into `rank_value`(ranking, value) values(8, 18);
insert into `rank_value`(ranking, value) values(9, 17);
insert into `rank_value`(ranking, value) values(10, 16);
insert into `rank_value`(ranking, value) values(11, 15);
insert into `rank_value`(ranking, value) values(12, 14);
insert into `rank_value`(ranking, value) values(13, 13);
insert into `rank_value`(ranking, value) values(14, 12);
insert into `rank_value`(ranking, value) values(15, 11);
insert into `rank_value`(ranking, value) values(16, 10);
insert into `rank_value`(ranking, value) values(17, 9);
insert into `rank_value`(ranking, value) values(18, 8);
insert into `rank_value`(ranking, value) values(19, 7);
insert into `rank_value`(ranking, value) values(20, 6);
insert into `rank_value`(ranking, value) values(21, 5);
insert into `rank_value`(ranking, value) values(22, 4);
insert into `rank_value`(ranking, value) values(23, 3);
insert into `rank_value`(ranking, value) values(24, 2);
insert into `rank_value`(ranking, value) values(25, 1);

