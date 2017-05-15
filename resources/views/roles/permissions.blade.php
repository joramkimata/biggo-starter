<?php
	$perms = App\Permission::all();
?>



@if(count($perms) == 0)
	<div class="alert alert-danger">No Permission Found</div>
@else
<form id="rolePerms">

<input type="hidden" name="roleId" value="{{$roleId}}" />

<div class="row">
@foreach($perms as $p)

	@if($p->isparent == 1)
		<div class="col-md-4">
		<h3><input type="checkbox" value="{{$p->id}}" {!!putCheckedOnIT($p->id, $roleId)!!} class="main" name="perms[]" permName="{{$p->perm_name}}" id="{{$p->perm_name}}" /> {{$p->perm_name}}</h3>
		
		<?php 
			$childs = App\Permission::where('permParent', $p->id)->get();
		?>
		<ul>
		@foreach($childs as $c)
			<li> <input type="checkbox" value="{{$c->id}}" {!!putCheckedOnIT($c->id, $roleId)!!} name="perms[]" class="child_{{$p->perm_name}} child" permName="{{$p->perm_name}}" /> {{$c->perm_name}} (<i>{{$c->detail}}</i>)</li>
		@endforeach
		</ul>
		</div>
	@endif

@endforeach

</div>
<br/>
<br/>
<hr/>
<button type="button" id="saveRolePerms" class="btn btn-success">Save Changes</button>
<a href="">
<button type="button"  class="btn btn-warning">BACK</button>
</a>
</form>
@endif
