

function empezar(valore){
let ro=document.getElementsByClassName('cora')
     

for (let item of ro) {
    if(item.getAttribute('data-id')==valore){
     
console.log(item.className)
console.log(item.className=="far fa-heart")
    if( item.className=="far fa-heart cora"){
        
console.log(item)
         item.className="fas fa-heart cora";
    }
    
    else{item.className="far fa-heart cora";}
       
    }
}


    
const url='http://localhost/fotosenlaravel/blog/public/like/';
const http = new XMLHttpRequest()

http.open("GET",`http://localhost/fotosenlaravel/blog/public/like/${valore}`,true)
http.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
    }
}
http.send(null)

}




function borrar(id){
    
    console.log('hola')
    Swal.fire({
  title: 'Estas seguro?',
  text: "Si lo borras no vas a poder recuperarlo",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, borrar esto!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Borrado!',
      'Tu comentario fue borrado.',
      'success'
    )
    setTimeout(()=>{
        
      location.href =`http://localhost/fotosenlaravel/blog/public/delete/${id}`;
 
    },1500);

  
  }
 
  
})
    
}

//Mensaje alerta de agregar publicacion

const alert=document.getElementById('alert');
console.log(alert);
setTimeout(() => {
 alert.remove(); 
}, 3000);