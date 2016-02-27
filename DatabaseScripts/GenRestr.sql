/*
creates GENRESTR table for GMOOH database
Joe Kindon
2/22/16
Version 1
 */
 prompt creating table GENRESTR;
 create table GENRESTR(
 /*Attributes*/
	CompID varchar2(15) not null,
 	CourseID varchar2(10) not null,
	HighRange varchar2(10) not null, 
	LowRange varchar2(10) not null,
 /*Keys*/
 constraint GR_FK1 foreign key (CompID) references GENLAYOUT(CompID)
 ); 
 
/*
NOTES:
- A KEY WAS NOT DEFINED IN JOSH'S EXAMPLE
	- MADE COMPID A FK OF COMPID FROM GENLAYOUT TABLE.
*/
