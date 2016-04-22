<!-- advisee selection redirect page.
Created for CSC 355WI 020 -->

<html>
   <HEAD>
      <TITLE>Password change successful</TITLE>
	  <link rel="stylesheet" type="text/css" href="Styles/gmoohMasterStyle.css" />
	  <script src = "Scripts/jquery-1.12.0.min.js"></script>
	  <script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.php", function() {
					$("#mainSection")
						.append("<div class='boxed' >"
							+ "<p>Temporary response page. PHP pls?</p>"
							+ "</div>"
						); 
				});
			});
		</script>
   </HEAD>
<BODY id="master">
</BODY>
</html>