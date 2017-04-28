<form class="navbar-form" method="POST" action="{{ route('search') }}">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="e.g EXC" name="query">
        <div class="input-group-btn">
            <button class=" btn btn-default" name="search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
    {{ csrf_field() }}
</form>