@extends('layouts.app')

@section('title', 'Quotation Preview ' . $quotation->quotation_number . ' - CHANCE LAPTOPS')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-red-50/40 py-8 sm:py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wider text-[#E30613] mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#E30613]"></span>
                    Quotation preview
                </p>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $quotation->quotation_number }}</h1>
                <p class="text-sm text-slate-600 mt-1.5">Review your A4 quote, then download the PDF.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('quotation.download', $quotation) }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#E30613] hover:bg-[#C40510] text-white font-semibold px-5 py-2.5 text-sm shadow-lg shadow-red-500/20 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Download PDF
                </a>
                <a href="{{ route('checkout.quotation') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/80 backdrop-blur text-slate-700 font-semibold px-4 py-2.5 text-sm hover:bg-white hover:border-slate-300 transition">
                    Back
                </a>
            </div>
        </div>

        <div class="mx-auto w-full overflow-x-auto pb-2">
            <div class="mx-auto bg-white rounded-2xl shadow-2xl shadow-slate-900/10 border border-slate-200/80 ring-1 ring-slate-900/5"
                 style="width:210mm; min-height:297mm; padding:14mm;">
                @include('quotations.document', $document)
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('quotation.download', $quotation) }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#E30613] hover:bg-[#C40510] text-white font-semibold px-7 py-3 text-sm shadow-lg shadow-red-500/25 transition">
                Download A4 PDF
            </a>
        </div>
    </div>
</div>
@endsection
