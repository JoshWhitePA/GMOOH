<!-- advisee selection redirect page.
Created for CSC 355WI 020 -->

<html>
   <HEAD>
      <TITLE>Yeah this is a derp.</TITLE>
	  <link rel="stylesheet" type="text/css" href="Styles/gmoohMasterStyle.css" />
	  <script src = "Scripts/jquery-1.12.0.min.js"></script>
	  <script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div class='boxed' >"
							+ "<p>Placeholder response is a placeholder! Feel free to delete this file once it's not needed!</p>"
							+ "</div>"
						); 
				});
			});
		</script>
   </HEAD>
<BODY id="master">
</BODY>
</html>