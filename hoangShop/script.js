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

//------giaohang--------//
const button = document.querySelector(".delivery-top-login")
if(button){
  button.addEventListener("click", function(){
    document.querySelector(".delivery-top-2").classList.toggle("tat")
  })
}

// const rightbtn2 = document.querySelector('.fa-chevron-right')
// const lefttbn2 = document.querySelector(' .fa-chevron-left')
// const imNumber2  = document.querySelectorAll('.chitiet-right-slide-top img')
// console.log(imNumber)
// let index2=0

// rightbtn.addEventListener("click", function(){
//   index2=index2+1
//   if(index2>imNumber.length-1){
//     index2=0
//   }
//   document.querySelector('.chitiet-right-slide-top').style.right =index2 * 100 + "%"
// })

// lefttbn.addEventListener("click", function(){
//   index2=index2-1
//   if(index2<0){
//     index2=imNumber.length-1
//   }
//   document.querySelector('.chitiet-right-slide-top').style.right=index2 * 100+ "%"
// })