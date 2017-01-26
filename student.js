function login()
{
  document.getElementById("btn").innerHTML="Please wait...";
  document.getElementById("btn").style.border="1px solid orange";
  document.getElementById("btn").style.background="orange";
		username = document.getElementById("admn").value;
		password = document.getElementById("pass").value;

		$.post( "login.php", {admn:username,password:password} ,function( data ) {
		
     var check = JSON.parse(data);
  				if(check.status=="Success")
  				{
  					window.location="dashboard.php";
  				}
  				else
  				{
            document.getElementById("btn").style.border="1px solid red";
  					document.getElementById("btn").innerHTML="Wrong Username or Password";
  					document.getElementById("btn").style.background="red";
  						
  				}
		});
}