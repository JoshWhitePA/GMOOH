/*
creates COURSE table for GMOOH database
Joe Kindon
2/12/16
Version 1
 */
 prompt creating table COURSE;
 create table COURSE(
 /*Attributes*/
	CourseID varchar2(10) not null,
	CourseDescr varchar2(40) not null,
	Credits number not null,
	optional varchar2(4),
	SuffixWI varchar2(4),
	SuffixCP varchar2(4),
	SuffixVL varchar2(4),
	SuffixQL varchar2(4),
	SuffixCM varchar2(4),
	SuffixCD varchar2(4),
	SuffixCT varchar2(4),
/*Keys*/	
	primary key (CourseID),
	constraint Name_CK unique (Name)
 ); 
 
 /*
 NOTES:
 
 -CourseIDs and suffexes are separated. The format for the course name 
 attribute is something like CSC355, or if sections are important, CSC355-020.
 
- optional attribute left NULL unless
 
 -suffex attributes can be either NULL or TRUE to signify if a course is WI ,CP, VL, etc.
 
 -the command to erase the table is "drop table COURSE cascade constraints".
 */