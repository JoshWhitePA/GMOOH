/*
creates COURSE table for GMOOH database
Joe Kindon
2/21/16
Version 2
 */
 prompt creating table COURSE;
 create table COURSE(
 /*Attributes*/
	CourseID varchar2(10) not null,
	CourseDescr varchar2(40) not null,
	Credits number not null,
	optional binary(1),
	SuffixWI binary(1),
	SuffixCP binary(1),
	SuffixVL binary(1),
	SuffixQL binary(1),
	SuffixCM binary(1),
	SuffixCD binary(1),
	SuffixCT binary(1),
/*Keys*/	
	constraint CL_PK primary key (CourseID)
 ); 
 
 /*
 NOTES:
 
 -CourseIDs and suffexes are separated. The format for the course name 
 attribute is something like CSC355, or if sections are important, CSC355-020.
 
- optional attribute left NULL unless
 
 -suffex attributes can be either NULL or TRUE to signify if a course is WI ,CP, VL, etc.
 
 -the command to erase the table is "drop table COURSE cascade constraints".
 */