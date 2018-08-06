@if(Auth::user())
    @if(count(Auth::user()->BankAccounts) < 1)
            <div class="alert alert-danger">
                <p>
                    En estos momentos no tiene una cuenta de banco asociada. 
                    Para asociar una, por favor digirse a su perfil de usuario.
                </p>
            </div>
    @endif
@endif
@if(count($errors)>0)
    @foreach($errors as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
    @endforeach
@endif