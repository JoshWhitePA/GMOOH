/*
creates GENLAYOUT table for GMOOH database
Joe Kindon
2/22/16
Version 1
 */
 prompt creating table GENLAYOUT;
 create table GENLAYOUT(
 /*Attributes*/
	CompID varchar2(15) not null,
 	SecID varchar2(15) not null,
	PosID varchar2(15) not null,
 /*Keys*/
	constraint GL_PK primary key (CompID)
 ); 
 