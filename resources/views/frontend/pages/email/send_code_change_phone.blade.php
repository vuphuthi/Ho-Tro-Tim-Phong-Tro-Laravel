@extends('frontend.layouts.app_mail')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Xin chào:  {{ $user->name }},</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Mã code của bạn là <b>{{ $user->code }}</b></p>
        </td>
    </tr>
@stop
