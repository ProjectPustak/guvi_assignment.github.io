//handles every form request
$(document).on('submit','form', async function(e){
  e.preventDefault();
  let url = 'functions.php?action=update';
  let formData = new FormData(e.target);
  let options = { method:'post', body: formData };
  fetch(url,options)
  .then((resp)=>{ 
    return resp.json(); 
  })
  .then((resp)=>{ 
    if(resp.status==true){
      Swal.fire({
        icon: 'success',
        title: resp.title,
        html: resp.html,
        confirmButtonColor: '#00a65a',
      })
      .then(() => {
        window.location.reload();
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: resp.title,
        html: resp.html,
        confirmButtonColor: '#D52D31',
      });
    }
  })
  .catch((err)=>{ 
    console.log(err); 
  });
});

$(document).on("click","#btnLogout",function(){
  let url = 'functions.php?action=logout';
  fetch(url)
  .then((resp)=>{ 
    return resp.json(); 
  })
  .then((resp)=>{ 
    if(resp.status==true){
      Swal.fire({
        icon: 'success',
        title: resp.title,
        html: resp.html,
        confirmButtonColor: '#00a65a',
      })
      .then(() => {
        window.location.reload();
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: resp.title,
        html: resp.html,
        confirmButtonColor: '#D52D31',
      });
    }
  })
  .catch((err)=>{ 
    console.log(err); 
  });
});