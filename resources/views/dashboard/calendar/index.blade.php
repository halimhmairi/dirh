 @extends('layouts.app')
 @section('content')
    <div class="container mt-5" style="max-width: 700px"> 
    <div id='full_calendar_events'></div>
    <div class="filter">
    <h3>Filter</h3> 
    @foreach($leaveTypes as $leaveType)
    <div class="event_filter_wrapper">
      <input id="{{$leaveType->name}}" class="event_filter" name="event_filter_sel" type="checkbox" value="{{$leaveType->name}}" data-type="{{$leaveType->name}}" checked="true" />
      <label for="{{$leaveType->name}}">{{$leaveType->name}}</label>
    </div>
    @endforeach 
  </div>
       
    </div>
   
    <script>
        $(document).ready(function () {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#full_calendar_events').fullCalendar({
                editable: true,
                editable: true,
                events: SITEURL + "/calendar",
                displayEventTime: true,
                eventRender: function (event, element, view) {
                   
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }


                },
                selectable: true,
                selectHelper: true,
                select: function (event_start, event_end, allDay) { 
                    var event_name = prompt('Event Name:');
                    if (event_name) {
                        var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                        var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + "/calendar-crud-ajax",
                            data: {
                                event_name: event_name,
                                event_start: event_start,
                                event_end: event_end,
                                type: 'create'
                            },
                            type: "POST",
                            success: function (data) {
                                displayMessage("Event created.");
                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: event_name,
                                    start: event_start,
                                    end: event_end,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function (event, delta) {
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.event_name,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function (response) {
                            displayMessage("Event updated");
                        }
                    });
                },
                eventClick: function (event) {
                    var eventDelete = confirm("Are you sure?");
                    if (eventDelete) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event removed");
                            }
                        });
                    }
                }
            });

            $('input[class=event_filter]').change(function() {
                calendar.render();
            });
        });
        function displayMessage(message) {
            toastr.success(message, 'Event');            
        }
    </script>
@endsection
 