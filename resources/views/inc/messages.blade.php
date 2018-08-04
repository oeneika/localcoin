@if(count(Auth::user()->BankAccounts) < 1)
        <div class="alert alert-danger">
            <p>
                En estos momentos no tiene una cuenta de banco asociada. 
                Para asociar una, por favor digirse a su perfil de usuario.
            </p>
        </div>
@endif