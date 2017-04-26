/*
creates SPECIALRESTR table for GMOOH database
Joe Kindon
2/22/16
Version 1
 */
 prompt creating table SPECIALRESTR;
 create table SPECIALRESTR(
 /*Attributes*/
	CompID varchar2(15) not null,
 	ProgramID varchar2(40) not null,
	CourseID varchar2(40) not null,
 /*Keys*/
	constraint SR_PK primary key (ProgramID),
	 constraint SR_FK1 foreign key (CompID) references GENLAYOUT(CompID)
 ); 
 