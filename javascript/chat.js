
const form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-filed"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();//bu malumotni bir marotaba yuborishini taminlaydi
}
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();//XMLHttpRequest obyektini yaratish bu bizga brauzerda asinxroni requstlarni jonatish imkonini beradi asosan [GET POST PUT DELTE]
  xhr.open("POST", "php/insert-chat.php", true);//yaratigan obyektdan foydalani POST requestni jonatish berilgan pathga 
  xhr.onload = () => {//bu responseni qabul qilsh onlode bizga backendan kelgan responseni oladi
    if (xhr.readyState === XMLHttpRequest.DONE) {//bu agar soraov tuganlangan bolsa 
      if (xhr.status === 200) {//va unng statusi 200 bolsa
        inputField.value = "";

      }
    }
  }
  let formData = new FormData(form);//formadagi malumotlarni olish uchun formData obyekti 
  xhr.send(formData);//olingan malumotni jonatish
}


setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
       
      }
    }
  }
  let formData = new FormData(form);//formadagi malumotlarni olish uchun formData obyekti 
  xhr.send(formData);//olingan malumotni jonatish
}, 500);