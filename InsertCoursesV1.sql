/*
inserts courses into COURSE table for GMOOH database
Joe Kindon
2/12/16
Version 1

FORMAT:
('COURSEID', 'DESCRIPTION', CREDITS, 'OPTIONAL' 'WI', 'CP', 'VL', 'QL', 'CM', 'CD', 'CT');
 
-COURSES, DESCRIPTION, AND CREDITS CAN'T BE NULL. IF ANY OTHER ATTRIBUTE SHOULD NOT BE NULL, IT SHOULD BE 'TRUE'.

EXAMPLE:
('CSC355', 'SOFTWARE ENGINEERING II', 3, NULL, 'TRUE', NULL, NULL, NULL, NULL, NULL, NULL );

*/

 prompt inserting data for IT major into COURSE;
 
	/* CORE COURSES */
	insert into COURSE values
	('CSC125', 'DESCRETE MATH FOR CS I', 3 ); /* OMITTING ANYTHING AFTER ANY ATTRIBUTE MARKS REMAINING ATTRIBUTES NULL */
	insert into COURSE values
	('CSC130', 'IT FUNDAMENTALS', 3 );
	insert into COURSE values
	('CSC135', 'COMP SCI I', 3);
	insert into COURSE values
	('CSC136', 'COMP SCI II', 3 );
	insert into COURSE values
	('CSC242', 'WEB PROGRAMMING', 3 );
	insert into COURSE values
	('CSC253', 'IT SYSTEMS', 3 );
	insert into COURSE values
	('CSC211', 'COMPUTER NETWORKS', 3 );
	insert into COURSE values
	('CSC341', 'INFORMATION SECURITY', 3 );
	insert into COURSE values
	('CSC356', 'INTRODUCTION TO DATABASE SYS', 3 );
	insert into COURSE values
	('CSC354', 'SOFTWARE ENGINEERING I', 3 );
	insert into COURSE values
	('CSC355', 'SOFTWARE ENGINEERING II', 3, NULL, 'TRUE' );
	
	/* REQUIRED GEN EDS */
	insert into COURSE values
	('MAT105', 'COLLEGE ALGEBRA', 3 ); /* ADJUST FOR "ABOVE". SEE CHECKSHEET*/
	insert into COURSE values
	('MAT140', 'APPLIED STAT METHODS', 3 );
	insert into COURSE values
	('WRI207', 'WRITING FOR WORKPLACE', 3 );
	insert into COURSE values
	('PHI040', 'INTRO TO ETHICS', 3 );
	
	/*INTERNSHIPS*/
	insert into COURSE values
	('CSC280', 'COOPERATIVE INTERNSHIP I', 3, 'TRUE' );
	insert into COURSE values
	('CSC380', 'COOPERATIVE INTERNSHIP II', 3, 'TRUE' );

prompt inserting data for additional courses for SD major;

	/* CORE COURSES */
	insert into COURSE values
	('CSC225', 'DESCRETE MATH FOR CS II', 3 );
	insert into COURSE values
	('CSC235', 'COMP ORG & ASM LNG.', 3 );
	insert into COURSE values
	('CSC237', 'DATA STRUCTURES', 3 );
	insert into COURSE values
	('CSC310', 'PROG. LANGUAGES', 3 );
	insert into COURSE values
	('CSC328', 'NETWORK PROGRAMMING', 3 );
	insert into COURSE values
	('CSC343', 'OPERATING SYSTEMS', 3 );

	
	/* REQUIRED GEN EDS */
	insert into COURSE values
	('MAT181', 'CALCULUS I', 3 ); 
	insert into COURSE values
	('MAT260', 'LINEAR ALGEBRA', 3 );
	insert into COURSE values
	('MAT182', 'WRITING FOR WORKPLACE', 3 );/* ADJUST FOR "HIGHER THAN 181, NOT 224". SEE CHECKSHEET- COURSE INCORRECT*/
	insert into COURSE values
	('WRI205', 'INTRO TO ETHICS', 3 );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	