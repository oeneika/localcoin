<div class="modal fade" id="accountsModal" tabindex="-1" role="dialog" aria-labelledby="accountsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accountsModalLabel">Cuentas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h3>Vendedor</h3>
            @if ($transaction->type == 1)
            {{ $transaction->sub_name }} {{ $transaction->sub_lastname }}
            @else
            {{ $transaction->rec_name }} {{ $transaction->rec_lastname }}
            @endif
            <hr>
            <h5>Cuenta bancaria:</h5>
            <p>01230123012301230123</p>
            <br/>
            <h5>Wallet:</h5>
            <p>01230123012301230123</p>
          </div>
          <div class="col-md-6">
            <h3>Comprador</h3>
            @if ($transaction->type == 1)
            {{ $transaction->rec_name }} {{ $transaction->rec_lastname }}
            @else
            {{ $transaction->sub_name }} {{ $transaction->sub_lastname }}
            @endif
            <hr>
            <h5>Cuenta bancaria:</h5>
            <p>01230123012301230123</p>
            <br/>
            <h5>Wallet:</h5>
            <p>01230123012301230123</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>