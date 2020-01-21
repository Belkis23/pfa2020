@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Clubs' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clubs.clubs.destroy', $clubs->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clubs.clubs.index') }}" class="btn btn-primary" title="Show All Clubs">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clubs.clubs.create') }}" class="btn btn-success" title="Create New Clubs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clubs.clubs.edit', $clubs->id ) }}" class="btn btn-primary" title="Edit Clubs">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Clubs" onclick="return confirm(&quot;Click Ok to delete Clubs.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $clubs->nom }}</dd>
            <dt>Email</dt>
            <dd>{{ $clubs->email }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $clubs->photo) }}</dd>

        </dl>

    </div>
</div>

@endsection