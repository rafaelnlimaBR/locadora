<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#Historico" aria-controls="home" role="tab" data-toggle="tab">Historico</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="Historico">
            <section class="content bg-gray-light">
                <div class="row">

                    <ul class="timeline">
                        <li class="time-label">
                            <span class="bg-green" >{!!  date_format($contrato->created_at , 'd/m/Y') !!}</span> Contrato Criado
                        </li>
                        @foreach($contrato->historicos as $r)

                            <li>
                                <i class="bg" style="background: {!! $r->status->cor !!}"> {!! $r->status->nome !!}</i>
                                <div class="timeline-item">
                                    <span class="time">
                                        <i class="fa fa-clock-o"> </i> {!! $r->criado !!}
                                    </span>
                                        <h3 class="timeline-header"><a href="#">{!! $r->status->nome !!}</a>
                                        {!! $r->descricao !!}
                                    </h3>
                                    <div class="timeline-body">
                                        {!! $r->descricao !!}
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </section>

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">...</div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
    </div>

</div>