<?php $i=1;?>
	@foreach($users as $user)
	<tr>
		<td>{{$i}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$arrUserGroup[$user->user_type]}}</td>
		<td align="center"><a
			href='{{URL::to("admin/status")}}/{{$user->status}}/{{$user->id}}'>
		@if($user->status == 1) <span class="icon-ok success"></span> @else <span
			class="icon-remove danger"></span> @endif </a></td>
		<td align="center"><a title="Edit"
			href="{{URL::to('admin/edit')}}/{{$user->id}}"><i
			class="icon-edit primary"></i></a> <a title="Delete"
			href="{{URL::to('admin/delete')}}/{{$user->id}}"
			onclick="return confirm('Are you sure you want to delete this item?');"><i
			class='icon-trash danger'></i></a></td>
	</tr>
	<?php $i++;?>
@endforeach