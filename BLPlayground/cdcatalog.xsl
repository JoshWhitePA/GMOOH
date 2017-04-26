<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
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
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>