@if(Auth::user())
    @if(count(Auth::user()->BankAccounts) < 1)
        <script>
            toastr.warning("Usted no tiene cuenta de banco asociada, 
            Dirijase a su perfil de usuario para asociar una.");
        </script>
    @endif
    @if(count(Auth::user()->wallets) < 1)
        <script>
            toastr.warning("Usted no tiene una wallet asociada. 
                        Dirijase a su perfil de usuario para asociar una.");
        </script>
    @endif
@endif
