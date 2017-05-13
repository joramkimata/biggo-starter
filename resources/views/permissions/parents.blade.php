<div class="form-group">
	<label for="status">Permission Parent: </label>
	<select class="form-control validate[required]" data-errormessage-value-missing="Permission Parent is required!" id="permParent" name="permParent" data-prompt-position="bottomRight">
		<option value="">--Select Permision Parent Here--</option>
		<@foreach($perms as $p)
			<option value="{{$p->id}}">{{$p->perm_name}}</option>
		@endforeach
	</select>
</div>


