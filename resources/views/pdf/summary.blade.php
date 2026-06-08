<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin: 28px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #0f172a;
            background: #f5f3ef;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            width: 100%;
        }

        .hero {
            background: #0f172a;
            color: #ffffff;
            border-radius: 18px;
            padding: 22px 24px;
            margin-bottom: 18px;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #cbd5e1;
            margin: 0 0 10px 0;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            line-height: 1.2;
            font-weight: 700;
        }

        .subtext {
            margin: 10px 0 0 0;
            color: #cbd5e1;
            font-size: 11px;
        }

        .two-col {
            width: 100%;
            border-collapse: separate;
            border-spacing: 12px 0;
            margin-bottom: 18px;
        }

        .two-col td {
            width: 50%;
            vertical-align: top;
            padding: 0;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px 18px;
        }

        .section-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #64748b;
            margin-bottom: 8px;
        }

        .project-line {
            margin: 4px 0;
        }

        .total-box {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 16px 18px;
        }

        .total-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #047857;
            margin-bottom: 8px;
        }

        .total-value {
            font-size: 26px;
            line-height: 1.1;
            font-weight: 800;
            color: #064e3b;
            margin: 0;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            margin-top: 6px;
        }

        .summary-table th {
            background: #f8fafc;
            color: #334155;
            font-size: 10px;
             
            letter-spacing: 0.14em;
            text-align: left;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
        }

        .summary-table td {
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }

        

        .name {
            font-weight: 600;
            color: #0f172a;
        }

        .footer-total {
            margin-top: 14px;
            background: #0f172a;
            color: #ffffff;
            border-radius: 16px;
            padding: 14px 18px;
            font-weight: 700;
            display: table;
            width: 100%;
            box-sizing: border-box;
        }

        .footer-total .left,
        .footer-total .rightval {
            display: table-cell;
            vertical-align: middle;
        }

        .footer-total .rightval {
            text-align: right;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="hero">
            <p class="eyebrow justify-center">GaGo Agency</p>
            <h1>რემონტის შეჯამება</h1>
            <p class="subtext">თბილისი · საქართველო</p>
        </div>

        <table class="two-col">
            <tr>
                <td>
                    <div class="card">
                        <div >პროექტის დეტალები</div>
                        <div class="project-line"><strong>პაკეტი:</strong> {{ $data['package'] }}</div>
                        <div class="project-line"><strong>ფართი:</strong> {{ $data['size'] }} მ²</div>
                        <div class="project-line"><strong>ოთახები:</strong> {{ $data['rooms'] }}</div>
                    </div>
                </td>
                <td>
                    <div >
                        <div >საერთო ფასი</div>
                        <p class="total-value">{{ $data['totalFormatted'] ?? '' }}</p>
                    </div>
                </td>
            </tr>
        </table>

        <table class="summary-table">
            <thead>
                <tr>
                    <th>დეტალები</th>
                    <th >რაოდენობა</th>
                    <th class="right">ღირებულება</th>
                    <th class="right">საერთო ფასი</th>
                </tr>
            </thead>
            <tbody>
                @foreach(($data['rows'] ?? []) as $row)
                    <tr>
                        <td >{{ $row['name'] ?? '' }}</td>
                        <td class="right">{{ $row['quantity'] . ' ' . ($row['unit'] ?? '')}}</td>
                        <td class="right">{{ $row['price'] ?? $row['priceRaw'] ?? '' }}</td>
                        <td class="right"><strong>{{ $row['total'] ?? $row['totalRaw'] ?? '' }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer-total">
            <div class="left">საბოლოო ჯამი</div>
            <div class="rightval">{{ $data['totalFormatted'] ?? '' }}</div>
        </div>
    </div>
</body>
</html>