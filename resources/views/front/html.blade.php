<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	@foreach($chats as $key=> $chat)
<li>

	<a href="{{asset('chats/1/')}}/{{$chats[$key]['id']}}">{{$chat->id}}C</a>	 
	</li>
    
@endforeach
	
</ul>
</body>
</html>