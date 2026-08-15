@extends('layouts.app')

@section('title', 'Warranty Terms - Chance Laptops')
@section('description', '1-year hardware warranty coverage, exclusions, claim process, and customer responsibilities from Chance Laptops, Sharjah, UAE.')

@section('content')
<section class="bg-gradient-to-br from-white via-red-50 to-white py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center px-4 py-2 bg-red-500/10 border border-red-300/20 rounded-full text-red-600 text-sm font-medium mb-6">
            Chance Laptops · Sharjah, UAE
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Warranty Terms</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto leading-relaxed">
            Clear coverage for manufacturing defects. The original invoice is required for all warranty claims.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        {{-- 1 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">1. Warranty Coverage – 1-Year Hardware Warranty</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                The standard hardware warranty is valid for <strong>1 year from the invoice date</strong> and covers manufacturing defects affecting the following components:
            </p>
            <ul class="grid sm:grid-cols-2 gap-2 text-sm text-gray-700 mb-4 list-disc list-inside">
                <li>Motherboard / System Board</li>
                <li>Processor (CPU)</li>
                <li>RAM / Memory</li>
                <li>Internal Storage (SSD/HDD)</li>
                <li>Keyboard</li>
                <li>Wi-Fi / Bluetooth Module</li>
                <li>Touchpad</li>
                <li>Internal Speakers</li>
                <li>Cooling Fan</li>
                <li>Charging Port</li>
            </ul>
            <p class="text-gray-700 text-sm leading-relaxed mb-2">
                <strong>Battery:</strong> The battery is covered for <strong>2 months only</strong>, as it is considered a consumable component.
            </p>
            <p class="text-gray-700 text-sm leading-relaxed">
                The warranty is valid only after <strong>full payment</strong> has been made.
            </p>
        </article>

        {{-- 2 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">2. Warranty Exclusions – Not Covered</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-4">
                The warranty applies only to manufacturing defects. It does not cover:
            </p>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>Physical or accidental damage.</li>
                <li>Liquid or moisture damage.</li>
                <li>Scratches, dents, cracks, fading, rust, or other cosmetic damage.</li>
                <li>Damage caused by normal wear and tear.</li>
                <li>Damage caused by lightning, power surges, fire, natural disasters, or other external causes.</li>
                <li>Damage caused by food, beverages, or other liquid spills.</li>
                <li>Damage caused by misuse, negligence, improper handling, or incorrect charging equipment.</li>
                <li>Repairs, modifications, or tampering carried out by unauthorized or inexperienced persons.</li>
                <li>Any damage to, removal of, or tampering with the warranty sticker/seal. This will automatically void the warranty.</li>
                <li>Cables and color/RGB fans are not covered under warranty.</li>
            </ul>
        </article>

        {{-- 3 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">3. Proof of Purchase &amp; Warranty Eligibility</h2>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                <li>The original invoice/bill must be presented when making a warranty claim.</li>
                <li>A warranty claim cannot be accepted without valid proof of purchase.</li>
                <li>The warranty begins from the invoice date, is non-transferable, and cannot be extended.</li>
            </ul>
        </article>

        {{-- 4 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">4. Warranty Claim Process</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-3">To make a warranty claim:</p>
            <ol class="space-y-2 text-sm text-gray-700 list-decimal list-inside mb-4">
                <li>Contact us via WhatsApp or phone and provide your invoice number.</li>
                <li>Send the device together with the original invoice for inspection.</li>
                <li>Initial diagnosis will normally be carried out within <strong>24–72 hours</strong>.</li>
                <li>If the issue is covered by warranty, the defective component will be repaired or replaced without additional charge.</li>
                <li>If the issue is not covered by warranty, you will be informed and a repair quotation will be provided before any paid repair is carried out.</li>
            </ol>
            <p class="text-gray-700 text-sm leading-relaxed">
                Depending on the nature of the fault, parts availability, and supplier/manufacturer processing time, a warranty repair or replacement may take approximately <strong>3 to 30 days</strong>. We will make every reasonable effort to complete the warranty service as quickly as possible.
            </p>
        </article>

        {{-- 5 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">5. Repair / Replacement Policy</h2>
            <div class="space-y-3 text-sm text-gray-700 leading-relaxed">
                <p>Where possible, defective items will first be repaired. If repair is not possible, the defective component or device may be replaced with an equivalent or comparable item, depending on product and technology availability at the time of the warranty claim.</p>
                <p>Replacement products or components may not always be identical to the original model, especially where the original product has been discontinued or is no longer available.</p>
                <p>Where applicable, the value, age, condition, or depreciation of the returned product may be considered when providing an alternative replacement.</p>
                <p>The final warranty decision may also depend on the assessment and decision of the relevant manufacturer, supplier, or authorized service provider.</p>
            </div>
        </article>

        {{-- 6 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">6. Accessories &amp; Packaging</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-3">
                For certain accessories and peripheral products, the original packaging must be presented when making a warranty claim. This includes, but is not limited to:
            </p>
            <ul class="grid sm:grid-cols-2 gap-2 text-sm text-gray-700 mb-4 list-disc list-inside">
                <li>Mouse</li>
                <li>Keyboards</li>
                <li>Speakers</li>
                <li>Power Adapters / Chargers</li>
                <li>Web Cameras</li>
                <li>Headsets</li>
                <li>Card Readers</li>
            </ul>
            <p class="text-gray-700 text-sm leading-relaxed">
                Failure to provide the required packaging may affect warranty eligibility for these items.
            </p>
        </article>

        {{-- 7 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">7. Monitor Dead Pixel Warranty</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-3">
                Dead/stuck pixel warranty applies only to <strong>brand-new monitors</strong>. A warranty claim for dead pixels will be considered only when there are:
            </p>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside mb-3">
                <li><strong>3 or more</strong> colored pixels, or</li>
                <li><strong>5 or more</strong> black or white pixels.</li>
            </ul>
            <p class="text-gray-700 text-sm leading-relaxed">
                Individual pixels below these limits are not covered under the warranty.
            </p>
        </article>

        {{-- 8 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">8. Refunds</h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                No cash refunds will be provided for purchased goods. Eligible warranty claims will be handled through repair, replacement, or another suitable warranty solution, subject to these terms and conditions.
            </p>
        </article>

        {{-- 9 --}}
        <article class="bg-white border border-gray-200 rounded-xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">9. Customer Responsibilities</h2>
            <p class="text-gray-700 text-sm leading-relaxed mb-3">Customers are responsible for:</p>
            <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside mb-4">
                <li>Using the correct and compatible charger/power adapter.</li>
                <li>Protecting the device from physical and liquid damage.</li>
                <li>Maintaining the device properly.</li>
                <li>Avoiding unauthorized repairs or modifications.</li>
                <li>Keeping the warranty sticker/seal intact.</li>
                <li>Regularly backing up important data before submitting the device for repair or warranty service.</li>
            </ul>
            <p class="text-gray-700 text-sm leading-relaxed">
                Customers are responsible for backing up their own data. We cannot guarantee the preservation of data during diagnosis, repair, replacement, or warranty service.
            </p>
        </article>

        <div class="bg-white border border-red-200 rounded-xl p-6 sm:p-8 text-center">
            <h3 class="text-xl font-bold text-gray-900 mb-2">Need Help with a Warranty Claim?</h3>
            <p class="text-gray-600 text-sm mb-4">Contact Chance Laptops with your invoice number.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="tel:+{{ config('products.phone_tel') }}" class="inline-flex justify-center px-6 py-3 bg-white border border-gray-300 hover:border-red-300 text-gray-900 rounded-lg font-semibold transition-colors">
                    {{ config('products.phone_display') }}
                </a>
                <a href="https://wa.me/{{ config('products.whatsapp_number') }}" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center px-6 py-3 bg-[#25D366] hover:bg-[#20bd5a] text-white rounded-lg font-semibold transition-colors">
                    WhatsApp Us
                </a>
            </div>
            <p class="text-gray-500 text-xs mt-4">{{ config('products.store_address') }}</p>
        </div>
    </div>
</section>
@endsection
