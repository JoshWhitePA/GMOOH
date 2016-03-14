<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
	<xsl:template match="/">
		<html>
			<head>
              
			</head>
			<body>
            
		
		<div class = "section">
<!-- Begin xsl               -->
                <xsl:for-each select="GMOOH/Checksheet/Section">
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
               
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
