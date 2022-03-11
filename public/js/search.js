window.onload = function(){

  function loadTabla(data) {
    $("#resultado").html(data);
    addListenerToSign();
  }


  $('#buscar').click(function (e) {
    e.preventDefault();

    var formulario = $('form[name="busqueda"]').serializeArray();

    $.ajax({
      method: "GET",
      url: "/sesions/filter",
      data: {"nombre":formulario[0].value, "fecha":formulario[1].value , "user_id":formulario[2].value},
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).done(function (data) {
        loadTabla(data);
        console.log("POST exitoso")
    }).fail(function () {
        console.log("ERROR")
    }).always(function () {
        console.log("Se ha terminado de hacer el POST")
    })

  })

  function addListenerToSign(){

    $('.alta-user').click(function (e) {
      e.preventDefault();
  
      var formulario = $('form[name="busqueda"]').serializeArray();
      var sesion_id = $(this).attr("data-sesion_id")
  
      $.ajax({
        method: "POST",
        url: "/sesions/sign",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {"sesion_id": sesion_id, "user_id":formulario[2].value}
      }).done(function (data) {
        console.log("Usuario añadido");
        // alert("Sesion reservada");
        $('#buscar').click();
      }).fail(function () {
          console.log("ERROR")
      }).always(function () {
          console.log("Se ha terminado de hacer el POST")
          // alert("Sesion reservada");
      })
  
    });

    $('.down-user').click(function (e) {
      e.preventDefault();
  
      var formulario = $('form[name="busqueda"]').serializeArray();
      var sesion_id = $(this).attr("data-sesion_id")
  
      $.ajax({
        method: "POST",
        url: "/sesions/signdown",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {"sesion_id": sesion_id, "user_id":formulario[2].value}
      }).done(function (data) {
        console.log("Usuario añadido");
        // alert("Sesion reservada");
        $('#buscar').click();
      }).fail(function () {
          console.log("ERROR")
      }).always(function () {
          console.log("Se ha terminado de hacer el POST")
          // alert("Sesion reservada");
      })
  
    })
  }

}

