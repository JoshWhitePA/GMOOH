<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
	<xsl:template match="/">
		<html>
			<head>
        <link rel = "stylesheet" type = "text/css" href = "../Interface/Checksheets/v1.1/Styles/checksheetStyle.css"/>
			</head>
			<body>
                <xsl:for-each select="/Checksheet/Section">
					<table border="1">
						
							<tr><td colspan="3"><xsl:value-of select="SectionDesc"/></td>
                                <th class = "tableGradeCaption">RC</th>
					           <th class = "tableGradeCaption">CR</th>
					           <th class = "tableGradeCaption">GR</th></tr>
							<xsl:for-each select="Pos">
								<tr>
									 <th><xsl:value-of select="PosDesc"/></th>
                                    
                                     <td >
                                    <xsl:for-each select="ReqInst">
                                        <b class = "smaller">
                                        <xsl:if test="number(ClassNums) = ClassNums">
                                            <!-- myNode is a number -->
                                        </xsl:if>

                                        <xsl:value-of select="ClassNums"/>
                                         <xsl:text>&#xA0;</xsl:text>
                                         <xsl:value-of select="Dept"/><xsl:text>&#xA0;</xsl:text>
                                        </b>
                                    </xsl:for-each>
                                    </td>
                                        
								</tr>
                                <tr><td></td><td></td></tr>
							</xsl:for-each>
						
					</table>
                    </xsl:for-each>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>