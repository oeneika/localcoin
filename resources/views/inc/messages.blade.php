@if(Auth::user())
    @if(count(Auth::user()->BankAccounts) < 1)
            <div class="alert alert-danger">
                <p>
                    Usted no tiene cuenta de banco asociada. 
                    Dirijase a su perfil de usuario para asociar una.
                </p>
            </div>
    @endif
@endif
@if(count($errors)>0)
    @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
    @endforeach
@endif
