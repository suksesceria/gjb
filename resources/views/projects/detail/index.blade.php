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
            <a href="{{ url('/projects/1/progress') }}"
                class="tab {{ (request()->is('projects/*/progress')) ? 'active' : '' }}">Progress</a>
            <a class="tab {{ (request()->is('projects/*/keuangan')) ? 'active' : '' }}" href="{{ url('/projects/1/keuangan') }}">Keuangan</a>
            <a class="tab {{ (request()->is('projects/*/dokumen-pendukung')) ? 'active' : '' }}" href="{{ url('/projects/1/dokumen-pendukung') }}">Dokumen Pendukung</a>
        </div>
        @if (request()->is('projects/*/progress'))
            @include('projects.detail.progress')
        @elseif (request()->is('projects/*/keuangan'))
            @include('projects.detail.finance')
        @elseif (request()->is('projects/*/dokumen-pendukung'))
            @include('projects.detail.additional-document')
        @endif
    </div>
@endsection