@component('mail::message')
# Welcome to UTM Wise

Thanks for signing up! Your account is now active and your free trial has commenced! 🎉

Your trial will last for 7 days, and you can upgrade to a paid plan at any time. 

@component('mail::button', ['url' => route('dashboard')])
Your Dashboard
@endcomponent

One thing to be aware of though - any short domains you set up will be removed upon the expiration of your trial *if* you don't upgrade to a paid plan. Likewise many of your account features will be inaccessible after this time.
@endcomponent