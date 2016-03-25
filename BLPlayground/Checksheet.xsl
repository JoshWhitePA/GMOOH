<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
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
            <div class = "buffer">
               <xsl:text> </xsl:text>
            </div>
            <xsl:for-each select="GMOOH/Checksheet/End">
               <xsl:choose>
                  <xsl:when test="EndNumber = 1">
                     <xsl:for-each select="Column">
                        <div class = "section">
                           <xsl:for-each select="Section">
                              <!--                        -->
                              <!--                        -->
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
                                             <script>
                                                var str = '<xsl:value-of select="PosDesc"/>';
                                                var splitter = str.replace(/\|/g, "<br/>");
                                                document.write(splitter);
                                             </script>
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
                                                      <xsl:value-of select="Dept"/>
                                                      <xsl:text>&#xA0;</xsl:text>
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
                                    <tr>
                                       <th>
                                          <xsl:text>Course:&#xA0;</xsl:text>
                                       </th>
                                       <td>
                                          <xsl:text>3</xsl:text>
                                       </td>
                                       <td></td>
                                       <td></td>
                                    </tr>
                                 </xsl:for-each>
                              </table>
                              <!--                        -->
                              <!--                        -->
                           </xsl:for-each>
                        </div>
                     </xsl:for-each>
                  </xsl:when>
                  <xsl:otherwise>
                     <div class = "buffer">&#160;</div>
                     <!-- Create horizontal break in page -->
                     <div class = "newSection"></div>
                     <div class = "header">
                        <hr/>
                     </div>
                     <div class = "newSection"></div>
                     <!-- IV. COLLEGE DISTRIBUTION TABLE -->
                     <div class = "buffer">&#160;</div>
                     <xsl:for-each select="Column">
                        <xsl:value-of select="Column"/>
                        <xsl:choose>
                           <xsl:when test="ColumnNum = 2">
                              <div class = "section">
                                 <xsl:for-each select="Section">
                                    <!--                        -->
                                    <!--                        -->
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
                                                   <script>
                                                      var str = '<xsl:value-of select="PosDesc"/>';
                                                      var splitter = str.replace(/\|/g, "<br/>");
                                                      document.write(splitter);
                                                   </script>
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
                                                            <xsl:value-of select="Dept"/>
                                                            <xsl:text>&#xA0;</xsl:text>
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
                                          <tr>
                                             <th>
                                                <xsl:text>Course:&#xA0;</xsl:text>
                                             </th>
                                             <td>
                                                <xsl:text>3</xsl:text>
                                             </td>
                                             <td></td>
                                             <td></td>
                                          </tr>
                                       </xsl:for-each>
                                    </table>
                                    <!--                        -->
                                    <!--                        -->
                                 </xsl:for-each>
                                 <div class = "notes1">
                                    <br/>	
                                    <div class = "noteBox">
                                       NOTE: 
                                       <b>GEG courses with a lab and 40, 322, and 323 may be used
                                       in IV.A. and GEG courses 40, 204, 274, 304, 322, 323, 324, 347,
                                       380, and 394 may NOT be used in IV.B.
                                       </b>
                                    </div>
                                 </div>
                              </div>
                              <div class = "buffer">&#xA0;</div>
                              <!-- GENERAL EDUCATION CHECKSHEET NOTES PT.3 -->
                              <div class = "newSection"></div>
                              <div class = "noteBuffer">&#xA0;</div>
                              <div class = "notes2"><br/>
                                 # Students in the College of Liberal Arts and Sciences are required 
                                 to take at least one course in Biological Science (BIO) and at least 
                                 one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG 
                                 with lab, or GEG 40, GEG 322, or GEG 323), and at least one of which 
                                 must be a lab (each course may be counted in either sections II.A
                                 or IV.A).
                                 <br/>* Excludes PAG 011 and PAG 012
                              </div>
                              <div class = "noteBuffer">&#xA0;</div>
                           </xsl:when>
                           <xsl:otherwise>
                              <div class = "section">
                                 <xsl:for-each select="Section">
                                    <!--                        -->
                                    <!--                        -->
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
                                                   <script>
                                                      var str = '<xsl:value-of select="PosDesc"/>';
                                                      var splitter = str.replace(/\|/g, "<br/>");
                                                      document.write(splitter);
                                                   </script>
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
                                                            <xsl:value-of select="Dept"/>
                                                            <xsl:text>&#xA0;</xsl:text>
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
                                          <tr>
                                             <th>
                                                <xsl:text>Course:&#xA0;</xsl:text>
                                             </th>
                                             <td>
                                                <xsl:text>3</xsl:text>
                                             </td>
                                             <td></td>
                                             <td></td>
                                          </tr>
                                       </xsl:for-each>
                                    </table>
                                    <!--                        -->
                                    <!--                        -->
                                 </xsl:for-each>
                              </div>
                           </xsl:otherwise>
                        </xsl:choose>
                     </xsl:for-each>
                  </xsl:otherwise>
               </xsl:choose>
            </xsl:for-each>
            <!--            end xsl-->
            <!--  Program!!!!!!!!!           -->

            <xsl:for-each select="GMOOH/Checksheet/Program">
               <div class = "newSection"></div>
               <br/>
               <hr/>
               <div class = "header">
                  <xsl:value-of select="ProgramTitle"/>
               </div>
               <div id="container" style="width:100%;">
                  <div id="left" style="float:left;
                     width:400px;
                     height: 20px;
                     font-weight:bold;
                     text-decoration: underline;">
                     Program Number: 
                     <xsl:value-of select="ProgramNo"/>
                  </div>
                  <div id="right" style="display: inline-block;
                     margin:0 auto;
                     width:400px;
                     font-weight:bold;
                     height: 20px;
                     text-decoration: underline;">
                     <xsl:value-of select="ProgramVersion"/>
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
               <div class = "buffer">
                  <xsl:text>&#xA0;</xsl:text>
               </div>
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
                                    <th>
                                       <xsl:value-of select="SectionDesc"/>
                                    </th>
                                    <td class = "tableGrade">Gr</td>
                                    <td class = "tableGrade">SH</td>
                                 </tr>
                                 <xsl:for-each select="Class">
                                    <tr>
                                       <td>
                                          <xsl:value-of select="ClassDept"/>
                                          <xsl:text>&#xA0;</xsl:text>
                                          <xsl:value-of select="ClassNo"/>
                                          <xsl:text>:&#xA0;</xsl:text>
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
                                    <th>
                                       <xsl:value-of select="SectionDesc"/>
                                    </th>
                                    <td class = "tableGrade">Gr</td>
                                    <td class = "tableGrade">SH</td>
                                 </tr>
                                 <xsl:for-each select="Class">
                                    <tr>
                                       <td>
                                          <xsl:value-of select="ClassDept"/>
                                          <xsl:text>&#xA0;</xsl:text>
                                          <xsl:value-of select="ClassNo"/>
                                          <xsl:text>:&#xA0;</xsl:text>
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
                                 <td>
                                    <xsl:text>&#xA0;</xsl:text>
                                 </td>
                                 <td></td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td class="bsNotes" >
                                    Notes on the 
                                    <script>
                                       str = "<xsl:value-of select="../ProgramAbriv" />";
                                       str = str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
                                       document.write(str);
                                    </script>
                                    Program
                                 </td>
                                 <td></td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>
                                    <xsl:value-of select="../ProgramNotes" />
                                 </td>
                                 <td></td>
                                 <td></td>
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