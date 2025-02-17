<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $sale->reference_no }}</title>
    <style>
        /* Add your invoice styling here */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Zap Store</h1>
        <h2>Sales Invoice</h2>
    </div>

    <div class="invoice-details">
        <p><strong>Invoice No:</strong> {{ $sale->reference_no }}</p>
        <p><strong>Date:</strong> {{ $sale->created_at->format('d M Y H:i') }}</p>
        <p><strong>Payment Method:</strong> {{ ucfirst($sale->payment_method) }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($sale->payment_status) }}</p>
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
            @foreach($sale->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->unit_price, 2) }}</td>
                <td>₹{{ number_format($item->total_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        <p><strong>Total Amount:</strong> ₹{{ number_format($sale->total_amount, 2) }}</p>
        <p><strong>Paid Amount:</strong> ₹{{ number_format($sale->paid_amount, 2) }}</p>
        @if($sale->paid_amount > $sale->total_amount)
            <p><strong>Change:</strong> ₹{{ number_format($sale->paid_amount - $sale->total_amount, 2) }}</p>
        @endif
    </div>

    <button class="no-print" onclick="window.print()">Print Invoice</button>
</body>
</html> 