@extends('layouts.app')

@section('title', 'Terms of Service - Chance Laptops UAE')
@section('description', 'Terms of Service for Chance Laptops in the United Arab Emirates — purchases, delivery, payments, warranty, and store policies.')

@section('content')
<div class="min-h-screen bg-slate-50 py-10 sm:py-14">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="mb-8 text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-red-600 mb-2">Chance Laptops · UAE</p>
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-2">Terms of Service</h1>
            <p class="text-slate-600">Last updated: {{ date('F d, Y') }}</p>
        </header>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8 space-y-8 text-slate-700 leading-relaxed text-sm sm:text-[15px]">

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">1. Acceptance of Terms</h2>
                <p>
                    By accessing <strong>chancelaptops.ae</strong>, placing an order, requesting a quotation, or purchasing from Chance Laptops in the United Arab Emirates,
                    you agree to these Terms of Service. If you do not agree, please do not use our website or services.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">2. About Chance Laptops</h2>
                <p>
                    Chance Laptops is an online technology store serving the UAE. We sell brand-new and used laptops, accessories, and related products,
                    and provide repair and warranty support through our website and WhatsApp.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">3. Products &amp; Pricing</h2>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>All prices are in <strong>UAE Dirhams (AED)</strong> unless otherwise stated.</li>
                    <li>We aim to keep descriptions and prices accurate; errors may be corrected, and we may cancel an order affected by a clear pricing or stock error.</li>
                    <li>Product images are illustrative; actual appearance may vary slightly.</li>
                    <li>Availability is not guaranteed until confirmed. Used or refurbished items are sold as described at the time of sale.</li>
                    <li>Prices and offers may change without prior notice.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">4. Orders, Quotations &amp; Payment</h2>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>An order or quotation request is an offer to buy; acceptance occurs when we confirm and/or process payment.</li>
                    <li>Payment methods currently include arrangements via WhatsApp and our online store. <strong>Tamara</strong>, <strong>Tabby</strong>, and <strong>bank transfer</strong> options may be offered as “coming soon” and will apply only when enabled.</li>
                    <li>Ownership of goods generally passes after full payment is received. Warranty validity also requires full payment, as stated in our Warranty Terms.</li>
                    <li>We may refuse or cancel orders that appear fraudulent, incomplete, or unable to be fulfilled.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">5. Delivery Across the UAE</h2>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>We offer <strong>Across the UAE Express Delivery</strong> where available.</li>
                    <li>Delivery charges may be payable on receipt of the parcel, unless otherwise agreed.</li>
                    <li>Estimated delivery times are guidance only and may vary by emirate, stock location, and courier conditions.</li>
                    <li>Please provide accurate contact and address details. Failed delivery attempts due to incorrect information may incur extra charges.</li>
                    <li>Risk of loss or damage typically transfers on delivery to the address you provided, subject to courier terms.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">6. Online Support Hours</h2>
                <p>
                    Our online store support hours are <strong>{{ config('products.working_hours') }}</strong>.
                    Service capacity may vary; complex repairs or warranty work may require additional time for diagnosis and parts.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">7. Warranty &amp; Repairs</h2>
                <p class="mb-3">
                    Hardware warranty and claim procedures are set out in our
                    <a href="{{ route('warranty') }}" class="text-red-600 font-semibold hover:underline">Warranty Terms</a>.
                    Key points include:
                </p>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>Standard hardware warranty is generally 1 year from the invoice date for covered components, with battery covered for 2 months only.</li>
                    <li>Physical, liquid, and cosmetic damage, misuse, and unauthorized repairs are excluded.</li>
                    <li>Original invoice/proof of purchase is required for claims.</li>
                    <li>No cash refunds for purchased goods; eligible claims are handled by repair, replacement, or another suitable warranty solution.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">8. Returns &amp; Cancellations</h2>
                <p class="mb-3">
                    Returns, the checking window, and repair / replace / refund for defective goods are set out in our
                    <a href="{{ route('return-policy') }}" class="text-red-600 font-semibold hover:underline">Return Policy</a>.
                </p>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>Unless required by UAE consumer protection law or expressly agreed in writing, sales of opened electronics, used items, and custom orders are generally final.</li>
                    <li>If an item arrives defective or incorrect, contact us promptly with your invoice and photos so we can arrange inspection under warranty or our sales policy.</li>
                    <li>Order cancellations before dispatch may be possible at our discretion; after dispatch, courier and restocking considerations may apply.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">9. User Accounts &amp; Website Use</h2>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>You are responsible for keeping account credentials confidential.</li>
                    <li>You must not misuse the website, attempt unauthorized access, scrape content unlawfully, or interfere with site operations.</li>
                    <li>Website content (text, images, branding) belongs to Chance Laptops or its licensors and may not be reused without permission.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">10. Limitation of Liability</h2>
                <p>
                    To the fullest extent permitted by UAE law, Chance Laptops is not liable for indirect, incidental, or consequential losses
                    (including data loss, lost profits, or business interruption) arising from use of our products, website, or services.
                    Our total liability for any claim relating to a product or service is limited to the amount you paid for that product or service,
                    except where liability cannot be limited by law.
                </p>
                <p class="mt-3">
                    Customers are responsible for backing up data before repair or warranty service. We cannot guarantee preservation of data during diagnosis or repair.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">11. Privacy</h2>
                <p>
                    Personal data is handled according to our
                    <a href="{{ route('privacy-policy') }}" class="text-red-600 font-semibold hover:underline">Privacy Policy</a>.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">12. Governing Law</h2>
                <p>
                    These Terms are governed by the laws of the United Arab Emirates. Disputes shall be subject to the courts of the United Arab Emirates,
                    without prejudice to any mandatory consumer rights under UAE law.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">13. Changes</h2>
                <p>
                    We may update these Terms from time to time. The “Last updated” date will be revised when changes are published.
                    Continued use of our services after changes constitutes acceptance of the updated Terms.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">14. Contact</h2>
                <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 space-y-1">
                    <p class="font-semibold text-slate-900">Chance Laptops · Online Store</p>
                    <p>Email: <a href="mailto:info@chancelaptops.ae" class="text-red-600 hover:underline">info@chancelaptops.ae</a></p>
                    <p>Phone / WhatsApp: <a href="tel:+{{ config('products.phone_tel') }}" class="text-red-600 hover:underline">{{ config('products.phone_display') }}</a></p>
                    <p>Hours: {{ config('products.working_hours') }}</p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
