<!-- Password change result page.
Created for CSC 355WI 020
2/11/2016 -->

<html>
   <HEAD>
      <TITLE>Password change successful</TITLE>
	  <link rel="stylesheet" type="text/css" href="Styles/gmoohMasterStyle.css" />
	  <script src = "Scripts/jquery-1.12.0.min.js"></script>
	  <script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div class=\"boxed\" >"
							+ "<!-- Most of the following stuff should be handled by PHP logic. -->"
							+ "<!-- After finishing, it should redirect back to the User Account page after a delay.-->"
							+ "<p>Your password has been changed.</p>"
							+ "</div>"
						); 
				});
			});
		</script>
   </HEAD>
<BODY>
	<!-- Most of the following stuff should be handled by PHP logic. -->
	<!-- After finishing, it should redirect back to the User Account page after a delay.-->
	<!--
	<div class="boxed" >
	<p>Your password has been changed.</p>
	</div>
	-->
	<!-- Kill renegade comments -->
</BODY>
</html>