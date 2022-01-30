<html>
<head></head>
<body>
<div
    style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>{{$data['message']}}</h3></div>
</div>

{{$data['candidate_id']}}<br/>
{{$data['candidate_name']}}<br/>
{{$data['candidate_email']}}<br/>
{{$data['candidate_phone']}}<br/>
{{$data['covering_letter']}}<br/>
{{$data['vacancy_id']}}<br/>
{{$data['vacancy_name']}}<br/>


{{--'message' => $event->date->message,
'candidate_id' => $event->date->candidate_id,
'candidate_name' => $event->date->candidate_name,
'candidate_email' => $event->date->candidate_email,
'covering_letter' => $event->date->covering_letter,
'vacancy_id' => $event->date->vacancy_id,
'vacancy_name' => $event->date->vacancy_name,--}}




{{--<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;">

        <p>Company <b>{{$data['company_name']}}</b></p>

        <p>
             {{$data['message']}}
            to vacancy <a href="{{env('APP_URL')}}/detail-page/vacancy/{{$data['vacancy_id']}}">
                <b>{{$data['vacancy_name']}}</b></a>!
            <br/>
            Please contact us for details:
        </p>

        <ul>
            <li style="list-style-type: none;">Email: <a href="mailto:{{$data['company_email']}}">{{$data['company_email']}}</a></li>
            <li style="list-style-type: none;">Phone: <a href="tel:{{$data['company_phone']}}">{{$data['company_phone']}}</a></li>
            <li style="list-style-type: none;">Website: <a href="{{$data['company_website']}}">{{$data['company_website']}}</a></li>
        </ul>
    </div>
</div>--}}

<div
    style="display: table; width: 100%; text-align: center; height: 40px; background: #00D363; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;"><h3>JobBoard contact email: {{$data['email']}}</h3></div>
</div>

</body>
</html>
