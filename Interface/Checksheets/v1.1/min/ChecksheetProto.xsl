<xsl:stylesheet  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
    
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
              <title>BS Computer Science: IT Checksheet</title>
              <link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
           </head>
           <body>
               <div class = "section">
               <xsl:for-each select="GMOOH/Checksheet/End/Column/Section">
                  <table>
                        <tr>
                           <th class = "tableCaption">
                               <xsl:value-of select="SectionDesc"/>
                            </th>
                           <th class = "tableGradeCaption">RC</th>
                           <th class = "tableGradeCaption">CR</th>
                           <th class = "tableGradeCaption">GR</th>
                        </tr>
                            <xsl:for-each select="Pos">
                                <tr>
                                    <xsl:attribute name="title"><xsl:for-each select="ReqInst">
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
                                        </xsl:for-each></xsl:attribute>
                                   <th>
                                       <script>
                                           str = '<xsl:value-of select="PosDesc"/>';
                                           str = str.replace(/(\||,)/g, "<br />");
                                           document.write(str);
                                        </script>
                                       
                                    </th>
                                </tr>
                            
                                <tr>
                                   <th  onclick = 'findCourses(this)'>
                                       <xsl:attribute name="id"><xsl:value-of select="PosDesc"/></xsl:attribute>
                                       <input class = 'courseNameBox' readonly="true"/>
                                    </th>

                                   <th class = 'tableGrade'><b>3</b></th>
                                   <th class = 'tableGrade'><b></b></th>
                                   <th class = 'tableGrade'><b>
                                      </b>
                                   </th>
                                </tr>
                            </xsl:for-each>
                    </table>
                </xsl:for-each>
<!--Program portion                -->
                <xsl:for-each select="GMOOH/Checksheet/Program/Column">
                    <table>
                        <tr>
                           <th class = "tableHeader" colspan = "3">
                              <xsl:value-of select="ColumnDesc"/>
                           </th>
                        </tr>
<!--Displays Section headers-->
                        <xsl:for-each select="Section">
                                <tr>
                                   <th><xsl:value-of select="SectionDesc"/></th>
                                   <td class = "tableGrade">Gr</td>
                                   <td class = "tableGrade">SH</td>
                                </tr>
<!-- Display required classes                           -->
                            <xsl:for-each select="Class">
                                <tr>
                                   <th id = 'BS CSC:IT Required' onclick = 'findCourses(this)'>
                                       <xsl:value-of select="ClassDept"/> 
                                       <xsl:value-of select="ClassNo"/>: 
                                       <xsl:value-of select="ClassDesc"/>
                                    </th>
                                   <td  class = 'tableGrade'></td>
                                   <td  class = 'tableGrade'></td>
                                </tr>
                            </xsl:for-each>   
                        </xsl:for-each>
                    </table>
                </xsl:for-each>
                   
               </div>
           </body>
        </html>
	</xsl:template>
</xsl:stylesheet>
