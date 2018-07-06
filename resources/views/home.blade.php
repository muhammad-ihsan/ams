@extends('app')

@section('content')
<div class="container">
	<div class="row" style="display: flex; width: 100%; height: 100vh; align-items: center;">
		<div class="col-xs-6">
			<a href="{{ route('room', ['param' => 'ccp']) }}" class="btn btn-primary btn-block">CCP ROOM</a>
		</div>

		<div class="col-xs-6">
			<a href="{{ route('room', ['param' => 'ucc']) }}" class="btn btn-primary btn-block">UCC ROOM</a>
		</div>
	</div>
</div>
@endsection
