const btnloc = document.querySelector('.loc')

if(btnloc){
  btnloc.addEventListener("click", function(){
    document.querySelector(".menu-nav").classList.toggle("activeZ")
  })
}