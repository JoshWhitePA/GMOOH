CREATE TABLE STUDENT
( StudentId VARCHAR(9) NOT NULL,
Email VARCHAR(30) NOT NULL,
Password VARCHAR(30) NOT NULL,
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
Major VARCHAR(30),
HashVal VARCHAR2(700),
PRIMARY KEY (StudentId));

INSERT INTO STUDENT values('11223344','jsmit112@live.kutztown.edu','js1234','John','Smith','CS: IT');
INSERT INTO STUDENT values('55566610','oquen123@live.kutztown.edu','Oliver22','Oliver','Queen','CS: SD');
INSERT INTO STUDENT values('90090011','icond801@live.kutztown.edu','soccer69','Ismael','Conde','CS: IT');
INSERT INTO STUDENT values('87888899','bsand144@live.kutztown.edu','bernbaby1','Bernie','Sanders','CS: SD');
INSERT INTO STUDENT values('55774488','bsail554@live.kutztown.edu','Benny19','Ben','Sailor','CS: SD');
INSERT INTO STUDENT values('30200100','jalle@live.kutztown.edu','Allen2','John','Allen','CS: IT');



