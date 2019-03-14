
  <!--$datetime = new DateTime('now',new DateTimeZone("America/Chicago"));
  $datetime_string = $datetime->format('Y-m-d');-->


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar.min.css' rel='stylesheet' />
<link href='../fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script src='../locale-all.js'></script>
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
      }/*,
      validRange: {
    	start: <?php echo json_encode($datetime_string) ?>,
  	  }*/,
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
          title: 'All Day Event',
          start: '2019-01-01',
		  editable: false
        },
        {
          title: 'Long Event',
          start: '2019-01-07',
          end: '2019-01-10',
          editable: false
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-09 16:00:00',
		  editable: false
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-16T16:00:00',
		  editable: false
        },
        {
          title: 'Conference',
          start: '1551259800000',
          end: '2019-01-13',
		  editable: false
        },
        {
          title: 'Meeting',
          start: '2019-01-12T10:30:00',
          end: '2019-01-12T12:30:00',
		  editable: false
        },
        {
          title: 'Lunch',
          start: '2019-01-12T12:00:00',
		  editable: false
        },
        {
          title: 'Meeting',
          start: '2019-01-12T14:30:00',
		  editable: false
        },
        {
          title: 'Happy Hour',
          start: '2019-01-12T17:30:00',
		  editable: false
        },
        {
          title: 'Dinner',
          start: '2019-01-12T20:00:00',
		  editable: false
        },
        {
          title: 'Birthday Party',
          start: '2019-01-13T07:00:00',
		  editable: false
        },
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
