<!DOCTYPE html>

<?php include("../includes/a_config.php");?>
<?php 
include("../includes/conn.php");
include("../includes/sessionconfig.php");
?>

<html>

<head>

	<?php include("../includes/head-tag-contents.php");?>

<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = alert(event.title);
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>


#calendar {
    width: 100%;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
</style>
</head>
<body>
	
	<?php include("../includes/design-top.php");?>
	<?php //include("../includes/navigation.php");?>
	<div class="container" id="main-content">
		<div class="row">
				<div class="col-md-2">
				
				</div>
                <div class="col-md-8">
					
								<div class="col-md-2">
									<a href="../home.php" class="btn btn-success"><div style="font-size:20px; font-weight:bold;">&laquo; Home</div></a>	
								</div>
								<div class="col-md-8">
									
									
									
								</div>
								<div class="col-md-2">
									<a href="remove_events.php" class="btn btn-danger "><div style="font-size:20px; font-weight:bold;">Remove Events &raquo;</div></a>
								</div>
						
				</div>
		</div>
		<h1 style="font-size:30px;">Event Calender</h1>

		<div class="response"></div>
		<div id='calendar'></div>
		<?php include("../includes/footer.php");?>
	</div>
</body>


</html>