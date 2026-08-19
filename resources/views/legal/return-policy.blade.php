@extends('layouts.app')

@section('title', 'Return Policy - Chance Laptops UAE')
@section('description', 'Chance Laptops return policy: checking period, repair, replace or refund for defective goods, change of mind, and return requirements in the UAE.')

@section('content')
<section class="bg-gradient-to-br from-white via-red-50 to-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-red-500/10 border border-red-300/20 rounded-full text-red-600 text-sm font-medium mb-6">
            Chance Laptops · Online Store · UAE
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Return Policy</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto leading-relaxed">
            Checking window, defective-goods remedies, and what we need to process a return or warranty claim.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">1. 7-Day Checking Period</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                Customers are provided a 24 hours checking window starting from the date of purchase. If the laptop is found to be defective, malfunctions, or does not match the specifications agreed upon, the customer is entitled to report the issue. During this period, the item can be evaluated for a prompt repair, an exchange for an equivalent model, or a refund if a replacement is unavailable.
            </p>
        </article>

        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">2. Repair, Replace, or Refund Process</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                In compliance with UAE Consumer Protection laws regarding defective goods, if a hardware issue covered by the warranty arises:
            </p>
            <ul class="space-y-3 text-sm text-gray-700">
                <li>
                    <strong class="text-gray-900">Repair:</strong> The laptop will be repaired at no cost.
                </li>
                <li>
                    <strong class="text-gray-900">Replace:</strong> If a repair is not feasible or takes an unreasonable amount of time, the laptop will be replaced with a model of equivalent brand, specifications, and value.
                </li>
                <li>
                    <strong class="text-gray-900">Refund:</strong> If neither repair nor replacement is possible, a refund will be issued.
                </li>
            </ul>
        </article>

        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">3. Change of Mind</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                In accordance with UAE consumer law, there is no automatic statutory right to return a fully functional, non-defective product simply due to a change of mind. Returns for non-defective items are generally not accepted once the transaction is complete, ensuring the integrity of the used inventory.
            </p>
        </article>

        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">4. Return Requirements</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                For any return or warranty claim to be processed, the customer must present the original sales invoice. The laptop must be returned with all original accessories, chargers, and packaging provided at the time of sale.
            </p>
        </article>

        <p class="text-sm text-gray-600 text-center">
            Hardware warranty details are in our
            <a href="{{ route('warranty') }}" class="text-red-600 font-semibold hover:underline">Warranty Terms</a>.
            For help, contact us on WhatsApp or visit our
            <a href="{{ route('contact-us.index') }}" class="text-red-600 font-semibold hover:underline">Contact</a> page.
        </p>
    </div>
</section>
@endsection
