<p id="basicExample">
    <input type="text" class="date start" />
    <input type="text" class="time start" /> to
    <input type="text" class="time end" />
    <input type="text" class="date end" />
</p>

<!-- include input widgets; this is independent of Datepair.js -->
<link rel="styleshee" type="text/css" href="jquery.timepicker.css" />
<link rel="stylesheet" type="text/css" href="bootstrap-datepicker.css" />
<script type="text/javascript" src="bootstrap-datepicker.js"></script>
<script type="text/javascript" src="jquery.timepicker.js"></script>

<script type="text/javascript" src="datepair.js"></script>
<script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>
