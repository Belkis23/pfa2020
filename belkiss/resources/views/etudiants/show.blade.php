@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Etudiants' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('etudiants.etudiants.destroy', $etudiants->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('etudiants.etudiants.index') }}" class="btn btn-primary" title="Show All Etudiants">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('etudiants.etudiants.create') }}" class="btn btn-success" title="Create New Etudiants">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('etudiants.etudiants.edit', $etudiants->id ) }}" class="btn btn-primary" title="Edit Etudiants">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Etudiants" onclick="return confirm(&quot;Click Ok to delete Etudiants.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $etudiants->nom }}</dd>
            <dt>Prenom</dt>
            <dd>{{ $etudiants->prenom }}</dd>
            <dt>Tel</dt>
            <dd>{{ $etudiants->tel }}</dd>
            <dt>Addresse</dt>
            <dd>{{ $etudiants->addresse }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $etudiants->photo) }}</dd>

        </dl>

    </div>
</div>

@endsection