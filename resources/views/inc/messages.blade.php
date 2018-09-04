@if(Auth::user())
    @if(count(Auth::user()->BankAccounts) < 1)
        <div class="content">
                <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <p>
                        Usted no tiene cuenta de banco asociada. 
                        Dirijase a su perfil de usuario para asociar una.
                    </p>
                </div>
        </div>
    @endif
    @if(count(Auth::user()->wallets) < 1)
        <div class="content">
                <div class="alert alert-danger fade show">
                    <span class="close" data-dismiss="alert">×</span>
                    <p>
                        Usted no tiene una wallet asociada. 
                        Dirijase a su perfil de usuario para asociar una.
                    </p>
                </div>
        </div>
    @endif
@endif
