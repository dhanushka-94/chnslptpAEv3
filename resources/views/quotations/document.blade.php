{{-- A4 quotation body (HTML preview + DomPDF) --}}
@php
    $brand = '#E30613';
    $brandDark = '#C40510';
    $ink = '#0f172a';
    $muted = '#64748b';
    $line = '#e2e8f0';
    $soft = '#f8fafc';
    $hasDiscount = ($total_discount ?? 0) > 0;
    $isPdf = !empty($for_pdf);
@endphp
<style>
    @page {
        size: A4 portrait;
        margin: 10mm 10mm 12mm 10mm;
    }

    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        background: #ffffff;
    }

    .qdoc {
        font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
        font-size: {{ $isPdf ? '9.5pt' : '10.5px' }};
        line-height: 1.4;
        color: {{ $ink }};
        background: #ffffff;
        width: 100%;
        max-width: 190mm;
        margin: 0 auto;
    }
    .qdoc table { max-width: 100%; }
    .qdoc img { max-width: 100%; }

    .qdoc .accent-bar {
        height: 4px;
        background: {{ $brand }};
        margin: 0 0 12px 0;
    }

    .qdoc .header-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 14px;
        table-layout: fixed;
    }
    .qdoc .header-table td { vertical-align: top; }

    .qdoc .logo {
        width: 120px;
        height: auto;
        display: block;
        margin: 0 0 8px 0;
    }
    .qdoc .brand-name {
        font-size: {{ $isPdf ? '12pt' : '15px' }};
        font-weight: 700;
        color: {{ $ink }};
    }
    .qdoc .brand-tag {
        font-size: {{ $isPdf ? '8pt' : '9px' }};
        color: {{ $muted }};
        margin-top: 2px;
    }
    .qdoc .contact-line {
        margin-top: 8px;
        font-size: {{ $isPdf ? '8pt' : '9px' }};
        color: {{ $muted }};
        line-height: 1.55;
    }
    .qdoc .contact-line strong { color: {{ $brand }}; }

    .qdoc .quote-panel {
        background: {{ $soft }};
        border: 1px solid #fecaca;
        border-left: 4px solid {{ $brand }};
        padding: 10px 12px;
        text-align: right;
    }
    .qdoc .quote-kicker {
        font-size: {{ $isPdf ? '7pt' : '8px' }};
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: {{ $brand }};
        margin-bottom: 2px;
    }
    .qdoc .quote-title {
        font-size: {{ $isPdf ? '16pt' : '22px' }};
        font-weight: 800;
        color: {{ $ink }};
        margin-bottom: 8px;
    }
    .qdoc .meta-table { width: 100%; font-size: {{ $isPdf ? '8pt' : '9.5px' }}; border-collapse: collapse; }
    .qdoc .meta-table td { padding: 2px 0; }
    .qdoc .meta-table .k { color: {{ $muted }}; text-align: left; }
    .qdoc .meta-table .v { font-weight: 700; color: {{ $ink }}; text-align: right; }

    .qdoc .section-label {
        margin: 0 0 6px;
        font-size: {{ $isPdf ? '8pt' : '9px' }};
        font-weight: 700;
        color: {{ $muted }};
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .qdoc .party-card {
        background: {{ $soft }};
        border: 1px solid {{ $line }};
        padding: 10px 12px;
        margin-bottom: 12px;
    }
    .qdoc .party-card .name {
        font-size: {{ $isPdf ? '11pt' : '13px' }};
        font-weight: 700;
        color: {{ $ink }};
        margin-bottom: 3px;
    }
    .qdoc .party-card .line {
        color: {{ $muted }};
        font-size: {{ $isPdf ? '8.5pt' : '10px' }};
    }

    .qdoc .items {
        width: 100%;
        border-collapse: collapse;
        margin: 0 0 8px;
        font-size: {{ $isPdf ? '8.5pt' : '10px' }};
        table-layout: fixed;
    }
    .qdoc .items th {
        background: {{ $ink }};
        color: #ffffff;
        padding: 7px 6px;
        text-align: left;
        font-weight: 700;
        font-size: {{ $isPdf ? '7.5pt' : '8.5px' }};
        text-transform: uppercase;
        letter-spacing: 0.3px;
        border: 1px solid {{ $ink }};
    }
    .qdoc .items td {
        padding: 7px 6px;
        border: 1px solid {{ $line }};
        vertical-align: top;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    .qdoc .items tr:nth-child(even) td { background: {{ $soft }}; }
    .qdoc .item-name {
        font-weight: 700;
        color: {{ $ink }};
        font-size: {{ $isPdf ? '8.5pt' : '10.5px' }};
        line-height: 1.3;
    }
    .qdoc .right { text-align: right; }
    .qdoc .center { text-align: center; }

    .qdoc .currency-note {
        text-align: right;
        color: {{ $muted }};
        font-size: {{ $isPdf ? '7.5pt' : '8.5px' }};
        margin: 0 0 8px;
    }

    .qdoc .totals-outer {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }
    .qdoc .totals {
        width: 100%;
        border-collapse: collapse;
        font-size: {{ $isPdf ? '9pt' : '10.5px' }};
    }
    .qdoc .totals td {
        padding: 6px 10px;
        border: 1px solid {{ $line }};
    }
    .qdoc .totals .label { color: {{ $muted }}; }
    .qdoc .discount { color: {{ $brandDark }}; font-weight: 700; }
    .qdoc .totals .grand td {
        background: {{ $brand }};
        color: #ffffff;
        font-weight: 800;
        font-size: {{ $isPdf ? '10.5pt' : '12px' }};
        border: 1px solid {{ $brand }};
        padding: 8px 10px;
    }

    .qdoc .notes {
        margin-top: 10px;
        background: #fff7ed;
        border: 1px solid #fed7aa;
        padding: 8px 10px;
        font-size: {{ $isPdf ? '8.5pt' : '10px' }};
    }

    .qdoc .terms {
        margin-top: 10px;
        background: {{ $soft }};
        border: 1px solid {{ $line }};
        border-left: 3px solid {{ $brand }};
        padding: 8px 10px;
    }
    .qdoc .terms h4 {
        font-size: {{ $isPdf ? '8pt' : '9px' }};
        color: {{ $muted }};
        margin: 0 0 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
    }
    .qdoc .terms ol {
        margin: 0 0 0 14px;
        padding: 0;
        color: {{ $muted }};
        font-size: {{ $isPdf ? '7.5pt' : '9px' }};
        line-height: 1.45;
    }
    .qdoc .terms li { margin-bottom: 1px; }

    .qdoc .footer {
        margin-top: 12px;
        padding-top: 8px;
        border-top: 1px solid {{ $line }};
        text-align: center;
        color: {{ $muted }};
        font-size: {{ $isPdf ? '7.5pt' : '9px' }};
    }
    .qdoc .footer strong { color: {{ $brand }}; }
</style>

<div class="qdoc">
    <div class="accent-bar"></div>

    <table class="header-table">
        <tr>
            <td style="width:55%; padding-right:10px;">
                @if(!empty($logo_src))
                    <img src="{{ $logo_src }}" alt="Chance Laptops" class="logo" width="120">
                @endif
                <div class="brand-name">Chance Laptops (Pvt) Ltd</div>
                <div class="brand-tag">Brand New &amp; Used Laptops · Repair · Accessories</div>
                <div class="contact-line">
                    <div><strong>WhatsApp</strong> {{ $whatsapp_display }}</div>
                    <div><strong>Email</strong> {{ $email }}</div>
                </div>
            </td>
            <td style="width:45%;">
                <div class="quote-panel">
                    <div class="quote-kicker">Official quote</div>
                    <div class="quote-title">Quotation</div>
                    <table class="meta-table">
                        <tr>
                            <td class="k">Number</td>
                            <td class="v">{{ $quotation_number }}</td>
                        </tr>
                        <tr>
                            <td class="k">Issued</td>
                            <td class="v">{{ $date }}</td>
                        </tr>
                        <tr>
                            <td class="k">Valid until</td>
                            <td class="v">{{ $valid_until }}</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <div class="section-label">Prepared for</div>
    <div class="party-card">
        <div class="name">{{ $customer['name'] }}</div>
        <div class="line">Phone · {{ $customer['phone'] }}</div>
        @if(!empty($customer['email']) && $customer['email'] !== 'Not provided')
            <div class="line">Email · {{ $customer['email'] }}</div>
        @endif
    </div>

    <div class="section-label">Line items</div>
    <table class="items">
        <thead>
            <tr>
                <th style="width:6%;" class="center">#</th>
                <th style="width:{{ $hasDiscount ? '44%' : '54%' }};">Product</th>
                <th style="width:8%;" class="center">Qty</th>
                <th style="width:14%;" class="right">Unit</th>
                @if($hasDiscount)
                    <th style="width:12%;" class="right">Save</th>
                @endif
                <th style="width:16%;" class="right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
                <tr>
                    <td class="center" style="color:{{ $muted }};">{{ $index + 1 }}</td>
                    <td><div class="item-name">{{ $item['name'] }}</div></td>
                    <td class="center">{{ $item['quantity'] }}</td>
                    <td class="right">{{ number_format($item['unit_price'], 2) }}</td>
                    @if($hasDiscount)
                        <td class="right discount">
                            @if(($item['line_discount'] ?? 0) > 0)
                                -{{ number_format($item['line_discount'], 2) }}
                            @else
                                —
                            @endif
                        </td>
                    @endif
                    <td class="right" style="font-weight:700;">{{ number_format($item['line_total'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="currency-note">Currency · Sri Lankan Rupees (LKR)</div>

    <table class="totals-outer">
        <tr>
            <td style="width:52%;"></td>
            <td style="width:48%;">
                <table class="totals">
                    <tr>
                        <td class="label">Subtotal</td>
                        <td class="right">{{ number_format(($original_subtotal > 0 ? $original_subtotal : $subtotal), 2) }}</td>
                    </tr>
                    @if($hasDiscount)
                        <tr>
                            <td class="label discount">Discount</td>
                            <td class="right discount">-{{ number_format($total_discount, 2) }}</td>
                        </tr>
                    @endif
                    @if(($shipping_cost ?? 0) > 0)
                        <tr>
                            <td class="label">Shipping</td>
                            <td class="right">{{ number_format($shipping_cost, 2) }}</td>
                        </tr>
                    @endif
                    @if(($tax_amount ?? 0) > 0)
                        <tr>
                            <td class="label">Tax</td>
                            <td class="right">{{ number_format($tax_amount, 2) }}</td>
                        </tr>
                    @endif
                    <tr class="grand">
                        <td>Total</td>
                        <td class="right">{{ number_format($total, 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    @if(!empty($notes))
        <div class="notes">
            <strong>Notes</strong><br>
            {{ $notes }}
        </div>
    @endif

    <div class="terms">
        <h4>Terms</h4>
        <ol>
            <li>Valid for 7 days from issue date.</li>
            <li>Prices in LKR; subject to change without notice.</li>
            <li>Stock availability confirmed at order time.</li>
            <li>Delivery charges (if any) confirmed separately.</li>
            <li>Questions? Reach us on WhatsApp or email.</li>
        </ol>
    </div>

    <div class="footer">
        <p>Thank you for choosing <strong>Chance Laptops</strong> · www.chancelaptops.ae</p>
        <p style="margin-top:3px;">Computer-generated quotation · No signature required</p>
    </div>
</div>
