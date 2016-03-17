/*
creates PROGRAMCHECKSHEET table for GMOOH database
Joe Kindon
2/21/16
Version 1
 */
 prompt creating table PROGRAMCHECKSHEET;
 create table PROGRAMCHECKSHEET(
 /*Attributes*/
	CheckSheetID varchar2(40) not null, /*made 40 chars just in case*/
 	ProgramID varchar2(40) not null,	/*made 40 chars just in case*/
	SectionTotal varchar2(40) not null, /*made 40 chars just in case*/
 /*Keys*/
	constraint CHK_FK1 primary key (CheckSheetID)
 ); 
 
/*
NOTES:
- HOW LONG IS A CHECKSHEET'S ID?
- HOW LONG IS A PROGRAMID?
- MAKING VARCHAR2 LONGER THAN NECESSARY DOES NOT HURT ANYTHING.
*/