/* SD 200 Level Electives */
SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum` between 200 AND 300 AND`CourseNum` NOT IN(237,235,225,280) ORDER BY `CourseNum`;

/* SD 300 Level Electives */

SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>300 AND `CourseNum` NOT IN(310,328,343,354,355,380) ORDER BY `CourseNum`;

/* IT Electives */

SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>200 AND `CourseNum` NOT IN(242,253,311,341,356,354,355,280,380) ORDER BY `CourseNum`;


/* I University Core */
	/*A*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='COM' and `CourseNum`>=010 ORDER BY `CourseNum`;

	/*B*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='ENG' and `CourseNum` in(023,024,025) ORDER BY `CourseNum`;

	/*C*/
		/* SD */
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='MAT' and `CourseNum` in(140,301) ORDER BY `CourseNum`;

		/*IT */
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='MAT' and `CourseNum` in(140) ORDER BY `CourseNum`;

	/*D*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='HEA' and `Credits`>=3 ORDER BY `CourseNum`;

/* II University Distribution */
	/*A*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('AST','BIO','CHM','ENV','GEL','MAR','NSE','PHY') OR `CoursePrefix`='GEG' and `CourseNum` in(040,322,323) ORDER BY `CourseNum`;

	/*B*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ANT','CRJ','ECO','HIS','INT','MCS','PSY','POL','SOC','SSE','SWK') OR `CoursePrefix`='GEG' and `CourseNum` NOT in(040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;

	/*C*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ENG','HUM','PAG','PHI','WGS','WRI','CHI','FRE','GER','RUS','SPA') ORDER BY `CourseNum`;

	/*D*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ARC','ARH','CDE','CDH','CFT','DAN','FAR','FAS','MUP','MUS','THE') ORDER BY `CourseNum`;

	/*E*/
SELECT * from `COURSE`

/* IV College Distribution */
	/*A*/
		/*1*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('AST','BIO','CHM','ENV','GEL','MAR','PHY') AND `Credits`=4) OR (`CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;
		
		/*2*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('AST','BIO','CHM','CSC','ENV','GEL','MAR','MAT','NSE','PHY') OR `CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;
		
	/*B*/
		/*1*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('HIS','ANT','POL') OR CoursePrefix`='GEG' and `CourseNum` NOT in(040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;
		
		/*2*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('PSY','SOC','CRJ','SWK') ORDER BY `CourseNum`;		
		
		/*3*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ANT','CRJ','ECO','HIS','INT','POL','PSY','SOC','SSE','SWK') OR CoursePrefix`='GEG' and `CourseNum` NOT in(040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;		
		
	/*C*/
		/*1*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CourseID`='WRI207') OR (`CoursePrefix` IN ('ENG','WRI','HUM') OR (`CoursePrefix`='PAG' and `CourseNum` NOT IN (011,012)));		
		
		/*2*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CourseID`='PHI040') OR (`CoursePrefix` IN ('CHI','FRE','GER','RUS','SPA')); 
		
		/*3*/
SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('ENG','WRI','HUM','PHI')) OR (`CoursePrefix`='PAG' and `CourseNum` NOT in(11,12)) OR (`CoursePrefix` IN ('CHI','FRE','GER','RUS','SPA') and `CourseNum` > 103) ORDER BY `CourseNum`;
		
	/*D*/
SELECT * from `COURSE` ORDER BY `CourseNum`;
SELECT * from `COURSE` ORDER BY `CourseNum`;
SELECT * from `COURSE` ORDER BY `CourseNum`;
	
	
	
	
	
/* Top Right Search Box */	
	
SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CourseID` like '%<input goes here>%' OR `CourseName` like '%<input goes here>%' ORDER BY `CourseNum`; 

/* Bottom Right DropDown Box */
SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='<datagoeshere' ORDER BY `CourseNum`;