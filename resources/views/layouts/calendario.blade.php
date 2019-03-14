
  <!--$datetime = new DateTime('now',new DateTimeZone("America/Chicago"));
  $datetime_string = $datetime->format('Y-m-d');-->


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('fullcalendar/lib/jquery.min.js') }}"></script>
<script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('fullcalendar/locale-all.js') }}"></script>
<script>
  $(document).ready(function() {
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
      locale: 'es',
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
	  navLinks: true, // can click day/week names to navigate views
	  selectable: false,
	  selectHelper: true,
	  select: function(start, end) {
        var title = prompt('Event Title:');
        var id = prompt('Event Id:');
        var eventData;
        if (title) {
          eventData = {
          	id: id,
            title: title,
            start: start,
            end: end,
            editable: false // evita mover las citas y redimensionar
          };
          //var estart = new Date(eventData.start)
          //var eend = new Date(eventData.end)
          //alert("titulo: "+eventData.title+" start: "+estart.toISOString()+" end: "+eend.toISOString());
          //enviar(eventData.title,x.toISOString(),e.toISOString());
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true 
        }
        $('#calendar').fullCalendar('unselect');

      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-01-28',
		  editable: false
        }
      ]
    });

    
  });

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }


  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
</head>
<body>
  <div id='calendar'></div>

</body>
</html>
