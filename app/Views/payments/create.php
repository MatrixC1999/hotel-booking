<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        .card-header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn {
            border-radius: 30px;
            padding: 10px 20px;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2471a3;
        }
        .btn-secondary {
            background-color: #95a5a6;
            border-color: #7f8c8d;
        }
        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #707b7c;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-credit-card"></i> Add New Payment</h2>
        </div>
        <div class="card-body">

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('payments/store') ?>" method="post">
                <div class="form-group">
                    <label for="booking_id"><i class="fas fa-bookmark"></i> Booking</label>
                    <select class="form-control" id="booking_id" name="booking_id" required>
                        <option value="">Select Booking</option>
                        <?php foreach ($bookings as $booking): ?>
                            <option value="<?= esc($booking['id']); ?>">
                                Booking #<?= esc($booking['id']); ?>
                                <?php if (isset($booking['guest_name'])): ?>
                                    - <?= esc($booking['guest_name']); ?>
                                <?php endif; ?>
                                <?php if (isset($booking['room_number'])): ?>
                                    (<?= esc($booking['room_number']); ?>)
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount_paid"><i class="fas fa-peso-sign"></i> (₱) Amount Paid</label>
                    <input type="number" step="0.01" class="form-control" id="amount_paid" name="amount_paid" placeholder="Enter amount paid" required>
                </div>
                <div class="form-group">
                    <label for="payment_date"><i class="fas fa-calendar-alt"></i> Payment Date</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                </div>
                <div class="form-group">
                    <label for="payment_method"><i class="fas fa-wallet"></i> Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method" required onchange="showSubOptions()">
                        <option value="">Select Method</option>
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                    </select>
                </div>

                <!-- Sub-options for Card -->
                <div class="form-group d-none" id="card-options">
                    <label for="card_type"><i class="fas fa-id-card"></i> Card Type</label>
                    <select class="form-control" name="card_type" id="card_type">
                        <option value="">Select Card Type</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                    </select>
                </div>

                <!-- Sub-options for Bank Transfer -->
                <div class="form-group d-none" id="bank-options">
                    <label for="bank_name"><i class="fas fa-university"></i> Bank Name</label>
                    <select class="form-control" name="bank_name" id="bank_name">
                        <option value="">Select Bank</option>
                        <option value="BDO">BDO</option>
                        <option value="BPI">BPI</option>
                        <option value="Union Bank">Union Bank</option>
                        <option value="China Bank">China Bank</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Payment</button>
                    <a href="<?= base_url('payments'); ?>" class="btn btn-secondary"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for toggling sub-options and triggering actions -->
<script>
    function showSubOptions() {
        const paymentMethod = document.getElementById('payment_method').value;
        const cardOptions = document.getElementById('card-options');
        const bankOptions = document.getElementById('bank-options');

        cardOptions.classList.add('d-none');
        bankOptions.classList.add('d-none');

        if (paymentMethod === 'Card') {
            cardOptions.classList.remove('d-none');
        } else if (paymentMethod === 'Bank Transfer') {
            bankOptions.classList.remove('d-none');
        }
    }

    // Card scanning alert
    document.getElementById('card_type').addEventListener('change', function () {
        const selectedCard = this.value;
        if (selectedCard === 'Credit Card' || selectedCard === 'Debit Card') {
            alert("Please scan the card using the scanner.");
        }
    });

    // QR popup for bank transfer
    document.getElementById('bank_name').addEventListener('change', function () {
        const selectedBank = this.value;
        if (selectedBank !== '') {
            let qrSrc = '';

            switch (selectedBank) {
                case 'BDO':
                    qrSrc = 'https://api.qrserver.com/v1/create-qr-code/?data=BDO_Payment_Link';
                    break;
                case 'BPI':
                    qrSrc = 'https://api.qrserver.com/v1/create-qr-code/?data=BPI_Payment_Link';
                    break;
                case 'Union Bank':
                    qrSrc = 'https://api.qrserver.com/v1/create-qr-code/?data=UnionBank_Payment_Link';
                    break;
                case 'China Bank':
                    qrSrc = 'https://api.qrserver.com/v1/create-qr-code/?data=ChinaBank_Payment_Link';
                    break;
                default:
                    break;
            }

            if (qrSrc !== '') {
                const qrWindow = window.open('', 'QR Code', 'width=300,height=350');
                qrWindow.document.write(`
                    <html>
                        <head><title>${selectedBank} QR Code</title></head>
                        <body style="text-align:center; font-family:sans-serif;">
                            <h3>Scan to Pay - ${selectedBank}</h3>
                            <img src="${qrSrc}" alt="QR Code" style="max-width:100%; height:auto;"/>
                        </body>
                    </html>
                `);
            }
        }
    });
</script>
</body>
</html>
