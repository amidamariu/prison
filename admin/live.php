
<script type="text/javascript">
function ajouterLigne()
{
	var tableau = document.getElementById("tableau");


	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'traitement.php');
	xhr.send(null);
	   


	xhr.addEventListener('readystatechange', function() {
	    if (xhr.readyState === XMLHttpRequest.DONE) { 
	    	document.getElementById('tableau').innerHTML = xhr.responseText;
	    	alert(data);
	    }
	})
	

	 

}


setInterval(ajouterLigne,3000);

</script>

<table id="tableau" border="1">
	
</table>




