const imagen_libro = document.getElementById("imagen_libro");
const input_imagen = document.getElementById("input_imagen");

input_imagen.addEventListener("change",()=>{
    imagen_libro.src= URL.createObjectURL(input_imagen.files[0])
})