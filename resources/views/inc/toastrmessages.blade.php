@if(count($errors)>0)
    @foreach($errors->all() as $error)
            <script>
                console.log('hola');
                toastr.error({{ $error }});
            </script>
    @endforeach
@endif