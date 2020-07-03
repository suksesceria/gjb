@extends('layouts.master')

@section('style')
    <style>
        .detail-progress {
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="mb-5">
            <a href="{{ url('/projects/'. Request::route('id') .'/progress') }}"
                class="tab {{ (request()->is('projects/*/progress')) ? 'active' : '' }}">Progress</a>
            <a class="tab {{ (request()->is('projects/*/keuangan')) ? 'active' : '' }}" href="{{ url('/projects/'. Request::route('id') .'/keuangan') }}">Keuangan</a>
            <a class="tab {{ (request()->is('projects/*/dokumen-pendukung')) ? 'active' : '' }}" href="{{ url('/projects/'. Request::route('id') .'/dokumen-pendukung') }}">Dokumen Pendukung</a>
        </div>
        @if (request()->is('projects/*/progress'))
            @include('projects.detail.progress')
        @elseif (request()->is('projects/*/keuangan') || request()->is('projects/*/keuangan-nyata') || request()->is('projects/*/laporan-material'))
            @include('projects.detail.finance')
        @elseif (request()->is('projects/*/dokumen-pendukung'))
            @include('projects.detail.additional-document')
        @endif
    </div>
@endsection
