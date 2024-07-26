const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");
console.log(continueBtn);

form.onsubmit = (e)=>{ 
    e.preventDefault();//bu malumotni bir marotaba yuborishini taminlaydi
}

continueBtn.onclick = ()=>{//button submit bolganda 
    let xhr = new XMLHttpRequest();//XMLHttpRequest obyektini yaratish bu bizga brauzerda asinxroni requstlarni jonatish imkonini beradi asosan [GET POST PUT DELTE]
    xhr.open("POST", "php/login.php", true);//yaratigan obyektdan foydalani POST requestni jonatish berilgan pathga 
    xhr.onload = ()=>{//bu responseni qabul qilsh onlode bizga backendan kelgan responseni oladi
      if(xhr.readyState === XMLHttpRequest.DONE){//bu agar soraov tuganlangan bolsa 
          if(xhr.status === 200){//va unng statusi 200 bolsa
              let data = xhr.response;//va shu javobni data ga tenglash 
             if(data === "success"){// va u success teng bo'lsa
                location.href="user.php";//shu sahifaga yonaltirish
              }else{//agar notogri bo'lsa 
                errorText.style.display = "block";//eror uchun yozilgan tag block stylini olsin
                errorText.textContent = data;//va backendan kelgan error masseage errorTextning contantiga teng bo'lsin
              }
             console.log(data);
          }
      }
    }
    let formData = new FormData(form);//formadagi malumotlarni olish uchun formData obyekti 
    xhr.send(formData);//olingan malumotni jonatish
}