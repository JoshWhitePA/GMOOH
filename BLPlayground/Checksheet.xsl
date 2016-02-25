<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
	<xsl:template match="/">
		<html>
			<head>
				<link rel = "stylesheet" type = "text/css" href = "Styles.css"/>
			</head>
			<body>

		<div class = "header">BS Computer Science: Information Technology (60 SH)</div>
		<div class = "sectionTopLeft">Program Number: ULASCSCIT</div>
		<div class = "sectionTopMiddle">Version Number: 2118</div>
		<div class = "sectionTopRight">Effective Date: 08/29/2011</div>
		<div class = "newSection"/>
		<div class = "section3IT">
			<table border="1">
						<xsl:for-each select="/Checksheet/Section">
							<tr><td colspan="3"><xsl:value-of select="SectionHeader"/></td></tr>
							<xsl:for-each select="/Checksheet/Section/Class">
								<tr>
									 <td><xsl:value-of select="ClassTitle"/></td>
									 <td class="center"><xsl:value-of select="GR"/></td>
									 <td class="center"><xsl:value-of select="SH"/></td>
								</tr>
							</xsl:for-each>
						</xsl:for-each>
					</table>
		</div>
		
		
					
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>