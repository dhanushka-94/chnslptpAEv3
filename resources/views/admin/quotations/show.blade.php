@extends('admin.layout')

@section('title', 'Quotation Details - ' . $quotation->quotation_number)

@section('content')
<div class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <div>
            <div class="flex items-center space-x-3 mb-2">
                <a href="{{ route('admin.quotations.index') }}" class="text-gray-600 hover:text-red-600">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">{{ $quotation->quotation_number }}</h1>
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                    @if($quotation->status_color === 'yellow') bg-yellow-100 text-yellow-800
                    @elseif($quotation->status_color === 'blue') bg-sky-100 text-sky-800
                    @elseif($quotation->status_color === 'green') bg-green-100 text-green-800
                    @elseif($quotation->status_color === 'red') bg-red-100 text-red-800
                    @else bg-gray-100 text-gray-800
                    @endif">
                    {{ $quotation->formatted_status }}
                </span>
                @if($quotation->is_expired)
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                    Expired
                </span>
                @endif
            </div>
            <p class="text-gray-600">Created {{ $quotation->created_at->format('F d, Y \a\t g:i A') }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.quotations.download', $quotation) }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-download mr-2"></i>Download PDF
            </a>
            <button onclick="showStatusModal()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-edit mr-2"></i>Update Status
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Customer Information -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user mr-2 text-red-400"></i>
                    Customer Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                        <p class="text-white">{{ $quotation->customer_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                        <p class="text-white">{{ $quotation->customer_phone }}</p>
                    </div>
                    @if($quotation->customer_email)
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                        <p class="text-white">{{ $quotation->customer_email }}</p>
                    </div>
                    @endif
                    @if($quotation->customer_address)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                        <p class="text-white">
                            {{ $quotation->customer_address }}
                            @if($quotation->customer_city), {{ $quotation->customer_city }}@endif
                            @if($quotation->customer_state), {{ $quotation->customer_state }}@endif
                            @if($quotation->customer_postal_code) {{ $quotation->customer_postal_code }}@endif
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Items -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-shopping-cart mr-2 text-green-400"></i>
                        Items ({{ count($quotation->items_data) }})
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Product</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">Qty</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase">Unit Price</th>
                                @if($quotation->total_discount > 0)
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase">Discount</th>
                                @endif
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($quotation->items_data as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-gray-900 font-medium">{{ $item['product']['name'] }}</span>
                                        @if(isset($item['product']['description']) && $item['product']['description'])
                                        <span class="text-sm text-gray-600">{{ Str::limit($item['product']['description'], 100) }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center text-white">{{ $item['cart_item']['quantity'] }}</td>
                                <td class="px-6 py-4 text-right text-white">{{ number_format($item['product']['price'], 2) }}</td>
                                @if($quotation->total_discount > 0)
                                <td class="px-6 py-4 text-right">
                                    @if($item['line_discount'] > 0)
                                    <span class="text-red-400">-{{ number_format($item['line_discount'], 2) }}</span>
                                    @else
                                    <span class="text-gray-600">-</span>
                                    @endif
                                </td>
                                @endif
                                <td class="px-6 py-4 text-right text-gray-900 font-medium">{{ number_format($item['line_total'], 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Currency Note -->
                <div class="px-6 py-2 bg-white text-right">
                    <span class="text-xs text-gray-600 italic">All amounts are in Sri Lankan Rupees (LKR)</span>
                </div>
            </div>

            <!-- Notes -->
            @if($quotation->notes)
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-sticky-note mr-2 text-yellow-400"></i>
                    Customer Notes
                </h3>
                <p class="text-gray-700">{{ $quotation->notes }}</p>
            </div>
            @endif

            <!-- Admin Notes -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user-shield mr-2 text-purple-400"></i>
                    Admin Notes
                </h3>
                @if($quotation->admin_notes)
                <div class="bg-white rounded-lg p-4 mb-4">
                    <p class="text-gray-700">{{ $quotation->admin_notes }}</p>
                </div>
                @endif
                <form onsubmit="updateAdminNotes(event)">
                    <div class="flex space-x-3">
                        <textarea id="admin-notes" 
                                  placeholder="Add admin notes..."
                                  class="flex-1 px-3 py-2 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                  rows="3">{{ $quotation->admin_notes }}</textarea>
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            
            <!-- Summary -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-calculator mr-2 text-green-400"></i>
                    Summary
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="text-white">{{ number_format($quotation->original_subtotal > 0 ? $quotation->original_subtotal : $quotation->subtotal, 2) }}</span>
                    </div>
                    @if($quotation->total_discount > 0)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Discount:</span>
                        <span class="text-red-400">-{{ number_format($quotation->total_discount, 2) }}</span>
                    </div>
                    @endif
                    @if($quotation->shipping_cost > 0)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping:</span>
                        <span class="text-white">{{ number_format($quotation->shipping_cost, 2) }}</span>
                    </div>
                    @endif
                    @if($quotation->tax_amount > 0)
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax:</span>
                        <span class="text-white">{{ number_format($quotation->tax_amount, 2) }}</span>
                    </div>
                    @endif
                    <div class="border-t border-gray-300 pt-3">
                        <div class="flex justify-between">
                            <span class="text-white font-semibold">Total:</span>
                            <span class="text-white font-bold text-lg">{{ number_format($quotation->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quotation Details -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-red-400"></i>
                    Details
                </h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Valid Until</label>
                        <p class="text-white">{{ $quotation->valid_until->format('F d, Y') }}</p>
                        <p class="text-xs text-gray-600">{{ $quotation->valid_until->diffForHumans() }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Created</label>
                        <p class="text-white">{{ $quotation->created_at->format('F d, Y g:i A') }}</p>
                    </div>
                    @if($quotation->user)
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Customer Account</label>
                        <p class="text-white">{{ $quotation->user->name }}</p>
                        <p class="text-xs text-gray-600">{{ $quotation->user->email }}</p>
                    </div>
                    @endif
                    @if($quotation->viewedByAdmin)
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Last Viewed By</label>
                        <p class="text-white">{{ $quotation->viewedByAdmin->name }}</p>
                        <p class="text-xs text-gray-600">{{ $quotation->admin_viewed_at->diffForHumans() }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-bolt mr-2 text-yellow-400"></i>
                    Quick Actions
                </h3>
                <div class="space-y-3">
                    <button onclick="updateStatus('sent')" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                        <i class="fas fa-paper-plane mr-2"></i>Mark as Sent
                    </button>
                    <button onclick="updateStatus('accepted')" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                        <i class="fas fa-check mr-2"></i>Mark as Accepted
                    </button>
                    <button onclick="updateStatus('rejected')" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                        <i class="fas fa-times mr-2"></i>Mark as Rejected
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div id="status-modal" class="hidden fixed inset-0 bg-gray-900/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl border border-gray-200 p-6 w-full max-w-md">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Quotation Status</h3>
        <form onsubmit="updateQuotationStatus(event)">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status-select" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option value="pending" {{ $quotation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="sent" {{ $quotation->status === 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="accepted" {{ $quotation->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $quotation->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="expired" {{ $quotation->status === 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>
            <div class="flex space-x-3">
                <button type="button" onclick="hideStatusModal()" class="flex-1 bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition-colors">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showStatusModal() {
    document.getElementById('status-modal').classList.remove('hidden');
}

function hideStatusModal() {
    document.getElementById('status-modal').classList.add('hidden');
}

function updateStatus(status) {
    if (confirm(`Update quotation status to "${status}"?`)) {
        fetch(`{{ route('admin.quotations.update-status', $quotation) }}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ status: status })
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

function updateQuotationStatus(event) {
    event.preventDefault();
    const status = document.getElementById('status-select').value;
    updateStatus(status);
    hideStatusModal();
}

function updateAdminNotes(event) {
    event.preventDefault();
    const notes = document.getElementById('admin-notes').value;
    
    fetch(`{{ route('admin.quotations.add-notes', $quotation) }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ admin_notes: notes })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Admin notes updated successfully');
        } else {
            alert('Error: ' + data.message);
        }
    });
}
</script>
@endsection
