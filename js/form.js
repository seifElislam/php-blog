var errors = ['name is requires', 'email is not valid', 'please select 1 gender','please select 1 country',
'please select at least 2 sports','password must be at least 8 chars'];
var display=[];
var flag = true;
var form = document.getElementById('form_1085147');

function valid(){
    var name = document.getElementById('element_1');
    var email = document.getElementById('element_2');
    var password = document.getElementById('element_3');
    var country = document.getElementById('element_6');
    var gender = document.getElementsByName('element_4');
    var sports = form.querySelectorAll('input[type="checkbox"]:checked').length;
    console.log("sports"+sports);
    display=[];
    if(name.value == "")
        {flag= false;
        display.push(errors[0]);}

    if(email.value == "")
        {flag= false;
        display.push(errors[1]);}
    if(country.value == "")
        {flag= false;
        display.push(errors[3]);}
    if(password.value.length<8)
        {flag= false;
        display.push(errors[5]);}
    if(gender[0].checked==true &&gender[1].checked==true ||gender[0].checked==false &&gender[1].checked==false)
        {flag= false;
        display.push(errors[2]);}
    if(sports<2)
        {flag= false;
        display.push(errors[4]);}
}

function displayErrors()
    {
        var pa = document.getElementById("error-messages");
        pa.innerHTML="";
        for(i=0;i<display.length;i++)
            {
                var item = document.createElement("li");
                item.innerHTML=display[i];
                pa.appendChild(item);
            }

    }


 function end (){
    flag = true;
    console.log("flag"+flag)
    valid();
    console.log("flag"+flag)
    if(!flag)
        {
        displayErrors();}
    console.log("flag"+flag)
    console.log(display.length)
    return flag;
};
form.addEventListener("sumbit",end);
