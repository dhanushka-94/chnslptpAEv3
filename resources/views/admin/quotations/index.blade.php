@extends('admin.layout')

@section('title', 'Quotation Management')

@section('content')
<div class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Quotation Management</h1>
            <p class="text-gray-600">Manage customer quotations and requests</p>
        </div>
        <div class="flex space-x-3">
            <button onclick="refreshData()" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-sync-alt mr-2"></i>Refresh
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        <!-- Total Quotations -->
        <div class="bg-gradient-to-br from-red-500/10 to-red-600/5 border border-red-500/20 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-400 text-sm font-medium">Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total']) }}</p>
                </div>
                <div class="bg-red-500/20 p-3 rounded-lg">
                    <i class="fas fa-file-invoice text-red-400 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Pending Quotations -->
        <div class="bg-gradient-to-br from-yellow-500/10 to-yellow-600/5 border border-yellow-500/20 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-400 text-sm font-medium">Pending</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['pending']) }}</p>
                </div>
                <div class="bg-yellow-500/20 p-3 rounded-lg">
                    <i class="fas fa-clock text-yellow-400 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Accepted Quotations -->
        <div class="bg-gradient-to-br from-green-500/10 to-green-600/5 border border-green-500/20 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-400 text-sm font-medium">Accepted</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['accepted']) }}</p>
                </div>
                <div class="bg-green-500/20 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-400 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Expired Quotations -->
        <div class="bg-gradient-to-br from-red-500/10 to-red-600/5 border border-red-500/20 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-400 text-sm font-medium">Expired</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['expired']) }}</p>
                </div>
                <div class="bg-red-500/20 p-3 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Today's Quotations -->
        <div class="bg-gradient-to-br from-purple-500/10 to-purple-600/5 border border-purple-500/20 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-400 text-sm font-medium">Today</p>
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['today']) }}</p>
                </div>
                <div class="bg-purple-500/20 p-3 rounded-lg">
                    <i class="fas fa-calendar-day text-purple-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            <!-- Search -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Quotation #, customer name, email, phone..."
                       class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="sent" {{ request('status') === 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="expired" {{ request('status') === 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>

            <!-- Date From -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">From Date</label>
                <input type="date" 
                       name="date_from" 
                       value="{{ request('date_from') }}"
                       class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>

            <!-- Date To -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">To Date</label>
                <input type="date" 
                       name="date_to" 
                       value="{{ request('date_to') }}"
                       class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>

            <!-- Filter Buttons -->
            <div class="flex space-x-2 items-end">
                <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <a href="{{ route('admin.quotations.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>Clear
                </a>
            </div>
        </form>
    </div>

    <!-- Quotations Table -->
    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">Quotations ({{ $quotations->total() }})</h3>
                <div class="flex space-x-2">
                    <button onclick="selectAll()" class="text-sm text-gray-600 hover:text-red-600">Select All</button>
                    <button onclick="selectNone()" class="text-sm text-gray-600 hover:text-red-600">Select None</button>
                </div>
            </div>
        </div>

        @if($quotations->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" id="select-all" class="rounded border-slate-200 bg-gray-700 text-primary-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Quotation</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Valid Until</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($quotations as $quotation)
                    <tr class="hover:bg-gray-100/50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" name="quotation_ids[]" value="{{ $quotation->id }}" class="quotation-checkbox rounded border-slate-200 bg-gray-700 text-primary-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <a href="{{ route('admin.quotations.show', $quotation) }}" class="text-primary-400 hover:text-primary-300 font-medium">
                                    {{ $quotation->quotation_number }}
                                </a>
                                <span class="text-xs text-gray-500">{{ $quotation->items_count }} items</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium">{{ $quotation->customer_name }}</span>
                                <span class="text-sm text-gray-600">{{ $quotation->customer_phone }}</span>
                                @if($quotation->customer_email)
                                <span class="text-sm text-gray-600">{{ $quotation->customer_email }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-medium">LKR {{ number_format($quotation->total_amount, 2) }}</span>
                                @if($quotation->total_discount > 0)
                                <span class="text-sm text-red-400">-LKR {{ number_format($quotation->total_discount, 2) }} discount</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($quotation->status_color === 'yellow') bg-yellow-100 text-yellow-800
                                @elseif($quotation->status_color === 'blue') bg-sky-100 text-sky-800
                                @elseif($quotation->status_color === 'green') bg-green-100 text-green-800
                                @elseif($quotation->status_color === 'red') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $quotation->formatted_status }}
                            </span>
                            @if($quotation->is_expired)
                            <div class="text-xs text-red-400 mt-1">Expired</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-white">{{ $quotation->valid_until->format('M d, Y') }}</span>
                                <span class="text-xs text-gray-600">{{ $quotation->valid_until->diffForHumans() }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-white">{{ $quotation->created_at->format('M d, Y') }}</span>
                                <span class="text-xs text-gray-600">{{ $quotation->created_at->format('g:i A') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.quotations.show', $quotation) }}" 
                                   class="text-red-400 hover:text-red-300" 
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.quotations.download', $quotation) }}" 
                                   class="text-green-400 hover:text-green-300" 
                                   title="Download PDF">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button onclick="deleteQuotation({{ $quotation->id }})" 
                                        class="text-red-400 hover:text-red-300" 
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $quotations->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <i class="fas fa-file-invoice text-gray-600 text-4xl mb-4"></i>
            <p class="text-gray-600 text-lg">No quotations found</p>
            <p class="text-gray-500 text-sm">Quotations will appear here when customers request them</p>
        </div>
        @endif
    </div>

    <!-- Bulk Actions -->
    <div id="bulk-actions" class="hidden bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-4">
        <div class="flex items-center justify-between">
            <span class="text-white">
                <span id="selected-count">0</span> quotation(s) selected
            </span>
            <div class="flex space-x-2">
                <select id="bulk-status" class="px-3 py-2 bg-white border border-gray-300 rounded-lg text-white">
                    <option value="">Change Status</option>
                    <option value="pending">Pending</option>
                    <option value="sent">Sent</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                    <option value="expired">Expired</option>
                </select>
                <button onclick="bulkUpdateStatus()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                    Update Status
                </button>
                <button onclick="bulkDelete()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                    Delete Selected
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Bulk selection functionality
document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.quotation-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('quotation-checkbox')) {
        updateBulkActions();
    }
});

function selectAll() {
    document.getElementById('select-all').checked = true;
    document.getElementById('select-all').dispatchEvent(new Event('change'));
}

function selectNone() {
    document.getElementById('select-all').checked = false;
    document.getElementById('select-all').dispatchEvent(new Event('change'));
}

function updateBulkActions() {
    const checkboxes = document.querySelectorAll('.quotation-checkbox:checked');
    const bulkActions = document.getElementById('bulk-actions');
    const selectedCount = document.getElementById('selected-count');
    
    selectedCount.textContent = checkboxes.length;
    
    if (checkboxes.length > 0) {
        bulkActions.classList.remove('hidden');
    } else {
        bulkActions.classList.add('hidden');
    }
}

function bulkUpdateStatus() {
    const checkboxes = document.querySelectorAll('.quotation-checkbox:checked');
    const status = document.getElementById('bulk-status').value;
    
    if (!status) {
        alert('Please select a status');
        return;
    }
    
    const quotationIds = Array.from(checkboxes).map(cb => cb.value);
    
    if (confirm(`Update status to "${status}" for ${quotationIds.length} quotation(s)?`)) {
        fetch('{{ route("admin.quotations.bulk-action") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                action: 'update_status',
                quotation_ids: quotationIds,
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        });
    }
}

function bulkDelete() {
    const checkboxes = document.querySelectorAll('.quotation-checkbox:checked');
    const quotationIds = Array.from(checkboxes).map(cb => cb.value);
    
    if (confirm(`Delete ${quotationIds.length} quotation(s)? This action cannot be undone.`)) {
        fetch('{{ route("admin.quotations.bulk-action") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                action: 'delete',
                quotation_ids: quotationIds
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        });
    }
}

function deleteQuotation(id) {
    if (confirm('Delete this quotation? This action cannot be undone.')) {
        fetch(`/admin/quotations/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        });
    }
}

function refreshData() {
    location.reload();
}
</script>
@endsection
