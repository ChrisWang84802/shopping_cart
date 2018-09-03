<html align="center">
<style>
	.pagination li{
		display:inline;
	}
</style>

<script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'wang84802',
      cookie     : true,
      xfbml      : true,
      version    : '3.1'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

@if ($errors->has('title'))
	<strong>{{ $errors->first('title') }}</strong>
@endif


@foreach ($todos as $todo)
	<p>
		<form action="{{ url("todo/$todo->id") }}" method="POST">	
		{{ $todo->title }}
		<br>
		{{ $todo->body }}
		<br>
		{{ $todo->created_at }}
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="submit" value="Delete">
		</form>

	</p>
@endforeach
	
	<p nowrap>
		{{ $todos->links() }}
	</p>

<form action="{{ url('todo') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" placeholder="title" name="title">
	<br>
	<input type="text" placeholder="body" name="body">
	<br>
	<input type="submit" value="create">
</form>
</html>
