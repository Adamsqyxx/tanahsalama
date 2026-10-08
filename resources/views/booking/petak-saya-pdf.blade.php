<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>
        Bukti Kepemilikan {{ $booking->kode_booking }}
    </title>

    <style>
        @page {
            size: A4 portrait;
            margin: 25px 30px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #1f2937;
            font-size: 12px;
            background: #ffffff;
        }

        .container {
            width: 100%;
        }

        /* HEADER */

        .header {
            border-bottom: 3px solid #1f5c42;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 65%;
            vertical-align: middle;
        }

        .header-right {
            width: 35%;
            text-align: right;
            vertical-align: middle;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            color: #174d38;
            letter-spacing: 0.5px;
        }

        .subtitle {
            margin-top: 4px;
            color: #6b7280;
            font-size: 10px;
        }

        .document-label {
            font-size: 10px;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .booking-code {
            font-size: 15px;
            font-weight: bold;
            color: #174d38;
        }

        /* TITLE */

        .title {
            text-align: center;
            margin: 20px 0 5px;
        }

        .title h1 {
            margin: 0;
            font-size: 20px;
            color: #173f30;
            letter-spacing: 0.5px;
        }

        .title p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 10px;
        }

        /* STATUS */

        .status {
            text-align: center;
            margin: 18px 0 25px;
        }

        .status-box {
            display: inline-block;
            border: 1px solid #1f5c42;
            background: #edf7f1;
            color: #175c3f;
            padding: 8px 22px;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 0.7px;
        }

        /* SECTION */

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            background: #f1f5f3;
            border-left: 4px solid #1f5c42;
            padding: 8px 10px;
            color: #174d38;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            border: 1px solid #e5e7eb;
            padding: 8px 10px;
            vertical-align: top;
        }

        .label {
            width: 32%;
            background: #f9fafb;
            color: #6b7280;
            font-weight: bold;
        }

        .value {
            color: #111827;
        }

        /* PAYMENT */

        .payment-table {
            width: 100%;
            border-collapse: collapse;
        }

        .payment-table th {
            background: #174d38;
            color: #ffffff;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }

        .payment-table td {
            border: 1px solid #e5e7eb;
            padding: 8px;
            font-size: 10px;
        }

        .payment-table .amount {
            text-align: right;
        }

        .total-row td {
            background: #edf7f1;
            font-weight: bold;
            color: #174d38;
        }

        /* NOTE */

        .note {
            border: 1px solid #d9e5de;
            background: #f8fbf9;
            padding: 12px;
            margin-top: 22px;
            font-size: 10px;
            line-height: 1.6;
            color: #4b5563;
        }

        /* FOOTER */

        .footer {
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-left {
            width: 60%;
            color: #6b7280;
            font-size: 9px;
        }

        .footer-right {
            width: 40%;
            text-align: right;
            color: #6b7280;
            font-size: 9px;
        }

        .signature {
            margin-top: 35px;
            text-align: center;
        }

        .signature-title {
            font-size: 10px;
            color: #4b5563;
        }

        .signature-space {
            height: 45px;
        }

        .signature-name {
            font-weight: bold;
            color: #174d38;
        }

        .small {
            font-size: 9px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">

        <table class="header-table">
            <tr>

                <td class="header-left">

                    <div class="brand">
                        TANAH SALAMA
                    </div>

                    <div class="subtitle">
                        Sistem Informasi Pengelolaan Petak TPU Tanah Salama
                    </div>

                </td>

                <td class="header-right">

                    <div class="document-label">
                        Kode Booking
                    </div>

                    <div class="booking-code">
                        {{ $booking->kode_booking }}
                    </div>

                </td>

            </tr>
        </table>

    </div>


    {{-- TITLE --}}
    <div class="title">

        <h1>
            BUKTI KEPEMILIKAN PETAK
        </h1>

        <p>
            Dokumen informasi kepemilikan petak berdasarkan transaksi
            yang telah diverifikasi.
        </p>

    </div>


    {{-- STATUS --}}
    <div class="status">

        <span class="status-box">
            LUNAS &amp; TERVERIFIKASI
        </span>

    </div>


    {{-- DATA PEMILIK --}}
    <div class="section">

        <div class="section-title">
            DATA PEMILIK
        </div>

        <table class="data-table">

            <tr>
                <td class="label">
                    Nama Pemesan
                </td>

                <td class="value">
                    {{ $booking->nama_pemesan }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Email
                </td>

                <td class="value">
                    {{ $booking->email }}
                </td>
            </tr>

        </table>

    </div>


    {{-- DETAIL PETAK --}}
    <div class="section">

        <div class="section-title">
            DETAIL PETAK
        </div>

        <table class="data-table">

            <tr>
                <td class="label">
                    Kode Petak
                </td>

                <td class="value">
                    {{ $booking->plot->kode_plot ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Kategori
                </td>

                <td class="value">
                    {{ $booking->plot->category->nama ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Jenis Lahan
                </td>

                <td class="value">
                    {{ $booking->plot->jenis_lahan ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Status Petak
                </td>

                <td class="value">
                    TERISI
                </td>
            </tr>

        </table>

    </div>


    {{-- PEMBAYARAN --}}
    <div class="section">

        <div class="section-title">
            INFORMASI PEMBAYARAN
        </div>

        <table class="payment-table">

            <thead>

                <tr>
                    <th>
                        Keterangan
                    </th>

                    <th style="text-align: right;">
                        Jumlah
                    </th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>
                        Harga Petak
                    </td>

                    <td class="amount">
                        Rp {{ number_format($hargaPetak, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Total Pembayaran Terverifikasi
                    </td>

                    <td class="amount">
                        Rp {{ number_format($totalPembayaranVerified, 0, ',', '.') }}
                    </td>
                </tr>

                <tr class="total-row">

                    <td>
                        Status Pembayaran
                    </td>

                    <td class="amount">
                        LUNAS
                    </td>

                </tr>

            </tbody>

        </table>

    </div>


    {{-- KETERANGAN --}}
    <div class="note">

        <strong>Keterangan:</strong>

        Dokumen ini merupakan bukti informasi kepemilikan petak
        yang diterbitkan berdasarkan data booking dan pembayaran
        yang tercatat pada sistem TPU Tanah Salama.

        Bukti ini dapat digunakan sebagai arsip pemilik
        dan tidak menggantikan dokumen administrasi resmi lainnya
        apabila diperlukan oleh pengelola.

    </div>


    {{-- FOOTER --}}
    <div class="footer">

        <table class="footer-table">

            <tr>

                <td class="footer-left">

                    Dicetak dari Sistem TPU Tanah Salama

                </td>

                <td class="footer-right">

                    {{ now()->format('d/m/Y H:i') }}

                </td>

            </tr>

        </table>


        <div class="signature">

            <div class="signature-title">
                Pengelola TPU Tanah Salama
            </div>

            <div class="signature-space"></div>

            <div class="signature-name">
                __________________________
            </div>

            <div class="small">
                Tanda tangan pengelola
            </div>

        </div>

    </div>

</div>

</body>
</html>