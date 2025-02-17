<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase #{{ $purchase->reference_no }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        .info-section h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        .summary {
            width: 300px;
            margin-left: auto;
        }
        .summary div {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        .note {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        @media print {
            body { padding: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zap Store</h1>
        <h2>Purchase Order</h2>
    </div>

    <div class="info-grid">
        <div class="info-section">
            <h3>Purchase Information</h3>
            <p><strong>Reference No:</strong> {{ $purchase->reference_no }}</p>
            <p><strong>Date:</strong> {{ $purchase->created_at->format('d M Y h:i A') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($purchase->payment_status) }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($purchase->payment_method) }}</p>
        </div>
        <div class="info-section">
            <h3>Supplier Information</h3>
            <p><strong>Name:</strong> {{ $purchase->supplier->name }}</p>
            <p><strong>Phone:</strong> {{ $purchase->supplier->phone }}</p>
            <p><strong>Email:</strong> {{ $purchase->supplier->email ?? 'N/A' }}</p>
            <p><strong>Tax Number:</strong> {{ $purchase->supplier->tax_number ?? 'N/A' }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->unit_price, 2) }}</td>
                <td>₹{{ number_format($item->total_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div>
            <strong>Total Amount:</strong>
            <span>₹{{ number_format($purchase->total_amount, 2) }}</span>
        </div>
        <div>
            <strong>Paid Amount:</strong>
            <span>₹{{ number_format($purchase->paid_amount, 2) }}</span>
        </div>
        <div>
            <strong>Balance:</strong>
            <span>₹{{ number_format($purchase->total_amount - $purchase->paid_amount, 2) }}</span>
        </div>
    </div>

    @if($purchase->note)
    <div class="note">
        <h3>Note</h3>
        <p>{{ $purchase->note }}</p>
    </div>
    @endif

    <button class="no-print" onclick="window.print()">Print</button>
</body>
</html> 