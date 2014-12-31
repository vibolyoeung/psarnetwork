<?php $i = 1;?>
	@foreach($markets as $mk)
	<tr>
		<td>{{$i}}</td>
		<td width="9%">{{HTML::image("upload/market/thumb/".$mk->image,
		$mk->title_en,array())}}</td>
		<td>{{$mk->title_en}}</td>
		<td>{{$mk->title_zh}}</td>
		<td width="10%">{{$mk->amount_stair}}</td>
		<td width="11%">
			{{$marketType[$mk->market_type]}}
		</td>
		<td align="center"><a title="Edit"
			href="{{URL::to('admin/edit-market')}}/{{$mk->id}}"> <i
			class="icon-edit primary"></i> </a>
			<a title="Delete"
			href="{{URL::to('admin/delete-market')}}/{{$mk->id}}"
			onclick="return confirm('Are you sure you want to delete this item?');">
			<i class='icon-trash danger'></i> </a>
		</td>
	</tr>
<?php $i++;?>
@endforeach