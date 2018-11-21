@extends("Admin.public")
@section('content')
<div id="content">
<center>
	<h1>Welcom {{session('admin')->username}} come back!</h1>

@if(session('error'))
<script type="text/javascript">
	alert('{{session('error')}}');
</script>
@endif
</center>
</div>
@endsection