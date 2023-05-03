const rightbtn = document.querySelector('.fa-chevron-right')
const lefttbn = document.querySelector(' .fa-chevron-left')
const imNumber = document.querySelectorAll('.slide-content-right-top img')
let index=0

rightbtn.addEventListener("click", function(){

  index=index+1
  if(index>imNumber.length-1){
    index=0
  }
  document.querySelector('.slide-content-right-top').style.right =index * 100 + "%"
})

lefttbn.addEventListener("click", function(){
  index=index-1
  if(index<0){
    index=imNumber.length-1
  }
  document.querySelector('.slide-content-right-top').style.right=index * 100+ "%"
})

const rightbtn1 = document.querySelector('#right')
const lefttbn1 = document.querySelector('#left')
const imNumber1 = document.querySelectorAll('.slide-content-right-bottom img')
console.log(rightbtn1)
lefttbn1.addEventListener("click", function(){
  console.log("ok")
})
rightbtn1.addEventListener("click", function(){
  index=index+1
  if(index>imNumber1.length-1){
    index=0
  }
  document.querySelector('.slide-content-right-bottom').style.right =index * 100 + "%"
})

lefttbn1.addEventListener("click", function(){
  index=index-1
  if(index<0){
    index=imNumber1.length-1
  }
  document.querySelector('.slide-content-right-bottom').style.right=index * 100+ "%"
})


//-----------------
