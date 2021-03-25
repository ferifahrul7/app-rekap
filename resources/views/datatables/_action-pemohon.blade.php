<a href="{{ $edit_url }}" class='btn btn-warning btn-sm btn-xs'>
        <i class="fas fa-pencil-alt"></i>
    </a>
    
	{!! Form::button('<i class="fas fa-trash"></i>', [
		'type'  => 'button',
		'class' => 'btn btn-danger btn-sm btn-xs',
        'id'    => 'delete',
        'data-idx' => $idx,
        'data-name' => $name
	]) !!}