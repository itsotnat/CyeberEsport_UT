<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>Kirim Pesan Anonymous</h2>
<p>Kami berharap dengan ini dapat membantu peningkatan kualitas dalam segi apapun, kami menerima kritik, saran, dan masukan, tolong jangan sungkan-sungkan untuk memberikan kritik, saran, dan masukan. Terimakasih</p>

<div class="container">
  <form action="" onsubmit="kirimPesan(event)" method="POST"> 
    <div class="row">
      <div class="col-100">
        <textarea id="messages" name="messages" placeholder="Ketik Kritik, Saran, dan Masukan disini .." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  async function kirimPesan(event) {
    if (event) {
      event.preventDefault(); // Cegah form submit default
    }

    try {
      const textAreaElement = document.getElementById('messages');
      const pesan = textAreaElement.value;
      const decodedPesan = decodeURIComponent(pesan);

      const botToken = "6958413519:AAE1qLj1kZtpuqmeT4dK8vzq4mHJ_SXlx3U";
      const chatId = '784188021';

      const response = await fetch(`https://api.telegram.org/bot${botToken}/sendMessage`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          chat_id: chatId,
          text: decodedPesan
        })
      });

      if (response.ok) {
        console.log('Pesan berhasil dikirim!');
        alert('Pesan berhasil dikirim ke Telegram!'); // Tambahkan alert
        textAreaElement.value = ''; // Kosongkan textarea setelah dikirim
      } else {
        console.error('Gagal mengirim pesan:', response.statusText);
        alert('Gagal mengirim pesan ke Telegram!'); // Tambahkan alert
      }
    } catch (error) {
      console.error('Error saat mengirim pesan:', error.message);
      alert('Terjadi kesalahan saat mengirim pesan!'); // Tambahkan alert
    }
  }
</script>

</body>
</html>