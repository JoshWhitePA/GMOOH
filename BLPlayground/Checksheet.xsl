<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
    
<!-- The <xsl:output> element defines the format of the output document.    -->
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
<!-- The match attribute is used to associate a template with an XML element. The match attribute can also be used to define
        a template for the entire XML document. The value of the match attribute is an XPath expression (i.e. match="/" 
        defines the whole document).                                                                                    -->
	<xsl:template match="/">
		<html>
			<head>
                <!-- We can use html attributes that you would as long as it is valid, if a tag is unmatched or image or           file url does not exist the document will not display                                          -->
                <title>BS Computer Science: IT Checksheet</title>
                <link rel = "stylesheet" type = "text/css" href =  "../Interface/Checksheets/v1.1/Styles/checksheetStyleV1p1.css"/>
			</head>
			<body>
            <div class = "sectionTop">
                <br/><br/>
                <xsl:text>STUDENT:</xsl:text>
                <br/><br/>
			     ______________________________
		    </div>
            <div class = "sectionTop">
                <img src = "../Interface/Checksheets/v1.1/Images/KU_Logo.jpg" />
            </div>
            <div class = "sectionTop">
                <br/><br/>
                <xsl:text>STUDENT ID NUMBER:</xsl:text>
                <br/><br/>
                ______________________________
            </div>
            <div class = "newSection"></div>
            <div class = "headerBox">
                <xsl:value-of select="GMOOH/Checksheet/Program/ProgramTitle"/>
            </div>
            <div class = "newSection" style="text-align: center;"></div>
<!--#GENERAL EDUCATION# -->
                
<!--                Begin xsl  work             -->
            <div class = "header">
                <xsl:text>GENERAL EDUCATION</xsl:text>
            </div>
<!-- I. UNIVERSITY CORE TABLE -->
            <div class = "buffer"><xsl:text> </xsl:text></div>
            <div class = "section">
<!--For each Checksheet->Section the xsl will do the following      -->
                    <xsl:for-each select="GMOOH/Checksheet/End/Column/Section">
                        <table>
<!--                    Begin Table                            -->
                                <tr>
                                    <th colspan="1" class = "tableCaption">
<!--                                    Header for the table, from db based on the section number                  -->
                                        <xsl:value-of select="SectionDesc"/>
                                    </th>
                                    <th class = "tableGradeCaption">RC</th>
                                    <th class = "tableGradeCaption">CR</th>
                                    <th class = "tableGradeCaption">GR</th>
                                </tr>
<!--                            Inside of each section, pos is the order of each of those requirments -->
                                <xsl:for-each select="Pos">
                                    <tr>
                                         <th style="word-wrap: break-word;
                                                    max-width: 65px;">
                                             <span style="white-space:nowrap;">
<!--                                             -->
                                                 <xsl:value-of select="PosDesc"/>
                                             </span>


                                        <xsl:for-each select="ReqInst">
<!--                                        Gets those nasty requirments displayed    -->
                                            <xsl:choose>
<!--                                                Basic xsl if statement, puts any if fron of class if it has 
                                                    no other reqs, but puts dept frst if there is a number   -->
                                                <xsl:when test="contains(ClassNums, 'Any')">
                                                    <b class = "smaller">
<!--                                                 display class number   -->
                                                    <xsl:value-of select="ClassNums"/>
                                                        <xsl:text>&#xA0;</xsl:text>
<!--                                                  Display class department      -->
                                                     <xsl:value-of select="Dept" />
<!--                                                     displays comma if it is not the last one-->
                                                        <xsl:if test="position() != last()">
                                                          <xsl:text>,</xsl:text>
                                                       </xsl:if>
                                                        <xsl:text>&#xA0;</xsl:text>
                                                    </b>
                                                </xsl:when>
<!--                                             XSL else   -->
                                                <xsl:otherwise>
                                                  <b class = "smaller">
<!--                                                 read above to understand this     -->
                                                     <xsl:value-of select="Dept"/><xsl:text>&#xA0;</xsl:text>
                                                       <xsl:value-of select="ClassNums"/>
                                                      <xsl:if test="position() != last()">
                                                          <xsl:text>,</xsl:text>
                                                       </xsl:if>
                                                      <xsl:text>&#xA0;</xsl:text>
                                                    </b>
<!--                                             Close otherwise       -->
                                                </xsl:otherwise>
                                            </xsl:choose>
