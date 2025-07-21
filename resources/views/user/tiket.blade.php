<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiket Event</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .ticket {
            width: 700px;
            border: 2px dashed #333;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .event-details,
        .user-details {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }

        .qr {
            text-align: center;
            margin-top: 30px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 40px;
            color: #777;
        }

        .code-box {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border: 1px dashed #aaa;
            padding: 10px;
            letter-spacing: 3px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>{{ $tiket->event->nama_event ?? 'Nama Event' }}</h1>
            <p>{{ $tiket->event->tanggal ?? 'Tanggal Event' }}</p>
        </div>

        <div class="user-details">
            <p><span class="label">Nama:</span> {{ $tiket->user->name ?? 'Nama Pengguna' }}</p>
            <p><span class="label">Email:</span> {{ $tiket->user->email ?? 'Email Pengguna' }}</p>
        </div>

        <div class="event-details">
            <p><span class="label">Lokasi:</span> {{ $tiket->event->lokasi ?? 'Lokasi Event' }}</p>
            <p><span class="label">Waktu:</span> {{ $tiket->event->waktu_mulai ?? 'Waktu Event' }}</p>
        </div>

        <div class="code-box">
            KODE TIKET: {{ $kode_tiket ?? 'XXXX-XXXX' }}
        </div>

        <div class="qr">
            @if(isset($qrCode))
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($kode_tiket)) !!} ">
            @endif
        </div>

        <div class="footer">
            Harap tunjukkan tiket ini saat registrasi di lokasi acara.
        </div>
    </div>
</body>
</html>
