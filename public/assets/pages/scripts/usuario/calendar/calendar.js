document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      themeSystem: 'bootstrap',
      locale: 'es',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek',
      },
      events: location+'/mostrar',
    //   [
    //     {
    //         title: 'Almacén, componentes y herramientas',
    //         description: 'Lorem ipsum 1...',
    //         start: '2021-06-01 05:00',
    //         // end: '2021-06-01 05:00',
    //         // end: 'null',
    //         color: '#3A87AD',
    //         textColor: '#ffffff',
    //     }
    //     ]


        eventClick: function (info) {
                            // $('#modalEvent').empty();
                            info.jsEvent.preventDefault();
                            $('#modalTitle').empty();
                            $('#modalDescription').empty();
                            $('#modalTitle').append(info.event.title+' '+info.event.start.toLocaleDateString());
                            $('#modalDescription').append(info.event.url);
                            $('#modalEvent').modal("show");
                        },
    });
    calendar.render();
  });
