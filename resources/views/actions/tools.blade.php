<?php

$perm_name = $perms['perm_name'];

?>

@if(canAccess($perms['perm_name'], "Edit"))
<a data-toggle="modal" href='#modal-id'>
<span style="cursor:pointer" class="label label-primary edit_row" title="Edit this record" rowid="{{$rowid}}">
	<i class="fa fa-edit"></i> Edit
</span>	
</a>
@endif

&nbsp;

&nbsp;

@if(canAccess($perms['perm_name'], "Delete"))
<span style="cursor:pointer" class="label label-danger delete_row" title="Delete this record" rowid="{{$rowid}}">
	<i class="fa fa-trash"></i> Delete
</span>	
@endif

