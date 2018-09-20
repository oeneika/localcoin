@extends('layouts.layout-trade')
@section('header_section')
<link href="{{ asset('css/estilos-trade.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- begin #content -->
    <div id="content" class="content">
        <div class="row">
            <div class="col-md-6">
                    <!-- begin widget-chat -->
                    <div class="widget-chat widget-chat-rounded">
                      <!-- begin widget-chat-header -->
                      <div class="widget-chat-header">
                        <div class="widget-chat-header-icon">
                          <i class="fab fa-earlybirds width-30 height-30 f-s-20 bg-yellow text-inverse text-center rounded-corner" style="line-height: 30px"></i>
                        </div>
                        <div class="widget-chat-header-content">
                          <h4 class="widget-chat-header-title">Enviar mensaje a {{ $transaction->submittingUser->user }}</h4>
                        </div>
                      </div>
                      <!-- end widget-chat-header -->
                      
                      <!-- begin widget-chat-body -->
                      <div class="widget-chat-body" id="chat_body" data-scrollbar="true" data-height="235px">
                        
                        @foreach ($transaction->messages as $message)
                          @if($message->user->id == Auth::user()->id)
                            <div class="widget-chat-item with-media right">
                              <div class="widget-chat-media">
                                  <img alt="" src="../assets/img/user/user-1.jpg" />
                              </div>
                              <div class="widget-chat-info">
                                  <div class="widget-chat-info-container">
                                      <div class="widget-chat-name text-indigo">{{ $message->user->user }}</div>
                                      <div class="widget-chat-message">{{ $message->content }}</div>
                                      {{-- <divclass="widget-chat-time">6:00PM</div> --}}
                                  </div>
                              </div>
                            </div>
                          @else
                            <div class="widget-chat-item with-media left">
                              <div class="widget-chat-media">
                                  <img alt="" src="../assets/img/user/user-1.jpg" />
                              </div>
                              <div class="widget-chat-info">
                                  <div class="widget-chat-info-container">
                                      <div class="widget-chat-name text-indigo">{{ $message->user->user }}</div>
                                      <div class="widget-chat-message">{{ $message->content }}</div>
                                      {{-- <divclass="widget-chat-time">6:00PM</div> --}}
                                  </div>
                              </div>
                            </div>
                          @endif
                        @endforeach
                      </div>
                      <!-- end widget-chat-body -->
                      
                      <!-- begin widget-input -->
                      <div class="widget-input widget-input-rounded">
                        <form id="chat_form">
                          {{ csrf_field() }}
                          <input type="hidden" name="id_transaction" value="{{ $transaction->id_transaction }}">
                          <div class="widget-input-container">
                            <div class="widget-input-icon"><a href="#" class="text-grey"><i class="fa fa-camera"></i></a></div>
                            <div class="widget-input-box">
                              <input type="text" name='content' class="form-control form-control-sm" placeholder="Write a message..." />
                            </div>
                        
                          </div>
                        </form>
                      </div>
                      <!-- end widget-input -->
                    </div>
                    <!-- end widget-chat -->
            </div>
            <div class="col-md-6">
                <!-- begin #accordion -->
                    <div id="accordion" class="card-accordion">
                        <h3 class="panel-title"><strong>Preguntas frecuentes</strong></h3>
                        <br>
                        <!-- begin card -->
                        <div class="card">
                            <div class="card-header verdecito text-white pointer-cursor" data-toggle="collapse" data-target="#collapseOne">
                                Pagar al vendedor
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <!-- begin card -->
                        <div class="card">
                            <div class="card-header verdecito text-white pointer-cursor collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                Confirmar el pago
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    <hr>
                                    @if($transaction->approved_payment == 0)
                                        <button onclick="confirmar()" class="btn btn-primary">He pagado</button>
                                    @else
                                        Ya confirmó el pago
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <!-- begin card -->
                        <div class="card">
                            <div class="card-header verdecito text-white pointer-cursor collapsed" data-toggle="collapse" data-target="#collapseThree">
                                ¿Cómo cancelar el intercambio?
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end #accordion -->
            </div>
        </div>
    </div>
<!-- end #content -->
@endsection

@section('footer_section')
<script>
	function confirmar(){
		swal({
          title: "¿Estás seguro?",
          text: "¿Desea confirmar el pago?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then(function(confirm){
          if (confirm) {
            $.ajax({
                type: 'PUT',
                url: "{{ route('approvePayment',['id'=>$transaction->id_transaction]) }}",
                dataType: 'json',
                data: { "_token" : "{{ csrf_token() }}" }, 
                success: function(json){
                    if(json.success == 1) {
                        setTimeout(function(){
                            toastr.success(json.message);
                            location.reload(true);
                        },1000);
                    } 
                    else{
                        toastr.error(json.message);
                    }
                }
            });  
            swal("¡Se ha confirmado el pago!", {
              icon: "success",
            });
          } else {
            swal("¡Tranquilo!, se canceló la confirmación");
          }
        });
	}
</script>
<script>
    Echo.private(`chat`)
    .listen('.message_sent', function(e){
        $('#chat_body').append(
            `<div class="widget-chat-item with-media ${ e.id_user == {{ Auth::user()->id }} ? 'right' : 'left' }">
              <div class="widget-chat-media">
                  <img alt="" src="../assets/img/user/user-1.jpg" />
              </div>
              <div class="widget-chat-info">
                  <div class="widget-chat-info-container">
                      <div class="widget-chat-name text-indigo">${e.user}</div>
                      <div class="widget-chat-message">${e.content}</div>
                  </div>
              </div>
            </div>`
            )
        $('#chat_body').animate({scrollTop:$('#chat_body').height()}, 'slow');
        $('#chat_form').trigger('reset');
        
    });
</script>
<script src="{{ asset('js/messages/messages.js') }}"></script>
@endsection