@component('mail::message')
# Introduction

Check out Drenyl's new post today!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
