@php($cols = DB::getSchemaBuilder()->getColumnListing($data->getTable()))

{{ $data->getTable() }}:
<table class="tabla_ejemplo">
	<tr>
		@foreach($cols as $col)
			<th>{{ $col }}</th>
		@endforeach
	</tr>
	<tr>
		@foreach($cols as $col)
			@if($data[$col])
				<td>{{ $data[$col] }}</td>
			@else
				<td><small class="text-muted"><em>null</em></small></td>
			@endif
		@endforeach
	</tr>
</table>