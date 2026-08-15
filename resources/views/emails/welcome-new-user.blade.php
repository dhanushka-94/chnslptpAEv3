@component('mail::message')
# Welcome to CHANCE LAPTOPS!

Hello {{ $user->name }},

Welcome to CHANCE LAPTOPS! We're excited to have you as part of our community.

## What's Next?

Now that you have an account, you can:

- **Browse our products** with personalized recommendations
- **Track your orders** in real-time
- **Save multiple addresses** for faster checkout
- **Access exclusive deals** and early sales
- **Reorder** your favorite products with one click

@component('mail::button', ['url' => route('user.dashboard')])
Go to Your Dashboard
@endcomponent

## Getting Started

Here are some things you might want to do:

1. **Complete your profile** - Add your phone number and address for faster checkout
2. **Browse our categories** - Discover our wide range of computer products
3. **Set up your preferences** - Save your delivery addresses

@component('mail::panel')
**Special Offer for New Customers**

As a welcome gift, you'll receive notifications about our exclusive deals and new product launches!
@endcomponent

## Need Help?

Our customer support team is here to help:

- **Phone:** 0112 95 9005
- **WhatsApp:** +94 777 506 939
- **Email:** info@chancelaptops.ae

@component('mail::button', ['url' => route('home')])
Start Shopping
@endcomponent

Thank you for choosing CHANCE LAPTOPS!

Best regards,  
The CHANCE LAPTOPS Team

@component('mail::subcopy')
Follow us on social media for the latest updates:
- Facebook: CHANCE LAPTOPS
- Instagram: @chancelaptops
- YouTube: CHANCE LAPTOPS Sri Lanka
@endcomponent
@endcomponent