isBool = true

function showPass(){
if(isBool){
  document.getElementById("password").setAttribute("type","text");
  isBool= false;
  }
  else{
    document.getElementById("password").setAttribute("type","password");
    isBool= true;
  }
}

isBool1 = true

function showPassr(){
if(isBool1){
  document.getElementById("rpassword").setAttribute("type","text");
  isBool1= false;
  }
  else{
    document.getElementById("rpassword").setAttribute("type","password");
    isBool1= true;
  }
}

