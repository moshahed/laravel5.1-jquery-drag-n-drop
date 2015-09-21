<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel 5.1 and jQuery UI Sortable</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>
    <script>
        $(function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        });
    </script>
</head>
<body>

    {!! Form::token() !!}
    <h3>Sort User By Drag and Drop</h3>
<ul id="sortable">

    @foreach( $all_user as $value )
        <li class="ui-state-default" data-id="{{ $value->id }}">{{ $value->name }}</li>
    @endforeach

</ul>

</body>
</html>


<script>
    $(document).ready( function () {

        $( "#sortable" ).sortable({
            update: function( ) {
//                console.log('hi');

                var data = [];
                $( "#sortable > li" ).each(function( index, element ) {
                        data.push($(element).data('id')
                    );
                });

                console.log( data );

//                var values = $("#foo").serialize();
                var values = {
                    _token: $("input[name=_token]").val(),
                    _method: 'PUT',
                    data: data
                };


                $.ajax({
//                    url: "http://localhost:8000/user-list/1",
                    url: "http://localhost:8000/user-list/1",
                    method: "POST",
                    data: values,
                    success: function(data){
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });

            }
        });

    } );
</script>