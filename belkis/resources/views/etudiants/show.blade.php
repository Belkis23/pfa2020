@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Etudiant' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('etudiants.etudiant.destroy', $etudiant->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('etudiants.etudiant.index') }}" class="btn btn-primary" title="Show All Etudiant">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('etudiants.etudiant.create') }}" class="btn btn-success" title="Create New Etudiant">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('etudiants.etudiant.edit', $etudiant->id ) }}" class="btn btn-primary" title="Edit Etudiant">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Etudiant" onclick="return confirm(&quot;Click Ok to delete Etudiant.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $etudiant->nom }}</dd>
            <dt>Prenom</dt>
            <dd>{{ $etudiant->prenom }}</dd>
            <dt>Tel</dt>
            <dd>{{ $etudiant->tel }}</dd>
            <dt>Addresse</dt>
            <dd>{{ $etudiant->addresse }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $etudiant->photo) }}</dd>

        </dl>

    </div>
</div>

@endsection