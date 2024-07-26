searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userLeist = document.querySelector(".users .users-list");

 searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
 }

 searchBar.onkeyup = ()=>{//bu qatorda onkeyup functioni inputda kelgan har eventni eshitadi yani yozilgan har bitda belgini oladi
  let searchTerm = searchBar.value;//va searchBar o'zgaruvchisini qiymatini  searchTermtenglaymiz
  if(searchTerm != ""){
    searchBar.classList.add('active');
  }else{
    searchBar.classList.remove('active');

  }
  let xhr = new XMLHttpRequest(); // obyekt ochish http request uchun
  xhr.open("POST", "php/search.php", true); //berilgan pathga POST requestini jonatish xhr obyektdan foydalanib
  xhr.onload = ()=>{//responseni backendan olish
    if(xhr.readyState === XMLHttpRequest.DONE){ //agar response tuganlansa
        if(xhr.status === 200){
            let data = xhr.response;
            userLeist.innerHTML = data;
          }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm); // Ma'lumotni kodlash orqali serverga jonatish

 }

setInterval(()=>{
      let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/user.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){ 
          if(xhr.status === 200){
              let data = xhr.response;
            if(!searchBar.classList.contains("active")){
              userLeist.innerHTML = data;
            }
            }
      }
    }
    xhr.send();
  },500);