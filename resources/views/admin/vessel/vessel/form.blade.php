@extends('admin.master')
@section('content')

@section('title')
    @if (isset($editModeData))
        @lang('vessel.edit_vessel')
    @else
        @lang('vessel.add_vessel')
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
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('vessel.view_vessel')</a>
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
                                                    'placeholder' => __('vessel.vessel_name'),
                                                ],
                                            ) !!}
                                        </div>
                                        <label class="control-label col-md-3">@lang('vessel.vessel_call_sign')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'vessel_call_sign',
                                                Input::old('vessel_call_sign'),
                                                $attributes = [
                                                    'class' => 'form-control required vessel_call_sign',
                                                    'id' => 'vessel_call_sign',
                                                    'placeholder' => __('vessel.vessel_call_sign'),
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px;"></div>
                                        <label class="control-label col-md-3">@lang('vessel.vessel_mmsi')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'vessel_mmsi',
                                                Input::old('vessel_mmsi'),
                                                $attributes = [
                                                    'class' => 'form-control vessel_mmsi',
                                                    'id' => 'vessel_mmsi',
                                                    'placeholder' => __('vessel.vessel_mmsi'),
                                                ],
                                            ) !!}
                                        </div>
                                        <label class="control-label col-md-3">@lang('vessel.vessel_imo')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'vessel_imo',
                                                Input::old('vessel_imo'),
                                                $attributes = [
                                                    'class' => 'form-control vessel_imo',
                                                    'id' => 'vessel_imo',
                                                    'placeholder' => __('vessel.vessel_imo'),
                                                ],
                                            ) !!}
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:10px;"></div>
                                        <label class="control-label col-md-3">@lang('vessel.vessel_year_build')<span class="validateRq"></span></label>
                                        <div class="col-md-3">
                                            {!! Form::text(
                                                'vessel_year_build',
                                                Input::old('vessel_year_build'),
                                                $attributes = [
                                                    'class' => 'form-control vessel_year_build',
                                                    'id' => 'vessel_year_build',
                                                    'placeholder' => __('vessel.vessel_year_build'),
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
