@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Administrations' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('administrations.administrations.destroy', $administrations->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('administrations.administrations.index') }}" class="btn btn-primary" title="Show All Administrations">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('administrations.administrations.create') }}" class="btn btn-success" title="Create New Administrations">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('administrations.administrations.edit', $administrations->id ) }}" class="btn btn-primary" title="Edit Administrations">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Administrations" onclick="return confirm(&quot;Click Ok to delete Administrations.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $administrations->nom }}</dd>
            <dt>Tel</dt>
            <dd>{{ $administrations->tel }}</dd>
            <dt>Addresse</dt>
            <dd>{{ $administrations->addresse }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $administrations->photo) }}</dd>

        </dl>

    </div>
</div>

@endsection