<!--                                     End for each-->
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
    <!-- This part is hard coded, will update this when database is modified           -->
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
                            </tr>			
                            </table>
                    </div>


                    <xsl:for-each select="GMOOH/Checksheet/Program">

                        <div class = "newSection"></div><br/><hr/>
                        <div class = "header"><xsl:value-of select="ProgramTitle"/></div>
                        <div id="container" style="width:100%;">
                          <div id="left" style="float:left;
                                                width:400px;
                                                height: 20px;
                                                font-weight:bold;
                                                text-decoration: underline;">
                              Program Number: <xsl:value-of select="ProgramNo"/></div>
                          <div id="right" style="display: inline-block;
                                                margin:0 auto;
                                                width:400px;
                                                font-weight:bold;
                                                height: 20px;
                                                text-decoration: underline;"><xsl:value-of select="ProgramVersion"/>
                              ProgramVersion

                            </div>
                          <div id="center" style="display: inline-block;
                                                margin:0 auto;
                                                width:400px;
                                                font-weight:bold;
                                                height: 20px;
                                                text-decoration: underline;text-align:right;">
                              Date here
                            </div>
                        </div>
                        <div style="text-align:left;font-weight: bold;padding-left:40px;">

                        </div>
                        <br/>

                        <br/>
            <div class = "newSection"></div>
            <div class = "buffer"><xsl:text>&#xA0;</xsl:text></div>

                    <xsl:for-each select="Column">

                        <xsl:choose>

                            <xsl:when test="ColumnNo = 1">
                                <div class = "section">
                            <table>
                                <tr>
                                           <th class = "tableHeader" colspan = "3">
                                              <xsl:value-of select="ColumnDesc"/>
                                           </th>
                                      </tr>
                                <xsl:for-each select="Section">
                                      <tr>
                                            <th><xsl:value-of select="SectionDesc"/></th>
                                            <td class = "tableGrade">Gr</td>
                                            <td class = "tableGrade">SH</td>
                                        </tr>
                                        <xsl:for-each select="Class">    
                                            <tr>	
                                            <td>

                                                    <xsl:value-of select="ClassDept"/><xsl:text>&#xA0;</xsl:text>
                                                    <xsl:value-of select="ClassNo"/><xsl:text>:&#xA0;</xsl:text>
                                                    <xsl:value-of select="ClassDesc"/>
                                                <input type="hidden" name="ClassID" >
                                                        <xsl:attribute name="name">
                                                            <xsl:text>ClassID</xsl:text>
                                                            <xsl:value-of select="position()" />
                                                        </xsl:attribute>
                                                </input>
                                            </td>
                                            <td  class = 'tableGrade'></td>
                                            <td  class = 'tableGrade'></td>
                                        </tr>       
                                    </xsl:for-each>     

                               </xsl:for-each> 
                                </table>
                                </div>	
                            </xsl:when>

                            <xsl:otherwise>
                                 <div class = "section">
                            <table>
                                <tr>
                                           <th class = "tableHeader" colspan = "3">
                                              <xsl:value-of select="ColumnDesc"/>
                                           </th>
                                      </tr>
                                <xsl:for-each select="Section">
                                      <tr>
                                            <th><xsl:value-of select="SectionDesc"/></th>
                                            <td class = "tableGrade">Gr</td>
                                            <td class = "tableGrade">SH</td>
                                        </tr>
                                        <xsl:for-each select="Class">    
                                            <tr>	
                                            <td>

                                                    <xsl:value-of select="ClassDept"/><xsl:text>&#xA0;</xsl:text>
                                                    <xsl:value-of select="ClassNo"/><xsl:text>:&#xA0;</xsl:text>
                                                    <xsl:value-of select="ClassDesc"/>
                                                <input type="hidden" name="ClassID" >
                                                        <xsl:attribute name="name">
                                                            <xsl:text>ClassID</xsl:text>
                                                            <xsl:value-of select="position()" />
                                                        </xsl:attribute>
                                                </input>
                                            </td>
                                            <td  class = 'tableGrade'></td>
                                            <td  class = 'tableGrade'></td>
                                        </tr>       
                                    </xsl:for-each>     

                               </xsl:for-each> 
                                <tr>
                                    <td><xsl:text>&#xA0;</xsl:text></td>
                                <td></td><td></td>
                            </tr>
                            <tr>

                                <td class="bsNotes" >Notes on the 
                                    <script>
                                        str = "<xsl:value-of select="../ProgramAbriv" />";
                    str = str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
                                        document.write(str);
                                    </script>
                                      Program
                                     </td>
                                <td></td><td></td>
                            </tr>
                            <tr>
                                <td>
                                    <xsl:value-of select="../ProgramNotes" />
                                </td>
                                <td></td><td></td>
                            </tr>
                                </table>
                                </div>	
                            </xsl:otherwise>
                        </xsl:choose>

                    </xsl:for-each> 


                    </xsl:for-each>    
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
