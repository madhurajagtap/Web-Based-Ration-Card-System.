function check()
{
  var name=document.getElementsById("c_name"); 
  var pass=document.getElementsById("c_password");  
   var rpass=document.getElementsById("repeat_password");               
 var num=document.getElementsById("mobile_number");
 var aadhar=document.getElementsById("Aadhar_number");
 var ration=document.getElementsById("ration_number");

 
 
  if(pass.value!=rpass.value)
  {
    alert("Confirm Password does not matched.");

	return false;
  }
  else if(pass.length<6)
  {  
  alert("Password must be at least 6 characters long");  
  return false;  
  } 
  else if(isNaN(num))
  {  
  alert("Enter digits only");
  return false;  
  } 
 else if(num.length!=10)
 {
   alert("Enter 10 digits mobile number");
   return false; 
 }
 else if(isNaN(aadhar))
 {
  alert("Enter digits only");
  return false; 
  }
  else if(aadhar.length!=12)
  {
    alert("Enter 12 digits aadhar card number");
    return false; 
  }
  else
  {
  return true;
  }

  
  }