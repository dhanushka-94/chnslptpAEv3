@extends('layouts.app')

@section('title', 'Privacy Policy - Chance Laptops UAE')
@section('description', 'Privacy Policy for Chance Laptops in the United Arab Emirates — how we collect, use, and protect your personal data.')

@section('content')
<div class="min-h-screen bg-slate-50 py-10 sm:py-14">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="mb-8 text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-red-600 mb-2">Chance Laptops · UAE</p>
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-2">Privacy Policy</h1>
            <p class="text-slate-600">Last updated: {{ date('F d, Y') }}</p>
        </header>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8 space-y-8 text-slate-700 leading-relaxed text-sm sm:text-[15px]">

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">1. Introduction</h2>
                <p>
                    This Privacy Policy explains how <strong>Chance Laptops</strong> (“we”, “us”, or “our”), operating in the United Arab Emirates,
                    collects, uses, stores, and protects personal information when you visit
                    <a href="{{ url('/') }}" class="text-red-600 hover:underline">chancelaptops.ae</a>, place an order, request a quotation,
                    contact us, or shop on our online store.
                </p>
                <p class="mt-3">
                    We process personal data in accordance with applicable UAE laws, including Federal Decree-Law No. 45 of 2021 on the Protection of Personal Data
                    (UAE PDPL), where it applies to our activities.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">2. Information We Collect</h2>
                <h3 class="font-semibold text-slate-900 mb-2">2.1 Information you provide</h3>
                <ul class="list-disc list-inside space-y-1.5 mb-4">
                    <li>Name, email address, phone / WhatsApp number</li>
                    <li>Billing and delivery addresses within the UAE</li>
                    <li>Order, quotation, and warranty claim details</li>
                    <li>Account login details (if you register)</li>
                    <li>Messages you send via WhatsApp, email, forms, or social media</li>
                </ul>
                <h3 class="font-semibold text-slate-900 mb-2">2.2 Information collected automatically</h3>
                <ul class="list-disc list-inside space-y-1.5 mb-4">
                    <li>IP address, browser type, device information</li>
                    <li>Pages visited, referring links, and approximate usage statistics</li>
                    <li>Cookies or similar technologies used for site functionality and analytics</li>
                </ul>
                <h3 class="font-semibold text-slate-900 mb-2">2.3 Payment information</h3>
                <p>
                    When online payment gateways (such as Tamara or Tabby) become available, payment data is processed by those providers.
                    We do not store full card numbers on our servers. Bank transfer details you share with us are used only to confirm payment.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">3. How We Use Your Information</h2>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>Process orders, quotations, deliveries, and warranty claims</li>
                    <li>Communicate about your purchase, repair, or enquiry</li>
                    <li>Provide customer support via phone, WhatsApp, or email</li>
                    <li>Improve our website, products, and services</li>
                    <li>Comply with legal, tax, and accounting obligations in the UAE</li>
                    <li>Prevent fraud, abuse, or security incidents</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">4. Legal Bases</h2>
                <p>We process personal data where necessary to:</p>
                <ul class="list-disc list-inside space-y-1.5 mt-2">
                    <li>Perform a contract with you (orders, repairs, delivery)</li>
                    <li>Comply with UAE legal obligations</li>
                    <li>Pursue legitimate business interests (improving services, securing our systems), balanced against your rights</li>
                    <li>Obtain your consent where required (for example, optional marketing messages)</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">5. Sharing Your Information</h2>
                <p class="mb-3">We do not sell your personal data. We may share information with:</p>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>Delivery and logistics partners for UAE shipments</li>
                    <li>Payment providers and banks (when you choose those methods)</li>
                    <li>IT, hosting, email, and analytics service providers who support our operations</li>
                    <li>Manufacturers or authorized service partners for warranty assessment, where needed</li>
                    <li>Authorities when required by UAE law</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">6. Data Storage &amp; Security</h2>
                <p>
                    We store personal data only as long as needed for the purposes above, or as required by UAE commercial and tax rules.
                    We use reasonable technical and organizational measures to protect your information. No method of transmission or storage is completely secure;
                    please contact us immediately if you suspect unauthorized use of your account or data.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">7. Cookies</h2>
                <p>
                    Our website may use essential cookies for login, cart, and security, and optional analytics cookies to understand site usage.
                    You can control cookies through your browser settings. Disabling some cookies may affect site features.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">8. Your Rights</h2>
                <p class="mb-3">Subject to applicable UAE law, you may request to:</p>
                <ul class="list-disc list-inside space-y-1.5">
                    <li>Access the personal data we hold about you</li>
                    <li>Correct inaccurate or incomplete data</li>
                    <li>Request deletion or restriction where legally allowed</li>
                    <li>Object to certain processing, including direct marketing</li>
                    <li>Withdraw consent where processing is based on consent</li>
                </ul>
                <p class="mt-3">To exercise these rights, contact us using the details below. We may need to verify your identity before responding.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">9. Children’s Privacy</h2>
                <p>
                    Our services are intended for adults and businesses. We do not knowingly collect personal data from children under 16 without appropriate guardian involvement.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">10. Changes to This Policy</h2>
                <p>
                    We may update this Privacy Policy from time to time. The “Last updated” date at the top will change when we do.
                    Continued use of our website or services after updates means you acknowledge the revised policy.
                </p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-slate-900 mb-3">11. Contact Us</h2>
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
