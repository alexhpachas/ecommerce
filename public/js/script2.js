popupWhatsApp = () => {
  
  let btnClosePopup = document.querySelector('.closePopup');
  let btnOpenPopup = document.querySelector('.whatsapp-button');
  let popup = document.querySelector('.popup-whatsapp');
  let sendBtn = document.getElementById('send-btn');

  btnClosePopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
  })
  
  btnOpenPopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
     popup.style.animation = "fadeIn .6s 0.0s both";
  })
  
  sendBtn.addEventListener("click", () => {
  let msg = document.getElementById('whats-in').value;
  let relmsg = msg.replace(/ /g,"%20");
     
   window.open('https://wa.me/51988581815?text='+relmsg, '_blank'); 
   popup.classList.toggle('is-active-whatsapp-popup')
   document.getElementById('whats-in').value="";
  
  });

  /* setTimeout(() => {
    popup.classList.toggle('is-active-whatsapp-popup');
  }, 3000); */
}

popupWhatsApp();