 // Obtener elementos del DOM
 const modal = document.getElementById("createForumModal");
 const openModalBtn = document.getElementById("openModalBtn");
 const closeModalSpan = document.getElementsByClassName("close")[0];

 // Abrir el modal al hacer clic en el botón
 openModalBtn.onclick = function() {
     modal.style.display = "block";
 }

 // Cerrar el modal al hacer clic en la "X"
 closeModalSpan.onclick = function() {
     modal.style.display = "none";
 }

 // Cerrar el modal si el usuario hace clic fuera del modal
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }