import Calendar from 'tui-calendar'; // Es modules

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var currentMonthYearEl = document.getElementById('current-month-year');
    var tasks = JSON.parse(calendarEl.dataset.tasks);

    var calendar = new Calendar(calendarEl, {
        defaultView: 'month',
        taskView: false, // Disable task view
        scheduleView: ['allday'], // Enable only all-day view
        useCreationPopup: true,
        useDetailPopup: true,
        template: {
            monthDayname: function(dayname) {
                return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
            }
        }
    });

    // Fonction pour obtenir le nom du mois en français
    function getMonthName(monthIndex) {
        const monthNames = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];
        return monthNames[monthIndex];
    }

    function updateMonthYear() {
        var viewName = calendar.getViewName();
        if (viewName === 'month') {
            var date = calendar.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();
            currentMonthYearEl.textContent = `${getMonthName(month)} ${year}`;
        } else {
            currentMonthYearEl.textContent = '';
        }
    }

    // Initial update
    updateMonthYear();

    // Ajoutez les événements ici
    tasks.forEach(function(task) {
        calendar.createSchedules([{
            id: task.id,
            calendarId: '1',
            title: task.title,
            category: 'allday', // Ensure this is marked as an all-day event
            dueDateClass: '',
            start: task.start_time ? `${task.due_date}T${task.start_time}` : task.due_date,
            end: task.end_time ? `${task.due_date}T${task.end_time}` : task.due_date,
            isAllDay: true // Ensure this is marked as an all-day event
        }]);
    });

    // Navigation buttons
    document.getElementById('prev-btn').addEventListener('click', function() {
        calendar.prev();
        updateMonthYear();
    });

    document.getElementById('next-btn').addEventListener('click', function() {
        calendar.next();
        updateMonthYear();
    });

    // View change buttons
    document.getElementById('day-btn').addEventListener('click', function() {
        calendar.changeView('day', true);
        updateMonthYear();
    });

    document.getElementById('week-btn').addEventListener('click', function() {
        calendar.changeView('week', true);
        updateMonthYear();
    });

    document.getElementById('month-btn').addEventListener('click', function() {
        calendar.changeView('month', true);
        updateMonthYear();
    });

    // Update month and year when the view is changed programmatically
    calendar.on('afterRender', function() {
        updateMonthYear();
    });
});