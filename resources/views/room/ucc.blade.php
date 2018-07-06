@extends('app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}" class="btn btn-primary">
        <i class="fa fa-arrow-left"></i> KEMBALI
    </a>
    <hr>

    <div class="outter-room">
        <img src="{{ asset('/images/rm-ucc.png') }}" alt="" class="img-responsive">

        @foreach ($assetsLocations as $assetLocation)
        <img src="{{ asset('/images/marker-default.png') }}" class="marker-default" style="left:{{ $assetLocation->offsetX }}px; top: {{ $assetLocation->offsetY }}px">
        @endforeach
    </div>
</div>

<div class="modal fade" id="modalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">TAMBAH ASSETS</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('store') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="is-required">Assets Id</label>
                        <select name="id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($availableAssets as $availableAsset)
                            <option value="{{ $availableAsset->id }}">{{ $availableAsset->name }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <div class="bg-info" style="padding: 10px">
                            <h4>Development Mode</h4>
                            <input type="text" name="location_id" value="2">
                            <input type="text" name="offsetx" data-target-offsetx>
                            <input type="text" name="offsety" data-target-offsety>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">SUBMIT</button>
                </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$('body').on('click', '.outter-room', function(){
    var el = $(this);
    var elOffset   = el.offset();

    var offsetLeft = event.pageX - elOffset.left - 20;
    var offsetTop  = event.pageY - elOffset.top - 50;


    $('#marker').remove();
    el.append(
        '<img id="marker" src="{{ asset('/images/marker-default.png') }}" class="marker-default" style="left:'+ offsetLeft +'px; top:'+  offsetTop +'px"></img>'
    );

    $('#modalAdd').modal('show');
    $('#modalAdd').on('shown.bs.modal', function(){
        $('[data-target-offsetx]').val(offsetLeft);
        $('[data-target-offsety]').val(offsetTop);
    });
    $('#modalAdd').on('hidden.bs.modal', function(){
        $('#marker').remove();
    })
});
</script>
@endsection
