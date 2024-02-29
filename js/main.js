//Search
document.addEventListener('DOMContentLoaded', function() {
    // Lấy thẻ button
    var button = document.getElementById('yourButtonId'); // Thay 'yourButtonId' bằng id thực tế của button

    // Thêm sự kiện click cho button
    button.addEventListener('click', function() {
        // Chuyển hướng sang trang ./dummy.html
        window.location.href = './dummy.html';
    });
});

//List top film

var mainImg = document.querySelector('.main_image')
var listImg = document.querySelectorAll('.list_image img')
var prevBtn = document.querySelector('.prev')
var nextBtn = document.querySelector('.next')

var currentIndex = 0;
function updateImageByIndex(index){
    //remove active class
    document.querySelectorAll('.list_image div').forEach(item=>{
        item.classList.remove('active')
    })


    currentIndex = index
    mainImg.src = listImg[index].getAttribute('src')
    listImg[index].parentElement.classList.add('active')
}

listImg.forEach((imgElement, index)=>{

    imgElement.addEventListener('click', e=>{
        mainImg.style.opacity = '0'

        setTimeout(()=>{
            updateImageByIndex(index)
            mainImg.style.opacity = '1'
        },400)
    })
})

prevBtn.addEventListener('click', e=>{

    if(currentIndex==0){
        currentIndex=listImg.length - 1
    }else{
        currentIndex--
    }

    mainImg.style.animation = ''
    setTimeout(()=>{
        updateImageByIndex(currentIndex)
        mainImg.style.animation = 'slideLeft 1s ease-in-out forwards'
    }, 200)
})

nextBtn.addEventListener('click', e=>{
    if(currentIndex == listImg.length -1){
        currentIndex = 0
    }else{
        currentIndex++
    }

    mainImg.style.animation = ''
    setTimeout(()=>{
        updateImageByIndex(currentIndex)
        mainImg.style.animation = 'slideRight 1s ease-in-out forwards'
    }, 200)
})
updateImageByIndex(0)

//List actor
var slideIndex = 0;

showSlide (slideIndex);

setInterval (showSlide,3000);

function showSlide(n) {
	var i, j, slide, dot;
	slide = document.getElementsByClassName('slide');
	dot = document.getElementsByClassName('dotlist');
	for(i = 0; i < slide.length; i++) {
		slide[i].style.display = "none";
	}
	if(slideIndex == slide.length) {
		slideIndex = 0;
	}
	slideIndex++;
	slide[slideIndex - 1].style.display = "block";
	for(j = 0; j < dot.length; j++) {
		dot[j].classList.remove("active");
	}
	dot[slideIndex - 1].classList.add("active");
}

function currentSlide(n) {
	showSlide(slideIndex = n);	
}