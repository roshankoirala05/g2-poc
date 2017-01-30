function FormValidation()
{
 var fieldValue=document.getElementById("firstname").value;
    if(fieldValue == "" || fieldValue==null)
    {
        alert('Please Enter First Name');
        document.getElementById('firstname').style.borderColor = "red";
        return false;
        }
        }