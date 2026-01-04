<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <
    <title>Payslip</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            }

            h2 {
            text-align: center;
            margin-bottom: 10px;
            }

            .company {
            text-align: center;
            margin-bottom: 20px;
            }

            table {
            width: 100%;
            border-collapse: collapse;
            }

            .info td {
            padding: 6px;
            }

            .salary th,
            .salary td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            }

            .salary th {
            background-color: #f2f2f2;
            }

            .total {
            font-weight: bold;
            }

            .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            }

    </style>

</head>

<body>

    <div class="company">
        <h2>Company Name</h2>
        <p>Payroll Slip</p>
    </div>

    <table class="info">
        <tr>
            <td><strong>Employee Name:</strong></td>
            <td><?= htmlspecialchars($payroll['full_name']) ?></td>
        </tr>
        <tr>
            <td><strong>Pay Period:</strong></td>
            <td><?= htmlspecialchars($payroll['pay_period']) ?></td>
        </tr>
        <tr>
            <td><strong>Payment Date:</strong></td>
            <td><?= htmlspecialchars($payroll['payment_date']) ?></td>
        </tr>
    </table>

    <br>

    <table class="salary">
        <tr>
            <th>Description</th>
            <th>Amount (GHS)</th>
        </tr>
        <tr>
            <td>Gross Salary</td>
            <td><?= number_format($payroll['gross_salary'], 2) ?></td>
        </tr>
        <tr>
            <td>Tax</td>
            <td><?= number_format($payroll['tax'], 2) ?></td>
        </tr>
        <tr>
            <td>Deductions</td>
            <td><?= number_format($payroll['deductions'], 2) ?></td>
        </tr>
        <tr class="total">
            <td>Net Salary</td>
            <td><?= number_format($payroll['net_salary'], 2) ?></td>
        </tr>
    </table>

    <div class="footer">
        <p>This is a system-generated payslip.</p>
    </div>

</body>
</html>
