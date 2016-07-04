  function validateform(){   
var name=document.getElementById("uname");  
var email1=document.getElementById("email1"); 
var query1= document.getElementById("query1"); 
if (name.value==""){  
  alert("Name can't be blank");  
  return false;  
}
else{
	

if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email1.value))  { }
else{
    alert("You have entered an invalid email address!");  
    return (false); 
}
}	
 if (query1.value==""){  
  alert("query can't be blank");  
  return false;  
}



} 