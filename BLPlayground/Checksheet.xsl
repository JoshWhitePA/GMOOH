<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
	<xsl:template match="/">
		<html>
			<head>
                <title>BS Computer Science: IT Checksheet</title>
        <link rel = "stylesheet" type = "text/css" href = "../Interface/Checksheets/v1.1/Styles/checksheetStyleV1p1.css"/>
			</head>
			<body>
                <div class = "sectionTop">
			<br/><br/><xsl:text>
                    STUDENT:</xsl:text>
			<br/><br/>
			______________________________
		</div>
		<div class = "sectionTop">
			<img src = "../Interface/Checksheets/v1.1/Images/KU_Logo.jpg" />
		</div>
		<div class = "sectionTop">
			<br/><br/><xsl:text>
            STUDENT ID NUMBER:</xsl:text>
			<br/><br/>
			______________________________
		</div>
		<div class = "newSection"></div>
		<div class = "headerBox"><xsl:text>COLLEGE OF LIBERAL ARTS  SCIENCES  BS  
            COMPUTER SCIENCE: IT</xsl:text>
		</div>
		<div class = "newSection" style="text-align: center;"></div>
<!-- #GENERAL EDUCATION# -->
            <div class = "header"><xsl:text>GENERAL EDUCATION</xsl:text></div>
<!-- I. UNIVERSITY CORE TABLE -->
            <div class = "buffer"><xsl:text> </xsl:text></div>
		<div class = "section">
<!-- Begin xsl               -->
                <xsl:for-each select="/Checksheet/Section">
					<table style="    margin-left: 15px;
    margin-right: 80px;
    padding-right: 10px;">
						
							<tr>
                                <th colspan="1" class = "tableCaption"><xsl:value-of select="SectionDesc"/></th>
                                <th class = "tableGradeCaption">RC</th>
					           <th class = "tableGradeCaption">CR</th>
					           <th class = "tableGradeCaption">GR</th>
                            </tr>
                        
							<xsl:for-each select="Pos">
								<tr>
									 <th style="word-wrap: break-word;
                                                max-width: 120px;"><span style="white-space:nowrap;"><xsl:value-of select="PosDesc"/></span>
                                    
                                     
                                    <xsl:for-each select="ReqInst">
                                        
                                        <xsl:choose>
                                            <xsl:when test="contains(ClassNums, 'Any')">
                                                <b class = "smaller">
                                                <xsl:value-of select="ClassNums"/>
                                                    <xsl:text>&#xA0;</xsl:text>
                                                 <xsl:value-of select="Dept" />
                                                    <xsl:if test="position() != last()">
                                                      <xsl:text>,</xsl:text>
                                                   </xsl:if>
                                                    <xsl:text>&#xA0;</xsl:text>
                                                </b>
                                            </xsl:when>
                                            <xsl:otherwise>
                                              <b class = "smaller">
                                                 <xsl:value-of select="Dept"/><xsl:text>&#xA0;</xsl:text>
                                                   <xsl:value-of select="ClassNums"/>
                                                  <xsl:if test="position() != last()">
                                                      <xsl:text>,</xsl:text>
                                                   </xsl:if>
                                                  <xsl:text>&#xA0;</xsl:text>
                                                </b>
                                            </xsl:otherwise>
                                            
                                        </xsl:choose>
                                        
                                        
                                    </xsl:for-each>
                                    </th>
                                    
                                        
								</tr>
                                <tr><th><xsl:text>Course:&#xA0;</xsl:text></th><td><xsl:text>3</xsl:text></td><td></td><td></td></tr>
							</xsl:for-each>
						
					</table>
                    </xsl:for-each>
<!--            end xsl-->
            </div>
                <!-- III. COMPETENCIES ACROSS THE CIRRICULUM TABLE-->
                
		<div class = "section">
			<table>
				<tr>
					<th class = "tableCaption">III. COMPETENCIES ACROSS THE CIRRICULUM</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!-- A. WRITING INTENSIVE SECTION -->
				<tr>
					<th>A. Writing Intensive (WI) <b class = "smaller">(9 credits)</b></th>
				</tr>
				<tr>
								<th><b>  COURSE:</b></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr><tr>
								<th><b>  COURSE:</b></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr><tr>
								<th><b>  COURSE:</b></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr>		<!-- B. QUATNTITAVE LEARNING / COMPUTER-INTENSIVE SECTION -->
				<tr>
					<th>B. Quantitative Learning (QL) <b class = "smaller">(3 credits) </b>OR
						<br/>  Computer-Intensive (CP)
						<b class = "smaller">(3 credits)</b>
					</th>
				</tr>
				<tr>
							<th><b>  COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>		<!-- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
				<tr>
					<th>C. Visual Literacy (VL) <b class = "smaller">(3 credits) </b>OR
						<br/> Communication-Intensive (CM)
						<b class = "smaller">(3 credits)</b>
					</th>
				</tr>
				<tr>
							<th><b>COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b>						
							</b></th>
							<th class = 'tableGrade'><b>
							</b></th>
							<th class = 'tableGrade'></th>
						</tr>		<!-- D. CULTURAL DIVERSITY SECTION -->
				<tr>
					<th>D. Cultural Diversity <b class = "smaller">(3 credits) </b></th>
				</tr>
				<tr>
							<th><b>COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CD</th>
						</tr>		<!-- E. CRITICAL THINKING SECTION -->
				<tr>
					<th>E. Critical Thinking <b class = "smaller">(3 credits) </b></th>
				</tr>
				<tr>
							<th><b>COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CT</th>
						</tr>			</table>
                </div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
