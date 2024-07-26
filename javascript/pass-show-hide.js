const paswordFile = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");
toggleBtn.onclick = ()=>{// agar togglaeBtn onclick bo'lsa 
if(paswordFile.type == "password"){ //passford inputini textga o'zgartir
   paswordFile.type = "text";
   toggleBtn.classList.add("active");//active classini olsin 
}else{//bo'lmasa shu holatda qolsin
   paswordFile.type = "password";
   toggleBtn.classList.remove("active");//active classini olmasin

}
}
