/*
creates CHECKSHEET table for GMOOH database
Joe Kindon
2/21/16
Version 1
 */
 prompt creating table CHECKSHEET;
 create table CHECKSHEET(
 /*Attributes*/
	CheckSheetID varchar2(40) not null, /*made 40 chars just in case*/
 	CourseID varchar2(10) not null,
	SectionNo varchar2(40) not null, /*made 40 chars just in case*/
 /*Keys*/
	constraint CHK_FK1 foreign key (CheckSheetID) references PROGRAMCHECKSHEET(CheckSheetID),
	constraint CHK_FK2 foreign key (CourseID) references COURSE (CourseID)
 ); 
 
/*
NOTES:
- HOW LONG IS A CHECKSHEET'S ID?
- HOW LONG IS A SECTION NUM.?
- MAKING VARCHAR2 LONGER THAN NECESSARY DOES NOT HURT ANYTHING.
*/

