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
