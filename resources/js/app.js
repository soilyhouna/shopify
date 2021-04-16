require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";

window.suppressionConfirm= function(formId){
    Swal.fire({
        title: 'Etes-vous sure?',
        text: "Voulez vous supprimé ce produit?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      })
}


