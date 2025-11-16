<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pay All - Payment Form</title>
  <style>
    /* [Use your original style here — unchanged] */
    * {
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }
    body {
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .payment-container {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      padding: 30px;
    }
    .payment-header {
      text-align: center;
      margin-bottom: 25px;
    }
    .payment-header h2 {
      color: #333;
      margin: 0 0 10px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #555;
    }
    input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
      transition: border 0.3s;
    }
    input:focus {
      border-color: #4a6bff;
      outline: none;
    }
    .card-icons {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
    .card-icon {
      width: 40px;
      height: 25px;
      background-color: #f0f0f0;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      color: #888;
    }
    .row {
      display: flex;
      gap: 15px;
    }
    .row .form-group {
      flex: 1;
    }
    .pay-button {
      width: 100%;
      padding: 14px;
      background-color: #4a6bff;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .pay-button:hover {
      background-color: #3a5bef;
    }
    @media (max-width: 480px) {
      .payment-container {
        padding: 20px;
      }
      .row {
        flex-direction: column;
        gap: 0;
      }
    }
  </style>
</head>
<body>
  <div class="payment-container">
    <div class="payment-header">
      <h2>Pay All Pending Orders</h2>
      <p>Enter your card details to pay for all your pending menu items</p>
    </div>

    <form action="pay_all_menu_action.php" method="POST">
      <div class="form-group">
        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456"
               maxlength="19" pattern="[0-9 ]{13,19}" required>
        <div class="card-icons">
          <div class="card-icon">VISA</div>
          <div class="card-icon">MC</div>
          <div class="card-icon">AMEX</div>
          <div class="card-icon">DISC</div>
        </div>
      </div>

      <div class="form-group">
        <label for="card-name">Name on Card</label>
        <input type="text" id="card-name" name="card_name" placeholder="John Doe" required>
      </div>

      <div class="row">
        <div class="form-group">
          <label for="expiry-date">Expiry Date</label>
          <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY"
                 maxlength="5" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" required>
        </div>
        <div class="form-group">
          <label for="cvv">CVV</label>
          <input type="password" id="cvv" name="cvv" placeholder="123" maxlength="4"
                 pattern="[0-9]{3,4}" required>
        </div>
      </div>

      <button type="submit" class="pay-button">Pay All Now</button>
    </form>
  </div>
</body>
</html>
