<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="author" content="">
 
  <title>@yield('title')</title>
  <!-- calendario js -->
     <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap.min.js') }}" rel="stylesheet">
 
  
    

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/table.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.7.1-web/css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.7.1-web/js/all.js') }}" rel="stylesheet">

  <style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }


  #calendar {
    max-width: auto;
    margin: 20px auto;
    padding: 0 10px;
  }

  .imgs {
  padding-top: 30px;
  padding-bottom:30px;
  padding-bottom:30px; 
  display: block;
  margin-left: auto;
  margin-right: auto;
}

  /* .fc-content-skeleton */ 

</style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    {{--  --}}
    @yield('sidebar')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
{{--
 --}}
        @yield('toggle')
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Mi perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('content')
      </div>
      
      @yield('modal')
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('jquery/jquery.min.js') }}" ></script>
  <script src="{{ asset('js/app.js') }}" ></script>

  <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
  <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('fullcalendar/locale-all.js') }}"></script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) { 
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

   


    $(document).ready(function() {
      $('#buscar').on('click',function(e){
        e.preventDefault();
           var valor = $('#filtro').val();
           var dependent = $('#filtro').data('dependent');
           var opc= $('#opc').val();
            $('#patient_id').prop("disabled", true);
           $.ajax({
              url:"{{ route('ajax fetch') }}",
              method:"POST",
              data:{valor:valor,opc:opc, _token: '{{csrf_token()}}' },
              success:function(result){
                $('#patient_id').removeAttr("disabled");
                $('#'+dependent).html(result);
              }
              
        
           })
        
       });
      
    /*
    function enviar(title,start,end){
    var parametros="title="+title+"&"+"start="+start+"&"+"end="+end;
    $.ajax({
      url:"../ajax/procesar.php",
      data:parametros,
      method:"POST",
      dataType:'json',
      success:function(respuesta){
        document.write(respuesta[0].start+" "+respuesta[0].end)
      }
    });

  }

  */

  

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      aspectRatio: 2.3,
      locale: 'es',
      timeFormat: 'h(:mm)A',
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
    navLinks: true, // can click day/week names to navigate views
    selectable: false,
    selectHelper: true,
    eventRender: function(eventObj, $el) {
      date = eventObj.start.toLocaleString();

      $el.popover({
        title: "<table><tr><th>"+eventObj.title+"</th></tr></table>",
        content: "<table><tr><td style='text-align: left;'>"+eventObj.description+"</td></tr></table>",
        trigger: 'hover',
        placement: 'top',
        container: 'body',
        html: true
      });
    },
    //select: function(start, end) {
    //    var title = prompt('Event Title:');
    //    var id = prompt('Event Id:');
    //    var eventData;
    //    if (title) {
    //      eventData = {
    //        id: id,
    //        title: title,
    //        start: start,
    //        end: end,
    //        editable: false // evita mover las citas y redimensionar
    //      };
          //var estart = new Date(eventData.start)
          //var eend = new Date(eventData.end)
          //alert("titulo: "+eventData.title+" start: "+estart.toISOString()+" end: "+eend.toISOString());
          //enviar(eventData.title,x.toISOString(),e.toISOString());
    //      $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true 
    //    }
    //    $('#calendar').fullCalendar('unselect');
    //  },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: "{{ asset('fullcalendar/demos/php/get-events.php') }}",
      }
    });

    
  });

  </script>

</body>

</html>
