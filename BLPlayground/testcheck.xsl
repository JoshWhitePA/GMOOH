<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output
     method="html"
     doctype-system="about:legacy-compat"
     encoding="UTF-8"
     indent="yes" />
	<xsl:template match="/">
        <b> <xsl:value-of select="checksheet/section/sectionno"/></b>
            <b><xsl:text>Found a learner!</xsl:text></b>
	</xsl:template>
</xsl:stylesheet>
