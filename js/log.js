

//initialize the calender
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        defaultView: 'dayGridMonth',
        header: {
        left: 'prev,next',
        center: 'title',
        right:'today'
        },
        footer: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
            center: '',
            right:'today'
        },
        eventClick: function(info) {
            
            // change the border color just for fun
            info.el.style.borderColor = 'yellow';
        },
        dateClick: function(info) {
            
            console.log(info.dateStr);
        },
        selectable: true,
        events: [
            {
                title: 'example event 1',
                start: '2019-08-01'
            },
            {
                title: 'example event 2',
                start: '2019-08-07',
                end: '2019-08-10'
            },
            {
                title: 'example event 3',
                start: '2019-08-09T16:00:00'
            },
            {
                title: 'example event 4',
                start: '2019-08-16T16:00:00'
            },
            {
                title: 'example event 5',
                start: '2019-08-11',
                end: '2019-08-13'
            },
            {
                title: 'example event 6',
                start: '2019-08-12T10:30:00',
                end: '2019-08-12T12:30:00'
            }
        ],
    });
    
    calendar.render();
});
