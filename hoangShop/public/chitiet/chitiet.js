const rightbtn = document.querySelector('.fa-chevron-right')
const lefttbn = document.querySelector(' .fa-chevron-left')
const imNumber  = document.querySelectorAll('.chitiet-right-slide-top img')
let index=0
rightbtn.addEventListener("click", function(){
  index=index+1
  if(index>imNumber.length-1){
    index=0
  }
  removeactive()
  document.querySelector('.chitiet-right-slide-top').style.right =index * 100 + "%"
  imgNumber[index].classList.add('active')
})

lefttbn.addEventListener("click", function(){
  index=index-1
  if(index<0){
    index=imNumber.length-1
  }
  removeactive()
  document.querySelector('.chitiet-right-slide-top').style.right=index * 100+ "%"
  imgNumber[index].classList.add('active')
})
//---------------------------------
const imgNumber  = document.querySelectorAll('.chitiet-right-bottom li')
imgNumber.forEach(function(image,index){
  image.addEventListener("click", function(){
    removeactive()
    document.querySelector('.chitiet-right-slide-top').style.right=index * 100+ "%" 
    image.classList.add('active')
  })
})
function removeactive(){
  let imgactive = document.querySelector('.active')
  imgactive.classList.remove('active')
}

//-----------------------------
const chitiet = document.querySelector('#mota')
const danhgia = document.querySelector('#danhgia')
if(chitiet){
  chitiet.addEventListener("click", function(){
    document.querySelector('.chitiet-bottom-dec-danhgia').style.display= "none"
    document.querySelector('.chitiet-bottom-dec-mota').style.display = "block"
  })
}
if(danhgia){
  danhgia.addEventListener("click", function(){
    document.querySelector('.chitiet-bottom-dec-danhgia').style.display= "block"
    document.querySelector('.chitiet-bottom-dec-mota').style.display = "none"
  })
}

const chitietNumber  = document.querySelectorAll('.chitiet-mota li')
chitietNumber.forEach(function(image,index){
  image.addEventListener("click", function(){
    removechitiet()
    image.classList.add('activeA')
  })
})
function removechitiet(){
  let chitietactive = document.querySelector('.activeA')
  chitietactive.classList.remove('activeA')
}