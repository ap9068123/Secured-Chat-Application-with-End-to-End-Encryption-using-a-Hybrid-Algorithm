

sendBtn = form.querySelector("button");

sendBtn.onclick = ()=> {




    function isUpperCase(letter){
  var l = letter.charCodeAt();
  if(l >= 65 && l <= 90){
    return true;
  }else{
    return false;
  }
};

function isLowerCase(letter){
  var l = letter.charCodeAt();
  if(l >= 97 && l <= 122){
    return true;
  }else{
    return false;
  }
};





  let result = ''
//var message=document.getElementById("message").value;
var message="ajay";
//var key=document.getElementById("key").value;
var key="aa";
for(var i = 0, j = 0; i < message.length; i++){
    var currentLetter =message[i]; 
    
    if(isUpperCase(currentLetter))
    {
      
        //result += String.fromCharCode((c.charCodeAt(0) + key.toUpperCase().charCodeAt(j) - 2 * 65) % 26 + 65) // A: 65
      
    
    var upperLetter = ((currentLetter.charCodeAt() - 65) + (key[j%key.length].toUpperCase().charCodeAt() - 65)) % 26;
      result += String.fromCharCode(upperLetter+65);
      j++;
    
    
    
    
    
    } 
    
    else if(isLowerCase(currentLetter)){
      var lowerLetter = ((currentLetter.charCodeAt() - 97) + (key[j%key.length].toLowerCase().charCodeAt() - 97)) % 26;
      result += String.fromCharCode(lowerLetter+97);
      j++;
    }

    else {
      result += currentLetter
    }
    //j = ++j % key.length
  }
  //return result

  let shift=0;

  for(let i=0;i<result.length;i++)
  {
    shift=shift+result.charCodeAt(i);
  }

 

  var str=result;
  //str= str.toUpperCase();
  var amount=shift%26;
  //var amount=8;
  //amount=parseInt(amount, 10);
  /*if (amount < 0) {
    return caesarShift(str, amount + 26);
  }*/


  var output ="";

  
  for (var i = 0; i < str.length; i++) {
    
    var c = str[i];

   
    if (c.match(/[a-z]/i)) {
     
      var code = str.charCodeAt(i);

      
      if (code >= 65 && code <= 90) {
        c = String.fromCharCode(((code - 65 + amount) % 26) + 65);
      }

      
      else if (code >= 97 && code <= 122) {
        c = String.fromCharCode(((code - 97 + amount) % 26) + 97);
      }
    }

   
    output += c;
  }

  
  var name="par";


  var xhr = new XMLHttpRequest();

  
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  
  xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
          alert(xhr.responseText);
      }
  };

  
  xhr.send(JSON.stringify(name));



}


