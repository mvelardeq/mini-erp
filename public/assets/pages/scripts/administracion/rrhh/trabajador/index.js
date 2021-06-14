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
      events: location+'/calendario',
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
