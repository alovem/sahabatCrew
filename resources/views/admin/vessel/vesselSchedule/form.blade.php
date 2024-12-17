@extends('admin.master')
@section('content')

@section('title')
    @if (isset($editModeData))
        @lang('vessel_schedule.edit_vessel_schedule')
    @else
        @lang('vessel_schedule.add_vessel_schedule')
    @endif
@endsection



<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <ol class="breadcrumb">
                <li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                        @lang('dashboard.dashboard')</a></li>
                <li>@yield('title')</li>

            </ol>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <a href="{{ route('vessel.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('vessel_schedule.view_vessel_schedule')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        @if (isset($editModeData))
                            {{ Form::model($editModeData, ['route' => ['vessel.update', $editModeData->vessel_id], 'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'companyForm', 'data-redirect' => route('vessel.index')]) }}
                        @else
                            {{ Form::open(['route' => 'vessel.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'companyForm', 'data-redirect' => route('vessel.index')]) }}
                        @endif

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">@lang('vessel.vessel_name')<span class="validateRq">*</span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'vessel_name',
                                                Input::old('vessel_name'),
                                                $attributes = [
                                                    'class' => 'form-control required vessel_name',
                                                    'id' => 'vessel_name',
                                                    'placeholder' => __('vessel_schedule.vessel_name'),
                                                ],
                                            ) !!}
                                        </div>
                                        <label class="control-label col-md-3">@lang('vessel_schedule.pol')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'pol',
                                                Input::old('pol'),
                                                $attributes = [
                                                    'class' => 'form-control required pol',
                                                    'id' => 'vessel_call_sign',
                                                    'placeholder' => __('vessel_schedule.pol'),
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px;"></div>
                                        <label class="control-label col-md-3">@lang('vessel_schedule.arrival_date')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'arrival_date',
                                                Input::old('arrival_date'),
                                                $attributes = [
                                                    'class' => 'form-control arrival_date',
                                                    'id' => 'arrival_date',
                                                    'placeholder' => __('vessel_schedule.arrival_date'),
                                                ],
                                            ) !!}
                                        </div>
                                        <label class="control-label col-md-3">@lang('vessel_schedule.pod')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'pod',
                                                Input::old('pod'),
                                                $attributes = [
                                                    'class' => 'form-control pod',
                                                    'id' => 'pod',
                                                    'placeholder' => __('vessel_schedule.pod'),
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px;"></div>
                                        <label class="control-label col-md-3">@lang('vessel_schedule.departure_date')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'departure_date',
                                                Input::old('departure_date'),
                                                $attributes = [
                                                    'class' => 'form-control departure_date',
                                                    'id' => 'departure_date',
                                                    'placeholder' => __('vessel_schedule.departure_date'),
                                                ],
                                            ) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-info btn_style"><i
                                                    class="fa fa-pencil"></i>{{ isset($editModeData) ? __('common.update') : __('common.save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
